<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adr $adr
 */
?>
<div class="row">
  <div class="col-md-12"><h3 class="text-center">SERIOUS ADVERSE EVENT REPORTING FORM </h3>  
    <div class="row">
      <div class="col-md-12"><h5 class="text-center">MEDICAL RESEARCH COUNCIL OF ZIMBABWE and MEDICINES CONTROL AUTHORITY OF ZIMBABWE </h5></div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <?= $this->Form->create($adr) ?>
        
        <div class="row">
          <div class="col-md-12"><h5 class="text-center">Enter your email address to start:</h5></div>
        </div>

       
        <div class="row">
        <div class="col-md-6">
          <?php
            //echo $this->Form->control('reporter_name', ['label' => 'Reporter name']);
            echo $this->Form->control('reporter_email', ['label' => 'Reporter email','value'=>$this->request->session()->read('Auth.User.email')]);
          ?>
        </div><!--/span-->
        <div class="col-md-6">
          <?php
            //echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);

          ?>
        </div><!--/span-->
      </div><!--/row-->
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
  </div>
</div>