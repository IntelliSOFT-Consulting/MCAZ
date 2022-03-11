<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;

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
            'Feedbacks' => ['scope' => 'feedback']
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       // $this->Auth->allow('logout', 'activate', 'view');       
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // $this->Auth->allow();
        $this->Auth->allow(['register', 'login', 'logout', 'activate']);
    }

    
    public function dashboard() {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->paginate = [
            'limit' => 5,
        ];

        $this->loadModel('Feedbacks');
        $feedbacks = $this->paginate($this->Feedbacks->find('all'), ['scope' => 'feedback', 'order' => ['Feedbacks.id' => 'desc']]);

        $this->set(compact('user', 'feedbacks'));
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

        $query = $this->Users
            ->find('search', ['search' => $this->request->query, 'withDeleted']);

        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        $this->set(compact('groups', 'designations'));
        $this->set('users', $this->paginate($query));

        $_groups = $groups->toArray();
        $_designations = $designations->toArray();
        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id', 'name', 'username', 'email', 'Group', 'Phone Number', 'name_of_institution', 
                        'institution_address', 'institution_code', 'Designation'];
            $_extract = ['id', 'name', 'username', 'email', 
                    function ($row) use ($_groups) { return $_groups[$row['group_id']] ?$_groups[$row['group_id']]: ''; }, //'Group', 
                        'phone_no', 'name_of_institution', 'institution_address', 'institution_code',
                    function ($row) use($_designations) { return $_designations[$row['designation_id']] ?$_designations[$row['designation_id']]: '' ; }, //designation_id 
            ];

            $this->set(compact('query', '_serialize', '_header', '_extract'));
        }
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
        $user = $this->Users->get($id, [
            'contain' => ['Designations', 'Groups']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Designations', 'Groups']
        ]);

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
        $fieldList = ['Users.id', 'Users.name', 'Users.email', 'Users.username', 'Users.group_id', 'Users.phone_no', 'Users.last_password',
                      'Users.name_of_institution', 'Users.institution_address', 'Users.institution_code', 'Users.designation_id', 
                      'Users.is_active', 'Users.deactivated', 'Users.is_admin'];

        $user = $this->Users->get($id, [
            'fields' => $fieldList,
            'contain' => []
        ]);
        $user->last_password = Time::now();
        if ($this->request->is(['patch', 'post', 'put'])) {   
            if (empty($this->request->data['password'])) {
                unset($this->request->data['password']);
                unset($this->request->data['confirm_password']);
            }         
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user\'s details have been updated.'));

                return $this->redirect(['action' => 'edit', $user->id]);
            }
            $this->Flash->error(__('The user\'s details could not be saved. Please, try again.'));
        }
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        //$counties = $this->Users->Counties->find('list', ['limit' => 200]);
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'designations', 'groups'));
        $this->set('_serialize', ['user']);
    }

    public function deactivate($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['deactivated' => 1])
                    ->where(['id' => $user->id])
                    ->execute();
                $this->set([
                        'message' => 'Deactivation successful.', 
                        '_serialize' => ['message']]);
            } else {             
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to get user', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
            }
        }
    }
    public function activate($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['deactivated' => 0])
                    ->where(['id' => $user->id])
                    ->execute();
                $this->set([
                        'message' => 'Reactivation successful.', 
                        '_serialize' => ['message']]);
            } else {             
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                    'errors' => 'Unable to get user', 
                    'message' => 'Validation errors', 
                    '_serialize' => ['errors', 'message']]);
            }
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $restore = false)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id, ['withDeleted']);
        if (!$restore) {
            $query = $this->Users->query();
            $query->update()
                    ->set(['deleted' => date('Y-m-d H:i:s')])
                    ->where(['id' => $user->id])
                    ->execute();
            $this->Flash->success(__('The user has been deleted.'));
        } elseif ($restore && $this->Users->restore($user)) {
            $this->Flash->success(__('The user has been restored.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
