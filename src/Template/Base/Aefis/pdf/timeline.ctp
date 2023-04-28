<?php
  use Cake\Utility\Hash;
?>

<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ADVERSE EVENT FOLLOWING IMMUNISATION (AEFI) TIMELINE REPORT</h5></div>
      </div>
    </div>
  </div>
 
<table class="table table-striped table-bordered">
  <thead>
    <th>#</th>
    <th>Time/Count</th>
  </thead>
  <tbody>
    <tr>
      <th>Total Time</th>
      <td><?= $total_time ?></td>
    </tr>
    <tr>
      <th>Report Number</th>
      <td><?= $report_count ?></td>
    </tr>
    <tr>
      <th>Mean Time</th>
      <td><?= $mean_time ?></td>
    </tr>
    <tr>
      <th>Median Time</th>
      <td><?= $median_time ?></td>
    </tr>
  </tbody>
</table>
<hr>

<table class="table table-striped table-bordered">
  <thead>
    <th>#</th>
    <th>Reference No</th>
    <th>Overall Time</th>
    <th>MCAZ Time</th>
    <th>Applicant Time</th>
    <th>Stage Time</th>
  </thead>
  <tbody>
    <?php
    $count = 0;
    foreach ($applications as $application) :
      $count++;
    ?>
      <tr>
        <td><?= $count; ?></td>
        <td><?= $application['reference_no']; ?></td>
        <td><?= $application['approval_time']; ?></td>
        <td><?= $application['mcaz_time']; ?></td>
        <td><?= $application['applicant_time']; ?></td>
        <td><?php
            foreach ($application['stage_time'] as  $stage_days) {
              echo $stage_days;
            }
            ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>