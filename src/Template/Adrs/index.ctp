<?php

use Cake\Utility\Hash;

$this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> SAE
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search,
        <i class="fa fa-filter" aria-hidden="true"></i>Filter or
        <i class="fa fa-download" aria-hidden="true"></i> Download Reports</small>
</h1>

<?= $this->element('adrs/search_mini') ?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('report_type', 'Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $filtered = [];
            foreach ($adrs as $sample) : ?>
                <?php
                // check if the  $filtered  is empty
                if (empty($filtered)) {
                    $filtered[] = $sample;
                } else {
                    // 
                    if (($sample->submitted == 2)) {
                        if (!in_array($sample->reference_number, Hash::extract($filtered, '{n}.reference_number'))) {
                            $filtered[] = $sample;
                        }
                    } else {
                        $filtered[] = $sample;
                    }
                }

                ?>
            <?php endforeach;
            foreach ($filtered as $adr) : ?>
                <tr>
                    <td><?= $this->Number->format($adr->id) ?></td>
                    <td><?php
                        echo ($adr->submitted == 2) ?
                            $this->Html->link($adr->reference_number, ['action' => 'view', $adr->id, 'status' => $adr->status], ['escape' => false, 'class' => 'btn-zangu']) :
                            $this->Html->link($adr->created, ['action' => 'edit', $adr->id, 'status' => $adr->status], ['escape' => false, 'class' => 'btn-zangu']); ?>
                    </td>
                    <td><?= h($adr->status) ?></td>
                    <td><?= h($adr->report_type) ?></td>
                    <td><?= h($adr->modified) ?></td>
                    <td>
                        <span class="label label-primary">
                            <?= $this->Html->link('View', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'class' => 'label-link'])
                            ?>
                        </span> &nbsp;
                        <span class="label label-primary">
                            <?= $this->Html->link('PDF', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                            ?>
                        </span> &nbsp;
                        <?php if ($adr->submitted == 0 or $adr->submitted == 1) { ?>
                            <span class="label label-danger">
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adr->id), 'class' => 'label-link']) ?>
                            </span>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>