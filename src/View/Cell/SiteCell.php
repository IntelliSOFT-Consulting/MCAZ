<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Datasource\Paginator;

/**
 * Site cell
 */
class SiteCell extends Cell
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
    }
    public function home()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(1, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function news()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(2, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function faqs()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(3, [ 'contain' => []]);
        $this->set(compact('site'));
    }
    public function contactus()
    {
        $this->loadModel('Sites');
        $site = $this->Sites->get(4, [ 'contain' => []]);
        $this->set(compact('site'));
    }

    public function calendar()
    {
        $this->loadModel('CommitteeDates');
        $this->loadModel('Sites');
        $paginator = new Paginator();
        $committee_dates = $paginator->paginate(
            $this->CommitteeDates->find('all', ['order' => ['CommitteeDates.meeting_date' => 'desc']]),            
            $this->request->getQueryParams(),
            [
                // Use scoped query string parameters.
                'scope' => 'committeedate',
            ]
        );

        $paging = $paginator->getPagingParams() + (array)$this->request->getParam('paging');
        $this->request = $this->request->withParam('paging', $paging);

        $site = $this->Sites->get(6, [ 'contain' => []]);


        $prefix = null;
        if($this->request->session()->read('Auth.User.group_id') == 1) {$prefix = 'admin';} 
        elseif ($this->request->session()->read('Auth.User.group_id') == 2) { $prefix = 'manager'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'evaluator'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 5) { $prefix = 'institution'; }
        elseif ($this->request->session()->read('Auth.User.group_id') == 6) { $prefix = 'technical'; }

        $this->set(compact('site', 'prefix', 'committee_dates'));
    }
}
