<?php 
use Cake\Utility\Hash;
$this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibasenew', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?=     $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?=     $this->Html->script('jquery/ce2b_index', ['block' => true]); ?>

<?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Ce2bs', ['controller' => 'Ce2bs', 'action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;

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
<p><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of <b>{{count}}</b> total')]) ?></small></p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">
                        <?= $this->Paginator->sort('id') ?>      
                </th>
                <th scope="col" width="10%"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('e2b_file') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ce2bs as $ce2b): ?>
            <?php $a = ($ce2b['assigned_to']) ? '<small class="muted">'.Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$ce2b->assigned_to].'</small>' : '<small class="muted">Unassigned</small>';?>
            <tr>
                <td><?= $this->Number->format($ce2b->id) ?></td>
                <td>
                <?php
                  echo $this->Html->link($ce2b->reference_number, ['action' => 'view', $ce2b->id, 'prefix' => $prefix, 'status' => $ce2b->status], ['escape' => false, 'class' => 'btn-zangu']); 
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
                    <div style="word-wrap: break-word; word-break: break-all;"><?= h($ce2b->comment) ?>                        
                    </div>
                </td>
                <td><?= h($ce2b->created) ?></td>
                <td>
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['controller' => 'Ce2bs', 'action' => 'view', $ce2b->id, 'prefix' => $prefix], array('escape' => false));  ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>