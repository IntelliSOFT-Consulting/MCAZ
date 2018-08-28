<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $saefi
 */
    // $this->Html->script('multi/list_of_aefis', array('inline' => false));
  $this->Html->script('multi/saefi_list_of_vaccines', ['block' => true]);
?>
    <div class="row">
      <div class="col-xs-12">

        <h4 class="text-center">Number vaccinated for each antigen at session site. Attach record if available. 
        <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-primary btn-sm" id="<?= ($editable) ? 'addSaefiVaccine' : 'disabledadd' ?>">
                          Add <i class="fa fa-plus"></i>
        </button></h4>
      </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table id="<?= ($editable) ? 'saefiListOfVaccinesTable' : 'disabledlist'  ?>"  class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th> #</th>
                    <th> Vaccine Name</th>
                    <th> Number of doses</th>
                    <th> Edit </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    //Dynamic fields
                    if (!empty($saefi['saefi_list_of_vaccines'])) {
                      for ($i = 0; $i <= count($saefi['saefi_list_of_vaccines'])-1; $i++) { 
                        // pr($saefi);
                  ?>
                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('saefi_list_of_vaccines.'.$i.'.id', ['templates' => 'app_form'])  ;
                             echo $this->Form->control('saefi_list_of_vaccines.'.$i.'.vaccine_name', ['label' => false,
                                  'templates' => ($editable) ? 'table_form' : 'view_form_table']);
                        ?>
                    </td>
                    <td><?php
                             echo $this->Form->control('saefi_list_of_vaccines.'.$i.'.vaccination_doses', ['label' => false,
                                  'templates' => ($editable) ? 'table_form' : 'view_form_table']);
                        ?>
                    </td>                    
                    <td>
                        <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-default btn-sm remove-vaccination"  value="<?php if (isset($saefi['saefi_list_of_vaccines'][$i]['id'])) { echo $saefi['saefi_list_of_vaccines'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                
                <?php }} ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
   
