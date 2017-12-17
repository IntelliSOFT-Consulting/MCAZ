<?php
    // pr($aefi['aefi_followups']);
    if (isset($aefi['aefi_followups'])) { ?>    
<?php        
    $x = 0;
    foreach ($aefi['aefi_followups'] as $aefi_followup) {
      if($aefi_followup->submitted == 2) {
        $x++;
        echo '<h3><span class="label label-default">'.$x.'</span></h3>';
        echo '<div class="row">  <div class="col-xs-4">';
            echo  '  <dl><dt>Severe local reaction</dt>';
            echo  '<dd>'.$aefi_followup['ae_severe_local_reaction'].'</dd>';
            echo  '<dt>Seizures</dt>';
            echo  '<dd>'.$aefi_followup['ae_seizures'].'</dd>';
            echo  '<dt>Afebrile</dt>';
            echo  '<dd>'.$aefi_followup['ae_afebrile'].'</dd>';
            echo  '<dt>Febrile</dt>';
            echo  '<dd>'.$aefi_followup['ae_febrile'].'</dd>';
            echo  '<dt>Abscess</dt>';
            echo  '<dd>'.$aefi_followup['ae_abscess'].'</dd></dl>';
            echo  '<dt>If other, specify</dt>';
            echo  '<dd>'.$aefi_followup['adverse_events_specify'].'</dd></dl>';
            echo  '<dt>Date & time AEFI started</dt>';
            echo  '<dd>'.$aefi_followup['aefi_date'].'</dd></dl>';
            echo  '<dt>Date patient notified.</dt>';
            echo  '<dd>'.$aefi_followup['notification_date'].'</dd></dl>';
            echo  '<dt>Describe AEFI (Signs and symptoms)</dt>';
            echo  '<dd>'.$aefi_followup['description_of_reaction'].'</dd></dl>';
            echo  ' </div>';
            echo  '  <div class="col-xs-4">';
            if(isset($aefi_followup['aefi_list_of_vaccines'])) {
                foreach ($aefi_followup['aefi_list_of_vaccines'] as $faefi_list_of_vaccines) {
                    echo '<dl class="dl-horizontal">';
                        echo '<dt>Vaccine Name</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['vaccine_name'].'</dd>';
                        echo '<dt>Vaccination Date</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['vaccination_date'].'</dd>';
                        echo '<dt>Dosage</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['dosage'].'</dd>';
                        echo '<dt>Batch Number</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['batch_number'].'</dd>';
                        echo '<dt>Expiry Date</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['expiry_date'].'</dd>';
                        echo '<dt>Diluent Batch Number</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['diluent_batch_number'].'</dd>';
                        echo '<dt>Diluent Expiry Date</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['diluent_expiry_date'].'</dd>';
                        echo '<dt>Time of reconstitution</dt>';
                        echo '<dd>'.$faefi_list_of_vaccines['diluent_date'].'</dd>';                        
                    echo '</dl>';
                }
            }
        echo ' </div>';
        echo  '  <div class="col-xs-4">';
        if(isset($aefi_followup['attachments'])) {
            foreach ($aefi_followup['attachments'] as $fattachments) {
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