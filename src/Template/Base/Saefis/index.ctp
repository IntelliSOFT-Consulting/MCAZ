<?php

use Cake\Utility\Hash;

$this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?> 
<?= $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?= $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?= $this->Html->script('jquery/saefi_index', ['block' => true]); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> SAEFIS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search,
        <i class="fa fa-filter" aria-hidden="true"></i>Filter or
        <i class="fa fa-download" aria-hidden="true"></i> Download Reports</small>
</h1>

<?= $this->element('saefis/search') ?>

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
                        <label for="selectall"><input type="checkbox" name="selectall" value="1" checked="checked"
                                id="selectall">
                            <?= $this->Paginator->sort('id') ?>
                        </label>
                    </div>
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saefis as $saefi) : ?>
            <?php $a = ($saefi['assigned_to']) ? '<small class="muted">' . Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$saefi->assigned_to] . '</small>' : '<small class="muted">Unassigned</small>'; ?>
            <?php
        if ($saefi->reporter_email == "dataentry@mcaz.co.zw") {
          $tr = '#00FFFF';
        } else {
          $tr = '';
        } ?>
            <tr style="background-color:<?php echo $tr; ?>">
                <td><?php
              // $this->Number->format($saefi->id) 
              echo $this->Form->control('active' . $saefi->id, [
                'label' => '.' . $saefi->id, 'type' => 'checkbox',
                'data-url' => $this->Url->build(['action' => 'restoreDeleted', $saefi->id, '_ext' => 'json']),
                'templates' => ($prefix == 'manager' || $prefix == 'evaluator') ? '' : 'view_form_checkbox',
                'checked' => $saefi->active, 'hiddenField' => false
              ]);
              ?>
                </td>
                <td><?php
              echo ($saefi->submitted == 2) ? $this->Html->link($saefi->reference_number, ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false, 'class' => 'btn-zangu']) :
                $this->Html->link($saefi->created, ['action' => 'edit', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false, 'class' => 'btn-zangu']); ?>
                </td>
                <td><?= h($saefi->reference_number) ?></td>
                <td><?= h($saefi->status) ?><br><?= $a ?><br><?= $saefi->report_type ?></td>
                <td><?= h($saefi->modified) ?></td>
                <td>
                    <?php if ($saefi->submitted == 2 && empty($saefi->messageid)) {
              echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $saefi->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'initiate']);
            } elseif (!empty($saefi->messageid)) {
              echo $saefi->messageid;
              echo  $this->Html->link('&nbsp;<span class="label label-warning"> Resubmit</span>', ['action' => 'vigibase', $saefi->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'confirm']);
            }
            ?>
                </td>
                <td>
                    <?php
            echo ($saefi->submitted == 2) ?  $this->Html->link('<span class="label label-primary">E2B</span>', ['action' => 'e2b', $saefi->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : '';
            ?>

                    <?php
            echo ($saefi->submitted == 2) ?
              $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false, 'style' => 'color: white;']) :
              $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false, 'style' => 'color: white;']);
            ?>


                    <?= $this->Html->link('<span class="label label-primary">PDF</span>', ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
            ?>

                    <br>
                    <?php if ($saefi->submitted == 2 && $saefi->status != 'Archived') {
              echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['action' => 'archive', $saefi->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $saefi->reference_number)]);
            }
            ?>
                    <?php if ($saefi->submitted == 0) { ?>
                    <span class="label label-danger">
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saefi->id), 'class' => 'label-link']) ?>
                    </span>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>