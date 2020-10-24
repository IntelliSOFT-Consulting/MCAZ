<?php
  use Cake\Utility\Hash;
  use Cake\Utility\Xml;
?>

<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">COMPANY E2B (CE2B) IN-HOUSE REPORT FORM</h5></div>
      </div>
    </div>
  </div>
    
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td scope="col" width="12%"><b>Reference #</b></td>
                <td scope="col" width="10%"><b>Patient Initials</b></td>
                <td scope="col" width="10%"><b>Patient Details</b></td>
                <td scope="col" width="15%"><b>ADR Summary</b></td>
                <td scope="col" width="8%"><b>Medical History</b></td>
                <td scope="col" width="15%"><b>Suspected Drug(s)</b></td>
                <td scope="col" width="17%"><b>Clinical Findings</b></td>    
                <td scope="col" width="13%"><b>ADR Listing in Summary of Product Characteristics</b></td>    
            </tr>
        
            <?php foreach ($query as $ce2b): ?>
              <?php
                //prep some vars
                // $xml = (Xml::toArray(Xml::build($ce2b->e2b_content)));
                try {
                  $xml = (Xml::toArray(Xml::build($ce2b->e2b_content)));
                } 
                catch (\Cake\Utility\Exception\XmlException $e) {
                  continue;
                }
                $arr = Hash::flatten($xml);
                $pn = $pa = $pg = $pw = $rs = $ro =  $pr =  $ad = $mh = $dn = '';
                foreach ($arr as $yek => $val) {
                  $gender = ['1' => 'Male', '2' => 'Female'];
                  $outcomes =  [1 => 'Recovered',2 => 'Recovering',4 =>'Not yet recovered',5 => 'Fatal',6 => 'Unknown'];
                  $actions = array(1 => 'drug withdrawn' , 3 => 'dose increased', 2 => 'dose reduced', 4 => 'dose not changed', 6 => 'not applicable', 5 => 'unknown', 5 => 'medical treatment of adr'
                    );
                  if(strpos($yek, 'patientinitial') !== false) $pn .= "\n ".$val;
                  if(strpos($yek, 'patientbirthdate') !== false) $pa .= "\n ".$val;
                  if(strpos($yek, 'patientweight') !== false) $pw .= "\n ".$val;
                  if(strpos($yek, 'reactionstartdate') !== false) $rs .= "\n ".$val;
                  if(strpos($yek, 'primarysourcereaction') !== false) $pr .= "\n ".$val;
                  if(strpos($yek, 'patientmedicalhistorytext') !== false) $mh .= "\n ".$val;
                  if(strpos($yek, 'activesubstancename') !== false) $dn .= "\n ".$val;
                  if(strpos($yek, 'patientsex') !== false) $pg .= "\n ".(isset($gender[$val]) ? $gender[$val] : '');
                  if(strpos($yek, 'reactionoutcome') !== false) $ro .= "\n ".(isset($outcome[$val]) ? $outcome[$val] : '');
                  if(strpos($yek, 'actiondrug') !== false) $ad .= "\n ".(isset($actions[$val]) ? $actions[$val] : '');
                }
              ?>
            <tr>
                <td><?=  $ce2b->reference_number ?></td>
                <td><?=  $pn ?></td>
                <td>
                  <?php echo "Age: ".$pa ?><br>
                  <?php echo "Gender: ".$pg ?><br>
                  <?php echo "Weight: ".$pw ?>
                </td>
                <td>
                  <?php echo "Onset: ".$rs; ?><br>
                  <?php echo "Outcome: ".$ro; ?><br>
                  <?= h($pr) ?>

                <?= "Action Taken: ".$ad ?>
                </td>
                <td>
                    <?= $mh ?><br>
                </td>       
                <td>
                    <?php echo $dn; ?>
                </td>
                <td>
                  <?php foreach ($ce2b->reviews as $review): ?> 
                    <?= $review->clinical_findings ?><br>
                  <?php endforeach; ?>              
                </td>  
                <td>
                  <?php foreach ($ce2b->reviews as $review): ?> 
                    <?= $review->status ?><br>
                  <?php endforeach; ?>
                </td>
            </tr>
              <?php foreach ($ce2b->reviews as $review): ?>
                <?php //if($review->chosen == 1) { ?>
                <tr>
                  <td colspan="3">
                    <p><b>Literature Review</b></p>
                    <div style="word-wrap: break-word; word-break: break-all;"><?= $review->literature_review ?></div>
                  </td>
                  <td colspan="2">
                    <p><b>Recommended Causality Assessment</b></p>
                    <?= $review->causality_decision ?>
                  </td>
                  <td colspan="3">
                    <p><b>References</b></p>
                    <div style="word-wrap: break-word; word-break: break-all;"><?= $review->references_text ?></div>
                  </td>
                </tr>
                <?php //} ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
            <?php if($prefix == 'evaluator'){ ?>
              <tr>
                <td colspan="2">Managers:</td>
                <td colspan="2">
                  <?php 
                    $regs = array_unique(Hash::combine($ce2bs->toArray(), '{n}.reviews.{n}.user[group_id=2].file', '{n}.reviews.{n}.user[group_id=2].dir'));
                    foreach ($regs as $file => $dir) {
                      echo "<img src='".$this->Url->build(substr($dir, 8) . '/' . $file, true)."' style='width: 30%;' alt=''>";
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
