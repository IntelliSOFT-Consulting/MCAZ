<?php

use Cake\Utility\Hash;
?>

<div class="row">
  <div class="col-xs-12">
    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3>
    <div class="row">
      <div class="col-xs-12">
        <h5 class="text-center">SUSPECTED ADVERSE DRUG REACTION (ADR) TIMELINE REPORT</h5>
      </div>
    </div>
  </div>
</div>
<table class="table table-striped table-bordered">
  <thead>
    <th>#</th>
    <th>Protocol No</th>
    <th>Approval Time</th>
    <th>MCAZ Time</th>
    <th>Applicant Time</th>
    <th>Stage Time</th>
    <th>Mean Time</th>
    <th>Median Time</th>
  </thead>
  <tbody>

    <?php
    $number = 0;

    foreach ($sadrs as $sadr) : ?>

      <!-- Start of Manipulation -->
      <?php
      
      $prev_date = null;
      $total_days = 0;
      //array of stage name and days
      $stage_days_array = array();
      $mcaz_time = 0;
      $applicant_time = 0;
      //array of days only
      $days_array = array();
      foreach ($sadr->report_stages as $application_stage) {
        $curr_date = (($application_stage->alt_date)) ?? $application_stage->stage_date;
        $stage_name = '<b>' . $application_stage->stage . '</b> : <br>';

        if (!empty($curr_date) && !empty($prev_date)) {
          //get the days between the two dates
          $date1 = new DateTime($prev_date);
          $date2 = new DateTime($curr_date);
          $count = $date1->diff($date2)->days;
          //get the day name 
          $name = $date1->format('l');
          //get the date in the format of 2017-01-01
          $prev_date = $date1->format('Y-m-d');
          $curr_date = $date2->format('Y-m-d');
          //get the number of days between the two dates
          $count = $date1->diff($date2)->days;
          //loop through the dates and get the number of days
          $dates = array();
          $dates[] = $prev_date;

          if ($count > 0) {
            for ($i = 1; $i < $count; $i++) {
              $date1->modify('+1 day');
              $name = $date1->format('l');
              //add a flag to the date to indicate if it is a weekend
              if ($name == 'Saturday' || $name == 'Sunday') {
                $dates[] = $date1->format('Y-m-d') . ' Weekend';
              } else {
                $dates[] = $date1->format('Y-m-d');
              }
              //remove the weekends from the array
              $dates = array_filter($dates, function ($value) {
                return strpos($value, 'Weekend') === false;
              });
            }
          }
          $dates[] = $curr_date;
          //remove duplicates from the array and make it unique
          $dates = array_unique($dates);

          //for each date in the array, echo the date and the day name

          //count the number of days in the array
          $days = count($dates);
          //if days==1 then return 0
          if ($days == 1) {
            $days = 0;
          }
          $stage_days =  $days . ' Days<br>';
          $total_days += $days;
          $days_array[] = $days;
        } else {
          $stage_days =  '0 Days<br>';
          $total_days += 0;
        }

        //applicant time = days under correspondence stage
        if ($application_stage->stage == 'ApplicantResponse') {
          $applicant_time += $days;
        }

        $mcaz_time = $total_days - $applicant_time;

        //add the stage name and days to the array
        $stage_days_array[] = $stage_name . $stage_days;
        $prev_date = $curr_date;
      }
      ?>

      <!-- End of Manipulation -->
      <tr>
        <td><?php echo $number;?></td>
        <td><?= $sadr->reference_number ?></td>
        <td><?= $total_days . ' Days' ?></td>
        <td><?= $mcaz_time . ' Days' ?></td>
        <td><?= $applicant_time . ' Days' ?></td>
        <td><?php foreach ($stage_days_array as $stage_days) {
              echo $stage_days;
            } ?></td>
        <td><?php
            //check if there are report dtages
            if (!empty($sadr->report_stages)) {
              $days_per_stage = $total_days / count($sadr->report_stages);
              //limit the number of decimal places to 2
              $days_per_stage = number_format($days_per_stage, 2);
              echo $days_per_stage . ' Days';
            } else {
              echo '0 Days';
            }
            ?>
        </td>
        <td>
 
        </td>
        </td>
      </tr>
    <?php endforeach; ?>
</table>