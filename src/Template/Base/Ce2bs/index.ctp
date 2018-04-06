<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibase', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>

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
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e2b_file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th> 
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ce2bs as $ce2b): ?>
            <tr>
                <td><?= $this->Number->format($ce2b->id) ?></td>
                <td>
                <?php
                  echo $this->Html->link($ce2b->reference_number, ['action' => 'view', $ce2b->id, 'prefix' => $prefix, 'status' => $ce2b->status], ['escape' => false, 'class' => 'btn-zangu']); 
                ?>
                </td>
                <td><?= h($ce2b->company_name) ?></td>
                <td><?php echo $this->Html->link($ce2b->e2b_file, substr($ce2b->dir, 8) . '/' . $ce2b->e2b_file, ['fullBase' => true, 'download']); ?></td>
                <td><?= h($ce2b->comment) ?></td>
                <td>
                    <?php if(empty($ce2b->messageid)) {                                        
                           echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $ce2b->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'vigibase']); 
                          } elseif (!empty($ce2b->messageid)) {
                            echo $ce2b->messageid;
                          }
                    ?>
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