<?php

namespace App\View\Cell;
 
use App\View\Helper\TechnicalHelper;
use Cake\View\Cell;

/**
 * Imeja cell
 */
class ImejaCell extends Cell
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
        $title = "Technical Session";
        $description="Here is the description"; 
        $this->set(compact(['title','description']));
        
    }
}
