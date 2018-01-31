<?php
namespace App\Controller\Base;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersBaseController extends AppController
{
    public $paginate = [
            // 'limit' => 2,
            'Sadrs' => ['scope' => 'sadr'],
            'Adrs' => ['scope' => 'adr'],
            'Aefis' => ['scope' => 'aefi'],
            'Saefis' => ['scope' => 'saefi']
        ];

    public function initialize() {
       parent::initialize();
       $this->loadComponent('Paginator');
       $this->loadModel('Users');     
    }
    
    public function dashboard() {
        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->paginate = [
            'limit' => 5,
        ];

        // pr($user);

        $sadrs = $this->paginate($this->Sadrs->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'sadr', 'order' => ['Sadrs.status' => 'asc', 'Sadrs.id' => 'desc'],
                                    'fields' => ['Sadrs.id', 'Sadrs.created', 'Sadrs.reference_number', 'Sadrs.submitted']]);
        $adrs = $this->paginate($this->Adrs->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'adr', 'order' => ['Adrs.status' => 'asc', 'Adrs.id' => 'desc'],
                                    'fields' => ['Adrs.id', 'Adrs.created', 'Adrs.reference_number']]);
        $aefis = $this->paginate($this->Aefis->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'aefi', 'order' => ['Aefis.status' => 'asc', 'Aefis.id' => 'desc'],
                                    'fields' => ['Aefis.id', 'Aefis.created', 'Aefis.reference_number']]);
        $saefis = $this->paginate($this->Saefis->find('all')->where(['submitted' => 2, 'status IN' => ['Submitted', 'Manual'], 'IFNULL(copied, "N") !=' => 'old copy']), ['scope' => 'saefi', 'order' => ['Saefis.status' => 'asc', 'Saefis.id' => 'desc'],
                                    'fields' => ['Saefis.id', 'Saefis.created', 'Saefis.reference_number']]);

        $this->set(compact('sadrs', 'adrs', 'aefis', 'saeifs'));
        $this->set(compact('saefis'));
        $this->render('/Base/Users/dashboard');
    }

}
