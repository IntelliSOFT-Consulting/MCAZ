<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/list_of_drugs', ['block' => true]);
?>

    <div class="row">
        <div class="col-xs-12">
            <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-primary btn-sm" id="<?= ($editable) ? 'addListOfDrug' : 'disabledAdd'  ?>">
                          Add <i class="fa fa-plus"></i>
            </button>
            <table id="<?= ($editable) ? 'listofdrugsform' : 'disabledlist'  ?>"  class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th colspan="2" > Generic Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Brand Name </th>
                    <th> Batch Number</th>
                    <th colspan="2" > Dose <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th colspan="2" > Route and Frequency <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Indication </th>
                    <th> Date Started <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                    <th> Date Stopped </th>
                    <th colspan="2"> Tick Suspected Drug(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span></th>
                  </tr>
                </thead>
                <tbody>
                               
              <?php 
                //Dynamic fields                
                if (isset($followup_form)) {
                    $list_of_drugs = (!empty($followup['sadr_list_of_drugs'])) ? $followup['sadr_list_of_drugs'] : '';
                } else {
                    $list_of_drugs = (!empty($sadr['sadr_list_of_drugs'])) ? $sadr['sadr_list_of_drugs'] : '';
                }
                if (!empty($list_of_drugs)) {
                  for ($i = 0; $i <= count($list_of_drugs)-1; $i++) { 
                    // pr($sadr);
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('sadr_list_of_drugs.'.$i.'.id', ['templates' => ($editable) ?  'app_form' : ['input' => '']])  ;
                             echo $this->Form->control('sadr_list_of_drugs.'.$i.'.drug_name', ['label' => false,
                                  'templates' => ($editable) ? 'table_form' : 'view_form_table' ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.brand_name', ['label' => false, 'templates' => ($editable) ? 'table_form': 'view_form_table' ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.batch_number', ['label' => false, 'templates' => ($editable) ? 'table_form': 'view_form_table' ]);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose', ['label' => false, 
                           'type' => 'text', 'templates' => ($editable) ? 'table_form': 'view_form_table' ]); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose_id', ['label' => false, 'options' => $doses, 'templates' => ($editable) ? 'table_form': 'view_form_table' , 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.route_id', ['label' => false, 'options' => $routes, 'templates' => ($editable) ? 'table_form': 'view_form_table' , 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => ($editable) ? 'table_form': 'view_form_table' , 'empty' => true]);
                        ?>
                    </td>
                    <td><?= $this->Form->control('sadr_list_of_drugs.'.$i.'.indication', ['label' => false, 'templates' => ($editable) ? 'table_form': 'view_form_table' ]); ?></td>
                    <td>
                      <?php
                          echo $this->Form->control('sadr_list_of_drugs.'.$i.'.start_date', [
                            'label' => false, 'type' => 'text',
                            'templates' => ($editable) ? 'table_form': 'view_form_table' 
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.stop_date', ['label' => false, 'type' => 'text',
                            'templates' => ($editable) ? 'table_form': 'view_form_table' 
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.suspected_drug', ['label' => false, 'type' => 'checkbox', 'templates' => ($editable) ? 'table_form' : 'view_form_checkbox'])
                        ?>
                    </td>
                    <td>
                        <button <?= ($editable) ? '' : 'disabled=""'  ?> type="button" class="btn btn-default btn-sm remove-row"  value="<?php if (isset($list_of_drugs[$i]['id'])) { echo $list_of_drugs[$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->

