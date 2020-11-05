<?php
namespace App\Controller\Institution;

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
    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       // $this->Auth->allow('logout', 'activate', 'view');       
       $this->loadComponent('Search.Prg', ['actions' => ['index']]);
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

        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $designations = $this->Users->Designations->find('list', ['limit' => 200]);
        $this->set(compact('groups', 'designations'));
        $query = $this->Users
            ->find('search', ['search' => $this->request->query])
            ->where([['OR' => ['Users.id' => $this->Auth->user('id'), 'Users.name_of_institution' => $this->Auth->user('name_of_institution')]]]);

        $this->set('users', $this->paginate($query));

        if ($this->request->params['_ext'] === 'csv') {
            $_serialize = 'query';
            $_header = ['id', 'name', 'username', 'email', 'Phone Number', 'name_of_institution', 
                        'institution_address', 'institution_code'];
            $_extract = ['id', 'name', 'username', 'email',  
                        'phone_no', 'name_of_institution', 'institution_address', 'institution_code',
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

    public function deactivate($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user) {
                $query = $this->Users->query();
                $query->update()
                    ->set(['is_confirmed' => 0])
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
                    ->set(['is_confirmed' => 1])
                    ->where(['id' => $user->id])
                    ->execute();
                $this->set([
                        'message' => 'Confirmation successful.', 
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
 
}
