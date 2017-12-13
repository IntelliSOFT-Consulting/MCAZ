<?php
// in config/app_form.php
return [
   // 'radio' => '<input type="radio" class="radio-inline" name="fakename" value="{{value}}"{{attrs}}>', 
	'radio' => '<input disabled="" type="radio" class="radio-inline" value="{{value}}"{{attrs}}>',
    'input' => '<input disabled="" class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    'nestingLabel' => '{{hidden}}<label class="radio-inline" {{attrs}}>{{input}}{{text}}</label>',    
    'formGroup' => '<div class=""> {{label}}{{input}} </div>',
];
