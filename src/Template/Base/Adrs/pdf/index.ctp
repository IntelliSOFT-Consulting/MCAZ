<?php
  use Cake\Utility\Hash;
?>

<style type="text/css">
  li{
    word-wrap:break-word;
    page-break-inside: avoid;
}
</style>

<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">CLINICAL TRIAL SERIOUS ADVERSE EVENTS (SAEs) SUMMARY REPORT</h5></div>
      </div>
    </div>
  </div>

 
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td scope="col" width="10%">Pariticipant ID</td>
                <td scope="col" width="10%">MCAZ REF #</td>
                <td scope="col" width="10%">SAE</td>
                <td scope="col" width="15%">Suspected Drug(s)</td>
                <td scope="col" width="15%">Concomitant  Drug(s)</td>
                <td scope="col" width="10%">Clinical Findings</td>    
                <td scope="col" width="20%">SAE Management and Outcome</td>    
                <td scope="col" width="10%">Causality Assessment</td>    
            </tr>
            <?php foreach ($query as $adr): ?>
            <tr>
                <td><?=  $adr->participant_number ?></td>
                <td><?=  $adr->reference_number ?></td>
                <td><?= $adr->diagnosis ?></td>
                <td>                  
                  <ul class="list-unstyled">
                    <?php foreach($adr->adr_list_of_drugs as $list_of_drug): ?> 
                      <?php $kdose = (isset($list_of_drug->dose->name)) ? $list_of_drug->dose->name : '' ;?>   
                      <li><p><?= $list_of_drug->drug_name.' - '.$list_of_drug->dosage.' - '.$kdose ?></p>  </li>   
                      <li><p><?= $list_of_drug->start_date ?></p>   </li>
                    <?php endforeach; ?>
                  </ul>
                </td>
                <td>
                    <?php foreach($adr->adr_other_drugs as $adr_other_drug): ?>    
                      <p><?= $adr_other_drug->drug_name.' - '.$adr_other_drug->relationship_to_sae ?></p>        
                      <p><?= $adr_other_drug->start_date.' - '.$adr_other_drug->stop_date ?></p>        
                    <?php endforeach; ?>
                </td>
                <td>
                  <?= $adr->symptoms ?> <br>
                  <?= $adr->investigations ?>
                </td>
                <td><p><?= $adr->management ?></p><p><?= $adr->outcome ?></p></td>
                <td>
                  <p>
                    <?php foreach ($adr->reviews as $review): ?> 
                      <?= $review->causality_decision ?><br>
                    <?php endforeach; ?>
                  </p>
                </td>  
            </tr>
              <?php foreach ($adr->reviews as $review): ?>
                <?php if($review->chosen == 1) { ?> 
                <tr>
                  <td colspan="2">
                    <ul class="list-unstyled">
                      <li><p><b>Literature Review</b></p></li>
                      <li><?= $review->literature_review ?></li>
                    </ul>
                  </td>
                  <td colspan="2">
                    <ul class="list-unstyled">
                      <li><p><b>Comments</b></p></li>
                      <li><?= $review->comments ?></li>
                    </ul>
                  </td>
                  <td colspan="2">
                    <ul class="list-unstyled">
                      <li><p><b>References</b></p></li>
                      <li><?= $review->references_text ?></li>
                    </ul>
                  </td>
                  <td colspan="2">
                    <ul class="list-unstyled">
                      <li><p><b>Signatures</b></p></li>
                      <li><p><?php          
                          echo ($review->signature) ? "<img src='".$this->Url->build(substr($review->user->dir, 8) . '/' . $review->user->file, true)."' style='width: 30%;' alt=''>" : '';
                          ?>
                      &nbsp;
                        <?php          
                          echo "<img src='".$this->Url->build(substr(Hash::combine($users->toArray(), '{n}.id', '{n}.dir')[$adr->assigned_by], 8) . '/' . Hash::combine($users->toArray(), '{n}.id', '{n}.file')[$adr->assigned_by], true)."' style='width: 30%;' alt=''>";
                        ?>                        
                      </p></li>
                    </ul>
                  </td>
                </tr>
                <?php } ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
