<?php

use Cake\Utility\Hash;

$this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>
 
<?= $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?= $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?= $this->Html->script('jquery/aefi_index', ['block' => true]); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> AEFIS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search,
        <i class="fa fa-filter" aria-hidden="true"></i>Filter or
        <i class="fa fa-download" aria-hidden="true"></i> Download Reports</small>
</h1>

<?= $this->element('aefis/search') ?>

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
    <table class="table table-striped table-bordered mytable">
        <thead>
            <tr>
                <th scope="col">
                    <div class="input checkbox">
                        <label for="selectall"><input type="checkbox" name="selectall" value="1" checked="checked"
                                id="selectall">
                            <?= $this->Paginator->sort('id') ?>
                        </label>
                    </div>
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_vaccination_center') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefis as $aefi) : ?>
            <?php $a = ($aefi['assigned_to']) ? '<small class="muted">' . Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$aefi->assigned_to] . '</small>' : '<small class="muted">Unassigned</small>'; ?>
            <?php
        if ($aefi->reporter_email == "dataentry@mcaz.co.zw") {
          $tr = '#00FFFF';
        } else {
          $tr = '';
        } ?>
            <tr style="background-color:<?php echo $tr; ?>">
                <td><?php
              // $this->Number->format($aefi->id) 
              echo $this->Form->control('active' . $aefi->id, [
                'label' => '.' . $aefi->id, 'type' => 'checkbox',
                'data-url' => $this->Url->build(['action' => 'restoreDeleted', $aefi->id, '_ext' => 'json']),
                'templates' => ($prefix == 'manager' || $prefix == 'evaluator') ? '' : 'view_form_checkbox',
                'checked' => $aefi->active, 'hiddenField' => false
              ]);
              ?>
                </td>
                <td><?php
              echo ($aefi->submitted == 2) ? $this->Html->link($aefi->reference_number, ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'class' => 'btn-zangu']) :
                $this->Html->link($aefi->created, ['action' => 'edit', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'class' => 'btn-zangu']); ?>
                </td>
                <td><?= h($aefi->name_of_vaccination_center) ?></td>
                <td><?= h($aefi->status) ?><br><?= $a ?><br><?= $aefi->report_type ?></td>
                <td><?= h($aefi->modified) ?></td>
                <td>
                    <?php if ($aefi->submitted == 2 && empty($aefi->messageid)) {
              echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $aefi->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'initiate']);
            } elseif (!empty($aefi->messageid)) {
              echo $aefi->messageid;
              echo $this->Html->link('&nbsp;<span class="label label-warning"> Resubmit</span>', ['action' => 'vigibase', $aefi->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'confirm']); 
            }
            ?>
                </td>
                <td>
                    <span
                        class="label label-primary"><?php
                                              echo ($aefi->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $aefi->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>

                    <?php
            echo ($aefi->submitted == 2) ?
              $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'style' => 'color: white;']) :
              $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'style' => 'color: white;']);
            ?>

                    <span class="label label-primary">
                        <?= $this->Html->link('PDF', ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
              ?>
                    </span>
                    <br>
                    <?php if ($aefi->submitted == 2 && $aefi->status != 'Archived') {
              echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['action' => 'archive', $aefi->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $aefi->reference_number)]);
            }
            ?>
                    <?php if ($aefi->submitted == 0) { ?>
                    <span class="label label-danger">
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefi->id), 'class' => 'label-link']) ?>
                    </span>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>