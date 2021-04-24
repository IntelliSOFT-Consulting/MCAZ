<?php
  use Cake\Utility\Hash;
?>

<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ADVERSE EVENT FOLLOWING IMMUNISATION (AEFI) IN-HOUSE REPORT FORM</h5></div>
      </div>
    </div>
  </div>
    
    <table class="table table-striped table-bordered">
            <tr>
                <th width="4%"><b>#</b></th>
                <th scope="col" width="9%"><b>Reference #</b></th>
                <th scope="col" width="10%"><b>Patient Details</b></th>
                <th scope="col" width="27%"><b>AEFI </b></th>
                <th scope="col" width="10%"><b>Suspected Vaccine(s)</b></th>
                <th scope="col" width="10%"><b>Batch No. <br> and Expiry date</b></th>
                <th scope="col" width="20%"><b>Clinical Findings</b></th>
                <th scope="col" width="10%"><b>Management & Outcome</b></th>
            </tr>
        <tbody>
            <?php $i = 0; ?>
            <?php foreach ($query as $saefi): ?>
            <?php $i++ ?>
            <tr style="border-top: 2px solid #333;">
                <td><?= $i ?></td>
                <td><?=  $saefi->reference_number ?></td>
                <td>
                  <?=  $saefi->patient_name ?>
                    <br>
                  <?php echo "Age: ".$saefi->date_of_birth ?><br>
                  <?php echo "Gender: ".$saefi->gender ?><br>
                </td>
                <td>
                  <?= h($saefi->description_of_reaction) ?></td>
                <td>
                    <?php foreach($saefi->aefi_list_of_vaccines as $list_of_drug): ?>    
                      <p><?= $list_of_drug->vaccine_name.' - '.$list_of_drug->dosage ?></p>        
                      <p><?= $list_of_drug->vaccination_date ?></p>        
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach($saefi->aefi_list_of_vaccines as $list_of_drug): ?>    
                      <p><?= $list_of_drug->batch_number.' - '.$list_of_drug->expiry_date ?></p>        
                    <?php endforeach; ?>
                </td>
                <td>
                  <?= h($saefi->past_medical_history) ?>  <br>                
                  <?= h($saefi->comments) ?>                  
                </td>  
                <td><?= "Outcome: ".$saefi->outcome ?> </td>
            </tr>
              <?php foreach ($saefi->aefi_causalities as $causality): ?>
                <?php if($causality->chosen == 1) { ?>
                <tr>
                  <td></td>
                  <td colspan="2">
                    <p><b>Classificication</b></p>
                    <?php if($causality->consistent_i) echo "A1. Vaccine product-related reaction (As per published literature) <br>"; ?>
                    <?php if($causality->consistent_ii) echo "A2. Vaccine quality defect-related reaction <br>"; ?>
                    <?php if($causality->consistent_iii) echo "A3. Immunization error-related reaction <br>"; ?>
                    <?php if($causality->consistent_iv) echo "A4. Immunization anxiety-related reaction <br> <b>(ITSR**)</b> <br>"; ?>
                    <?php if($causality->indeterminate_i) echo "B1. *Temporal relationship is consistent but there is insufficient definitive evidence for vaccine causing event (may be new vaccine-linked event) <br>"; ?>
                    <?php if($causality->indeterminate_ii) echo "B2. Reviewing factors result in conflicting trends of consistency and inconsistency with causal association to immunization <br>"; ?>
                    <?php if($causality->inconsistent) echo "C. Coincidental Underlying or emerging condition(s), or conditions caused by exposure to something other than vaccine <br>"; ?>
                    <?php if($causality->unclassifiable) echo "Unclassifiable <br>"; ?>
                    <?php if($causality->unclassifiable_specify) echo $causality->unclassifiable_specify; ?>
                  </td>
                  <td colspan="3">
                    <p><b>Summary</b></p>
                    <p>With available evidence, we could conclude that the claffication is <?= $causality->conclude ?> because 
                      <?= $causality->conclude_reason ?>. <br> 
                      <?php if(!empty($causality->conclude_inability)) { ?>
                      with available evidence, we could NOT classify the case because: <?= $causality->conclude_inability ?>
                      <?php } ?>
                    </p>
                  </td>
                  <td colspan="2">
                    <p><b>Signatures</b></p>
                    <p><?php          
                        echo ($causality->signature) ? "<img src='".$this->Url->build(substr($causality->user->dir, 8) . '/' . $causality->user->file, true)."' style='width: 30%;' alt=''>" : '';
                        ?>
                    </p>
                    <p>
                      <?php          
                        echo "<img src='".$this->Url->build(substr(Hash::combine($users->toArray(), '{n}.id', '{n}.dir')[$saefi->assigned_by], 8) . '/' . Hash::combine($users->toArray(), '{n}.id', '{n}.file')[$saefi->assigned_by], true)."' style='width: 30%;' alt=''>";
                      ?>                        
                    </p>
                  </td>
                </tr>
                <?php } ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
