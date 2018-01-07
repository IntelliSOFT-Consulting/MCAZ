<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibase', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>

<?php //pr($sadrs) ?>
<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> ADRS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('sadrs/search_mini') ?>
    
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrs as $sadr): ?>
            <tr>
                <td><?= $this->Number->format($sadr->id) ?></td>
                <td><?php
                      echo ($sadr->submitted == 2) ? 
                        $this->Html->link($sadr->reference_number, ['action' => 'view', $sadr->id, 'status' => $sadr->status], ['escape' => false, 'class' => 'btn-zangu']) : 
                        $this->Html->link($sadr->created, ['action' => 'edit', $sadr->id, 'status' => $sadr->status], ['escape' => false, 'class' => 'btn-zangu']) ; ?>
                </td>
                <td><?= h($sadr->name_of_institution) ?></td>
                <td><?= h($sadr->status) ?></td>
                <td><?= h($sadr->modified) ?></td>                
                <td>
                    <?php if($sadr->submitted == 2 && empty($sadr->messageid)) {                                        
                           echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $sadr->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'vigibase']); 
                          } elseif (!empty($sadr->messageid)) {
                            echo $sadr->messageid;
                          }
                    ?>
                </td>
                <td>
                   <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'class' => 'label-link'])
                     ?>
                    </span> &nbsp;
                   <span class="label label-primary">                    
                     <?= $this->Html->link('PDF', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                     ?>
                    </span>  &nbsp;
                    <?php if($sadr->submitted == 0) { ?>
                    <span class="label label-danger">                     
                     <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sadr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadr->id), 'class' => 'label-link']) ?>
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
