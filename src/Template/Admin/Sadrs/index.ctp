<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">ADRS</h1>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('institution_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrs as $sadr): ?>
            <tr>
                <td><?= $this->Number->format($sadr->id) ?></td>
                <td><?= h($sadr->reference_number) ?></td>
                <td><?= h($sadr->institution_name) ?></td>
                <td><?= h($sadr->reporter_name) ?></td>
                <td><?= h($sadr->reporter_email) ?></td>
                <td><?= h($sadr->reporter_phone) ?></td>
                <td><?= h($sadr->created) ?></td>
                <td><?= h($sadr->modified) ?></td>
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
