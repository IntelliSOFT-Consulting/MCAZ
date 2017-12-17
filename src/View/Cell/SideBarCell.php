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
        

        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');

        $sadr_stats = $this->Sadrs->find('all')->select([ 'status',
                                                          'count' => $this->Sadrs->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['submitted' => 2])
                                                 ->group('status');
        $this->set(['prefix'=> $prefix, 'sadr_stats' => $sadr_stats]);
    }

}
