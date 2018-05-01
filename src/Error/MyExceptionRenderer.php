<?php
namespace App\Error;

use Cake\Error\ExceptionRenderer;

class MyExceptionRenderer extends ExceptionRenderer
{
    public function missingController($error)
    {
        // $this->controller->Flash->error(__('The path you entered does not exists on this site. Please retry.'));
        return $this->controller->redirect("/");
    }
}