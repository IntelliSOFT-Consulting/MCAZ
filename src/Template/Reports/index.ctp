<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('index_report', ['block' => true]); ?>

<div class="row">
<h1 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports</h1>
    <div class="col-xs-12 ">
      <div id="total-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="hopitalization-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="death-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="hopitalization-adr"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="hopitalization-sae"></div>
    </div><div class="col-xs-6 col-sm-6">
      <div id="hopitalization-sae"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="hopitalization-aefi"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="sadrs-index"></div>
    </div>
    <div class="col-xs-6 col-sm-6">
      <div id="adr-facilities"></div>
    </div>

    <div class="col-xs-6 col-sm-6 placeholder">
      <div id="sadrs-causality"></div>
      <?php 
     /* 
     use Cake\Utility\Hash;
     $users = [
          ['id' => 1, 'name' => 'mark', 'province' => ['province_name' => 'Bulawayo']],
          ['id' => 2, 'name' => 'jane'],
          ['id' => 3, 'name' => 'sally'],
          ['id' => 4, 'name' => 'jose', 'province' => ['province_name' => 'Harare']],
      ];
      $results = Hash::extract($users, '{n}.province.province_name');
      pr($results);
      //pr(Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'));


       pr(Hash::extract($sadr_stats->toArray(), '{n}.province.province_name')) 
       pr(Hash::extract($sadr_stats->toArray(), '{n}.count')) 
       pr($sadr_stats->toArray()) 
       pr($sadr_stats->toList()) */
       // use Cake\Utility\Hash;
       // pr(Hash::combine($sadr_stats->toArray(), '{n}.province.province_name', '{n}.count'));
       ?>
    </div>
    

</div>

<div class="row">
  <div class="col-xs-6 col-sm-6">
    <div id="saefis-index"></div>
  </div>
  <div class="col-xs-6 col-sm-6">
    <div id="adrs-index"></div>
  </div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-6">
    <div id="aefis-index"></div>
  </div>
</div>