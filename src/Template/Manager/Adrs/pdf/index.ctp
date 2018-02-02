
<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">CLINICAL TRIAL SERIOUS ADVERSE EVENTS (SAEs) SUMMARY REPORT</h5></div>
      </div>
    </div>
  </div>

 
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Pariticipant ID</th>
                <th scope="col">MCAZ REF #</th>
                <th scope="col">SAE</th>
                <th scope="col">Suspected Drug(s)</th>
                <th scope="col">Concomitant  Drug(s)</th>
                <th scope="col">Clinical Findings</th>    
                <th scope="col">SAE Management and Outcome</th>    
                <th scope="col">Causality Assessment</th>    
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $adr): ?>
            <tr>
                <td><?=  $adr->participant_number ?></td>
                <td><?=  $adr->mcaz_protocol_number ?></td>
                <td><?= $adr->symptoms ?></td>
                <td>
                    <?php foreach($adr->adr_list_of_drugs as $list_of_drug): ?>    
                      <p><?= $list_of_drug->drug_name.' - '.$list_of_drug->dosage.' - '.isset($doses->toArray()[$list_of_drug->dose_id]) ? $doses->toArray()[$list_of_drug->dose_id] : $list_of_drug->dose_id ?></p>        
                      <p><?= $list_of_drug->start_date ?></p>        
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach($adr->adr_other_drugs as $adr_other_drug): ?>    
                      <p><?= $adr_other_drug->drug_name.' - '.$adr_other_drug->relationship_to_sae ?></p>        
                      <p><?= $adr_other_drug->start_date.' - '.$adr_other_drug->stop_date ?></p>        
                    <?php endforeach; ?>
                </td>
                <td><?= $adr->diagnosis ?></td>
                <td><p><?= $adr->management ?></p><p><?= $adr->outcome ?></p></td>
                <td><?= h($adr->immediate_cause) ?></td>  
            </tr>
              <?php foreach ($adr->reviews as $review): ?>
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
