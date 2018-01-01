<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/attachments', ['block' => true]);

    if(isset($followup_form)) {
      $att = (isset($followup['attachments'])) ? $followup['attachments'] : '';
    } else {
      if (!empty($sadr['attachments'])) {
        $att = $sadr['attachments'];
      } elseif (!empty($aefi['attachments'])) {
          $att = $aefi['attachments'];
      } elseif (!empty($adr['attachments'])) {
          $att = $adr['attachments'];
      } elseif (!empty($saefi['attachments'])) {
          $att = $saefi['attachments'];
      }
    }
    
?>

    <div class="row">
        <div class="col-md-12">
            <h4>Do you have files that you would like to attach? click on the button to add them: <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-primary btn-sm" id="<?= ($editable) ? 'addAttachment' : 'disabledBtn'  ?>">
                          Add <i class="fa fa-plus"></i>
                        </button></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="<?= ($editable) ? 'attachmentsTable' : 'disabledlist'  ?>"  class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> FILE </th>
                    <th> DESCRIPTION OF CONTENTS</th>
                    <th> Edit </th>
                  </tr>
                </thead>
                <tbody>                  
              <?php 
                //Dynamic fields
                if (!empty($att)) {
                  for ($i = 0; $i <= count($att)-1; $i++) { 
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><p class="text-info text-left"><?php
                             echo $this->Form->input('attachments.'.$i.'.id', ['templates' => 'table_form']);
                             echo $this->Html->link($att[$i]->file, substr($att[$i]->dir, 8) . '/' . $att[$i]->file, ['fullBase' => true]);
                        ?></p>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('attachments.'.$i.'.description', ['label' => false, 'templates' => ($editable) ? 'table_form' : 'view_form_table' ]);
                        ?>
                    </td>                    
                    <td>
                        <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-default btn-sm remove-attachment"  value="<?php if (isset($att[$i]['id'])) { echo $att[$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
