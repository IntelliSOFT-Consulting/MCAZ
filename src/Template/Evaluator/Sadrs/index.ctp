<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">ADRS</h1>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrs as $sadr): ?>
            <tr>
                <td><?= $this->Number->format($sadr->id) ?></td>
                <td><?= $this->Html->link($sadr->reference_number, ['action' => 'view', $sadr->id, 'prefix' => $prefix], array('escape' => false)); ?></td>
                <td><?= h($sadr->name_of_institution) ?></td>
                <td><?= h($sadr->reporter_name) ?></td>
                <td><?= h($sadr->reporter_email) ?></td>
                <td><?= h($sadr->reporter_phone) ?></td>
                <td><?= h($sadr->created) ?></td>
                <td><span class="label label-primary"><?= 
                   ($sadr->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $sadr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span><br>
                   <span class="label label-info">                     
                     <?= $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i>', ['action' => 'view', $sadr->id, 'prefix' => false], ['escape' => false, 'style' => 'color: white;'])
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
