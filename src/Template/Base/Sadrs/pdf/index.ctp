
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
        <thead>
            <tr>
                <th scope="col">Reference #</th>
                <th scope="col">Patient Initials</th>
                <th scope="col">ADR Summary</th>
                <th scope="col">Medical History</th>
                <th scope="col">Suspected Drug(s)</th>
                <th scope="col">Clinical Findings</th>    
                <th scope="col">Causality Assessment</th>    
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $sadr): ?>
            <tr>
                <td><?=  $sadr->reference_number ?></td>
                <td><?=  $sadr->patient_name ?></td>
                <td>
                  <?php echo "Onset: ".$sadr->date_of_onset_of_reaction." to ".$sadr->date_of_end_of_reaction; ?><br>
                  <?php echo "Outcome: ".$sadr->outcome; ?><br>
                  <?= h($sadr->description_of_reaction) ?></td>
                <td><?= h($sadr->medical_history) ?></td>       
                <td>
                    <?php foreach($sadr->sadr_list_of_drugs as $list_of_drug): ?>    
                      <p><?= $list_of_drug->drug_name.' - '.$list_of_drug->brand_name ?></p>        
                      <p><?= $list_of_drug->start_date.' - '.$list_of_drug->stop_date ?></p>        
                    <?php endforeach; ?>
                </td>
                <td><?= h($sadr->lab_test_results) ?></td>  
                <td><?= $sadr->action_taken ?>; <?= $sadr->outcome ?>; <?= $sadr->relatedness ?>; </td>
            </tr>
              <?php foreach ($sadr->reviews as $review): ?>
                <tr>
                  <td colspan="3">
                    <p><b>Literature Review</b></p>
                    <?= $review->literature_review ?>
                  </td>
                  <td colspan="2">
                    <p><b>Comments</b></p>
                    <?= $review->comments ?>
                  </td>
                  <td colspan="2">
                    <p><b>References</b></p>
                    <?= $review->references_text ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
