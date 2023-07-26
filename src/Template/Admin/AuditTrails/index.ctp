<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>
<?php
$arr1 = explode('?', $this->request->getRequestTarget());
if (count($arr1) > 1) {
    $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
} else {
    $url = implode('.csv?', explode('?', $this->request->getRequestTarget())) . '.csv';
}
// pr($adrs);
?>

 

<hr>
<h1 class="page-header">Audit Trail</h1>
 


<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr> 
                <th scope="col"  style="width: 10%;"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col" style="width: 10%;"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col" style="width: 60%;"><?= $this->Paginator->sort('message') ?></th> 
                <th scope="col"style="width: 10%;"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions" ><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            

            <?php foreach ($auditTrails as $auditTrail) : ?>
                <tr> 
                    <td><?= h($auditTrail->model) ?></td>
                    <td><?= h($auditTrail->ip) ?></td>
                    <td><?= h($auditTrail->message) ?></td> 
                    <td><?= h($auditTrail->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $auditTrail->id]) ?> 
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auditTrail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auditTrail->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
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
