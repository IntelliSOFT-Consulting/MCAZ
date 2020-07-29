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
                <td scope="col"><b>Reference #</b></td>
                <td scope="col"><b>Patient Initials</b></td>
                <td scope="col"><b>Patient Details</b></td>
                <td scope="col"><b>ADR Summary</b></td>
                <td scope="col"><b>Medical History</b></td>
                <td scope="col"><b>Suspected Drug(s)</b></td>
                <td scope="col"><b>Clinical Findings</b></td>    
                <td scope="col"><b>ADR Listing in Summary of Product Characteristics</b></td>    
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
                  <?php echo "Onset: ".$sadr->date_of_onset_of_reaction." to ".$sadr->date_of_end_of_reaction; ?><br>
                  <?php echo "Outcome: ".$sadr->outcome; ?><br>
                  <?= h($sadr->description_of_reaction) ?>

                <?php foreach ($sadr->reactions as $reaction): ?>
                  <p><?= $reaction->reaction_name ?></p>
                <?php endforeach; ?>
                <?= "Action Taken: ".$sadr->action_taken ?>
                </td>
                <td><?= h($sadr->medical_history) ?></td>       
                <td>
                    <?php foreach($sadr->sadr_list_of_drugs as $list_of_drug): ?>    
                      <?php $kdose = (isset($list_of_drug->dose->name)) ? $list_of_drug->dose->name : '' ;?>  
                      <p><?= $list_of_drug->drug_name.' - '.$list_of_drug->brand_name.'-'.$kdose ?></p>        
                      <p><?= $list_of_drug->start_date.' - '.$list_of_drug->stop_date ?></p>        
                    <?php endforeach; ?>
                </td>
                <td>
                  <?= h($sadr->past_drug_therapy) ?><br>
                  <?= h($sadr->lab_test_results) ?>                  
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
                  <td colspan="2">
                    <p><b>Literature Review</b></p>
                    <?= $review->literature_review ?>
                  </td>
                  <td colspan="3">
                    <p><b>Recommended Causality Assessment</b></p>
                    <?= $review->causality_decision ?>
                  </td>
                  <td colspan="3">
                    <p><b>References</b></p>
                    <?= $review->references_text ?>
                  </td>
                </tr>
                <?php //} ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
            <?php if($prefix == 'evaluator'){ ?>
              <tr>
                <td colspan="2"></td>
                <td colspan="2"><?php  //(!empty($sadr->assigned_by)) ? echo $this->cell('Muhuri', [$sadr->assigned_by]) : ''; ?>                  
                </td>
                <td colspan="2">Evaluator:</td>
                <td colspan="2"><?php echo ($prefix == 'evaluator') ? "<img src='".$this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true)."' style='width: 30%;' alt=''>" : ''; ?></td>
              </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
