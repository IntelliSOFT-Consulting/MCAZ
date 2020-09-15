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
    public function display($key, $value)
    {        
        Configure::load('e2b_map', 'default');
        $faute = Configure::read('faute');
        // $nodejs = substr($node, strrpos($node, '.') + 1);
        // debug($nodejs);
        $e = explode('.', $key);
        $s = '';
        $h = '';
        foreach ($e as $a) {
            $s .= (isset($faute[$a]) ? $faute[$a]['label'] : $a);
            // $h .= (isset($faute[$a]) ? $faute[$a]['help'] : '');
            if (isset($faute[$a])) {
                if (is_array($faute[$a]['help'])) {
                    $h .= (isset($faute[$a]['help'][$value]) ? $faute[$a]['help'][$value] : '');
                } else {
                    $h .= $faute[$a]['help'];
                }
            }
        }
        $this->set('nodejs', $s);
        $this->set('value', $value);
        $this->set('help', $h);
    }
}
