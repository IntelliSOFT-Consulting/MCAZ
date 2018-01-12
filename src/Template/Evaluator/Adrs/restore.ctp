<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<h1 class="page-header">Deleted SAE
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('adrs/search_restore') ?>

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
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adrs as $adr): ?>
            <tr>
                <td><?= $this->Number->format($adr->id) ?></td>
                <td><?php
                      echo ($adr->submitted == 2) ? $this->Html->link($adr->reference_number, ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'class' => 'btn-zangu']) : $adr->created ; ?></td>
                <td><?= h($adr->status) ?></td>
                <td><?= h($adr->modified) ?></td>
                <td>
                   <span class="label label-primary"><?php
                   echo ($adr->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $adr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>
                   <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $adr->id, 'prefix' => $prefix], ['escape' => false, 'style' => 'color: white;'])
                     ?>
                    </span>  &nbsp;
                   <span class="label label-primary">                    
                     <?= $this->Html->link('PDF', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                     ?>
                   </span>
                   <br>
                    <?php if($adr->submitted == 2 && $adr->status != 'Archived') {                                        
                          echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['action' => 'archive', $adr->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $adr->reference_number)]); 
                            }
                    ?>
                    <span class="label label-success">                     
                     <?= $this->Form->postLink(__('Restore'), ['action' => 'restoreDeleted', $adr->id], ['confirm' => __('Are you sure you want to restore # {0}?', $adr->created), 'class' => 'label-link']) ?>
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
