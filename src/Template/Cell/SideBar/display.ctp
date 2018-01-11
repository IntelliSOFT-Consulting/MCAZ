  <?php
     foreach ($sadr_stats as $key => $value) {
        $stats[$value['status']] = $value['count'];
     }
     foreach ($aefi_stats as $value) {
        $aefi_stat[$value['status']] = $value['count'];
     }
     foreach ($saefi_stats as $value) {
        $saefi_stat[$value['status']] = $value['count'];
     }
     foreach ($adr_stats as $value) {
        $adr_stat[$value['status']] = $value['count'];
     }
     // pr($stats);
     $Submitted = isset($stats['Submitted']) ? $stats['Submitted'] : 0 ;
     $UnSubmitted = isset($stats['UnSubmitted']) ? $stats['UnSubmitted'] : 0 ;
     $Archived = isset($stats['Archived']) ? $stats['Archived'] : 0 ;
     $E2B = isset($stats['E2B']) ? $stats['E2B'] : 0 ;
     $VigiBase = isset($stats['VigiBase']) ? $stats['VigiBase'] : 0 ;
     $Assigned = isset($stats['Assigned']) ? $stats['Assigned'] : 0 ;
     $Evaluated = isset($stats['Evaluated']) ? $stats['Evaluated'] : 0 ;
     $Committee = isset($stats['Committee']) ? $stats['Committee'] : 0 ;
     $FollowUp = isset($stats['FollowUp']) ? $stats['FollowUp'] : 0 ;
     $RequestReporter = isset($stats['RequestReporter']) ? $stats['RequestReporter'] : 0 ;
     $RequestEvaluator = isset($stats['RequestEvaluator']) ? $stats['RequestEvaluator'] : 0 ;
     $Approved = isset($stats['Approved']) ? $stats['Approved'] : 0 ;
     $Rejected = isset($stats['Rejected']) ? $stats['Rejected'] : 0 ;
     $Duplicated = isset($stats['Duplicated']) ? $stats['Duplicated'] : 0 ;
     $aSubmitted = $aefi_stat['Submitted'] ?? 0 ;
     $aUnSubmitted = $aefi_stat['UnSubmitted'] ?? 0 ;
     $aArchived = $aefi_stat['Archived'] ?? 0 ;
     $aE2B = $aefi_stat['E2B'] ?? 0 ;
     $aAssigned = $aefi_stat['Assigned'] ?? 0;
     $aEvaluated = $aefi_stat['Evaluated'] ?? 0;
     $aCommittee = $aefi_stat['Committee'] ?? 0;
     $aFollowUp = $aefi_stat['FollowUp'] ?? 0;
     $aRequestReporter = $aefi_stat['RequestReporter'] ?? 0;
     $aRequestEvaluator = $aefi_stat['RequestEvaluator'] ?? 0;
     $aApproved = $aefi_stat['Approved'] ?? 0;
     $aRejected = $aefi_stat['Rejected'] ?? 0;
     $aDuplicated = $aefi_stat['Duplicated'] ?? 0;
     $saSubmitted = $saefi_stat['Submitted'] ?? 0;
     $saUnSubmitted = $saefi_stat['UnSubmitted'] ?? 0;
     $saArchived = $saefi_stat['Archived'] ?? 0;
     $saAssigned = $saefi_stat['Assigned'] ?? 0;
     $saEvaluated = $saefi_stat['Evaluated'] ?? 0;
     $saCommittee = $saefi_stat['Committee'] ?? 0;
     $saFollowUp = $saefi_stat['FollowUp'] ?? 0;
     $saRequestReporter = $saefi_stat['RequestReporter'] ?? 0;
     $saRequestEvaluator = $saefi_stat['RequestEvaluator'] ?? 0;
     $saApproved = $saefi_stat['Approved'] ?? 0;
     $saRejected = $saefi_stat['Rejected'] ?? 0;
     $saDuplicated = $saefi_stat['Duplicated'] ?? 0;
     $rSubmitted = $adr_stat['Submitted'] ?? 0;
     $rUnSubmitted = $adr_stat['UnSubmitted'] ?? 0;
     $rArchived = $adr_stat['Archived'] ?? 0;
     $rAssigned = $adr_stat['Assigned'] ?? 0;
     $rEvaluated = $adr_stat['Evaluated'] ?? 0;
     $rCommittee = $adr_stat['Committee'] ?? 0;
     $rFollowUp = $adr_stat['FollowUp'] ?? 0;
     $rRequestReporter = $adr_stat['RequestReporter'] ?? 0;
     $rRequestEvaluator = $adr_stat['RequestEvaluator'] ?? 0;
     $rApproved = $adr_stat['Approved'] ?? 0;
     $rRejected = $adr_stat['Rejected'] ?? 0;
     $rDuplicated = $adr_stat['Duplicated'] ?? 0;
  ?>
  <ul class="nav nav-sidebar nav-<?= $prefix ?>">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> &nbsp; Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>      
    </li>

    <li class="<?=  ($this->request->params['controller'] == 'Sadrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> &nbsp; ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
        <!-- Manager or evaluator -->
        <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Sadrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted <small class="badge badge-sadr pull-right">'. $Submitted .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned <small class="badge badge-sadr pull-right">'. $Assigned .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated <small class="badge badge-sadr pull-right">'. $Evaluated .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee <small class="badge badge-sadr pull-right">'. $Committee .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> <small class="badge badge-sadr pull-right">'. $RequestReporter .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> <small class="badge badge-sadr pull-right">'. $RequestEvaluator .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved <small class="badge badge-sadr pull-right">'. $Approved .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected <small class="badge badge-sadr pull-right">'. $Rejected .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FollowUp') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> FollowUp <small class="badge badge-sadr pull-right">'. $FollowUp .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FollowUp'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated <small class="badge badge-sadr pull-right">'. $Duplicated .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted <small class="badge badge-sadr pull-right">'. $UnSubmitted .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived <small class="badge badge-sadr pull-right">'. $Archived .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'E2B') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> E2B <small class="badge badge-sadr pull-right">'. $E2B .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'E2B'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'VigiBase') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Vigibase <small class="badge badge-sadr pull-right">'. $VigiBase .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'VigiBase'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Sadrs' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-sadr pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Sadrs', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
        <!-- Admin User -->
        <?php if (($prefix == 'admin') && $this->request->params['controller'] == 'Sadrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted <small class="badge badge-sadr pull-right">'. $Submitted .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned <small class="badge badge-sadr pull-right">'. $Assigned .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated <small class="badge badge-sadr pull-right">'. $Evaluated .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee <small class="badge badge-sadr pull-right">'. $Committee .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> <small class="badge badge-sadr pull-right">'. $RequestReporter .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> <small class="badge badge-sadr pull-right">'. $RequestEvaluator .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved <small class="badge badge-sadr pull-right">'. $Approved .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected <small class="badge badge-sadr pull-right">'. $Rejected .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FollowUp') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> FollowUp <small class="badge badge-sadr pull-right">'. $FollowUp .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FollowUp'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated <small class="badge badge-sadr pull-right">'. $Duplicated .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted <small class="badge badge-sadr pull-right">'. $UnSubmitted .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived <small class="badge badge-sadr pull-right">'. $Archived .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Aefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; AEFIS', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Aefis' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted <small class="badge badge-aefi pull-right">'. $aSubmitted.'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned <small class="badge badge-aefi pull-right">'. $aAssigned .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated <small class="badge badge-aefi pull-right">'. $aEvaluated .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee <small class="badge badge-aefi pull-right">'. $aCommittee .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> <small class="badge badge-aefi pull-right">'. $aRequestReporter .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> <small class="badge badge-aefi pull-right">'. $RequestEvaluator .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved <small class="badge badge-aefi pull-right">'. $aApproved .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected <small class="badge badge-aefi pull-right">'. $aRejected .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FollowUp') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> FollowUp <small class="badge badge-aefi pull-right">'. $aFollowUp .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FollowUp'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated <small class="badge badge-aefi pull-right">'. $aDuplicated .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted <small class="badge badge-aefi pull-right">'. $aUnSubmitted .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived <small class="badge badge-aefi pull-right">'. $aArchived .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'E2B') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> E2B <small class="badge badge-aefi pull-right">'. $aE2B .'</small>', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'E2B'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Aefis' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-aefi pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Aefis', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Saefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> &nbsp; SAEFIS', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Saefis' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted <small class="badge badge-saefi pull-right">'. $saSubmitted.'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned <small class="badge badge-saefi pull-right">'. $saAssigned .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated <small class="badge badge-saefi pull-right">'. $saEvaluated .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee <small class="badge badge-saefi pull-right">'. $saCommittee .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> <small class="badge badge-saefi pull-right">'. $saRequestReporter .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> <small class="badge badge-saefi pull-right">'. $RequestEvaluator .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved <small class="badge badge-saefi pull-right">'. $saApproved .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected <small class="badge badge-saefi pull-right">'. $saRejected .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated <small class="badge badge-saefi pull-right">'. $saDuplicated .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted <small class="badge badge-saefi pull-right">'. $saUnSubmitted .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived <small class="badge badge-saefi pull-right">'. $saArchived .'</small>', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Saefis' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-saefi pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Saefis', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Adrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> &nbsp; SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Adrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted <small class="badge badge-adr pull-right">'. $rSubmitted.'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned <small class="badge badge-adr pull-right">'. $rAssigned .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated <small class="badge badge-adr pull-right">'. $rEvaluated .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee <small class="badge badge-adr pull-right">'. $rCommittee .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> <small class="badge badge-adr pull-right">'. $rRequestReporter .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> <small class="badge badge-adr pull-right">'. $RequestEvaluator .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved <small class="badge badge-adr pull-right">'. $rApproved .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected <small class="badge badge-adr pull-right">'. $rRejected .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated <small class="badge badge-adr pull-right">'. $rDuplicated .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted <small class="badge badge-adr pull-right">'. $rUnSubmitted .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived <small class="badge badge-adr pull-right">'. $rArchived .'</small>', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Adrs' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-adr pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Adrs', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] === 'Reports') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;REPORTS', ['controller' => 'Reports', 'action' => 'index', 'prefix' => false], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && ($this->request->params['controller'] === 'Reports')) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= ($this->request->params['action'] == 'sadrsPerProvince') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Sadr Per Province ', ['controller' => 'Reports', 'action' => 'sadrsPerProvince', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'sadrsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Sadr Per Year ', ['controller' => 'Reports', 'action' => 'sadrsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'sadrsPerCausality') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Sadr Per Causality ', ['controller' => 'Reports', 'action' => 'sadrsPerCausality', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'aefisPerProvince') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Aefis Per Province ', ['controller' => 'Reports', 'action' => 'aefisPerProvince', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'aefisPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Aefis Per Year ', ['controller' => 'Reports', 'action' => 'aefisPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
          </ul>
        <?php } ?>
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
    <li class="<?=  ($this->request->params['controller'] == 'Sites') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-code" aria-hidden="true"></i> &nbsp; Front end Pages', ['controller' => 'Sites', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Facilities') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-hospital-o" aria-hidden="true"></i> &nbsp; Facilities', ['controller' => 'Facilities', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <?php }; ?>
    <li class="<?=  ($this->request->params['controller'] == 'Notifications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; NOTIFICATIONS', ['controller' => 'Notifications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>