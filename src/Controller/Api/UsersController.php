<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token', 'register']);
    }

    /**
     * Create new user and return id plus JWT token
     */
    public function add()
    {
        $this->Crud->on('afterSave', function(Event $event) {
            if ($event->subject->created) {
                $this->set('data', [
                    'id' => $event->subject->entity->id,
                    'token' => JWT::encode(
                        [
                            'sub' => $event->subject->entity->id,
                            // 'exp' =>  time() + 604800 // Token never expires
                        ],
                        Security::salt()
                    )
                ]);
                $this->Crud->action()->config('serialize.data', 'data');
            }
        });
        return $this->Crud->execute();
    }

    public function register() {
        //newa
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
                return;
            }

            $user->group_id = 3;
            // $user->activation_key = (new DefaultPasswordHasher)->hash($user->email);            
            if ($this->Users->save($user)) {
                $user->activation_key = $this->Util->generateXOR($user->id);
                $query = $this->Users->query();
                $query->update()
                    ->set(['activation_key' => $this->Util->generateXOR($user->id)])
                    ->where(['id' => $user->id])
                    ->execute();

                //Send registration confirm email
                $this->loadModel('Queue.QueuedJobs');                
                $data = [
                    'vars' => [
                        'user' => $user->toArray()
                    ]
                ];
                $this->QueuedJobs->createJob('RegisterEmail', $data);
                //end                
                
                $this->set([
                    'id' => $user->id,
                    'message' => 'Registration successfull. Click on link sent on email to complete registration', 
                    'user' => $user->toArray(),
                    'token' => JWT::encode(
                        [
                            'sub' => $user->id,
                            // 'exp' =>  time() + 604800 // Token never expires
                        ],
                        Security::salt()
                    ),
                    '_serialize' => ['id', 'message', 'user', 'token']]);

                
                  return;

                //return $this->redirect('/');
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(401);
                $this->set([
                    'message' => 'Unable to save user!!', 
                    '_serialize' => ['message']]);
                return; 
            }
        }
    }

    /**
     * Return JWT token if posted user credentials pass FormAuthenticate
     */
    public function token()
    {
        if (isset($this->request->data['email'])) {
                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'email']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
            }
        $user = $this->Auth->identify();
        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }

        $this->set([
            'success' => true,
            'user' => $user,
            'data' => [
                'token' => JWT::encode(
                    [
                        'sub' => $user['id'],
                        'exp' =>  time() + 604800
                    ],
                    Security::salt()
                )
            ],
            '_serialize' => ['success', 'user', 'data']
        ]);
    }
}
