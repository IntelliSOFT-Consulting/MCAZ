<?php
    $this->Html->script('jquery/sadr_search', ['block' => true]);
?>
<?php 
    $arr1 = explode('?', $this->request->getRequestTarget());
    if(count($arr1) > 1) {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
    } else {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget())).'.csv';
    }
?>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
      <p class="btn-zangu"><a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      <i class="fa fa-search" aria-hidden="true"></i> Search
                    </a></p>

      <div class="collapse" id="collapseExample">

      <div class="col-md-10">
        <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk" aria-hidden="true"></span> to match any character e.g. saefi4* to match saefi4/2017, saefi49/2018 etc.</em></small></h5>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('status', ['type' => 'hidden', 'templates' => 'table_form']);
                            echo $this->Form->control('reference_number', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Reference Number*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('created_start', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'Start Date']);
                        ?>                        
                    </td> 
                    <td>
                        <?php
                            echo $this->Form->control('created_end', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'End Date']);
                        ?>
                    </td>   
                </tr>
                <tr>  
                    <td>                        
                        <?php
                         //   echo $this->Form->control('basic_details', 
                           //     ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Basic details*']);
                        ?>
                    </td>
                    <td colspan="2">
                        <?php
                            echo $this->Form->control('status_on_date', 
                                ['type' => 'radio', 'label' => 'Status on date of investigation?', 'templates' => 'radio_form', 
                                 'options' => ['Died' => 'Died', 'Disabled' => 'Disabled', 'Recovering' => 'Recovering', 'Recovered completely' => 'Recovered completely', 'Unknown' => 'Unknown']]);
                        ?>

                <a onclick="$('input[name=status_on_date]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                    </td>
                </tr>  
            </tbody>
        </table>
        <table class="table">
            <tbody> 
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('pregnant', 
                                ['type' => 'radio', 'label' => 'Pregnant?', 'templates' => 'radio_form', 
                                 'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unknown' => 'Unknown']]);
                        ?>

                <a onclick="$('input[name=pregnant]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                    </td>
                    <td colspan="2">
                        <?php
                            echo $this->Form->control('infant', 
                                ['type' => 'radio', 'label' => 'Birth was..', 'templates' => 'radio_form', 
                                 'options' => ['full-term' => 'full-term', 'pre-term' => 'pre-term', 'post-term' => 'post-term']]);
                        ?>

                <a onclick="$('input[name=infant]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                    </td>                    
                </tr>
                <tr>                    
                    <td colspan="3">
                        <?php
                            echo $this->Form->control('delivery_procedure', 
                                ['type' => 'radio', 'label' => 'Delivery was..', 'templates' => 'radio_form', 
                                 'options' => ['Normal' => 'Normal', 'Caesarean' => 'Caesarean', 'Assisted (forceps, vacuum etc.)' => 'Assisted (forceps, vacuum etc.)', 'with complication' => 'with complication']]);
                        ?>

                    <a onclick="$('input[name=delivery_procedure]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                    </td>
                </tr>                
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('mobile', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Mobile*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('reporter_name', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Reporter\'s name*']);
                        ?>
                    </td>
                    <td>                        
                        <?php
                            echo $this->Form->control('reporter_email', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Reporter\'s email*']);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                            echo $this->Form->control('designation_id', 
                                ['label' => false, 'templates' => 'clear_form', 'options' => $designations, 
                                 'empty' => true]);
                        ?>                        
                        <a onclick="$('#designation-id').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Designations</small>
                     </td>
                    <td>
                        <?php
                            echo $this->Form->control('patient_name', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Patient name*']);
                        ?>
                    </td>
                </tr>       
            </tbody>
        </table>
    </div>
    <div class="col-md-2">
        <br>
        <button type="submit" class="btn btn-primary btn-sm btn-block " id="search" 
                style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
        <?php
            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm btn-block ', 'escape' => false]);
        ?>
        <!-- <button type="submit" class="btn btn-success btn-sm btn-block " id="search" style="margin-top: 4px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv</button> -->
        <a class="btn btn-success btn-sm btn-block " href="<?= $url ?>" style="margin-top: 4px;">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
        </a>
        <div class="dropdown"  style="margin-top: 14px;">
          <button class="btn btn-default btn-sm btn-block  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Sort by
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><?= $this->Paginator->sort('id') ?></li>
            <li><?= $this->Paginator->sort('reference_number') ?></li>
            <li><?= $this->Paginator->sort('created') ?></li>
            <li><?= $this->Paginator->sort('modified') ?></li>
          </ul>
        </div>
    </div>
    </div>
    </div>
</div>
<?= $this->Form->end() ?>