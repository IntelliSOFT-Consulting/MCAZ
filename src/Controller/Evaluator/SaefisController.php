<?php
namespace App\Controller\Evaluator;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use App\Controller\Base\SaefisBaseController;

/**
 * Saefis Controller
 *
 * @property \App\Model\Table\SaefisTable $Saefis
 *
 * @method \App\Model\Entity\Saefi[] paginate($object = null, array $settings = [])
 */
class SaefisController extends SaefisBaseController
{
    
    public function view($id = null) {
        parent::view($id);
        $lsaefi = $this->Saefis->get($id);
        if (!empty($lsaefi->assigned_to) && $this->Auth->user('id') != $lsaefi->assigned_to) {
            $this->Flash->error('You have not been assigned the report for review!');
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
        }
    }
}
