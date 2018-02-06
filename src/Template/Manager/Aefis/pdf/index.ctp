
<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">ADVERSE EVENT FOLLOWING IMMUNISATION (AEFI) IN-HOUSE REPORT FORM</h5></div>
      </div>
    </div>
  </div>
    
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Reference #</th>
                <th scope="col">Patient Initials</th>
                <th scope="col">AEFI</th>
                <th scope="col">Suspected Vaccine(s)</th>
                <th scope="col">Clinical Findings</th>    
                <th scope="col">AEFI Management and outcome</th>    
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $aefi): ?>
            <tr>
                <td><?=  $aefi->reference_number ?></td>
                <td><?=  $aefi->patient_name ?></td>
                <td><?= h($aefi->description_of_reaction) ?></td> 
                <td>
                    <?php foreach($aefi->aefi_list_of_vaccines as $list_of_vaccine): ?>    
                      <p><?= $list_of_vaccine->vaccine_name.' - '.$list_of_vaccine->dosage ?></p>        
                      <p><?= $list_of_vaccine->vaccination_date ?></p>         
                      <p><?= $list_of_vaccine->batch_number ?></p>         
                    <?php endforeach; ?>
                </td>
                <td><?= h($aefi->past_medical_history) ?></td>  
                <td><p><?= $aefi->outcome ?></p> <p><?= $aefi->comments ?></p> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
