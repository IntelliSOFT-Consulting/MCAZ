<?php
namespace App\Controller\Institution;

use App\Controller\AppController;
use Cake\Utility\Xml;
use Cake\Filesystem\File;
use Cake\Utility\Hash;
use App\Controller\Base\Ce2bsBaseController;

/**
 * Ce2bs Controller
 *
 *
 * @method \App\Model\Entity\Cae2b[] paginate($object = null, array $settings = [])
 */
class Ce2bsController extends Ce2bsBaseController
{

    public function view($id = null) {
        parent::view($id);
        $lce2b = $this->Ce2bs->get($id);
        if ($this->Auth->user('id') != $lce2b->assigned_to) {
            $this->Flash->error('You have not been assigned the report for review!');
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
        }
    }
}
