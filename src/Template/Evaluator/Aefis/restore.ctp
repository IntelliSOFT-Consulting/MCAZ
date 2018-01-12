<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Deleted AEFIS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('aefis/search_restore') ?>

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
                      echo ($aefi->submitted == 2) ? $this->Html->link($aefi->reference_number, ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'class' => 'btn-zangu']) : $aefi->created ; ?></td>
                <td><?= h($aefi->name_of_vaccination_center) ?></td>
                <td><?= h($aefi->status) ?></td>
                <td><?= h($aefi->modified) ?></td>
                <td>
<span class="label label-primary"><?php
                   echo ($aefi->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $aefi->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>
                   <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $aefi->id, 'prefix' => $prefix], ['escape' => false, 'style' => 'color: white;'])
                     ?>
                    </span>  &nbsp;
                   <span class="label label-primary">                    
                     <?= $this->Html->link('PDF', ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                     ?>
                   </span>
                   <br>
                    <?php if($aefi->submitted == 2 && $aefi->status != 'Archived') {                                        
                          echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['action' => 'archive', $aefi->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $aefi->reference_number)]); 
                            }
                    ?>
                    <span class="label label-success">                     
                     <?= $this->Form->postLink(__('Restore'), ['action' => 'restoreDeleted', $aefi->id], ['confirm' => __('Are you sure you want to restore # {0}?', $aefi->created), 'class' => 'label-link']) ?>
                    </span> 
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
