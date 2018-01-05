<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibase', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> ADRS</h1>

<div class="table-responsive">
    <table class="table table-striped">
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
                      echo ($sadr->submitted == 2) ? $this->Html->link($sadr->reference_number, ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false]) : $sadr->created ; ?></td>
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
                    <?php if($sadr->submitted == 2) {                                        
                          echo  $this->Html->link('<span class="label label-primary"> E2B</span>', ['action' => 'e2b', $sadr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']); 
                            }
                    ?>
                   <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'style' => 'color: white;'])
                     ?>
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
