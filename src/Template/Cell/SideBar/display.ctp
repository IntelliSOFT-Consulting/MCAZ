  <?php
     foreach ($sadr_stats as $key => $value) {
        $stats[$value['status']] = $value['count'];
     }
     // pr($stats);
     $Submitted = isset($stats['Submitted']) ? $stats['Submitted'] : 0 ;
     $UnSubmitted = isset($stats['']) ? $stats[''] : 0 ;
     $Assigned = isset($stats['Assigned']) ? $stats['Assigned'] : 0 ;
     $Evaluated = isset($stats['Evaluated']) ? $stats['Evaluated'] : 0 ;
     $Committee = isset($stats['Committee']) ? $stats['Committee'] : 0 ;
     $FollowUp = isset($stats['FollowUp']) ? $stats['FollowUp'] : 0 ;
     $RequestReporter = isset($stats['RequestReporter']) ? $stats['RequestReporter'] : 0 ;
     $RequestEvaluator = isset($stats['RequestEvaluator']) ? $stats['RequestEvaluator'] : 0 ;
     $Approved = isset($stats['Approved']) ? $stats['Approved'] : 0 ;
     $Rejected = isset($stats['Rejected']) ? $stats['Rejected'] : 0 ;
     $Duplicated = isset($stats['Duplicated']) ? $stats['Duplicated'] : 0 ;
  ?>
  <ul class="nav nav-sidebar nav-<?= $prefix ?>">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> &nbsp; Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>      
    </li>

    <li class="<?=  ($this->request->params['controller'] == 'Sadrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> &nbsp; ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
        <?php if ($prefix == 'manager' && $this->request->params['controller'] == 'Sadrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Submitted <small class="badge">'. $Submitted .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp;  <i class="fa fa-minus" aria-hidden="true"></i> Assigned <small class="badge">'. $Assigned .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp;  <i class="fa fa-minus" aria-hidden="true"></i> Evaluated <small class="badge">'. $Evaluated .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp;  <i class="fa fa-minus" aria-hidden="true"></i> Committee <small class="badge">'. $Committee .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> <small class="badge">'. $RequestReporter .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> <small class="badge">'. $RequestEvaluator .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Approved <small class="badge">'. $Approved .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Rejected <small class="badge">'. $Rejected .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FollowUp') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> FollowUp <small class="badge">'. $FollowUp .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FollowUp'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Duplicated <small class="badge">'. $Duplicated .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('&nbsp;&nbsp; &nbsp; <i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted <small class="badge">'. $UnSubmitted .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Aefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; AEFIS', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Saefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> &nbsp; SAEFIS', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Adrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> &nbsp; SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <?php if( $prefix == 'admin') { ?>
     <li class="<?=  ($this->request->params['controller'] == 'Users' && $this->request->params['action'] != 'dashboard') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> &nbsp; USERS', ['controller' => 'Users', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Messages') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> &nbsp; Message Templates', ['controller' => 'Messages', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <?php }; ?>
  </ul>