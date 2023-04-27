<?php
$this->Html->script('jquery/sadr_search', ['block' => true]);
?>
<?php
$arr1 = explode('?', $this->request->getRequestTarget());
if (count($arr1) > 1) {
    $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
    $pdf = implode('.pdf?', explode('?', $this->request->getRequestTarget()));
    $timeline = implode('/time.pdf?', explode('?', $this->request->getRequestTarget()));
} else {
    $url = implode('.csv?', explode('?', $this->request->getRequestTarget())) . '.csv';
    $pdf = implode('.pdf?', explode('?', $this->request->getRequestTarget())) . '.pdf';
    $timeline = implode('/time.pdf?', explode('?', $this->request->getRequestTarget())) . '/time.pdf';
}
?>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
        <div class="col-md-10">
            <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk"
                            aria-hidden="true"></span> to match any character e.g. saefi4* to match saefi4/2017,
                        saefi49/2018 etc.</em></small></h5>

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
                                'company_name',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Company name*']
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control(
                                'reporter_email',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*Reporter\'s email*']
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->control(
                                'e2b_file',
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*E2B File*']
                            );
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <!-- Added -->
                        <td>
                            <?php
                            echo $this->Form->control('status',
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
                                        'Archived'=>'Archived'
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
        <div class="col-md-2">
            <br>
            <button type="submit" class="btn btn-primary btn-sm btn-block " id="search" style="margin-bottom: 4px;"><i
                    class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
            <?php
            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm btn-block ', 'escape' => false]);
            ?>
            <a class="btn btn-success btn-sm btn-block " href="<?= $url ?>" style="margin-top: 4px;">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
            </a>

            <?php if ($prefix !== 'institution') { ?>
            <a class="btn btn-warning btn-sm btn-block" href="<?= $pdf ?>" style="margin-top: 4px;">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Summary Report
            </a>
            
            <?php } ?>
            <?php if ($prefix == 'manager' || $prefix == 'evaluator') { ?>
                <a class="btn btn-primary btn-sm btn-block" href="<?= $timeline ?>" style="margin-top: 4px;">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Timeline Report
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