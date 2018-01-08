<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);   
       $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);    
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //Just render page for now...
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Registration successfull. Click on link sent on email to complete registration', 
                        '_serialize' => ['message']]);
                    return;
                }
    }

    /**
     * View method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function sadrPerProvince()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([ 'province_id',
                                                          'count' => $this->Sadrs->find('all')->func()->count('*')
                                                        ])
                                                 ->group('province_id');
        $this->set('sadr_stats', $sadr_stats);
        $this->set('_serialize', ['sadr_stats']);
    }

}
