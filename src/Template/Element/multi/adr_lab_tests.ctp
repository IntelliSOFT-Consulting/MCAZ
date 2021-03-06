<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\adr $adr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/adr_lab_tests', ['block' => true]);
?>
    <div class="row">
      <div class="col-xs-12">
        <h4>Add Lab test: <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-primary btn-sm" id="<?= ($editable) ? 'addLabTest' : 'disabledAdd'  ?>">
                          Add <i class="fa fa-plus"></i>
                        </button></h4>
      </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="adrLabTestsTable"  class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th> Lab test </th>
                    <th> Abnormal Result </th>
                    <th> Site Normal Range </th>
                    <th> Collection date</th>
                    <th> Lab value previous or subsequent to this event </th>
                    <th> Collection date </th>
                    <th> Edit </th>
                  </tr>
                </thead>
                <tbody>                 
              
              <?php 
                //Dynamic fields
                if (!empty($adr['adr_lab_tests'])) {
                  for ($i = 0; $i <= count($adr['adr_lab_tests'])-1; $i++) { 
                    // pr($adr);
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('adr_lab_tests.'.$i.'.id', ['templates' => 'app_form'])  ;
                             echo $this->Form->control('adr_lab_tests.'.$i.'.lab_test', ['label' => false,
                                  'templates' => ($editable) ? 'table_form': 'view_form_table' ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.abnormal_result', ['label' => false, 'templates' => ($editable) ? 'table_form': 'view_form_table' ]);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.site_normal_range', ['label' => false, 'templates' => ($editable) ? 'table_form': 'view_form_table' ]);
                        ?>
                    </td>                 
                    <td><?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.collection_date', ['label' => false, 'type' => 'text','templates' => ($editable) ? 'dates_form' : 'view_form_table']);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.lab_value', ['label' => false, 'templates' => ($editable) ? 'table_form': 'view_form_table' ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('adr_lab_tests.'.$i.'.lab_value_date', [
                                'type' => 'text',
                                'label' => false, 
                                'templates' => ($editable) ? 'dates_form' : 'view_form_table'
                                ]);
                        ?>
                    </td>
                    <td>
                        <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-danger btn-sm remove-lab-test"  value="<?php if (isset($adr['adr_lab_tests'][$i]['id'])) { echo $adr['adr_lab_tests'][$i]['id']; } ?>" >
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
