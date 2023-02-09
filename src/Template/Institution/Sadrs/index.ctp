<?php 
use Cake\Utility\Hash;
$this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibase', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?=     $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?=     $this->Html->script('jquery/sadr_index', ['block' => true]); ?>

<?php //pr($sadrs) ?>
<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> ADRS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('sadrs/search') ?>

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
    <?php
      // debug(array_unique(Hash::combine($sadrs->toArray(), '{n}.reviews.{n}.user[group_id=2].file', '{n}.reviews.{n}.user[group_id=2].dir')));
    ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">
                    <?= $this->Paginator->sort('id') ?>       
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col">Stages</th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>            
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sadrs as $sadr): ?>
            <?php $a = ($sadr['assigned_to']) ? '<small class="muted">'.Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$sadr->assigned_to].'</small>' : '<small class="muted">Unassigned</small>';?>
            <tr>
                <td>
                  <?php
                    echo $this->Number->format($sadr->id); 
                  ?> 
                </td>
                <td><?php
                      echo ($sadr->submitted == 2) ? $this->Html->link($sadr->reference_number, ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'class' => 'btn-zangu']) : 
                        $this->Html->link($sadr->created, ['action' => 'edit', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'class' => 'btn-zangu']) ; ?></td>
                <td><?= h($sadr->name_of_institution) ?> </td>
                <td><?= h($sadr->status) ?><br><?= $a ?></td>                
                <td>
                    <div class="readmore">
                      <?php 
                          foreach ($sadr->report_stages as $application_stage) {
                              echo "<p>".$application_stage->stage." - ".$application_stage->description." - ".h($application_stage->created)."</p>";
                          }
                      ?>
                    </div>
                </td>
                <td><?= h($sadr->modified) ?></td>        
                <td>
                    <?php if($sadr->submitted == 2) {                                        
                          echo  $this->Html->link('<span class="label label-primary"> E2B</span>', ['action' => 'e2b', $sadr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']); 
                            }
                    ?>
                                        
                     <?php
                      echo ($sadr->submitted == 2) ?
                        $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status], ['escape' => false, 'style' => 'color: white;']) :
                        '';
                     ?>
                                        
                     <?= $this->Html->link('<span class="label label-primary">PDF</span>', ['action' => 'view', $sadr->id, 'prefix' => $prefix, 'status' => $sadr->status, '_ext' => 'pdf'], ['escape' => false, 'style' => 'color: white;'])
                     ?>
              
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
