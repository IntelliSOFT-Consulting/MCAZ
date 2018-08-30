<?php
namespace App\Controller\Evaluator;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use App\Controller\Base\AefisBaseController;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[] paginate($object = null, array $settings = [])
 */
class AefisController extends AefisBaseController
{
    
    public function view($id = null) {
        parent::view($id);
        $laefi = $this->Aefis->get($id);
        // if (!empty($laefi->assigned_to) && $this->Auth->user('id') != $laefi->assigned_to) {
        if ($this->Auth->user('id') != $laefi->assigned_to) {
            $this->Flash->error('You have not been assigned the report for review!');
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
        }
    }

}
