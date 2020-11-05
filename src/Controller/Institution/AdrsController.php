<?php
namespace App\Controller\Institution;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;
use App\Controller\Base\AdrsBaseController;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AdrsController extends AdrsBaseController
{
   
    public function view($id = null) {
        parent::view($id);
        $ladr = $this->Adrs->get($id);
        if ($this->Auth->user('id') != $ladr->assigned_to) {
            $this->Flash->error('You have not been assigned the report for review!');
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
        }
    }
}
