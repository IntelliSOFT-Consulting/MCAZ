<?php
namespace App\Controller\Evaluator;

use App\Controller\Base\SadrsBaseController;

class SadrsController extends SadrsBaseController
{  
    
    public function view($id = null) {
        parent::view($id);
        $lsadr = $this->Sadrs->get($id);
        if ($this->Auth->user('id') != $lsadr->assigned_to) {
            $this->Flash->error('You have not been assigned the report for review!');
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'evaluator']);
        }
    }
}
