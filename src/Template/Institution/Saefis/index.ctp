<?php 
use Cake\Utility\Hash;
$this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibasenew', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?=     $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?=     $this->Html->script('jquery/saefi_index', ['block' => true]); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> SAEFIS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('saefis/search') ?>

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
                        <?= $this->Paginator->sort('id') ?>         
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saefis as $saefi): ?>
            <?php $a = ($saefi['assigned_to']) ? '<small class="muted">'.Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$saefi->assigned_to].'</small>' : '<small class="muted">Unassigned</small>';?>
            <tr>
                <td><?php
                  echo $this->Number->format($saefi->id);
                  ?>                    
                </td>
                <td><?php
                      echo ($saefi->submitted == 2) ? $this->Html->link($saefi->reference_number, ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false, 'class' => 'btn-zangu']) : 
                        $this->Html->link($saefi->created, ['action' => 'edit', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false, 'class' => 'btn-zangu']) ; ?></td>
                <td><?= h($saefi->reference_number) ?></td>
                <td><?= h($saefi->status) ?><br><?= $a ?></td>
                <td><?= h($saefi->modified) ?></td>
                <td>
                    <?php
                    echo ($saefi->submitted == 2) ?  $this->Html->link('<span class="label label-primary">E2B</span>', ['action' => 'e2b', $saefi->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; 
                    ?>
                                      
                    <?php
                        echo $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status], ['escape' => false, 'style' => 'color: white;']) 
                     ?>

                                       
                     <?= $this->Html->link('<span class="label label-primary">PDF</span>', ['action' => 'view', $saefi->id, 'prefix' => $prefix, 'status' => $saefi->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                     ?>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
