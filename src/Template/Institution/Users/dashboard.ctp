<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
<h2 class="page-header"> 
<?php if($prefix == 'institution') { ?>
    <?php
              echo $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> '.$this->request->session()->read('Auth.User.name_of_institution').':: manage users', ['controller' => 'Users', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu'));
    ?>
<?php } ?>
</h2>
    <div class="col-sm-7">
      <h6><em><small>Showing only recent reports</small></em></h6>
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <!-- begin -->
            <div class="col-xs-6 col-sm-6">
                <h3><?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-sadr"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Sadrs']) ?></small></h3>
                <ul class="list-unstyled">
                  <?php foreach ($sadrs as $sadr): ?>
                  <li><?= $this->Html->link($sadr->reference_number, ['controller' => 'Sadrs', 'action' => 'view', $sadr->id], ['escape' => false]);?>  </li>
                  <?php endforeach; ?>
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'Sadrs']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'Sadrs']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'Sadrs']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'Sadrs']) ?>
                    </ul>
                </nav>        


                <h3><?= $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-adr"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Adrs']) ?></small></h3>
                <ul class="list-unstyled">
                  <?php foreach ($adrs as $adr): ?>
                  <li><?= $this->Html->link($adr->reference_number, ['controller' => 'Adrs', 'action' => 'view', $adr->id], ['escape' => false]);?> </li>
                  <?php endforeach; ?>
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'Adrs']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'Adrs']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'Adrs']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'Adrs']) ?>
                    </ul>
                </nav>  
                


            </div>
            <div class="col-xs-6 col-sm-6 placeholder">

                <h3><?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> AEFI', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-aefi"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Aefis']) ?></small></h3>
                <ul class="list-unstyled">
                  <?php foreach ($aefis as $aefi): ?>
                  <li><?= $this->Html->link($aefi->reference_number, ['controller' => 'Aefis', 'action' => 'view', $aefi->id], ['escape' => false]);?> </li>
                  <?php endforeach; ?>
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'Aefis']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'Aefis']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'Aefis']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'Aefis']) ?>
                    </ul>
                </nav>   

                 
                <h3><?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> SAEFI', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-saefi"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Saefis']) ?></small></h3>
                <ul class="list-unstyled">
                  <?php foreach ($saefis as $saefi): ?>
                  <li><?= $this->Html->link($saefi->reference_number, ['controller' => 'Saefis', 'action' => 'view', $saefi->id], ['escape' => false]);?> </li>
                  <?php endforeach; ?>
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'Saefis']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'Saefis']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'Saefis']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'Saefis']) ?>
                    </ul>
                </nav> 
                 
            </div>
            <!-- end -->
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              
                <!-- Company e2bs -->
                <h3 class="btn-zangu"><?= $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> E2B Files', ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge" style="background-color: #7f7fff;"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Ce2bs']) ?></small></h3>
                <hr>       
                <ul class="list-unstyled">
                  <?php 
                    $i = 1;
                    foreach ($ce2bs as $ce2b): ?>
                  <li><?php 
                                // echo $i++.'. '.$this->Html->link('<span class="text-success">'.$ce2b->reference_number.' &nbsp; &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>', ['controller' => 'Ce2bs', 'action' => 'view', $ce2b->id], ['escape' => false]);
                    echo $i++.'. '.$this->Html->link('<span class="text-success">'.$ce2b->reference_number.' <small class="muted">'.$ce2b->e2b_file.'</small>', ['controller' => 'Ce2bs', 'action' => 'view', $ce2b->id], ['escape' => false]);
                              
                   ?></li>
                  <?php endforeach; ?>
                </ul>
                <nav aria-label="Page navigation">
                    <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Ce2bs']) ?></small></h6>
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'Ce2bs']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'Ce2bs']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'Ce2bs']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'Ce2bs']) ?>
                    </ul>
                </nav> 
            </div>
          </div>

          

        </div>
      </div>
    </div>

    <div class="col-xs-6 col-sm-5 placeholder">
      <?= $this->Html->script('jquery/jquery.shorten', ['block' => true]); ?>
      <?= $this->cell('Notification'); ?>
    </div>
    

</div>
