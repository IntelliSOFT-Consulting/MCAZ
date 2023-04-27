<?php

use Cake\Utility\Hash;

$this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('jquery/vigibasenew', ['block' => true]); ?>
<?= $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?= $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?= $this->Html->script('jquery/sadr_index', ['block' => true]); ?>

<?php //pr($sadrs) 
?>
<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> ADRS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search,
        <i class="fa fa-filter" aria-hidden="true"></i>Filter or
        <i class="fa fa-download" aria-hidden="true"></i> Download Reports</small>
</h1>

<?= $this->element('sadrs/search') ?>

<div class="paginator">
    <ul class="pagination pagination-sm">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
</div>
<p><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of <b>{{count}}</b> total')]) ?></small>
</p>
<?php
// debug(array_unique(Hash::combine($sadrs->toArray(), '{n}.reviews.{n}.user[group_id=2].file', '{n}.reviews.{n}.user[group_id=2].dir')));
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">
                    <div class="input checkbox">
                        <label for="selectall"><input type="checkbox" name="selectall" value="1" checked="checked" id="selectall">
                            <?= $this->Paginator->sort('id') ?>
                        </label>
                    </div>
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col">Stages</th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $filtered = [];
            foreach ($sadrs as $sample) : ?>
                <?php
                // check if the  $filtered  is empty
                if (empty($filtered)) {
                    $filtered[] = $sample;
                } else {
                    // 
                    if (!in_array($sample->reference_number, Hash::extract($filtered, '{n}.reference_number'))) {
                        $filtered[] = $sample;
                    }
                }

                ?>
            <?php endforeach;
            foreach ($filtered as $sadr) : ?>
                <?php $a = ($sadr['assigned_to']) ? '<small class="muted">' . Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$sadr->assigned_to] . '</small>' : '<small class="muted">Unassigned</small>'; ?>
                <?php
                if ($sadr->reporter_email != "dataentry@mcaz.co.zw") {
                    $tr = '  <i class="fa fa-internet-explorer" aria-hidden="true"></i>';
                } else {
                    $tr = '';
                }

                // check the submission status
                if ($sadr->resubmit > 0) {
                    $color = '#0000FF';
                } else {
                    $color = '';
                }

                ?>
                <tr style="background-color:<?php echo $color; ?>">
                    <td>
                        <?php
                        echo $this->Form->control('active' . $sadr->id, [
                            'label' => '.' . $sadr->id, 'type' => 'checkbox',
                            'data-url' => $this->Url->build(['action' => 'restoreDeleted', $sadr->id, '_ext' => 'json']),
                            'templates' => ($prefix == 'manager' || $prefix == 'evaluator') ? '' : 'view_form_checkbox',
                            'checked' => $sadr->active, 'hiddenField' => false
                        ]);
                        ?>
                    </td>
                    <td><?php
                        echo ($sadr->submitted == 2) ? $this->Html->link($sadr->reference_number, ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'class' => 'btn-zangu']) :
                            $this->Html->link($sadr->created, ['action' => 'edit', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'class' => 'btn-zangu']);

                        echo $tr;

                        ?>

                    </td>
                    <td><?= h($sadr->institution_name) ?></td>
                    <td><?= h($sadr->status) ?><br><?= $a ?><br><?= $sadr->report_type ?></td>
                    <td>
                        <div class="readmore">
                            <?php
                            foreach ($sadr->report_stages as $application_stage) {
                                echo "<p>" . $application_stage->stage . " - " . $application_stage->description . " - " . h($application_stage->created) . "</p>";
                            }
                            ?>
                        </div>
                    </td>
                    <td><?= h($sadr->modified) ?></td>
                    <?php //if(!in_array("VigiBase", Hash::extract($sadr->report_stages, '{n}.stage'))) { 
                    ?>
                    <td>
                        <?php if ($sadr->submitted == 2 && empty($sadr->messageid)) {
                            echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $sadr->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'vigibase']);
                        } elseif (!empty($sadr->messageid)) {
                            echo $sadr->messageid;
                        }
                        ?>
                    </td>
                    <!-- <td>
                        <?php
                        // if ($sadr->submitted == 2 && empty($sadr->messageid)) {
                        // echo  $this->Html->link('<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $sadr->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'initiate', 'confirm' => __('Are you sure you want to send report {0}?', $sadr->reference_number)]);
                        // } elseif (!empty($sadr->messageid)) {
                        // echo $sadr->messageid;
                        // echo  $this->Html->link('<span class="label label-warning"> Resubmit <small class="badge badge-sadr pull-right">' . $sadr->resubmit . '</small></span>', ['action' => 'resubmitvigibase', $sadr->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'confirm', 'confirm' => __('Are you sure you want to resubmit report {0}?', $sadr->reference_number)]);
                        // }
                        ?>
                    </td> -->
                    <?php //} else { echo "<td></td>"; } 
                    ?>
                    <td>
                        <?php if ($sadr->submitted == 2) {
                            echo  $this->Html->link('<span class="label label-primary"> E2B</span>', ['action' => 'e2b', $sadr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']);
                        }
                        ?>

                        <?php
                        echo ($sadr->submitted == 2) ?
                            $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'style' => 'color: white;']) :
                            $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'style' => 'color: white;']);
                        ?>

                        <?= $this->Html->link('<span class="label label-primary">PDF</span>', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status, '_ext' => 'pdf'], ['escape' => false, 'style' => 'color: white;'])
                        ?>

                        <?php if ($sadr->submitted == 2 && $sadr->status != 'Archived') {
                            echo "&nbsp;";
                            echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['action' => 'archive', $sadr->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $sadr->reference_number)]);
                        }
                        ?>
                        <?php if ($sadr->submitted == 0) { ?>

                            <?= $this->Form->postLink('<span class="label label-danger">Delete</span> ', ['action' => 'delete', $sadr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadr->id), 'class' => 'label-link', 'escape' => false]) ?>

                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>