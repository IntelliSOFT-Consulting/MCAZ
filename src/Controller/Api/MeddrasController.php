<?php
namespace App\Controller\Api;
 
use Cake\Event\Event;

/**
 * Meddras Controller
 *
 * @property \App\Model\Table\MeddrasTable $Meddras
 *
 * @method \App\Model\Entity\Meddra[] paginate($object = null, array $settings = [])
 */
class MeddrasController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'terminology'
        ]
    ];

    public function initialize() {
       parent::initialize();
       $this->Auth->allow(['terminology']);       
    }
    
    public function terminology($query = null) {
        $llts = $this->Meddras->find('all', ['fields' => ['terminology']])->distinct()
                ->where(['terminology LIKE' => '%'.$this->request->getQuery('term').'%'])
                ->limit(10); 
        
        $codes = array();
        foreach ($llts as $key => $value) {
            $codes[] = array('value' => $value['terminology'], 'label' => $value['terminology']);
        }
        $this->set('codes', $codes);
        $this->set('_serialize', 'codes');
    }

}
