<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Core\Configure;

/**
 * Muhuri cell
 */
class E2bCell extends Cell
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
    public function display($node)
    {        
        Configure::load('e2b_map', 'default');
        $faute = Configure::read('faute');
        // $nodejs = substr($node, strrpos($node, '.') + 1);
        // debug($nodejs);
        $e = explode('.', $node);
        $s = '';
        foreach ($e as $a) {
            $s .= (isset($faute[$a]) ? $faute[$a] : $a);
        }
        $this->set('nodejs', $s);
    }
}
