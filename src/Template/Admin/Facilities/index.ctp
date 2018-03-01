<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> New Facility', ['action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;
<?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> List Facilities', ['action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-warning')); ?>

<hr>
<h1 class="page-header">FACILITIES</h1>

<div class="facilitys index large-9 medium-8 columns content">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('facility_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dhis2_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facility_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col">Actions</th>
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
                <td>
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $facility->id, 'prefix' => $prefix], array('escape' => false));  ?>
                    <?= $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'edit', $facility->id, 'prefix' => $prefix], array('escape' => false));  ?>
                    <?= $this->Form->postLink('<span class="label label-danger">Delete</span>', ['action' => 'delete', $facility->id, 'prefix' => $prefix], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $facility->id)]) ?>
                              

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
