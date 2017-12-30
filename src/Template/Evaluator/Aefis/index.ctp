<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> AEFIS</h1>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_vaccination_center') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefis as $aefi): ?>
            <tr>
                <td><?= $this->Number->format($aefi->id) ?></td>
                <td><?php
                      echo ($aefi->submitted == 2) ? $this->Html->link($aefi->reference_number, ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false]) : $aefi->created ; ?></td>
                <td><?= h($aefi->name_of_vaccination_center) ?></td>
                <td><?= h($aefi->status) ?></td>
                <td><?= h($aefi->modified) ?></td>
                <td>
<span class="label label-primary"><?php
                   echo ($aefi->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $aefi->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>
                   <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $aefi->id, 'prefix' => $prefix], ['escape' => false, 'style' => 'color: white;'])
                     ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
