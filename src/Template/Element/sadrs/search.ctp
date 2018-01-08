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
      <div class="col-md-10">
        <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk" aria-hidden="true"></span> to match any character e.g. adr4* to match adr4/2017, adr49/2018 etc.</em></small></h5>

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
                            echo $this->Form->control('description_of_reaction', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Description of Reaction*']);
                        ?>
                    </td>          
                    <td>
                        <?php
                            echo $this->Form->control('name_of_institution', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Institution*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('severity', 
                                ['type' => 'radio', 'label' => 'Serious?', 'templates' => 'radio_form', 
                                 'options' => ['Yes' => 'Yes', 'No' => 'No']]);
                        ?>

                <a onclick="$('input[name=severity]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                    </td>
                </tr>                
                <tr>
                    <td colspan="3">
                    <a class="btn" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      View more
                    </a>
                    </td>
                </tr>     
            </tbody>
        </table>
        <div class="collapse" id="collapseExample">
        <table class="table">
            <tbody>           
                <tr>                    
                    <td colspan="2"> 
                        <?php
                            echo $this->Form->control('severity_reason', 
                                ['type' => 'select', 'label' => false, 'templates' => 'clear_form', 'empty' => true,
                                  'options' => ['Death' => 'Death', 'Life-threatening' => 'Life-threatening', 'Hospitalizaion/Prolonged' => 'Hospitalizaion/Prolonged', 'Disabling' => 'Disabling', 'Congenital-anomaly' => 'Congenital-anomaly',  'Other Medically Important Reason' => 'Other Medically Important Reason']]);
                        ?>
                        <a onclick="$('#severity-reason').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Reason for seriousness</small>
                    </td>
                    <td> 
                        <?php
                            echo $this->Form->control('outcome', 
                                ['type' => 'select', 'label' => false, 'templates' => 'clear_form', 'empty' => true,
                                  'options' => ['Recovered' => 'Recovered', 
                                                'Recovering' => 'Recovering', 
                                                'Not yet recovered' => 'Not yet recovered', 
                                                'Fatal' => 'Fatal', 
                                                'Unknown' => 'Unknown']]);
                        ?>
                        <a onclick="$('#outcome').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Outcome</small>
                    </td>
                </tr>
                <tr>                    
                    <td> 
                        <?php
                            echo $this->Form->control('action_taken', 
                                ['type' => 'select', 'label' => false, 'templates' => 'clear_form', 'empty' => true,
                                  'options' => ['Drug withdrawn' => 'Drug withdrawn',
                                            'Dose increased' => 'Dose increased',
                                            'Unknown' => 'Unknown',
                                            'Dose reduced' => 'Dose reduced',
                                            'Dose not changed' => 'Dose not changed',
                                            'Not applicable' => 'Not applicable',
                                            'Medical treatment of ADR' => 'Medical treatment of ADR']]);
                        ?>
                        <a onclick="$('#action-taken').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Action taken</small>
                    </td>
                    <td colspan="2"> 
                        <?php
                            echo $this->Form->control('relatedness', 
                                ['type' => 'select', 'label' => false, 'templates' => 'clear_form', 'empty' => true,
                                  'options' => ['Certain' => 'Certain',
                                    'Probable / Likely' => 'Probable / Likely',
                                    'Possible' => 'Possible',
                                    'Unlikely' => 'Unlikely',
                                    'Conditional / Unclassified' => 'Conditional / Unclassified',
                                    'Unassessable / Unclassifiable,' => 'Unassessable / Unclassifiable,',]]);
                        ?>
                        <a onclick="$('#severity-reason').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Relatedness to ADR</small>
                    </td>
                </tr>
                <tr>                    
                    <td>
                        <?php
                            echo $this->Form->control('province_id', 
                                ['label' => false, 'templates' => 'clear_form', 'options' => $provinces, 
                                 'empty' => true]);
                        ?>                        
                        <a onclick="$('#province-id').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">Province</small>
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
                                ['label' => false, 'templates' => 'clear_form', 'options' => $designations, 'placeholder' => '*Province*',
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
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Patient Initials*']);
                        ?>
                    </td>
                </tr>                
            </tbody>
        </table>
        </div>
    </div>
    <div class="col-md-2">
        <br>
        <button type="submit" class="btn btn-primary btn-sm" id="search" 
                style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
        <?php
            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm', 'escape' => false]);
        ?>
        <!-- <button type="submit" class="btn btn-success btn-sm" id="search" style="margin-top: 4px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv</button> -->
        <a class="btn btn-success btn-sm" href="<?= $url ?>" style="margin-top: 4px;">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
        </a>
        <div class="dropdown"  style="margin-top: 14px;">
          <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
<?= $this->Form->end() ?>