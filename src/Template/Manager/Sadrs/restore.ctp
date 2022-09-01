<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>
  
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>

<?php //pr($sadrs) ?>
<h1 class="page-header">Deleted ADRS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('sadrs/search_restore') ?>

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
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>                
                <?php if(isset($this->request->query['status']) && $this->request->query['status'] != 'UnSubmitted') { ?>
                <th scope="col"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th> 
                <?php } ?>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrs as $sadr): ?>
            <tr>
                <td><?= $this->Number->format($sadr->id) ?></td>
                <td><?php
                      echo ($sadr->submitted == 2) ? $this->Html->link($sadr->reference_number, ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'class' => 'btn-zangu']) : $sadr->created ; ?></td>
                <td><?= h($sadr->institution_name) ?></td>
                <td><?= h($sadr->status) ?></td>
                <td><?= h($sadr->modified) ?></td>         
                <?php if(isset($this->request->query['status']) && $this->request->query['status'] != 'UnSubmitted') { ?>       
                <td>
                    <?php if($sadr->submitted == 2 && empty($sadr->messageid)) {                                        
                           echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $sadr->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'initiate', 'confirm' => __('Are you sure you want to send report {0}?', $sadr->reference_number)]); 
                          } elseif (!empty($sadr->messageid)) {
                            echo $sadr->messageid;
                            echo  $this->Html->link('&nbsp;<span class="label label-warning"> Resubmit</span>', ['action' => 'resubmitvigibase', $sadr->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'confirm', 'confirm' => __('Are you sure you want to resubmit report {0}?', $sadr->reference_number)]); 
                          }
                    ?>
                </td>
                <?php } ?>
                <td>
                    <?php if($sadr->submitted == 2) {                                        
                          echo  $this->Html->link('<span class="label label-primary"> E2B</span>', ['action' => 'e2b', $sadr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']); 
                            }
                    ?>
                   <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'style' => 'color: white;'])
                     ?>
                    </span>  &nbsp;
                   <span class="label label-primary">                     
                     <?= $this->Html->link('PDF', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status, '_ext' => 'pdf'], ['escape' => false, 'style' => 'color: white;'])
                     ?>
                    </span>  <br>
                    <?php if($sadr->submitted == 2 && $sadr->status != 'Archived') {                                        
                          echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['action' => 'archive', $sadr->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $sadr->reference_number)]); 
                            }
                    ?>
                    <span class="label label-success">                     
                     <?= $this->Form->postLink(__('Restore'), ['action' => 'restoreDeleted', $sadr->id], ['confirm' => __('Are you sure you want to restore # {0}?', $sadr->created), 'class' => 'label-link']) ?>
                    </span> 
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
