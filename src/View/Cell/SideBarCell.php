<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SideBar cell
 */
class SideBarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $prefix = null;
        if($this->request->session()->read('Auth.User.group_id') == 1) {$prefix = 'admin';} 
        if ($this->request->session()->read('Auth.User.group_id') == 2) { $prefix = 'manager'; }
        if ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'evaluator'; }
        $this->set(['prefix'=> $prefix]);
    }

}
