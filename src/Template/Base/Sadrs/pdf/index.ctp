<?php
  use Cake\Utility\Hash;
?>

<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">SUSPECTED ADVERSE DRUG REACTION (ADR) IN-HOUSE REPORT FORM</h5></div>
      </div>
    </div>
  </div>
    
<div class="table-responsive">
    <table class="table table-striped table-bordered">

        <tbody>

          <tr>
              <th scope="col" width="11%"><b>Reference #</b></th>
              <th scope="col" width="10%"><b>Patient Initials</b></th>
              <th scope="col" width="15%"><b>Patient Details</b></th>
              <th scope="col" width="13%"><b>ADR Summary</b></th>
              <th scope="col" width="7%"><b>Medical History</b></th>
              <th scope="col" width="15%"><b>Suspected Drug(s)</b></th>
              <th scope="col" width="14%"><b>Clinical Findings</b></th>    
              <th scope="col" width="15%"><b>ADR Listing in Summary of Product Characteristics</b></th>    
          </tr>
        
            <?php foreach ($query as $sadr): ?>
            <tr>
                <td><?=  $sadr->reference_number ?></td>
                <td><?=  $sadr->patient_name ?></td>
                <td>
                  <?php echo "Age: ".$sadr->date_of_birth ?><br>
                  <?php echo "Gender: ".$sadr->gender ?><br>
                  <?php echo "Weight: ".$sadr->weight ?>
                </td>
                <td>
                  <div style="word-wrap: break-word; word-break: break-all;">
                    <?php echo "Onset: ".$sadr->date_of_onset_of_reaction." to ".$sadr->date_of_end_of_reaction; ?><br>
                    <?php echo "Outcome: ".$sadr->outcome; ?><br>
                    <?= h($sadr->description_of_reaction) ?>
                  </div>

                <?php foreach ($sadr->reactions as $reaction): ?>
                  <p><?= $reaction->reaction_name ?></p>
                <?php endforeach; ?>
                <?= "Action Taken: ".$sadr->action_taken ?>
                </td>
                <td>
                  <div style="word-wrap: break-word; word-break: break-all;">
                    <?php foreach ($sadr->reviews as $review): ?> 
                      <?= $review->medical_history ?><br>
                    <?php endforeach; ?>
                  </div>
                </td>       
                <td>
                  <div style="word-wrap: break-word; word-break: break-all;">
                    <?php foreach($sadr->sadr_list_of_drugs as $list_of_drug): ?>    
                      <?php $kdose = (isset($list_of_drug->dose->name)) ? $list_of_drug->dose->name : '' ;?>  
                      <p><?= $list_of_drug->drug_name.' - '.$list_of_drug->brand_name.'-'.$kdose ?>
                        <br><small><?= $list_of_drug->start_date.' - '.$list_of_drug->stop_date ?></small>
                      </p>        
                              
                    <?php endforeach; ?>
                  </div>
                </td>
                <td>
                  <div style="word-wrap: break-word; word-break: break-all;">
                    <p>
                    <?= h($sadr->past_drug_therapy) ?><br>
                    <?= h($sadr->lab_test_results) ?> <br>
                    <?php foreach ($sadr->reviews as $review): ?> 
                      <?= $review->clinical_findings ?><br>
                    <?php endforeach; ?> 
                    </p>         
                  </div>
                </td>  
                <td>
                  <?php foreach ($sadr->reviews as $review): ?> 
                    <?= $review->status ?><br>
                  <?php endforeach; ?>
                </td>
            </tr>
              <?php foreach ($sadr->reviews as $review): ?>
                <?php //if($review->chosen == 1) { ?>
                <tr>
                  <td colspan="3">
                    <div style="word-wrap: break-word; word-break: break-all;"><p style="page-break-before: always"><b>Literature Review</b> - <?= $review->drug_name ?></p>
                    <p style="page-break-before: always"><?= $this->Text->autoParagraph($review->literature_review) ?></p></div>
                  </td>
                  <td colspan="2">
                    <div style="word-wrap: break-word; word-break: break-all;"><p><b>Recommended Causality Assessment</b></p>
                    <p style="page-break-before: always"><?= $review->causality_decision ?></p></div>
                  </td>
                  <td colspan="3">
                    <div style="word-wrap: break-word; word-break: break-all;"><p><b>References</b></p>
                    <p  style="page-break-before: always"><?= $this->Text->autoParagraph($review->references_text) ?></p></div>
                  </td>
                </tr>
                <?php //} ?>
              <?php endforeach; ?>
              <!-- <tr><td colspan="8"></td></tr> -->
            <?php endforeach; ?>
            <?php if($prefix == 'evaluator'){ ?>
              <tr>
                <td colspan="2">Managers:</td>
                <td colspan="2">
                  <?php 
                    /*$regs = array_unique(Hash::combine($sadrs->toArray(), '{n}.reviews.{n}.user[group_id=2].file', '{n}.reviews.{n}.user[group_id=2].dir'));
                    foreach ($regs as $file => $dir) {
                      echo "<img src='".$this->Url->build(substr($dir, 8) . '/' . $file, true)."' style='width: 30%;' alt=''>";
                    }*/
                    $regs = array_filter(array_unique(Hash::extract($sadrs->toArray(), '{n}.reviews.{n}.reviewed_by')));
                    foreach ($regs as $file => $dir) {
                      echo $this->cell('Signature', [$dir]);
                    }
                  ?>                  
                </td>
                <td colspan="2">Evaluator:</td>
                <td colspan="2"><?php echo ($prefix == 'evaluator') ? "<img src='".$this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true)."' style='width: 30%;' alt=''>" : ''; ?></td>
              </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
