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
     foreach ($ce2b_stats as $value) {
        $ce2b_stat[$value['status']] = $value['count'];
     }
     // pr($stats);
     $Submitted = isset($stats['Submitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['Submitted'] .'</small>' : '' ;
     $Assigned = isset($stats['Assigned']) ? '<small class="badge badge-sadr pull-right">'. $stats['Assigned'] .'</small>' : '' ;
     $Evaluated = isset($stats['Evaluated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Evaluated'] .'</small>' : '' ;
     $UnSubmitted = isset($stats['UnSubmitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['UnSubmitted'] .'</small>' : '' ;
     $Archived = isset($stats['Archived']) ? '<small class="badge badge-sadr pull-right">'. $stats['Archived'] .'</small>' : '' ;
     $E2B = isset($stats['E2B']) ? '<small class="badge badge-sadr pull-right">'. $stats['E2B'] .'</small>' : '' ;
     $VigiBase = isset($stats['VigiBase']) ? '<small class="badge badge-sadr pull-right">'. $stats['VigiBase'] .'</small>' : '' ;
     $Committee = isset($stats['Committee']) ? '<small class="badge badge-sadr pull-right">'. $stats['Committee'] .'</small>' : '' ;
     $Correspondence = isset($stats['Correspondence']) ? '<small class="badge badge-sadr pull-right">'. $stats['Correspondence'] .'</small>' : '' ;
     $FollowUp = isset($stats['FollowUp']) ? '<small class="badge badge-sadr pull-right">'. $stats['FollowUp'] .'</small>' : '' ;
     $ApplicantResponse = isset($stats['ApplicantResponse']) ? '<small class="badge badge-sadr pull-right">'. $stats['ApplicantResponse'] .'</small>' : '' ;
     $Presented = isset($stats['Presented']) ? '<small class="badge badge-sadr pull-right">'. $stats['Presented'] .'</small>' : '' ;
     $FinalFeedback = isset($stats['FinalFeedback']) ? '<small class="badge badge-sadr pull-right">'. $stats['FinalFeedback'] .'</small>' : '' ;
     $Duplicated = isset($stats['Duplicated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Duplicated'] .'</small>' : '' ;

     $aSubmitted = isset($aefi_stat['Submitted']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Submitted'] .'</small>' : '' ;
     $aAssigned = isset($aefi_stat['Assigned']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Assigned'] .'</small>' : '' ;
     $aEvaluated = isset($aefi_stat['Evaluated']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Evaluated'] .'</small>' : '' ;
     $aManual = isset($aefi_stat['Manual']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Manual'] .'</small>' : '' ;
     $aUnSubmitted = isset($aefi_stat['UnSubmitted']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['UnSubmitted'] .'</small>' : '' ;
     $aArchived = isset($aefi_stat['Archived']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Archived'] .'</small>' : '' ;
     $aE2B = isset($aefi_stat['E2B']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['E2B'] .'</small>' : '' ;
     $aCommittee = isset($aefi_stat['Committee']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Committee'] .'</small>' : '' ;
     $aCorrespondence = isset($aefi_stat['Correspondence']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Correspondence'] .'</small>' : '' ;
     $aFollowUp = isset($aefi_stat['FollowUp']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['FollowUp'] .'</small>' : '' ;
     $aApplicantResponse = isset($aefi_stat['ApplicantResponse']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['ApplicantResponse'] .'</small>' : '' ;
     $aPresented = isset($aefi_stat['Presented']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Presented'] .'</small>' : '' ;
     $aFinalFeedback = isset($aefi_stat['FinalFeedback']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['FinalFeedback'] .'</small>' : '' ;
     $aVigiBase = isset($aefi_stat['VigiBase']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['VigiBase'] .'</small>' : '' ;
     $aDuplicated = isset($aefi_stat['Duplicated']) ? '<small class="badge badge-aefi pull-right">'. $aefi_stat['Duplicated'] .'</small>' : '' ;

     $saSubmitted = isset($saefi_stat['Submitted']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Submitted'] .'</small>' : '' ;
     $saAssigned = isset($saefi_stat['Assigned']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Assigned'] .'</small>' : '' ;
     $saEvaluated = isset($saefi_stat['Evaluated']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Evaluated'] .'</small>' : '' ;
     $saManual = isset($saefi_stat['Manual']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Manual'] .'</small>' : '' ;
     $saUnSubmitted = isset($saefi_stat['UnSubmitted']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['UnSubmitted'] .'</small>' : '' ;
     $saArchived = isset($saefi_stat['Archived']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Archived'] .'</small>' : '' ;
     $saCommittee = isset($saefi_stat['Committee']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Committee'] .'</small>' : '' ;
     $saCorrespondence = isset($saefi_stat['Correspondence']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Correspondence'] .'</small>' : '' ;
     $saFollowUp = isset($saefi_stat['FollowUp']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['FollowUp'] .'</small>' : '' ;
     $saApplicantResponse = isset($saefi_stat['ApplicantResponse']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['ApplicantResponse'] .'</small>' : '' ;
     $saPresented = isset($saefi_stat['Presented']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Presented'] .'</small>' : '' ;
     $saFinalFeedback = isset($saefi_stat['FinalFeedback']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['FinalFeedback'] .'</small>' : '' ;
     $saVigiBase = isset($saefi_stat['VigiBase']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['VigiBase'] .'</small>' : '' ;
     $saDuplicated = isset($saefi_stat['Duplicated']) ? '<small class="badge badge-saefi pull-right">'. $saefi_stat['Duplicated'] .'</small>' : '' ;

     $rSubmitted = isset($adr_stat['Submitted']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Submitted'] .'</small>' : '' ;
     $rAssigned = isset($adr_stat['Assigned']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Assigned'] .'</small>' : '' ;
     $rEvaluated = isset($adr_stat['Evaluated']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Evaluated'] .'</small>' : '' ;
     $rManual = isset($adr_stat['Manual']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Manual'] .'</small>' : '' ;
     $rUnSubmitted = isset($adr_stat['UnSubmitted']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['UnSubmitted'] .'</small>' : '' ;
     $rArchived = isset($adr_stat['Archived']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Archived'] .'</small>' : '' ;
     $rCommittee = isset($adr_stat['Committee']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Committee'] .'</small>' : '' ;
     $rCorrespondence = isset($adr_stat['Correspondence']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Correspondence'] .'</small>' : '' ;
     $rFollowUp = isset($adr_stat['FollowUp']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['FollowUp'] .'</small>' : '' ;
     $rApplicantResponse = isset($adr_stat['ApplicantResponse']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['ApplicantResponse'] .'</small>' : '' ;
     $rPresented = isset($adr_stat['Presented']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Presented'] .'</small>' : '' ;
     $rFinalFeedback = isset($adr_stat['FinalFeedback']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['FinalFeedback'] .'</small>' : '' ;
     $rVigiBase = isset($adr_stat['VigiBase']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['VigiBase'] .'</small>' : '' ;
     $rDuplicated = isset($adr_stat['Duplicated']) ? '<small class="badge badge-adr pull-right">'. $adr_stat['Duplicated'] .'</small>' : '' ;

     $cSubmitted = isset($ce2b_stat['Submitted']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Submitted'] .'</small>' : '' ;
     $cAssigned = isset($ce2b_stat['Assigned']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Assigned'] .'</small>' : '' ;
     $cEvaluated = isset($ce2b_stat['Evaluated']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Evaluated'] .'</small>' : '' ;
     $cManual = isset($ce2b_stat['Manual']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Manual'] .'</small>' : '' ;
     $cUnSubmitted = isset($ce2b_stat['UnSubmitted']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['UnSubmitted'] .'</small>' : '' ;
     $cArchived = isset($ce2b_stat['Archived']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Archived'] .'</small>' : '' ;
     $cCommittee = isset($ce2b_stat['Committee']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Committee'] .'</small>' : '' ;
     $cCorrespondence = isset($ce2b_stat['Correspondence']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Correspondence'] .'</small>' : '' ;
     $cFollowUp = isset($ce2b_stat['FollowUp']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['FollowUp'] .'</small>' : '' ;
     $cApplicantResponse = isset($ce2b_stat['ApplicantResponse']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['ApplicantResponse'] .'</small>' : '' ;
     $cPresented = isset($ce2b_stat['Presented']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Presented'] .'</small>' : '' ;
     $cFinalFeedback = isset($ce2b_stat['FinalFeedback']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['FinalFeedback'] .'</small>' : '' ;
     $cVigiBase = isset($ce2b_stat['VigiBase']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['VigiBase'] .'</small>' : '' ;
     $cDuplicated = isset($ce2b_stat['Duplicated']) ? '<small class="badge badge-ce2b pull-right">'. $ce2b_stat['Duplicated'] .'</small>' : '' ;

     $ncount = isset($ncount) ? '<small class="badge pull-right">'. $ncount .'</small>' : '' ;
  ?>
  <ul class="nav nav-sidebar nav-<?= $prefix ?>">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> &nbsp; Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>      
    </li>

        <!-- Manager or evaluator -->
    <?php if($prefix != 'admin') { ?>
    <li class="<?=  ($this->request->params['controller'] == 'Sadrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> &nbsp; ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
        <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Sadrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li><a href="#" style="text-decoration: underline; padding-left: 15px;">REPORT STAGES</a></li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<b>1.</b> Submitted '.$Submitted, ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<b>2.</b> Assigned '. $Assigned , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<b>3.</b> Evaluated '. $Evaluated , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<b>4.</b> Committee '. $Committee , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Correspondence') ? 'active' : ''; ?>"><?= $this->Html->link('<b>5.</b> Correspondence '. $Correspondence , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Correspondence'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ApplicantResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<b>6.</b> Response '. $ApplicantResponse , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'ApplicantResponse'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Presented') ? 'active' : ''; ?>"><?= $this->Html->link('<b>7.</b> PVCT 2 '. $Presented , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Presented'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FinalFeedback') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> Feedback '. $FinalFeedback , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FinalFeedback'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'VigiBase') ? 'active' : ''; ?>"><?= $this->Html->link('<b>9.</b> VigiBase '. $VigiBase , ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'VigiBase'], array('escape' => false)); ?> </li>   

            <li><a href="#" style="text-decoration: underline; padding-left: 15px;">OTHERS</a></li>

            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $UnSubmitted , ['controller' => 'Sadrs', 'action' => 'index', 'status' => 'UnSubmitted', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $Archived , ['controller' => 'Sadrs', 'action' => 'index', 'status' => 'Archived', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Sadrs' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore archived <small class="badge badge-sadr pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Sadrs', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>

          </ul>     
        <?php } ?>  
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Aefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; AEFIs', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Aefis' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li><a href="#" style="text-decoration: underline; padding-left: 15px;">REPORT STAGES</a></li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<b>1.</b> Submitted '. $aSubmitted , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<b>2.</b> Assigned '. $aAssigned , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<b>3.</b> Evaluated '. $aEvaluated , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>     
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<b>4.</b> Committee '. $aCommittee , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Correspondence') ? 'active' : ''; ?>"><?= $this->Html->link('<b>5.</b> Correspondence '. $aCorrespondence , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Correspondence'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ApplicantResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<b>6.</b> Response '. $aApplicantResponse , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'ApplicantResponse'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Presented') ? 'active' : ''; ?>"><?= $this->Html->link('<b>7.</b> PVCT 2 '. $aPresented , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Presented'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FinalFeedback') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> Feedback '. $aFinalFeedback , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FinalFeedback'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'VigiBase') ? 'active' : ''; ?>"><?= $this->Html->link('<b>9.</b> VigiBase '. $aVigiBase , ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'VigiBase'], array('escape' => false)); ?> </li>   
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Saefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> &nbsp; SAEFIS', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Saefis' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li><a href="#" style="text-decoration: underline; padding-left: 15px;">REPORT STAGES</a></li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<b>1.</b> Submitted '. $saSubmitted , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<b>2.</b> Assigned '. $saAssigned , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<b>3.</b> Evaluated '. $saEvaluated , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>        
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<b>4.</b> Committee '. $saCommittee , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li> 
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Correspondence') ? 'active' : ''; ?>"><?= $this->Html->link('<b>5.</b> Correspondence '. $saCorrespondence , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Correspondence'], array('escape' => false)); ?> </li> 
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ApplicantResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<b>6.</b> Response '. $saApplicantResponse , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'ApplicantResponse'], array('escape' => false)); ?> </li>   
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Presented') ? 'active' : ''; ?>"><?= $this->Html->link('<b>7.</b> PVCT 2 '. $saPresented , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Presented'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FinalFeedback') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> Feedback '. $saFinalFeedback , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FinalFeedback'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'VigiBase') ? 'active' : ''; ?>"><?= $this->Html->link('<b>9.</b> VigiBase '. $saVigiBase , ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix, 'status' => 'VigiBase'], array('escape' => false)); ?> </li>    
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Adrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> &nbsp; SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Adrs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li><a href="#" style="text-decoration: underline; padding-left: 15px;">REPORT STAGES</a></li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<b>1.</b> Submitted '. $rSubmitted , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<b>2.</b> Assigned '. $rAssigned , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<b>3.</b> Evaluated '. $rEvaluated , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>      
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<b>4.</b> Committee '. $rCommittee , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Correspondence') ? 'active' : ''; ?>"><?= $this->Html->link('<b>5.</b> Correspondence '. $rCorrespondence , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Correspondence'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ApplicantResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<b>6.</b> Response '. $rApplicantResponse , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'ApplicantResponse'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Presented') ? 'active' : ''; ?>"><?= $this->Html->link('<b>7.</b> PVCT 2 '. $rPresented , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Presented'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FinalFeedback') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> Feedback '. $rFinalFeedback , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FinalFeedback'], array('escape' => false)); ?> </li> 
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'VigiBase') ? 'active' : ''; ?>"><?= $this->Html->link('<b>9.</b> VigiBase '. $rVigiBase , ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'VigiBase'], array('escape' => false)); ?> </li>   
          </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Ce2bs') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> &nbsp; Company E2B ', ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Ce2bs' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li><a href="#" style="text-decoration: underline; padding-left: 15px;">REPORT STAGES</a></li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<b>1.</b> Submitted '.$cSubmitted , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<b>2.</b> Assigned '. $cAssigned , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<b>3.</b> Evaluated '. $cEvaluated , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Evaluated'], array('escape' => false)); ?> </li>      
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<b>4.</b> Committee '. $cCommittee , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Correspondence') ? 'active' : ''; ?>"><?= $this->Html->link('<b>5.</b> Correspondence '. $cCorrespondence , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Correspondence'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ApplicantResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<b>6.</b> Response '. $cApplicantResponse , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'ApplicantResponse'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Presented') ? 'active' : ''; ?>"><?= $this->Html->link('<b>7.</b> PVCT 2 '. $cPresented , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Presented'], array('escape' => false)); ?> </li>  
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FinalFeedback') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> Feedback '. $cFinalFeedback , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'FinalFeedback'], array('escape' => false)); ?> </li> 
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'VigiBase') ? 'active' : ''; ?>"><?= $this->Html->link('<b>9.</b> VigiBase '. $cVigiBase , ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix, 'status' => 'VigiBase'], array('escape' => false)); ?> </li>   
          </ul>
        <?php } ?>
    </li>
    <?php } ?>
    <li class="<?=  ($this->request->params['controller'] === 'Reports') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;REPORTS', ['controller' => 'Reports', 'action' => 'index', 'prefix' => false], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && ($this->request->params['controller'] === 'Reports')) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= ($this->request->params['action'] == 'sadrReports') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> ADR reports ', ['controller' => 'Reports', 'action' => 'sadrReports', 'prefix' => false], array('escape' => false)); ?> 
            </li>

            <li class="<?= ($this->request->params['action'] == 'aefiReports') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> AEFI reports ', ['controller' => 'Reports', 'action' => 'aefiReports', 'prefix' => false], array('escape' => false)); ?> 
            </li>

            <li class="<?= ($this->request->params['action'] == 'deathsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Deaths Per Year ', ['controller' => 'Reports', 'action' => 'deathsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'genderReports') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Gender reports ', ['controller' => 'Reports', 'action' => 'genderReports', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'hospitalizationsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Hospitalizations ', ['controller' => 'Reports', 'action' => 'hospitalizationsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
          </ul>
        <?php } ?>
    </li>
    <?php if( $prefix == 'manager' || $prefix == 'evaluator') { ?>
     <li class="<?=  ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'import') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-upload" aria-hidden="true"></i> &nbsp; IMPORT', ['controller' => 'Users', 'action' => 'imports', 'prefix' => $prefix], array('escape' => false)); ?>
     </li>
    <?php }; ?>

    <li class="<?=  ($this->request->params['controller'] == 'Pages') ? 'active' : ''; ?>">
        <?php
          echo $this->Html->link('<i class="fa fa-calendar"></i> COMMITTEE DATES',
            array('controller' => 'Pages', 'action'=>'calendar', 'prefix' => false ), array('escape' => false ));
        ?>
        <?php if (($this->request->params['action'] === 'calendar') or in_array('calendar', $this->request->getParam('pass'))) { ?>
            <ul class="nav van-<?= $prefix ?>">
              <li class="<?= ($this->request->params['controller'] == 'Sites') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Edit page ', ['controller' => 'Sites', 'action' => 'calendar', 'prefix' => $prefix], array('escape' => false)); ?> 
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
    <li class="<?=  ($this->request->params['controller'] == 'Feedbacks') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-comment-o" aria-hidden="true"></i> &nbsp; USER FEEDBACK', ['controller' => 'Feedbacks', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Notifications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; ALERTS'.$ncount, ['controller' => 'Notifications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>