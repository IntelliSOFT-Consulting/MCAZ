<?php
    // pr($sadr['sadr_followups']);
    if (isset($sadr['sadr_followups'])) { ?>    
<?php        
    $x = 0;
    foreach ($sadr['sadr_followups'] as $sadr_followup) {
      if($sadr_followup->submitted == 2) {
        $x++;
        echo '<h3><span class="label label-default">'.$x.'</span></h3>';
        echo '<div class="row">  <div class="col-xs-4">';
            echo  '  <dl><dt>Date of Onset of Reaction</dt>';
            echo  '<dd>'.$sadr_followup['date_of_onset_of_reaction'].'</dd>';
            echo  '<dt>Date of end of Reaction</dt>';
            echo  '<dd>'.$sadr_followup['date_of_end_of_reaction'].'</dd>';
            echo  '<dt>Description of ADR</dt>';
            echo  '<dd>'.$sadr_followup['description_of_reaction'].'</dd>';
            echo  '<dt>Serious?</dt>';
            echo  '<dd>'.$sadr_followup['severity'].'</dd>';
            echo  '<dt>Reason for Seriousness</dt>';
            echo  '<dd>'.$sadr_followup['severity_reason'].'</dd>';
            echo  '<dt>Relevant Medical History, including Allergies</dt>';
            echo  '<dd>'.$sadr_followup['medical_history'].'</dd>';
            echo  '<dt>Relevant Past Drug Therapy</dt>';
            echo  '<dd>'.$sadr_followup['past_drug_therapy'].'</dd>';
            echo  '<dt>Laboratory test Results</dt>';
            echo  '<dd>'.$sadr_followup['lab_test_results'].'</dd></dl>';
            echo  ' </div>';
            echo  '  <div class="col-xs-4">';
            if(isset($sadr_followup['sadr_list_of_drugs'])) {
                foreach ($sadr_followup['sadr_list_of_drugs'] as $fsadr_list_of_drugs) {
                    echo '<dl class="dl-horizontal">';
                        echo '<dt>Generic Name</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['drug_name'].'</dd>';
                        echo '<dt>Brand Name</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['brand_name'].'</dd>';
                        echo '<dt>Batch Number</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['batch_number'].'</dd>';
                        echo '<dt>Dose</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['dose'].'</dd>';
                        echo '<dt>Dose</dt>';
                        echo '<dd>'.$doses->toArray()[$fsadr_list_of_drugs['dose_id']].'</dd>';
                        echo '<dt>Route</dt>';
                        echo '<dd>'.$routes->toArray()[$fsadr_list_of_drugs['route_id']].'</dd>';
                        echo '<dt>Frequency</dt>';
                        echo '<dd>'.$frequencies->toArray()[$fsadr_list_of_drugs['frequency_id']].'</dd>';
                        echo '<dt>Indication</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['indication'].'</dd>';
                        echo '<dt>Date Started</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['date_started'].'</dd>';
                        echo '<dt>Date Stopped</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['date_stopped'].'</dd>';
                        echo '<dt>Suspected Drug</dt>';
                        echo '<dd>'.$fsadr_list_of_drugs['suspected_drug'].'</dd>';
                    echo '</dl>';
                }
            }
        echo ' </div>';
        echo  '  <div class="col-xs-4">';
        if(isset($sadr_followup['attachments'])) {
            foreach ($sadr_followup['attachments'] as $fattachments) {
                echo '<dl class="dl-horizontal">';
                    echo '<dt>File</dt>';
                    echo '<dd>'.$this->Html->link($fattachments->file, substr($fattachments->dir, 8) . '/' . $fattachments->file, ['fullBase' => true]).'</dd>';
                    echo '<dt>Description</dt>';
                    echo '<dd>'.$fattachments['desciription'].'</dd>';
                echo '</dl>';
            }
        }
        echo ' </div>';
        echo '</div><hr style="border-top: dotted 1px;" />';
      }
    }
?>
        
<?php    } ?>