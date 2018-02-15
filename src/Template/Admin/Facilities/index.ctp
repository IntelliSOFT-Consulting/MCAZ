<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<div class="facilitys index large-9 medium-8 columns content">
    <h3><?= __('Facilities') ?></h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('facility_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dhis2_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facility_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facilities as $facility): ?>
            <tr>
                <td><?= h($facility->facility_code) ?></td>
                <td><?= h($facility->dhis2_code) ?></td>
                <td><?= h($facility->district) ?></td>
                <td><?= h($facility->facility_name) ?></td>
                <td><?= h($facility->longitude) ?></td>
                <td><?= h($facility->latitude) ?></td>
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
