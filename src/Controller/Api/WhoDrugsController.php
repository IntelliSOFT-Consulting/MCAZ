<?php
namespace App\Controller\Api;
 
use Cake\Event\Event;

/**
 * WhoDrugs Controller
 *
 * @property \App\Model\Table\WhoDrugsTable $WhoDrugs
 *
 * @method \App\Model\Entity\WhoDrug[] paginate($object = null, array $settings = [])
 */
class WhoDrugsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'drug_name'
        ]
    ];

    public function initialize() {
       parent::initialize();
       $this->Auth->allow(['drugName']);       
    }
    
    public function drugName($query = null) {
        $drugs = $this->WhoDrugs->find('all', ['fields' => ['drug_name']])->distinct()
                ->where(['drug_name LIKE' => '%'.$this->request->getQuery('term').'%'])
                //->distinct(['drug_name'])
                ->limit(10); 
        
        $codes = array();
        foreach ($drugs as $key => $value) {
            $codes[] = array('value' => $value['drug_name'], 'label' => $value['drug_name']);
        }
        $this->set('codes', $codes);
        $this->set('_serialize', 'codes');
    }

}
