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
    // pr($adrs);
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
                            echo $this->Form->control('study_title', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Study title*']);
                        ?>
                    </td>
                    <td>                        
                        <?php
                            echo $this->Form->control('mrcz_protocol_number', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*MRCZ Protocol #*']);
                        ?>
                    </td>
                    <td>                        
                        <?php
                            echo $this->Form->control('mcaz_protocol_number', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*MCAZ Protocol #*']);
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody> 
                <tr>
                    <td colspan="2">
                        <?php
                            echo $this->Form->control('report_type', 
                                ['type' => 'radio', 'label' => 'Report type', 'templates' => 'radio_form', 
                                 'options' => ['Initial' => 'Initial', 'FollowUp' => 'FollowUp', 'Resolution' => 'Resolution']]);
                        ?>

                <a onclick="$('input[name=report_type]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                    </td>
                    <td>                        
                        <?php
                            echo $this->Form->control('participant_number', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Participant number*']);
                        ?>
                    </td>                 
                </tr>            
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('adverse_event_type', 
                                ['type' => 'radio', 'label' => 'Event type', 'templates' => 'radio_form', 
                                 'options' => ['AE' => 'AE', 'SAE' => 'SAE', 'Death' => 'Death']]);
                        ?>

                    <a onclick="$('input[name=adverse_event_type]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                    </td>
                    <td colspan="2">
                        <?php
                            echo $this->Form->control('sae_type', 
                                ['type' => 'select', 'label' => false, 'templates' => 'clear_form', 'empty' => true,
                                  'options' => ['Fatal' => 'Fatal', 'Seizures' => 'Seizures', 'Life-threatening (an actual risk of death at the time of the event).' => 'Life-threatening (an actual risk of death at the time of the event).', 'Caused or prolonged hospitalization (non-elective).' => 'Caused or prolonged hospitalization (non-elective).', 'Resulted in persistent or significant disability or incapacity.' => 'Resulted in persistent or significant disability or incapacity.', 'Any other important medical event.' => 'Any other important medical event.']]);
                        ?>
                        <a onclick="$('#sae-type').val('');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                         <br>
                         <small class="text-warning">SAE type</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <?php
                            echo $this->Form->control('research_involves', 
                                ['type' => 'radio', 'label' => 'Research involves', 'templates' => 'radio_form', 
                                 'options' => ['Drug' => 'Drug', 'Device' => 'Device', 'Procedure' => 'Procedure', 'Vaccine' => 'Vaccine', 'Other, specify' => 'Other, specify']]);
                        ?>

                        <a onclick="$('input[name=research_involves]').removeAttr('checked');" class="tiptip"  data-original-title="clear!!">
                         <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                     </td>
                </tr>
                <tr>                    
                    <td>
                        <?php
                            echo $this->Form->control('outcome', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Outcome*']);
                        ?>
                    </td>
                    <td>
                        
                    </td>
                      <!-- Added -->
                      <td>
                                <?php
                                echo $this->Form->control(
                                    'status',
                                    [
                                        'type' => 'select', 'label' => false, 'templates' => 'clear_form', 'empty' => true,
                                        'options' => [
                                            'Submitted' => 'Submitted',
                                            'UnSubmitted' => 'UnSubmitted',
                                            'Assigned' => 'Assigned',
                                            'Evaluated' => 'Evaluated',
                                            'Presented' => 'PVCT 2',
                                            'ApplicantResponse' => 'ApplicantResponse',
                                            'Correspondence' => 'Correspondence',
                                            'Committee' => 'Committee',
                                            'VigiBase' => 'VigiBase',
                                            'FinalFeedback' => 'FinalFeedback',
                                            'Archived' => 'Archived'
                                        ]
                                    ]
                                );
                                ?>
                                <a onclick="$('#relatedness').val('');" class="tiptip" data-original-title="clear!!">
                                    <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
                                <br>
                                <small class="text-warning">Evaluation Status</small>
                            </td>
                </tr>
                <tr>
                    <td colspan="3">                        
                        <?php
                            echo $this->Form->control('diagnosis', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Diagnosis*']);
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