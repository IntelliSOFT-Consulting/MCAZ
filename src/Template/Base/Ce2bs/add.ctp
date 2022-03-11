<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
  <div class="col-xs-12"><h3 class="text-center">E2B FILES </h3>  
    <div class="row">
      <div class="col-xs-12"><h5 class="text-center">MEDICINES CONTROL AUTHORITY OF ZIMBABWE </h5></div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xs-12">
    <?= $this->Form->create($ce2b, ['type' => 'file']) ?>
       
        <div class="row">
        <div class="col-xs-12">
          <?php
            echo $this->Form->control('company_name', [
              'label' => 'Company name <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
              //'value' => ($sadr->company_name) ?? $this->request->session()->read('Auth.User.name_of_institution')
              'value' =>  $this->request->session()->read('Auth.User.name_of_institution')
            ]);
            echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
            echo $this->Form->control('comment', ['label' => 'Comment(s)']);
            echo $this->Form->control('e2b_file', [
              'type' => 'file', 
              'label' => 'E2B File <small class="muted">(xml)</small> <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 
              'escape' => false
            ]);
            echo $this->Form->control('reporter_email', [
              'label' => 'Reporter email <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,
              //'value'=> ($sadr->reporter_email) ?? $this->request->session()->read('Auth.User.email')
              'value'=> $this->request->session()->read('Auth.User.email')
            ]);
          ?>
        </div><!--/span-->
      </div><!--/row-->
      <div class="row">
        <div class="col-xs-12"><?php echo $this->element('multi/attachments', ['editable' => true]);?></div>
      </div>
      <div class="well">
        <div class="row">
          <div class="col-xs-6 text-center">
            <button name="submitted" value="2" id="adrCancel" class="btn btn-success active" type="submit"
                    onclick="return confirm('Are you sure you wish to submit the report to MCAZ?');"
            >
              <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
            </button>
          </div>
          <div class="col-xs-6 text-center">
            <span class="text-center">
              <?= $this->Html->link('<i class="fa fa-close"></i> Cancel', ['users' => 'home'], ['confirm' => 'Are you sure you wish to cancel the report?', 'class' => 'btn btn-default active', 'escape' => false]) ?>
            </span>
          </div>              
        </div>
      </div>
    <?= $this->Form->end() ?>
  </div>
</div>