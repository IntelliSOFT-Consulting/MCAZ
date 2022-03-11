<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\facility $facility
 */
?>
<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>
<div class="facilitys view large-9 medium-8 columns content">
    <h3><?= h($facility->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Facility Code') ?></th>
            <td><?= h($facility->facility_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('dhis2_code') ?></th>
            <td><?= h($facility->dhis2_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('district') ?></th>
            <td><?= h($facility->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('facility_name') ?></th>
            <td><?= h($facility->facility_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('longitude') ?></th>
            <td><?= h($facility->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('latitude') ?></th>
            <td><?= h($facility->latitude) ?></td>
        </tr>
    </table>
</div>
