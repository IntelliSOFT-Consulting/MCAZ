<?php
// in config/app_form.php
return [
    'formStart' => '<form  class="form-horizontal" {{attrs}}>',
    'formGroup' => ' {{label}}{{input}} ',
    'label' => '<div class="control-label"><label {{attrs}}>{{text}}</label></div>',
    // Generic input element.
    //'input' => '{{value}}',
    // Select element,
    'select' => '<select class="view_select" {{attrs}} disabled="">{{content}}</select>',
    // Used for button elements in button().
    'button' => '<div class="form-group">
                    <button  class="btn btn-default"{{attrs}}>{{text}}</button>
                </div>',
    // Radio input element,
    'radio' => '<input type="radio" class="radio-inline" name="fakename" value="{{value}}"{{attrs}}>',
    //'radioWrapper' => '<div class="col-sm-8"><div class="radio">{{label}}</div></div>',
    'textarea' => '<textarea disabled="" rows="1" class="form-control" name="fakename"{{attrs}}>{{value}}</textarea>',
    'checkboxWrapper' => '{{label}}',
    'checkbox' => '<input type="checkbox" disabled="" value="{{value}}"{{attrs}}>',
    'dateWidget' => '{{day}}{{month}}{{year}}',
    //'select' => '<select name="fakename"{{attrs}}>{{content}}</select>',    
    'inputContainer' => '<div class="input {{required}}">{{content}}</div>',
    'textarea' => '{{value}}',
];
