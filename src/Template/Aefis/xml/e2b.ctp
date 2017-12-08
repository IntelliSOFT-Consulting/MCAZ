<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader>
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>999999</messagenumb>
        <messagesenderidentifier>MCAZ</messagesenderidentifier>
        <messagereceiveridentifier/>
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis');?></messagedate>
    </ichicsrmessageheader>
     <safetyreport>
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>ZW-MCAZ-<?php
            echo $aefi['reference_number'];
        ?></safetyreportid>
        <primarysourcecountry>ZW</primarysourcecountry>
        <occurcountry>ZW</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php
                if ($aefi['serious'] == 'Yes') {
                    echo 1;
                } else { echo 2;}
            ?></serious>
        <seriousnessdeath><?= ($aefi['serious_yes'] == 'Death') ? 1 : 0; ?></seriousnessdeath>
        <seriousnesslifethreatening><?= ($aefi['serious_yes'] == 'Life threatening') ? 1 : 0; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?= ($aefi['serious_yes'] == 'Hospitalizaion') ? 1 : 0; ?></seriousnesshospitalization>
        <seriousnessdisabling><?= ($aefi['serious_yes'] == 'Disabling') ? 1 : 0; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?= ($aefi['serious_yes'] == 'Congenital anomaly') ? 1 : 0; ?></seriousnesscongenitalanomali>
        <seriousnessother><?= ($aefi['serious_yes'] == 'Other Medically Important Reason') ? 1 : 0; ?></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($aefi['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd'); ?></receiptdate>
        <additionaldocument><?php
            if (count($aefi['attachments']) > 0) {
                echo 1;
            } else {
                echo 2;
            }
        ?></additionaldocument>
        <documentlist><?php
            foreach ($aefi['attachments'] as $attachment):
                echo $attachment['description'].', ';
            endforeach;
        ?></documentlist>
        <fulfillexpeditecriteria><?php
            if ($aefi['serious'] == 'Yes') {
                echo 1;
            } else { echo 2;}
        ?></fulfillexpeditecriteria>
        <authoritynumb>ZW-MCAZ-<?php
            echo $aefi['reference_number'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate/>
        <casenullification/>
        <nullificationreason/>
        <medicallyconfirm><?php
            if ($aefi['designation_id'] == 1 || $aefi['designation_id'] == 2 || $aefi['designation_id'] == 3 ) {
                echo 1;
            } else { echo 2;}
        ?></medicallyconfirm>
        <?php $arr = preg_split("/[\s]+/", $aefi['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $aefi['institution_code']; ?></reporterorganization>
            <reporterdepartment/>
            <reporterstreet/>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>ZW</reportercountry>
            <qualification><?php echo $aefi['designation_id']; ?></qualification>
            <literaturereference/>
            <studyname/>
            <sponsorstudynumb/>
            <observestudytype/>
        </primarysource>
        <sender>
            <sendertype>3</sendertype>
            <senderorganization>Medicines Control Authority of Zimbabwe</senderorganization>
            <senderdepartment>Department of Pharmacovigilance</senderdepartment>
            <sendertitle/>
            <sendergivename/>
            <sendermiddlename/>
            <senderfamilyname/>
            <senderstreetaddress/>
            <sendercity/>
            <senderstate/>
            <senderpostcode/>
            <sendercountrycode>ZW</sendercountrycode>
            <sendertel>772145191</sendertel>
            <sendertelextension/>
            <sendertelcountrycode>263</sendertelcountrycode>
            <senderfax>736980</senderfax>
            <senderfaxextension>04</senderfaxextension>
            <senderfaxcountrycode>263</senderfaxcountrycode>
            <senderemailaddress>mcaz@mcaz.co.zw</senderemailaddress>
        </sender>
        <receiver>
            <receivertype/>
            <receiverorganization/>
            <receiverdepartment/>
            <receivertitle/>
            <receivergivename/>
            <receivermiddlename/>
            <receiverfamilyname/>
            <receiverstreetaddress/>
            <receivercity/>
            <receiverstate/>
            <receiverpostcode/>
            <receivercountrycode/>
            <receivertel/>
            <receivertelextension/>
            <receivertelcountrycode/>
            <receiverfax/>
            <receiverfaxextension/>
            <receiverfaxcountrycode/>
            <receiveremailaddress/>
        </receiver>
        <patient>
            <patientinitial><?php echo $aefi['patient_name']; ?></patientinitial>
            <patientgpmedicalrecordnumb><?php echo $aefi['patient_next_of_kin']; ?></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb><?php echo $aefi['patient_next_of_kin']; ?></patientspecialistrecordnumb>
            <patienthospitalrecordnumb><?php echo $aefi['patient_next_of_kin']; ?></patienthospitalrecordnumb>
            <patientinvestigationnumb/>
            <?php
                if (!empty($aefi['date_of_birth']) && $aefi['date_of_birth'] != '--') {
                    $a = explode('-', $aefi->date_of_birth);
                    $aefi->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
                    $birthdatef = 102;
                    if (empty($aefi['date_of_birth']['day']) && empty($aefi['date_of_birth']['month'])) {
                        $birthdatef = 602;
                    } else if (empty($aefi['date_of_birth']['day']) && !empty($aefi['date_of_birth']['month'])) {
                        $birthdatef = 610;
                    } else if (!empty($aefi['date_of_birth']['day']) && empty($aefi['date_of_birth']['month'])) {
                        $birthdatef = 602;
                    }
                    echo '<patientbirthdateformat>'.$birthdatef.'</patientbirthdateformat>';
                    echo "\n";
                } else {
                    echo '<patientbirthdateformat/>';
                    echo "\n";
                }

                if(isset($birthdatef)) {
                    echo '<patientbirthdate>';
                    if($birthdatef == 102) echo date('Ymd', strtotime(implode('-', $aefi['date_of_birth'])));
                    if($birthdatef == 602) echo $aefi['date_of_birth']['year'];
                    if($birthdatef == 610) echo $aefi['date_of_birth']['year'].$aefi['date_of_birth']['month'];
                    echo '</patientbirthdate>';
                    echo "\n";
                } else {
                    echo '<patientbirthdate/>';
                    echo "\n";
                }
                ?>
            <patientonsetage/>
            <patientonsetageunit/>
            <gestationperiod/>
            <gestationperiodunit/>
            <patientagegroup/>
            <patientweight/>
            <patientheight/>
            <patientsex><?php
                if($aefi['gender'] == 'Male') echo 1 ;
                elseif($aefi['gender'] == 'Female') echo 2 ;
            ?></patientsex>
            <lastmenstrualdateformat/>
            <patientlastmenstrualdate/>
            <patientmedicalhistorytext><?php echo $aefi['past_medical_history']; ?></patientmedicalhistorytext>
            <resultstestsprocedures/>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php 
                    if($aefi['ae_severe_local_reaction']) echo 'Severe, ';
                    if($aefi['ae_seizures']) echo 'Seizures, ';
                    if($aefi['ae_abscess']) echo 'Abscess, ';
                    if($aefi['ae_sepsis']) echo 'Sepsis, ';
                    if($aefi['ae_encephalopathy']) echo 'Encephalopathy, ';
                    if($aefi['ae_toxic_shock']) echo 'Toxic, ';
                    if($aefi['ae_thrombocytopenia']) echo 'Thrombocytopenia, ';
                    if($aefi['ae_anaphylaxis']) echo 'Anaphylaxis, ';
                    if($aefi['ae_fever']) echo 'Fever, ';
                    if($aefi['ae_3days']) echo '>3 days, ';
                    if($aefi['ae_febrile']) echo 'febrile, ';
                    if($aefi['ae_beyond_joint']) echo 'beyond, ';
                    if($aefi['ae_afebrile']) echo 'afebrile, '; 
                    ?>
                </primarysourcereaction>
                <reactionmeddraversionllt>WHO-ART</reactionmeddraversionllt>
                <reactionmeddrallt/>
                <reactionmeddraversionpt/>
                <reactionmeddrapt/>
                <termhighlighted/>
                <reactionstartdateformat><?php
                    $onsetf = 102;
                    // $a = explode('-', $aefi->date_of_birth);
                    // $aefi->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
                    if (empty($aefi['date_of_birth']['day']) && empty($aefi['date_of_birth']['month'])) {
                        $onsetf = 602;
                    } else if (empty($aefi['date_of_birth']['day']) && !empty($aefi['date_of_birth']['month'])) {
                        $onsetf = 610;
                    } else if (!empty($aefi['date_of_birth']['day']) && empty($aefi['date_of_birth']['month'])) {
                        $onsetf = 602;
                    }
                    echo $onsetf;
                ?></reactionstartdateformat>
                <reactionstartdate><?php
                    if($onsetf == 102) echo date('Ymd', strtotime(implode('-', $aefi['date_of_birth'])));
                    if($onsetf == 602) echo $aefi['date_of_birth']['year'];
                    if($onsetf == 610) echo $aefi['date_of_birth']['year'].$aefi['date_of_birth']['month'];
                ?></reactionstartdate>
                <reactionenddateformat/>
                <reactionenddate/>
                <reactionduration/>
                <reactiondurationunit/>
                <reactionfirsttime/>
                <reactionfirsttimeunit/>
                <reactionlasttime/>
                <reactionlasttimeunit/>
                <reactionoutcome><?php
                $outcomes =  ['Recovered' => 1, 
                              'Recovering' => 2, 
                              'Not yet recovered' => 4, 
                              'Fatal' => 5, 
                              'Unknown' => 6];
                if (!empty($aefi['outcome'])) echo $outcomes[$aefi['outcome']];
                ?></reactionoutcome>
            </reaction>
            <?php foreach ($aefi['aefi_list_of_vaccines'] as $aefiListOfVaccine): ?>
            <drug>
                <drugcharacterization/>
                <medicinalproduct><?php echo $aefiListOfVaccine['vaccine_name']; ?></medicinalproduct>
                <obtaindrugcountry/>
                <drugbatchnumb/>
                <drugauthorizationnumb/>
                <drugauthorizationcountry/>
                <drugauthorizationholder/>
                <drugstructuredosagenumb><?php echo $aefiListOfVaccine['dosage']; ?></drugstructuredosagenumb>
                <drugstructuredosageunit/>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext/>
                <drugdosageform/>
                <drugadministrationroute/>
                <drugparadministration/>
                <reactiongestationperiod/>
                <reactiongestationperiodunit/>
                <drugindicationmeddraversion/>
                <drugindication/>
                <drugstartdateformat><?php if (!empty($aefiListOfVaccine['vaccination_date'])) echo 102; ?></drugstartdateformat>
                <drugstartdate><?php if (!empty($aefiListOfVaccine['vaccination_date'])) echo date('Ymd', strtotime($aefiListOfVaccine['vaccination_date']))?></drugstartdate>
                <drugstartperiod/>
                <drugstartperiodunit/>
                <druglastperiod/>
                <druglastperiodunit/>
                <drugenddateformat/>
                <drugenddate/>
                <drugtreatmentduration/>
                <drugtreatmentdurationunit/>
                <actiondrug/>
                <drugrecurreadministration/>
                <drugadditional/>
                <activesubstance>
                    <activesubstancename><?php echo $aefiListOfVaccine['vaccine_name']; ?></activesubstancename>
                </activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion>WHO-ART</drugreactionassesmeddraversion>
                    <drugreactionasses/>
                    <drugassessmentsource/>
                    <drugassessmentmethod/>
                    <drugresult/>
                </drugreactionrelatedness>
            </drug>
            <?php  endforeach; ?>
            <summary>
                <narrativeincludeclinical><?php echo $aefi['description_of_reaction']; ?></narrativeincludeclinical>
                <reportercomment><?php echo $aefi['comments']; ?></reportercomment>
                <senderdiagnosismeddraversion>WHO-ART</senderdiagnosismeddraversion>
                <senderdiagnosis><?php echo $aefi['past_medical_history']; ?></senderdiagnosis>
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>