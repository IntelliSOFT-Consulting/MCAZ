<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>



<h1 class="page-header">Dashboard</h1>

  <div class="table-responsive">
    <div class="col-xs-6 col-sm-3">
       <h2>ADR</h2>
        <div>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #', ['model' => 'Sadrs']) ?></th>                
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sadrs as $sadr): ?>
                <tr>
                    <td><?php 
                      if($sadr->submitted == 2) {
                        echo $this->Html->link($sadr->reference_number.'&nbsp; &nbsp; <i class="text-success fa fa-check-square-o" aria-hidden="true"></i>
', ['controller' => 'Sadrs', 'action' => 'view', $sadr->id], ['escape' => false]);
                      } else {
                        echo $this->Html->link(h('ADR '.$sadr->created->i18nFormat('dd-MM-yyyy HH:mm:ss')), ['controller' => 'Sadrs', 'action' => 'view', $sadr->id]);
                      }
                      
                     ?></td>
                    <td><?= $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i>', ['controller' => 'Sadrs', 'action' => 'view', '_ext' => 'pdf', 'prefix' => false, $sadr->id], ['escape' => false])
                     ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <hr>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ', ['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->prev('< ' , ['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->numbers(['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->next(' >', ['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->last(' >>', ['model' => 'Sadrs']) ?>
                            </ul>
                            <h6><small><?= $this->Paginator->counter(['format' => __('{{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></small></h6>
                        </nav>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <h2>AEFI</h2>
        <div>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #', ['model' => 'Aefis']) ?></th>                
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aefis as $aefi): ?>
                <tr>                    
                   <td><?php 
                    if($aefi->submitted == 2) {
                      echo $this->Html->link($aefi->reference_number.'&nbsp; &nbsp; <i class="text-success fa fa-check-square-o" aria-hidden="true"></i>
', ['controller' => 'Aefis', 'action' => 'view', $aefi->id], ['escape' => false]);
                    } else {
                      echo $this->Html->link(h('AEFI '.$aefi->created->i18nFormat('dd-MM-yyyy HH:mm:ss')), ['controller' => 'Aefis', 'action' => 'view', $aefi->id]);
                    }
                    
                   ?></td>
                  <td><?= $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i>', ['controller' => 'Aefis', 'action' => 'view', '_ext' => 'pdf', 'prefix' => false, $aefi->id], ['escape' => false])
                     ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <hr>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ', ['model' => 'Aefis']) ?>
                                <?= $this->Paginator->prev('< ' , ['model' => 'Aefis']) ?>
                                <?= $this->Paginator->numbers(['model' => 'Aefis']) ?>
                                <?= $this->Paginator->next(' >', ['model' => 'Aefis']) ?>
                                <?= $this->Paginator->last(' >>', ['model' => 'Aefis']) ?>
                            </ul>
                            <h6><small><?= $this->Paginator->counter(['format' => __('{{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></small></h6>
                        </nav>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <!-- SAEFIS -->
        <h2>SAEFI</h2>
        <div>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #', ['model' => 'Saefis']) ?></th>                
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saefis as $saefi): ?>
                <tr>                    
                   <td><?php 
                    if($saefi->submitted == 2) {
                      echo $this->Html->link($saefi->reference_number.'&nbsp; &nbsp; <i class="text-success fa fa-check-square-o" aria-hidden="true"></i>
', ['controller' => 'Saefis', 'action' => 'view', $saefi->id], ['escape' => false]);
                    } else {
                      echo $this->Html->link(h('SAEFI '.$saefi->created->i18nFormat('dd-MM-yyyy HH:mm:ss')), ['controller' => 'Saefis', 'action' => 'view', $saefi->id]);
                    }
                    
                   ?></td>
                  <td><?= $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i>', ['controller' => 'Saefis', 'action' => 'view', '_ext' => 'pdf', 'prefix' => false, $saefi->id], ['escape' => false])
                     ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <hr>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ', ['model' => 'Saefis']) ?>
                                <?= $this->Paginator->prev('< ' , ['model' => 'Saefis']) ?>
                                <?= $this->Paginator->numbers(['model' => 'Saefis']) ?>
                                <?= $this->Paginator->next(' >', ['model' => 'Saefis']) ?>
                                <?= $this->Paginator->last(' >>', ['model' => 'Saefis']) ?>
                            </ul>
                            <h6><small><?= $this->Paginator->counter(['format' => __('{{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></small></h6>
                        </nav>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
       <h2>SAE</h2>
        <div>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #', ['model' => 'Adrs']) ?></th>                
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adrs as $adr): ?>
                <tr>
                     <td><?php 
                      if($adr->submitted == 2) {
                        echo $this->Html->link($adr->reference_number.'&nbsp; &nbsp; <i class="text-success fa fa-check-square-o" aria-hidden="true"></i>
', ['controller' => 'Adrs', 'action' => 'view', $adr->id], ['escape' => false]);
                      } else {
                        echo $this->Html->link(h('ADR '.$adr->created->i18nFormat('dd-MM-yyyy HH:mm:ss')), ['controller' => 'Adrs', 'action' => 'view', $adr->id]);
                      }
                      
                     ?></td>
                    <td><?= $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i>', ['controller' => 'Adrs', 'action' => 'view', '_ext' => 'pdf', 'prefix' => false, $adr->id], ['escape' => false])
                     ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <hr>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ', ['model' => 'Adrs']) ?>
                                <?= $this->Paginator->prev('< ' , ['model' => 'Adrs']) ?>
                                <?= $this->Paginator->numbers(['model' => 'Adrs']) ?>
                                <?= $this->Paginator->next(' >', ['model' => 'Adrs']) ?>
                                <?= $this->Paginator->last(' >>', ['model' => 'Adrs']) ?>
                            </ul>
                            <h6><small><?= $this->Paginator->counter(['format' => __('{{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></small></h6>
                        </nav>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </div>
    </div>
  </div>



