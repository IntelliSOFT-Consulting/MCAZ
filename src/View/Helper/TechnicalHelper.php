<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Technical helper
 */
class TechnicalHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function escapeSpecialChars($string)
    {
        
        $map = [
            '&' => '&#38;',
            '<' => '&#60;',
            '>' => '&#62;',
            '"' => '&#34;',
            "'" => '&#39;',
        ];
        
        return strtr($string, $map);
    }

}
