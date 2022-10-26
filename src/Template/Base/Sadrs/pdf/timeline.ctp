<?php
  use Cake\Utility\Hash;
?>

<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">SUSPECTED ADVERSE DRUG REACTION (ADR) TIMELINE REPORT</h5></div>
      </div>
    </div>
  </div>
  <table class="table table-striped table-bordered">
                    <thead>
                        <th>Protocol No</th>
                        <th>Approval Time</th>
                        <th>MCAZ Time</th>
                        <th>Applicant Time</th>
                        <th>Stage Time</th>
                        <th>Mean Time</th>
                        <th>Median Time</th>
                    </thead>
                     <tbody>
                        <?php foreach ($query as $sadr): ?>
                        <tr>
                            <td><?= $sadr->protocol_no ?></td>
                            <td><?= $sadr->approval_time ?></td>
                            <td><?= $sadr->mcaz_time ?></td>
                            <td><?= $sadr->applicant_time ?></td>
                            <td><?= $sadr->stage_time ?></td>
                            <td><?= $sadr->mean_time ?></td>
                            <td><?= $sadr->median_time ?></td>
                        </tr>
                        <?php endforeach; ?>
                </table>