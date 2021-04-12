<?php 
use Cake\Utility\Hash;
$this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibase', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?=     $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?=     $this->Html->script('jquery/adr_index', ['block' => true]); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> SAE
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('adrs/search') ?>

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
                <th scope="col">
                  <div class="input checkbox">
                      <label for="selectall"><input type="checkbox" name="selectall" value="1" checked="checked" id="selectall">
                        <?= $this->Paginator->sort('id') ?>
                      </label>
                  </div>            
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('messageid', 'VigiBase') ?></th> 
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adrs as $adr): ?>
            <?php $a = ($adr['assigned_to']) ? '<small class="muted">'.Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$adr->assigned_to].'</small>' : '<small class="muted">Unassigned</small>';?>

            <tr>
                <td><?php
                  //$this->Number->format($adr->id) 
                    echo $this->Form->control('active'.$adr->id, ['label' => '.'.$adr->id, 'type' => 'checkbox', 
                      'data-url' => $this->Url->build(['action' => 'restoreDeleted', $adr->id, '_ext' => 'json']), 
                      'templates' => ($prefix == 'manager' || $prefix == 'evaluator') ? '' : 'view_form_checkbox', 
                      'checked' => $adr->active, 'hiddenField' => false ]);
                      ?>                      
                </td>
                <td><?php
                      echo ($adr->submitted == 2) ? $this->Html->link($adr->reference_number, ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'class' => 'btn-zangu']) : 
                        $this->Html->link($adr->created, ['action' => 'edit', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'class' => 'btn-zangu']) ; ?></td>
                <td><?= h($adr->status) ?><br><?= $a ?><br><?= $adr->report_type ?></td>
                <td><?= h($adr->modified) ?></td>
                <td>
                    <?php if($adr->submitted == 2 && empty($adr->messageid)) {                                        
                           echo  $this->Html->link('&nbsp;<span class="label label-success"> VigiBase</span>', ['action' => 'vigibase', $adr->id, '_ext' => 'json', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;', 'class' => 'vigibase']); 
                          } elseif (!empty($adr->messageid)) {
                            echo $adr->messageid;
                          }
                    ?>
                </td>
                <td>
                   <span class="label label-primary"><?php
                   echo ($adr->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $adr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>
                   
                    <?php
                      echo ($adr->submitted == 2) ?
                        $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'style' => 'color: white;']) :
                        $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'style' => 'color: white;']);
                    ?>

                   <span class="label label-primary">                    
                     <?= $this->Html->link('PDF', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                     ?>
                   </span>
                   <br>
                    <?php if($adr->submitted == 2 && $adr->status != 'Archived') {                                        
                          echo  $this->Form->postLink('<span class="label label-default"> Archive</span>', ['action' => 'archive', $adr->id, 'prefix' => $prefix], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to archive report {0}?', $adr->reference_number)]); 
                            }
                    ?>
                    <?php if($adr->submitted == 0) { ?>
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
