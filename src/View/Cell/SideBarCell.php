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
        if ($this->request->session()->read('Auth.User.group_id') == 5) { $prefix = 'institution'; }
        if ($this->request->session()->read('Auth.User.group_id') == 6) { $prefix = 'technical'; }
        

        $this->loadModel('Sadrs');
        $this->loadModel('Adrs');
        $this->loadModel('Aefis');
        $this->loadModel('Saefis');
        $this->loadModel('Ce2bs');
        $this->loadModel('Notifications');

        $sadr_stats = $this->Sadrs->find('all')->select([ 'status',
                                                          'count' => $this->Sadrs->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['IFNULL(copied, "N") !=' => 'old copy'])
                                                 ->group('status');
        $aefi_stats = $this->Aefis->find('all')->select([ 'status',
                                                          'count' => $this->Aefis->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['IFNULL(copied, "N") !=' => 'old copy'])
                                                 ->group('status');
        $saefi_stats = $this->Saefis->find('all')->select([ 'status',
                                                          'count' => $this->Saefis->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['IFNULL(copied, "N") !=' => 'old copy'])
                                                 ->group('status');
        $adr_stats = $this->Adrs->find('all')->select([ 'status',
                                                          'count' => $this->Adrs->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['IFNULL(copied, "N") !=' => 'old copy'])
                                                 ->group('status');
        $ce2b_stats = $this->Ce2bs->find('all')->select([ 'status',
                                                          'count' => $this->Ce2bs->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['IFNULL(copied, "N") !=' => 'old copy'])
                                                 ->group('status');
        $ncount = $this->Notifications->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id')])->count();
        $this->set(['prefix'=> $prefix, 'sadr_stats' => $sadr_stats, 'aefi_stats' => $aefi_stats, 'saefi_stats' => $saefi_stats, 'adr_stats' => $adr_stats, 'ce2b_stats' => $ce2b_stats, 'ncount' => $ncount]);
    }

}
