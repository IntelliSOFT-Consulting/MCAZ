<?php
$this->Html->script('jquery/sadr_search', ['block' => true]);
?>
<?php
$arr1 = explode('?', $this->request->getRequestTarget());
if (count($arr1) > 1) {
    $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
    $pdf = implode('.pdf?', explode('?', $this->request->getRequestTarget()));
} else {
    $url = implode('.csv?', explode('?', $this->request->getRequestTarget())) . '.csv';
    $pdf = implode('.pdf?', explode('?', $this->request->getRequestTarget())) . '.pdf';
}
?>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
        <div class="col-md-10">
            <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk"
                            aria-hidden="true"></span> to match any character e.g. aefi4* to match aefi4/2017,
                        aefi49/2018 etc.</em></small></h5>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <?php
                            echo $this->Form->control('status', ['type' => 'hidden', 'templates' => 'table_form']);
                            echo $this->Form->control(
                                'reference_number',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Reference Number*']
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control(
                                'created_start',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'Start Date']
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control(
                                'created_end',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => 'End Date']
                            );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            echo $this->Form->control(
                                'description_of_reaction',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Description of Reaction*']
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control(
                                'name_of_vaccination_center',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Vaccination Center*']
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control(
                                'serious',
                                [
                                    'type' => 'radio', 'label' => 'Serious?', 'templates' => 'radio_form',
                                    'options' => ['Yes' => 'Yes', 'No' => 'No']
                                ]
                            );
                            ?>

                            <a onclick="$('input[name=serious]').removeAttr('checked');" class="tiptip"
                                data-original-title="clear!!">
                                <em class="accordion-toggle"><i class="fa fa-window-close-o"
                                        aria-hidden="true"></i></em></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <a class="btn" role="button" data-toggle="collapse" href="#collapseAefi"
                                aria-expanded="false" aria-controls="collapseAefi">
                                View more...
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="collapse" id="collapseAefi">
                <table class="table">
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <?php
                                echo "<label>Seizures &nbsp;</label>";
                                echo $this->Form->control('ae_afebrile', ['type' => 'checkbox', 'label' => 'afebrile', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo $this->Form->control('ae_febrile', ['type' => 'checkbox', 'label' => 'febrile', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo "<label>&nbsp; Severe local reaction &nbsp;</label>";
                                echo $this->Form->control('ae_3days', ['type' => 'checkbox', 'label' => '>3 days', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo $this->Form->control('ae_beyond_joint', ['type' => 'checkbox', 'label' => 'beyond nearest joint', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo "<br/>";
                                echo $this->Form->control('ae_encephalopathy', ['type' => 'checkbox', 'label' => 'Encephalopathy', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo $this->Form->control('ae_abscess', ['type' => 'checkbox', 'label' => 'Abscess', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo $this->Form->control('ae_sepsis', ['type' => 'checkbox', 'label' => 'Sepsis', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo $this->Form->control('ae_anaphylaxis', ['type' => 'checkbox', 'label' => 'Anaphylaxis', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                // echo "<br>";
                                echo $this->Form->control('ae_fever', ['type' => 'checkbox', 'label' => 'Fever≥38°C', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo $this->Form->control('ae_toxic_shock', ['type' => 'checkbox', 'label' => 'Toxic shock syndrome', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);
                                echo $this->Form->control('ae_thrombocytopenia', ['type' => 'checkbox', 'label' => 'Thrombocytopenia', 'templates' => 'clear_form_checkbox', 'hiddenField' => false]);

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php
                                echo $this->Form->control(
                                    'investigation_needed',
                                    [
                                        'type' => 'radio', 'label' => 'investigation needed?', 'templates' => 'radio_form', 'placeholder' => '*Patient Initials*',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No']
                                    ]
                                );
                                ?>

                                <a onclick="$('input[name=investigation_needed]').removeAttr('checked');" class="tiptip"
                                    data-original-title="clear!!">
                                    <em class="accordion-toggle"><i class="fa fa-window-close-o"
                                            aria-hidden="true"></i></em></a>
                            </td>
                            <td>
                                <?php
                                echo $this->Form->control(
                                    'outcome',
                                    [
                                        'type' => 'select', 'label' => false, 'templates' => 'clear_form', 'empty' => true,
                                        'options' => [
                                            'Recovered' => 'Recovered',
                                            'Recovering' => 'Recovering',
                                            'Not yet recovered' => 'Not yet recovered',
                                            'Fatal' => 'Fatal',
                                            'Unknown' => 'Unknown'
                                        ]
                                    ]
                                );
                                ?>
                                <a onclick="$('#outcome').val('');" class="tiptip" data-original-title="clear!!">
                                    <em class="accordion-toggle"><i class="fa fa-window-close-o"
                                            aria-hidden="true"></i></em></a>
                                <br>
                                <small class="text-warning">Outcome</small>
                            </td>
                            <td>
                                <?php
                                echo $this->Form->control(
                                    'serious_yes',
                                    [
                                        'label' => false, 'templates' => 'clear_form', 'options' => ['Death' => 'Death', 'Life threatening' => 'Life threatening', 'Disability' => 'Disability', 'Hospitalization' => 'Hospitalization', 'Congenital anomaly' => 'Congenital anomaly'],
                                        'empty' => true
                                    ]
                                );
                                ?>
                                <a onclick="$('select[name=serious_yes]').val('');" class="tiptip"
                                    data-original-title="clear!!">
                                    <em class="accordion-toggle"><i class="fa fa-window-close-o"
                                            aria-hidden="true"></i></em></a>
                                <br>
                                <small class="text-warning">Serious</small>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <?php
                                echo $this->Form->control(
                                    'province_id',
                                    [
                                        'label' => false, 'templates' => 'clear_form', 'options' => $provinces,
                                        'empty' => true
                                    ]
                                );
                                ?>
                                <a onclick="$('#province-id').val('');" class="tiptip" data-original-title="clear!!">
                                    <em class="accordion-toggle"><i class="fa fa-window-close-o"
                                            aria-hidden="true"></i></em></a>
                                <br>
                                <small class="text-warning">Province</small>
                            </td>
                            <td>
                                <?php
                                echo $this->Form->control(
                                    'reporter_name',
                                    ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Reporter\'s name*']
                                );
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $this->Form->control(
                                    'designation_id',
                                    [
                                        'label' => false, 'templates' => 'clear_form', 'options' => $designations,
                                        'empty' => true
                                    ]
                                );
                                ?>
                                <a onclick="$('#designation-id').val('');" class="tiptip" data-original-title="clear!!">
                                    <em class="accordion-toggle"><i class="fa fa-window-close-o"
                                            aria-hidden="true"></i></em></a>
                                <br>
                                <small class="text-warning">Designations</small>
                            </td>
                            <td>
                                <?php
                                echo $this->Form->control(
                                    'vaccine_name',
                                    ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Vaccine*']
                                );
                                ?>
                            </td>
                        </tr>
                        <tr>


                            <td>
                                <?php
                                echo $this->Form->control(
                                    'patient_name',
                                    ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Patient name*']
                                );
                                ?>
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
                                            'Presented' => 'Presented',
                                            'ApplicantResponse' => 'ApplicantResponse',
                                            'Correspondence' => 'Correspondence',
                                            'Committee' => 'Committee',
                                            'VigiBase' => 'VigiBase',
                                            'FinalFeedback' => 'FinalFeedback',
                                        ]
                                    ]
                                );
                                ?>
                                <a onclick="$('#status').val('');" class="tiptip" data-original-title="clear!!">
                                    <em class="accordion-toggle"><i class="fa fa-window-close-o"
                                            aria-hidden="true"></i></em></a>
                                <br>
                                <small class="text-warning">Evaluation Status</small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2">
            <br>
            <button type="submit" class="btn btn-primary btn-sm btn-block " id="search" style="margin-bottom: 4px;"><i
                    class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
            <?php
            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm btn-block ', 'escape' => false]);
            ?>
            <!-- <button type="submit" class="btn btn-success btn-sm btn-block " id="search" style="margin-top: 4px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv</button> -->
            <a class="btn btn-success btn-sm btn-block " href="<?= $url ?>" style="margin-top: 4px;">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
            </a>

            <?php if ($prefix !== 'institution') { ?>
            <a class="btn btn-warning btn-sm btn-block" href="<?= $pdf ?>" style="margin-top: 4px;">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Summary Report
            </a>
            <?php } ?>

            <div class="dropdown" style="margin-top: 14px;">
                <button class="btn btn-default btn-sm btn-block  dropdown-toggle" type="button" id="dropdownMenu1"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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