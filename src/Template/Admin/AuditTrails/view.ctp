<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuditTrail $auditTrail
 */
?>

<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>
<div class="facilitys view large-9 medium-8 columns content"> 
    
    <div class="row">
        <h4><?= __('Model') ?></h4>
        <?= $this->Text->autoParagraph(h($auditTrail->model)); ?>
    </div>
    <div class="row">
        <h4><?= __('Ip') ?></h4>
        <?= $this->Text->autoParagraph(h($auditTrail->ip)); ?>
    </div>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($auditTrail->message)); ?>
    </div>
    
    <div class="row">
        <h4><?= __('Created') ?></h4>
        <?= $this->Text->autoParagraph(h($auditTrail->created)); ?>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav"> 
        <li><?= $this->Html->link(__('Back'), ['action' => 'index']) ?> </li> 
    </ul>
</nav>
 
