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
     $Submitted = isset($stats['Submitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['Submitted'] .'</small>' : '' ;
     $Manual = isset($stats['Manual']) ? '<small class="badge badge-sadr pull-right">'. $stats['Manual'] .'</small>' : '' ;
     $Imported = isset($stats['Imported']) ? '<small class="badge badge-sadr pull-right">'. $stats['Imported'] .'</small>' : '' ;
     $UnSubmitted = isset($stats['UnSubmitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['UnSubmitted'] .'</small>' : '' ;
     $Archived = isset($stats['Archived']) ? '<small class="badge badge-sadr pull-right">'. $stats['Archived'] .'</small>' : '' ;
     $E2B = isset($stats['E2B']) ? '<small class="badge badge-sadr pull-right">'. $stats['E2B'] .'</small>' : '' ;
     $VigiBase = isset($stats['VigiBase']) ? '<small class="badge badge-sadr pull-right">'. $stats['VigiBase'] .'</small>' : '' ;
     $Assigned = isset($stats['Assigned']) ? '<small class="badge badge-sadr pull-right">'. $stats['Assigned'] .'</small>' : '' ;
     $Evaluated = isset($stats['Evaluated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Evaluated'] .'</small>' : '' ;
     $Committee = isset($stats['Committee']) ? '<small class="badge badge-sadr pull-right">'. $stats['Committee'] .'</small>' : '' ;
     $FollowUp = isset($stats['FollowUp']) ? '<small class="badge badge-sadr pull-right">'. $stats['FollowUp'] .'</small>' : '' ;
     $RequestReporter = isset($stats['RequestReporter']) ? '<small class="badge badge-sadr pull-right">'. $stats['RequestReporter'] .'</small>' : '' ;
     $RequestEvaluator = isset($stats['RequestEvaluator']) ? '<small class="badge badge-sadr pull-right">'. $stats['RequestEvaluator'] .'</small>' : '' ;
     $Approved = isset($stats['Approved']) ? '<small class="badge badge-sadr pull-right">'. $stats['Approved'] .'</small>' : '' ;
     $Rejected = isset($stats['Rejected']) ? '<small class="badge badge-sadr pull-right">'. $stats['Rejected'] .'</small>' : '' ;
     $Duplicated = isset($stats['Duplicated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Duplicated'] .'</small>' : '' ;
     $aSubmitted = isset($aefi_stat['Submitted']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Submitted'] .'</small>' : '' ;
     $aManual = isset($aefi_stat['Manual']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Manual'] .'</small>' : '' ;
     $aUnSubmitted = isset($aefi_stat['UnSubmitted']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['UnSubmitted'] .'</small>' : '' ;
     $aArchived = isset($aefi_stat['Archived']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Archived'] .'</small>' : '' ;
     $aE2B = isset($aefi_stat['E2B']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['E2B'] .'</small>' : '' ;
     $aAssigned = isset($aefi_stat['Assigned']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Assigned'] .'</small>' : '' ;
     $aEvaluated = isset($aefi_stat['Evaluated']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Evaluated'] .'</small>' : '' ;
     $aCommittee = isset($aefi_stat['Committee']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Committee'] .'</small>' : '' ;
     $aFollowUp = isset($aefi_stat['FollowUp']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['FollowUp'] .'</small>' : '' ;
     $aRequestReporter = isset($aefi_stat['RequestReporter']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['RequestReporter'] .'</small>' : '' ;
     $aRequestEvaluator = isset($aefi_stat['RequestEvaluator']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['RequestEvaluator'] .'</small>' : '' ;
     $aApproved = isset($aefi_stat['Approved']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Approved'] .'</small>' : '' ;
     $aRejected = isset($aefi_stat['Rejected']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Rejected'] .'</small>' : '' ;
     $aDuplicated = isset($aefi_stat['Duplicated']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Duplicated'] .'</small>' : '' ;
     $saSubmitted = isset($saefi_stat['Submitted']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Submitted'] .'</small>' : '' ;
     $saManual = isset($saefi_stat['Manual']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Manual'] .'</small>' : '' ;
     $saUnSubmitted = isset($saefi_stat['UnSubmitted']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['UnSubmitted'] .'</small>' : '' ;
     $saArchived = isset($saefi_stat['Archived']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Archived'] .'</small>' : '' ;
     $saAssigned = isset($saefi_stat['Assigned']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Assigned'] .'</small>' : '' ;
     $saEvaluated = isset($saefi_stat['Evaluated']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Evaluated'] .'</small>' : '' ;
     $saCommittee = isset($saefi_stat['Committee']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Committee'] .'</small>' : '' ;
     $saFollowUp = isset($saefi_stat['FollowUp']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['FollowUp'] .'</small>' : '' ;
     $saRequestReporter = isset($saefi_stat['RequestReporter']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['RequestReporter'] .'</small>' : '' ;
     $saRequestEvaluator = isset($saefi_stat['RequestEvaluator']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['RequestEvaluator'] .'</small>' : '' ;
     $saApproved = isset($saefi_stat['Approved']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Approved'] .'</small>' : '' ;
     $saRejected = isset($saefi_stat['Rejected']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Rejected'] .'</small>' : '' ;
     $saDuplicated = isset($saefi_stat['Duplicated']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Duplicated'] .'</small>' : '' ;
     $rSubmitted = isset($adr_stat['Submitted']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Submitted'] .'</small>' : '' ;
     $rManual = isset($adr_stat['Manual']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Manual'] .'</small>' : '' ;
     $rUnSubmitted = isset($adr_stat['UnSubmitted']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['UnSubmitted'] .'</small>' : '' ;
     $rArchived = isset($adr_stat['Archived']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Archived'] .'</small>' : '' ;
     $rAssigned = isset($adr_stat['Assigned']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Assigned'] .'</small>' : '' ;
     $rEvaluated = isset($adr_stat['Evaluated']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Evaluated'] .'</small>' : '' ;
     $rCommittee = isset($adr_stat['Committee']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Committee'] .'</small>' : '' ;
     $rFollowUp = isset($adr_stat['FollowUp']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['FollowUp'] .'</small>' : '' ;
     $rRequestReporter = isset($adr_stat['RequestReporter']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['RequestReporter'] .'</small>' : '' ;
     $rRequestEvaluator = isset($adr_stat['RequestEvaluator']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['RequestEvaluator'] .'</small>' : '' ;
     $rApproved = isset($adr_stat['Approved']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Approved'] .'</small>' : '' ;
     $rRejected = isset($adr_stat['Rejected']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Rejected'] .'</small>' : '' ;
     $rDuplicated = isset($adr_stat['Duplicated']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Duplicated'] .'</small>' : '' ;

     $ncount = isset($ncount) ? '<small class="badge pull-right">'. $ncount .'</small>' : '' ;
  ?>
  <ul class="nav nav-sidebar nav-<?= $prefix ?>">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> &nbsp; Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>      
    </li>

    <li class="<?=  ($this->request->params['controller'] == 'Sadrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> &nbsp; ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
        <!-- Manager or evaluator -->
        <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Sadrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted '.$Submitted, ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Manual') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Manual '. $Manual , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Manual'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Imported') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Imported '. $Imported , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Imported'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned '. $Assigned , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated '. $Evaluated , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee '. $Committee , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> '. $RequestReporter , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> '. $RequestEvaluator , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved '. $Approved , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected '. $Rejected , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FollowUp') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> FollowUp '. $FollowUp , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FollowUp'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated '. $Duplicated , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $UnSubmitted , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $Archived , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'E2B') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> E2B '. $E2B , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'E2B'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'VigiBase') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> VigiBase '. $VigiBase , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'VigiBase'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Sadrs' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-sadr pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Sadrs', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
        <!-- Admin User -->
        <?php if (($prefix == 'admin') && $this->request->params['controller'] == 'Sadrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted <small class="badge badge-sadr pull-right">'. $Submitted .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Manual') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Manual <small class="badge badge-sadr pull-right">'. $Manual .'</small>', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Manual'], array('escape' => false)); ?> </li>
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
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted '. $aSubmitted , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Manual') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Manual '. $aManual , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Manual'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned '. $aAssigned , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated '. $aEvaluated , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee '. $aCommittee , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> '. $aRequestReporter , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> '. $RequestEvaluator , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved '. $aApproved , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected '. $aRejected , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FollowUp') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> FollowUp '. $aFollowUp , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FollowUp'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated '. $aDuplicated , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $aUnSubmitted , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $aArchived , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'E2B') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> E2B '. $aE2B , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'E2B'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Aefis' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-aefi pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Aefis', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Saefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> &nbsp; SAEFIS', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Saefis' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted '. $saSubmitted , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Manual') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Manual '. $saManual , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Manual'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned '. $saAssigned , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated '. $saEvaluated , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee '. $saCommittee , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> '. $saRequestReporter , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> '. $RequestEvaluator , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved '. $saApproved , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected '. $saRejected , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated '. $saDuplicated , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $saUnSubmitted , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $saArchived , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Saefis' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-saefi pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Saefis', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Adrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> &nbsp; SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Adrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted '. $rSubmitted , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Manual') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Manual '. $rManual , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Manual'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned '. $rAssigned , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Evaluated '. $rEvaluated , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee '. $rCommittee , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> '. $rRequestReporter , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestEvaluator') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Ev)</small> '. $RequestEvaluator , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestEvaluator'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved '. $rApproved , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected '. $rRejected , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Duplicates') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Duplicated '. $rDuplicated , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Duplicated'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $rUnSubmitted , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $rArchived , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
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

            <li class="<?= ($this->request->params['action'] == 'deathsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Deaths Per Year ', ['controller' => 'Reports', 'action' => 'deathsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'genderReports') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Gender reports ', ['controller' => 'Reports', 'action' => 'genderReports', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'hospitalizationsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Hospitalizations reports ', ['controller' => 'Reports', 'action' => 'hospitalizationsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
          </ul>
        <?php } ?>
    </li>
    <?php if( $prefix == 'manager') { ?>
     <li class="<?=  ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'import') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-upload" aria-hidden="true"></i> &nbsp; IMPORT', ['controller' => 'Users', 'action' => 'imports', 'prefix' => $prefix], array('escape' => false)); ?>
     </li>
    <?php }; ?>
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
    <li class="<?=  ($this->request->params['controller'] == 'Feedbacks') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-comment-o" aria-hidden="true"></i> &nbsp; USER FEEDBACK', ['controller' => 'Feedbacks', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Notifications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; ALERTS'.$ncount, ['controller' => 'Notifications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>