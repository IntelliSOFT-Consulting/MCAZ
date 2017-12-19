<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<h1 class="page-header">Dashboard</h1>

    <div class="col-xs-6 col-sm-3">
        <h3><?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?> <small class="badge"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Sadrs']) ?></small></h3>
        <ul class="list-unstyled">
          <?php foreach ($sadrs as $sadr): ?>
          <li><?= $this->Html->link($sadr->reference_number, ['controller' => 'Sadrs', 'action' => 'view', $sadr->id]);?> </li>
          <?php endforeach; ?>
        </ul
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Sadrs']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Sadrs']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Sadrs']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Sadrs']) ?>
            </ul>
        </nav>        


        <h3><?= $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?> <small class="badge"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Adrs']) ?></small></h3>
        <ul class="list-unstyled">
          <?php foreach ($adrs as $adr): ?>
          <li><?= $this->Html->link($adr->reference_number, ['controller' => 'Adrs', 'action' => 'view', $adr->id]);?> </li>
          <?php endforeach; ?>
        </ul
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Adrs']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Adrs']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Adrs']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Adrs']) ?>
            </ul>
        </nav>  
        
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">

        <h3><?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> AEFI', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?> <small class="badge"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Aefis']) ?></small></h3>
        <ul class="list-unstyled">
          <?php foreach ($aefis as $aefi): ?>
          <li><?= $this->Html->link($aefi->reference_number, ['controller' => 'Aefis', 'action' => 'view', $aefi->id], ['escape' => false]);?> </li>
          <?php endforeach; ?>
        </ul
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Aefis']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Aefis']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Aefis']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Aefis']) ?>
            </ul>
        </nav>   

         
        <h3><?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> SAEFI', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?> <small class="badge"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Saefis']) ?></small></h3>
        <ul class="list-unstyled">
          <?php foreach ($saefis as $saefi): ?>
          <li><?= $this->Html->link($saefi->reference_number, ['controller' => 'Saefis', 'action' => 'view', $saefi->id]);?> </li>
          <?php endforeach; ?>
        </ul
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Saefis']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Saefis']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Saefis']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Saefis']) ?>
            </ul>
        </nav> 

         
    </div>

    <div class="col-xs-6 col-sm-6 placeholder">
      <?= $this->Html->script('jquery/jquery.shorten', ['block' => true]); ?>
      <?= $this->cell('Notification'); ?>
    </div>
    



