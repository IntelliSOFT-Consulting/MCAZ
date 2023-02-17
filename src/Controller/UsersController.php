<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;
use Cake\View\Helper\HtmlHelper; 
use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\I18n\Time;
use Cake\Utility\Hash;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $paginate = [
            // 'limit' => 2,
            'Sadrs' => ['scope' => 'sadr'],
            'Adrs' => ['scope' => 'adr'],
            'Aefis' => ['scope' => 'aefi'],
            'Saefis' => ['scope' => 'saefi'],
            'Ce2bs' => ['scope' => 'ce2b'],
            'Notifications' => ['scope' => 'notification'],
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       $this->Auth->allow('logout', 'activate');       
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // $this->Auth->allow();
        $this->Auth->allow(['register', 'login', 'logout', 'activate', 'forgotPassword', 'resetPassword', 'view']);
    }

    public function dashboard() {
        if ($this->request->session()->read('Auth.User.group_id') == 1) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'admin', 'plugin' => false]);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 2) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator', 'plugin' => false]);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 3) {
            return $this->redirect(['controller' => 'Users', 'action' => 'home', 'prefix' => false, 'plugin' => false]);
        } elseif ($this->request->session()->read('Auth.User.group_id') == 5) {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'institution', 'plugin' => false]);
        }
    }

    //Login with username or password
    public function login()
    {   
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl()); 
        }

        if ($this->request->is('post')) {

            if (Validation::email($this->request->data['username'])) {
                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'email']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
                $this->request->data['email'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

                $this->log($user['email'].' logged in at '.date('d-m-Y H:i:s'), 'info', 'dblog');

                $date = new \DateTime(Configure::read('password_expire_timeout'));
                if($user['is_active'] == 0) {
                $this->Flash->error('Your account is not activated! If you have just registered, please click the activation link sent to your email. Remember to check you spam folder too!');
                    $this->redirect($this->Auth->logout());
                } elseif ($user['deactivated'] == 1) {
                    $this->Flash->error('Your account has been deactivated! Please contact MCAZ.');
                    $this->redirect($this->Auth->logout());
                } elseif ($user['last_password'] <= $date->modify('-2 days')) {
                    $this->Flash->error('Your password has expired. Click on forgot password to create new password.');
                    $this->redirect($this->Auth->logout());
                }

                if(strlen($this->Auth->redirectUrl()) > 12) {
                    return $this->redirect($this->Auth->redirectUrl());           
                } else {
                    if ($user['group_id'] == 1) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'admin', 'plugin' => false]);
                    } elseif ($user['group_id'] == 2) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'manager', 'plugin' => false]);
                    } elseif ($user['group_id'] == 4) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator', 'plugin' => false]);
                    } elseif ($user['group_id'] == 5) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'institution', 'plugin' => false]);
                    }  
                }  
                return $this->redirect($this->Auth->redirectUrl());            
                
            }

            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
 
    public function logout() {
        //Leave empty for now.
        $this->Flash->success(__('Good-Bye'));
        $this->log($this->Auth->user('username').' logged out at '.date('d-m-Y H:i:s'), 'info', 'dblog');
        $this->redirect($this->Auth->logout());
    }

    public function register() {
        $this->Users->addBehavior('Captcha.Captcha');
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl()); 
        }
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($user->errors()) {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => $user->errors(), 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
            }

            $user->group_id = 3;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration successful.'));

                $user->activation_key = $this->Util->generateXOR($user->id);
                $query = $this->Users->query();
                $query->update()
                    ->set(['activation_key' => $this->Util->generateXOR($user->id),'last_password'=>date('Y-m-d H:i:s')])
                    ->where(['id' => $user->id])
                    ->execute();

                //Send registration confirm email
                $this->loadModel('Queue.QueuedJobs'); 
                $data = [
                    'email_address' => $user->email, 'user_id' => $user->id, 'type' => 'registration_email', 'model' => 'Users', 
                    'foreign_key' => $user->id, 'vars' =>  $user->toArray()                
                ]; 
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['name'] = (isset($user->name)) ? $user->name : 'Sir/Madam' ;
                $data['vars']['pv_site'] = $html->link('MCAZ PV website', ['controller' => 'Pages', 'action' => 'home', '_full' => true, 'prefix' => false]);
                $data['vars']['activation_link'] = $html->link('ACTIVATE', ['controller' => 'Users', 'action' => 'activate', $user->activation_key, 
                                          '_full' => true, 'prefix' => false]);
                $this->QueuedJobs->createJob('GenericEmail', $data);
                //Send registration notification
                $data['type'] = 'registration_notification';
                $this->QueuedJobs->createJob('GenericNotification', $data);
                //
                //Send email and notification to institution
                if (!empty($user->name_of_institution)) {
                    $institution = $this->Users->find('all', ['conditions' => ['group_id' => 5, 'lower(Users.name_of_institution) LIKE' => strtolower($user->name_of_institution)]])->first();
                    if(!empty($institution->email)) {
                        $data = [
                            'email_address' => $institution->email, 'user_id' => $institution->id, 'type' => 'registration_institution_email', 'model' => 'Users', 
                            'foreign_key' => $institution->id, 'vars' =>  $institution->toArray()                
                        ]; 
                        $data['vars']['name'] = (isset($institution->name)) ? $institution->name : 'Sir/Madam' ;
                        $this->QueuedJobs->createJob('GenericEmail', $data);
                        //Send registration notification
                        $data['type'] = 'registration_institution_notification';
                        $this->QueuedJobs->createJob('GenericNotification', $data);
                    }
                }


                $this->Flash->success(__('You have successfully registered. Please click on the link sent to your email address to
                    activate your account. Check your spam folder if you
                    don\'t see it in your inbox.'));
                
                
                if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Registration successfull. Click on link sent on email to complete registration', 
                        '_serialize' => ['message']]);
                    return;
                }

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);

                //return $this->redirect('/');
            } else {
                $this->Flash->error(__('The user could not be registered. Please, try again.'));     
                // $user->success = false;
                // $user->message =            
            }
        }
        $designations = $this->Users->Designations->find('list', ['limit' => 200, 'order' => ['name' => 'ASC']]);
        $provinces = $this->Users->Provinces->find('list', ['limit' => 200, 'order' => ['province_name' => 'ASC']]);
        $this->set(compact('user', 'designations', 'provinces'));
        $this->set('_serialize', ['user']);
    }

    //TODO: Add forgot password functionality
    
    public function activate($id = null) {
        if($id) {
            $user = $this->Users->findByActivationKey($id)->first();
            // pr($id);
            // pr($this->Util->reverseXOR($id));
            // pr($this->Util->generateXOR(8));
            // $user = $this->Users->get($this->Util->reverseXOR($id), [
            //     'contain' => []
            // ]);
            if ($user) {
                // debug($user);
                $query = $this->Users->query();
                $query->update()
                    ->set(['is_active' => 1])
                    ->where(['id' => $user->id])
                    ->execute();

                $this->Flash->success(__('You have successfully activated your account.'));
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());

            } else {
                $this->Flash->error(__('Invalid activation token.'));
                $this->redirect('/');
            }
        } else {
            $this->Flash->error(__('Invalid activation token.'));
            $this->redirect('/');
        }
    }


    public function forgotPassword() {
        if ($this->Auth->user()) {
            $this->Flash->success('You are logged in!');
            $this->redirect('/', null, false);
        }
        if ($this->request->is('post')) {
            $user = $this->Users->findByEmail($this->request->getData('email'))->first();
            if ($user) {
 
                $new_pass= date('sYmdHi', strtotime(Time::now()));
                $hasher = new DefaultPasswordHasher();
                $password=$hasher->hash($new_pass);
                $query = $this->Users->query();
                $query->update()
                    ->set(['forgot_password' => 1, 'last_password' => Time::now(),'password'=>$password,'confirm_password'=>$password])
                    ->where(['id' => $user->id])
                    ->execute();

                //Send registration confirm email
                $this->loadModel('Queue.QueuedJobs'); 
                $data = [
                    'email_address' => $user->email, 'user_id' => $user->id, 'type' => 'forgot_password_email', 'model' => 'Users', 
                    'foreign_key' => $user->id, 'vars' =>  $user->toArray()                
                ]; 
                $pass=$this->Util->generateXOR($user->id); 
                $html = new HtmlHelper(new \Cake\View\View());
                $data['vars']['name'] = (isset($user->name)) ? $user->name : 'Sir/Madam' ;
                $data['vars']['new_password'] = $new_pass;
                $data['vars']['pv_site'] = $html->link('MCAZ PV website', ['controller' => 'Pages', 'action' => 'home', '_full' => true]);
                $data['vars']['reset_password_link'] = $html->link('Reset Password', ['controller' => 'Users', 'action' => 'resetPassword', $pass, 
                                          '_full' => true]);
                $this->QueuedJobs->createJob('GenericEmail', $data);
                
                $this->Flash->success(__('A new password has been sent to the requested email address.'));
                $this->redirect('/');
            } else {
                $this->Flash->error(__('Could not verify your email address.'));
            }
        }
    }


    public function resetPassword($id = null) {
        //confirm user id hash for authenticity
        $check = $this->Users->find('all')->where(['id' => $this->Util->reverseXOR($id), 'is_active' => 1])->first();
        if (!$check) {
            $this->Flash->error(__('Could not verify the user. Kindly contact MCAZ.'));
            $this->redirect('/');
        } else {
            if ($check->forgot_password != 1) {
                $this->Flash->error(__('The password has not been reset.'));
                $this->redirect('/');
            }
            $user = $this->Users->patchEntity($check, $this->request->getData());
            $user->password = date('smiYhd', strtotime($check->created));
            $user->confirm_password = date('smiYhd', strtotime($check->created));
            $user->forgot_password = 0;
            $user->save();

            // create the password history

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The password has been reset. You may login using your new password.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The password could not be reset. Kindly contact MCAZ.'));
            $this->redirect('/');
        }
    }

    public function home() {
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $this->loadModel('Ce2bs');
        $this->loadModel('Notifications');
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->paginate = [
            'limit' => 5,
            // 'Sadrs' => ['scope' => 'sadr'],
            // 'Adrs' => ['scope' => 'adr']
        ];

        // pr($this->Sadrs->find()->select(['reference_number'])->distinct(['reference_number'])->where(['date_format(Sadrs.created,"%Y")' => date("Y"), 'Sadrs.reference_number IS NOT' => null])->count());
        // pr($this->Sadrs->find()->select(['reference_number'])->distinct()->where(['date_format(Sadrs.created,"%Y")' => date("Y"), 'Sadrs.reference_number IS NOT' => null])->count());

        $sadrs = $this->paginate($this->Sadrs->findByUserId($this->Auth->user('id')), ['scope' => 'sadr', 'order' => ['Sadrs.id' => 'desc'],
                                    'fields' => ['Sadrs.id', 'Sadrs.created', 'Sadrs.reference_number', 'Sadrs.submitted', 'Sadrs.report_type']]);
        $adrs = $this->paginate($this->Adrs->findByUserId($this->Auth->user('id')), ['scope' => 'adr', 'order' => ['Adrs.id' => 'desc'],
                                    'fields' => ['Adrs.id', 'Adrs.created', 'Adrs.reference_number', 'Adrs.submitted', 'Adrs.report_type']]);
        $aefis = $this->paginate($this->Aefis->findByUserId($this->Auth->user('id')), ['scope' => 'aefi', 'order' => ['Aefis.id' => 'desc'],
                                    'fields' => ['Aefis.id', 'Aefis.created', 'Aefis.reference_number', 'Aefis.submitted', 'Aefis.report_type']]);
        $saefis = $this->paginate($this->Saefis->findByUserId($this->Auth->user('id')), ['scope' => 'saefi', 'order' => ['Saefis.id' => 'desc'],
                                    'fields' => ['Saefis.id', 'Saefis.created', 'Saefis.reference_number', 'Saefis.submitted', 'Saefis.report_type']]);
        $ce2bs = $this->paginate($this->Ce2bs->findByUserId($this->Auth->user('id')), ['scope' => 'ce2b', 'order' => ['Ce2bs.id' => 'desc']]);
        $notifications = $this->paginate($this->Notifications->findByUserId($this->Auth->user('id')), ['scope' => 'notification', 'order' => ['Notification.id' => 'desc'],]);

        $this->set(compact('sadrs', 'adrs', 'aefis', 'saeifs'));
        $this->set(compact('saefis', 'ce2bs', 'notifications'));
        // $this->set('_serialize', ['sadrs', 'adrs', 'aefis']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Designations', 'Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        return $this->redirect(['action' => 'profile']);
        // $user = $this->Users->get($id, [
        //     'contain' => []
        // ]);

        // //Send registration confirm email
        // $this->loadModel('Queue.QueuedJobs'); 
        // $data = [
        //     'email_address' => $user->email, 'user_id' => $user->id, 'type' => 'registration_email', 'model' => 'Users', 
        //     'foreign_key' => $user->id, 'vars' =>  $user->toArray()                
        // ]; 
        // $html = new HtmlHelper(new \Cake\View\View());
        // $data['vars']['pv_site'] = $html->link('MCAZ PV website', ['controller' => 'Pages', 'action' => 'home', '_full' => true]);
        // $data['vars']['activation_link'] = $html->link('ACTIVATE', ['controller' => 'Users', 'action' => 'activate', $user->activation_key, 
        //                           '_full' => true]);
        // $this->QueuedJobs->createJob('GenericEmail', $data);

        //
                // $this->loadModel('Queue.QueuedJobs');
                // $user->activation_key = (new DefaultPasswordHasher)->hash($user->email);
                // $data = [
                //     'vars' => [
                //         'user' => $user->toArray()
                //     ]
                // ];
                // $this->QueuedJobs->createJob('RegisterEmail', $data);
                //end
        //
        // debug((new DefaultPasswordHasher)->hash($user->email));

        //send email test --- remove
        /** @var \Queue\Model\Table\QueuedJobsTable $QueuedJobs */
        // Log::write('debug', 'Start queue manenos');
        // $this->loadModel('Queue.QueuedJobs');
        // $data = [
        //     'settings' => [
        //         'subject' => __('Test fired from Queue {0}', $user->name)
        //     ],
        //     'vars' => [
        //         'user' => $user->toArray()
        //     ]
        // ];
        // $this->QueuedJobs->createJob('TestEmail', $data);
        // Log::write('debug', 'End queue manenos');
        //end

        // $this->set('user', $user);
        // $this->set('_serialize', ['user']);
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Designations', 'Groups']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            /*$old_password = (new DefaultPasswordHasher)->hash($this->request->getData('old_password'));
            debug($old_password);
            debug($user->password);
            debug($this->request->getData('old_password'));
            debug($this->request->getData('password'));*/
            if ((new DefaultPasswordHasher)->check($this->request->getData('old_password'), $user->password)) {
                /*if((new DefaultPasswordHasher)->hash($this->request->getData('old_password')) === $user->password) {
                    $this->Flash->error(__('The new password is same as the old. Kindly create new password.'));
                    return $this->redirect(['action' => 'profile']);
                }*/
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->last_password = Time::now();
                // debug($user);                
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your password has been updated.'));
                    return $this->redirect(['action' => 'profile']);
                }
                $this->Flash->error(__('The details could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('Your old password does not match.'));
            }            
            
        }

        $this->set('user', $user);
        $this->set('_serialize', ['user']);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'designations', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
            'fields' => ['id' , 'designation_id', 'province_id', 'username' , 'name' , 'email' , 'name_of_institution' , 'file', 'dir',
                                'institution_address' , 'institution_code' , 'institution_contact' , 'phone_no', 'group_id' ]
        ]);
        if ($this->Auth->user('group_id') != 1 && $this->Auth->user('id') != $id) {
            $this->Flash->error(__('You can only edit your profile.'));
            return $this->redirect(['action' => 'profile']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            // debug($this->request->getData())
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                'fieldList' => ['id' , 'designation_id', 'province_id', 'username' , 'name' , 'email' , 'name_of_institution' , 'file',
                                'institution_address' , 'institution_code' , 'institution_contact' , 'phone_no' ]
            ]);
            // debug($this->request->getData());
            // debug($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The details have been updated.'));
                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The details could not be saved. Please, try again.'));
        }
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Users->Provinces->find('list', ['limit' => 200, 'order' => ['province_name' => 'ASC']]);
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'designations', 'provinces', 'groups'));
        $this->set('_serialize', ['user']);
    }
    
    public function imports() {
        if ($this->request->is('post')) {

            $this->loadModel('Sadrs');
            $this->loadModel('Adrs');
            $this->loadModel('Aefis');
            $this->loadModel('Saefis');

            $this->loadModel('Imports');

            if ($this->request->getData('submitted') === 'sadrs') {
                $entity = $this->Sadrs;
                $pre = 'ADR';
            } elseif ($this->request->getData('submitted') == 'adrs') {
                $entity = $this->Adrs;
                $pre = 'SAE';
            } elseif ($this->request->getData('submitted') == 'aefis') {
                $entity = $this->Aefis;
                $pre = 'AEFIS';
            } elseif ($this->request->getData('submitted') == 'saefis') {
                $entity = $this->Saefis;
                $pre = 'SAEFIS';
            } else {
                $this->Flash->error(__('Unable to process request. Please, try again.')); 
                return $this->redirect($this->referer());
            }

            //Check if file has been loaded before 
            $import = $this->Imports->findByFilename($this->request->data['sadr_files']['name']);
            if (!$import->isEmpty()) {
                $import_dates = implode(', ', Hash::extract($import->toArray(), '{n}.created'));
                $this->Flash->warning('The file <b>'.$this->request->data['sadr_files']['name'].'</b> has been imported before on '.$import_dates.'. If the file is different, rename the file (e.g. filename_v2) and import it again.', ['escape' => false]);
                return $this->redirect(['action' => 'imports']);
            } else {
                $datum = $this->Imports->newEntity(['filename' => $this->request->data['sadr_files']['name']]);
                $this->Imports->save($datum);
            }
            //
            //debug($this->request->data);
            $file = new File($this->request->data['sadr_files']['tmp_name']);
            $xmlString = $file->read();
            $xmlArray = Xml::toArray(Xml::build($xmlString, array('return' => 'domdocument')));
            // debug($xmlArray);
            // return;
            if(array_key_exists(0, $xmlArray['response'][$this->request->getData('submitted')])) {
                // debug("array key exists");
                $retVal = $xmlArray['response'][$this->request->getData('submitted')];
            } else {
                // debug("array key does not exists");
                $retVal[] = $xmlArray['response'][$this->request->getData('submitted')];
            } 
                          
            // debug(count($xmlArray['response'][$this->request->getData('submitted')]));
            // debug($retVal);
            // return;
            foreach ($retVal as $sadrArr) {       
                $sadr = $entity->newEntity();
                if ($this->request->is('post')) {
                    $this->_attachments();
                    // debug($sadrArr);
                    // return;
                    $sadr = $entity->patchEntity($sadr, $sadrArr, ['validate' => false]);
                    // debug($sadr->errors());
                    // return;
                    $sadr->user_id = $this->Auth->user('id');
                    $sadr->submitted_date = date("Y-m-d H:i:s");
                    $sadr->submitted = 2;
                    if ($entity->save($sadr)) {
                        //update field
                        $query = $entity->query();
                        $query->update()
                            ->set(['reference_number' => $pre.$sadr->id.'/'.$sadr->created->i18nFormat('yyyy')])
                            ->where(['id' => $sadr->id])
                            ->execute();
                        
                        $this->Flash->success(__('The '.$pre.'(s) have been imported.'));
                    } else {                
                        $this->Flash->error(__('The '.$pre.'(s) could not be imported. Please, try again.'));
                    }
                }
            }
            //return $this->redirect(['controller' => 'UsersBase', 'action' => 'imports', 'prefix' => 'base']);
        } 
        // $this->render('/Base/Users/imports');
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
