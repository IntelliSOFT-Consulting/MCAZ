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
        /*$this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([ 'Provinces.province_name',
                                                          'count' => $this->Sadrs->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['province_id IS NOT' => null])
                                                 ->group('Provinces.province_name')
                                                 ->contain(['Provinces'])
                                                 ->hydrate(false);
        $this->set('sadr_stats', $sadr_stats);
        $this->set('_serialize', ['sadr_stats']);*/
        

    }

    /**
     * View method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function sadrsPerProvince()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([ 'Provinces.province_name',
                                                          'count' => $this->Sadrs->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['province_id IS NOT' => null])
                                                 ->group('Provinces.province_name')
                                                 ->contain(['Provinces'])
                                                 ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => (!empty($value['province']['province_name'])) ? $value['province']['province_name'] : 'Unknown' ,
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'ADRS by provinces',
                        'data' => $data, //Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'), //$data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
    public function aefisPerProvince()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([ 'Provinces.province_name',
                                                          'count' => $this->Aefis->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['province_id IS NOT' => null])
                                                 ->group('Provinces.province_name')
                                                 ->contain(['Provinces'])
                                                 ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => (!empty($value['province']['province_name'])) ? $value['province']['province_name'] : 'Unknown' ,
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'AEFIS by provinces',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
    public function sadrsPerYear()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')->select([ 'year' => 'date_format(created,"%Y")',
                                                          'count' => $this->Sadrs->find('all')->func()->count('*')
                                                        ])
                                                 // ->where(['province_id IS NOT' => null])
                                                 ->group('year')
                                                 ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'ADRS per year',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
    public function aefisPerYear()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')->select([ 'year' => 'date_format(created,"%Y")',
                                                          'count' => $this->Aefis->find('all')->func()->count('*')
                                                        ])
                                                 // ->where(['province_id IS NOT' => null])
                                                 ->group('year')
                                                 ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'AEFIS per year',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
    public function sadrsPerCausality()
    {
        $this->loadModel('Sadrs');
        $sadr_stats = $this->Sadrs->find('all')
                            ->leftJoinWith('Reviews')
                            //->contain(['Provinces', 'Reviews'])
                            // ->select(['reference_number', 'Reviews.id'])
                                 ->select([ 'reviewed' => 'case when ifnull(Reviews.id, 0) = 0 then "Not Reviewed" else "Reviewed" end',
                                         'count' => $this->Sadrs->find('all')->func()->count('*')
                                       ])
                                     //->where(['province_id IS NOT' => null])
                                 ->group('reviewed')
                                 ->hydrate(false);
        // debug($sadr_stats->toArray());
        // return;
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => (!empty($value['reviewed'])) ? $value['reviewed'] : 'Unknown' ,
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'ADRS by causality assessment',
                        'data' => $data, //Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'), //$data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
    public function aefisPerCausality()
    {
        $this->loadModel('Aefis');
        $sadr_stats = $this->Aefis->find('all')
                            ->leftJoinWith('Reviews')
                                 ->select([ 'reviewed' => 'case when ifnull(Reviews.id, 0) = 0 then "Not Reviewed" else "Reviewed" end',
                                         'count' => $this->Aefis->find('all')->func()->count('*')
                                       ])
                                 ->group('reviewed')
                                 ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => (!empty($value['reviewed'])) ? $value['reviewed'] : 'Unknown' ,
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'AEFIS by causality assessment',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
    
    public function saefisPerMonth()
    {
        $this->loadModel('Saefis');
        $sadr_stats = $this->Saefis->find('all')->select([ 'mnth' => 'date_format(created,"%b")',
                                                          'count' => $this->Saefis->find('all')->func()->count('*')
                                                        ])
                                                 // ->where(['province_id IS NOT' => null])
                                                 ->group('mnth')
                                                 ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['mnth'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'SAEFIS by month',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
    public function adrsPerMonth()
    {
        $this->loadModel('Adrs');
        $sadr_stats = $this->Adrs->find('all')->select([ 'mnth' => 'date_format(created,"%b")',
                                                          'count' => $this->Adrs->find('all')->func()->count('*')
                                                        ])
                                                 // ->where(['province_id IS NOT' => null])
                                                 ->group('mnth')
                                                 ->hydrate(false);
        foreach ($sadr_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['mnth'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'SAES by month',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

}
