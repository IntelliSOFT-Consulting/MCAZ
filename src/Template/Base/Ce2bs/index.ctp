<?php

use Cake\Utility\Hash;

$this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<?= $this->Html->script('jquery/vigibasenew', ['block' => true]); ?>
<?= $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?= $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?= $this->Html->script('jquery/ce2b_index', ['block' => true]); ?>

<?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Ce2bs', ['controller' => 'Ce2bs', 'action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?>
&nbsp;

<hr>
<h1 class="page-header">COMPANY E2B REPORTS</h1>

<?= $this->element('ce2bs/search') ?>

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
                <th scope="col" width="10%"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('e2b_file') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('stages') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col" width="10%"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th>
                <th scope="col" width="10%"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ce2bs as $ce2b) : ?>
                <?php $a = ($ce2b['assigned_to']) ? '<small class="muted">' . Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$ce2b->assigned_to] . '</small>' : '<small class="muted">Unassigned</small>'; ?>
                <?php
                if ($ce2b->reporter_email != "dataentry@mcaz.co.zw") {
                    $tr = '  <i class="fa fa-internet-explorer" aria-hidden="true"></i>';
                } else {
                    $tr = '';
                }

                // check the submission status
                if ($ce2b->resubmit > 0) {
                    $color = '#0000FF';
                } else {
                    $color = '';
                }
                ?>
                <tr style="background-color:<?php echo $color; ?>">
                    <td>
                        <?php
                        echo $this->Form->control('active' . $ce2b->id, [
                            'label' => '.' . $ce2b->id, 'type' => 'checkbox',
                            'data-url' => $this->Url->build(['action' => 'restoreDeleted', $ce2b->id, '_ext' => 'json']),
                            'templates' => ($prefix == 'manager' || $prefix == 'evaluator') ? '' : 'view_form_checkbox',
                            'checked' => $ce2b->active, 'hiddenField' => false
                        ]);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link($ce2b->reference_number, ['action' => 'view', $ce2b->id, 'prefix' => $prefix, 'status' => $ce2b->status], ['escape' => false, 'class' => 'btn-zangu']);

                        echo $tr;
                        ?>
                    </td>
                    <td><?= h($ce2b->company_name) ?></td>
                    <td>
                        <div style="word-wrap: break-word; word-break: break-all;">
                            <?php echo $this->Html->link($ce2b->e2b_file, substr($ce2b->dir, 8) . '/' . $ce2b->e2b_file, ['fullBase' => true, 'download']); ?>
                            <br><?= h($ce2b->status) ?><br><?= $a ?>
                        </div>
                    </td>
                    <td>
                        <div class="readmore">
                            <?php
                            foreach ($ce2b->report_stages as $application_stage) {
                                echo "<p>" . $application_stage->stage . " - " . $application_stage->description . "</p>";
                            }
                            ?>
                        </div>
                    </td>
                    <td>
                        <div style="word-wrap: break-word; word-break: break-all;"><?= h($ce2b->comment) ?>
                        </div>
                    </td>
                    <td>
                        <?php if (empty($ce2b->messageid)) {
                            echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $ce2b->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'vigibase']);
                        } elseif (!empty($ce2b->messageid)) {
                            echo $ce2b->messageid;
                            // echo  $this->Html->link('<span class="label label-warning"> Resubmit<small class="badge badge-ce2b pull-right">'.$ce2b->resubmit.'</small></span>', ['action' => 'resubmitvigibase', $ce2b->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'vigibase', 'confirm' => __('Are you sure you want to resubmit report {0}?', $ce2b->reference_number)]);
                        }
                        ?>
                    </td>
                    <td><?= h($ce2b->created) ?></td>
                    <td>
                        <?= $this->Html->link('<span class="label label-primary">View</span>', ['controller' => 'Ce2bs', 'action' => 'view', $ce2b->id, 'prefix' => $prefix], array('escape' => false));  ?>
                        <?php if ($ce2b->submitted == 2 && $ce2b->status != 'Archived') {
                            echo "&nbsp;";
                            echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['controller' => 'Ce2bs', 'action' => 'archive', $ce2b->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $ce2b->reference_number)]);
                        } else {
                            echo "&nbsp;";
                            echo  $this->Form->postLink('<span class="label label-success"> Restore</span>', ['controller' => 'Ce2bs', 'action' => 'restoreArchived', $ce2b->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to restore report {0}?', $ce2b->reference_number)]);
                        }
                        ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>