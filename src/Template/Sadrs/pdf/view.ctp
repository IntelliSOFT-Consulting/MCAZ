<?php //echo $this->element('sadrs/reporter_view');?>
<?php
  //echo $this->element('sadrs/sadr_form', ['globalEd' => false]);
  $this->extend('/Element/sadrs/sadr_view');
  $this->assign('globalEd', true);
  $this->assign('baseClass', 'container');
?>