<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/list_of_drugs_followup', ['block' => true]);
?>

    <div class="row">
        <div class="col-xs-12">
            <table id="listofdrugsformfollowup"  class="table table-bordered table-condensed">
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
                    <th colspan="2"> Tick Suspected Drug(s) <span class="sterix fa fa-asterisk" aria-hidden="true"></span>
                        <button <?= ($globalEd) ? 'disabled=""' : '' ?> type="button" class="btn btn-primary btn-sm" id="addListOfDrugFollowup">
                          Add <i class="fa fa-plus"></i>
                        </button>
                    </th>
                  </tr>
                </thead>
                <tbody>
              <?php 
                //Dynamic fields
                if (!empty($followup['sadr_list_of_drugs'])) {
                  for ($i = 0; $i <= count($followup['sadr_list_of_drugs'])-1; $i++) { 
                    // pr($sadr);
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('sadr_list_of_drugs.'.$i.'.id', ['templates' => ($globalEd) ? ['input' => ''] : 'app_form'])  ;
                             echo $this->Form->control('sadr_list_of_drugs.'.$i.'.drug_name', ['label' => false,
                                  'templates' => ($globalEd) ? 'view_form_table' : 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.brand_name', ['label' => false, 'templates' => ($globalEd) ? 'view_form_table' : 'table_form']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.batch_number', ['label' => false, 'templates' => ($globalEd) ? 'view_form_table' : 'table_form']);
                        ?>
                    </td>
                    <td><?php echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose', ['label' => false, 
                           'type' => 'text', 'templates' => ($globalEd) ? 'view_form_table' : 'table_form']); ?></td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.dose_id', ['label' => false, 'options' => $doses, 'templates' => ($globalEd) ? 'view_form_table' : 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.route_id', ['label' => false, 'options' => $routes, 'templates' => ($globalEd) ? 'view_form_table' : 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.frequency_id', ['label' => false, 'options' => $frequencies, 'templates' => ($globalEd) ? 'view_form_table' : 'table_form', 'empty' => true]);
                        ?>
                    </td>
                    <td><?= $this->Form->control('sadr_list_of_drugs.'.$i.'.indication', ['label' => false, 'templates' => ($globalEd) ? 'view_form_table' : 'table_form']); ?></td>
                    <td>
                      <?php
                          echo $this->Form->control('sadr_list_of_drugs.'.$i.'.start_date', [
                            'label' => false, 'type' => 'text',
                            'templates' => ($globalEd) ? 'view_form_table' : 'table_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.stop_date', ['label' => false, 'type' => 'text',
                            'templates' => ($globalEd) ? 'view_form_table' : 'table_form'
                            ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('sadr_list_of_drugs.'.$i.'.suspected_drug', ['label' => false, 'type' => 'checkbox', 'templates' => ($globalEd) ? 'view_form_checkbox' : 'table_form'])
                        ?>
                    </td>
                    <td>
                        <button <?= ($globalEd) ? 'disabled=""' : '' ?> type="button" class="btn btn-danger btn-sm remove-row"  value="<?php if (isset($followup['sadr_list_of_drugs'][$i]['id'])) { echo $followup['sadr_list_of_drugs'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->

