<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> SAEFIS</h1>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('basic_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saefis as $saefi): ?>
            <tr>
                <td><?= $this->Number->format($saefi->id) ?></td>
                <td><?php
                      echo ($saefi->submitted == 2) ? $this->Html->link($saefi->reference_number, ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false]) : $saefi->created ; ?></td>
                <td><?= h($saefi->basic_details) ?></td>
                <td><?= h($saefi->status) ?></td>
                <td><?= h($saefi->modified) ?></td>
                <td>
                   <span class="label label-primary"><?php
                   echo ($saefi->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $saefi->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>
                   <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $saefi->id, 'prefix' => false], ['escape' => false, 'style' => 'color: white;'])
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
