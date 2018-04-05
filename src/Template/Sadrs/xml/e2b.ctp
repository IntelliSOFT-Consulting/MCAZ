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
            echo $sadr['reference_number'];
        ?></safetyreportid>
        <primarysourcecountry>ZW</primarysourcecountry>
        <occurcountry>ZW</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php
                if ($sadr['severity'] == 'Yes') {
                    echo 1;
                } else { echo 2;}
            ?></serious>
        <seriousnessdeath><?= ($sadr['severity_reason'] == 'Death') ? 1 : 2; ?></seriousnessdeath>
        <seriousnesslifethreatening><?= ($sadr['severity_reason'] == 'Life-threatening') ? 1 : 2; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?= ($sadr['severity_reason'] == 'Hospitalizaion/Prolonged') ? 1 : 2; ?></seriousnesshospitalization>
        <seriousnessdisabling><?= ($sadr['severity_reason'] == 'Disabling') ? 1 : 2; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?= ($sadr['severity_reason'] == 'Congenital-anomaly') ? 1 : 2; ?></seriousnesscongenitalanomali>
        <seriousnessother><?= ($sadr['severity_reason'] == 'Other Medically Important Reason') ? 1 : 2; ?></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($sadr['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd'); ?></receiptdate>
        <additionaldocument><?php
            if (count($sadr['attachments']) > 0) {
                echo 1;
            } else {
                echo 2;
            }
        ?></additionaldocument>
        <documentlist><?php
            foreach ($sadr['attachments'] as $attachment):
                echo $attachment['description'].'; ';
            endforeach;
        ?></documentlist>
        <fulfillexpeditecriteria><?php
            if ($sadr['severity'] == 'Yes') {
                echo 1;
            } else { echo 2;}
        ?></fulfillexpeditecriteria>
        <authoritynumb>ZW-MCAZ-<?php
            echo $sadr['reference_number'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate/>
        <casenullification/>
        <nullificationreason/>
        <medicallyconfirm><?php
            if ($sadr['designation_id'] == 1 || $sadr['designation_id'] == 2 || $sadr['designation_id'] == 3  || $sadr['designation_id'] == 20 ||
                $sadr['designation_id'] == 15 || $sadr['designation_id'] == 5 || $sadr['designation_id'] == 9 || $sadr['designation_id'] == 7 ||
                $sadr['designation_id'] == 18 || $sadr['designation_id'] == 11 || $sadr['designation_id'] == 16 || $sadr['designation_id'] == 14) {
                echo 1;
            } else { echo 2;}
        ?></medicallyconfirm>
        <?php $arr = preg_split("/[\s]+/", $sadr['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $sadr['institution_code']; ?></reporterorganization>
            <reporterdepartment/>
            <reporterstreet/>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>ZW</reportercountry>
            <qualification>
                <?php 
                    $desg = [1 => 1, 2 => 1, 3 => 3, 4 => 2, 5 => 3, 6 => 2, 7 => 3, 8 => 1, 9 => 1, 10 => 1, 11 => 1, 12 => 1, 
                             13 => 1, 14 => 1, 15 => 1, 16 => 1, 17 => 1, 18 => 1, 19 => 3, 20 => 1, 21 => 5, 22 => 5, 23 => 3, 
                          ];
                    echo $desg[($sadr['designation_id']) ?? 3]; 
                ?>
            </qualification>
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
            <patientinitial><?php echo $sadr['patient_name']; ?></patientinitial>
            <patientgpmedicalrecordnumb><?php echo $sadr['ip_no']; ?></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb><?php echo $sadr['ip_no']; ?></patientspecialistrecordnumb>
            <patienthospitalrecordnumb><?php echo $sadr['ip_no']; ?></patienthospitalrecordnumb>
            <patientinvestigationnumb/>
            <?php
                if (!empty($sadr['date_of_birth']) && $sadr['date_of_birth'] != '--') {
                    $a = explode('-', $sadr->date_of_birth);
                    $sadr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
                    $birthdatef = 102;
                    if (empty($sadr['date_of_birth']['day']) && empty($sadr['date_of_birth']['month'])) {
                        $birthdatef = 602;
                    } else if (empty($sadr['date_of_birth']['day']) && !empty($sadr['date_of_birth']['month'])) {
                        $birthdatef = 610;
                    } else if (!empty($sadr['date_of_birth']['day']) && empty($sadr['date_of_birth']['month'])) {
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
                    if($birthdatef == 102) echo date('Ymd', strtotime(implode('-', $sadr['date_of_birth'])));
                    if($birthdatef == 602) echo $sadr['date_of_birth']['year'];
                    if($birthdatef == 610) echo $sadr['date_of_birth']['year'].$sadr['date_of_birth']['month'];
                    echo '</patientbirthdate>';
                    echo "\n";
                } else {
                    echo '<patientbirthdate/>';
                    echo "\n";
                }
                ?>

            <?php
                if (!empty($sadr->year_of_birth)) {
                    echo "<patientonsetage>".$sadr->year_of_birth."</patientonsetage>";
                    echo "<patientonsetageunit>801</patientonsetageunit>";
                } elseif (!empty($sadr->month_of_birth)) {
                    echo "<patientonsetage>".$sadr->month_of_birth."</patientonsetage>";
                    echo "<patientonsetageunit>802</patientonsetageunit>";
                } elseif (!empty($sadr->day_of_birth)) {
                    echo "<patientonsetage>".$sadr->day_of_birth."</patientonsetage>";
                    echo "<patientonsetageunit>804</patientonsetageunit>";
                } else {
                    echo "<patientonsetage/>";
                    echo "<patientonsetageunit/>";
                }
            ?>
            <gestationperiod/>
            <gestationperiodunit/>
            <?php
                $ages = array(
                                'neonate'=>1,
                                'infant' => 2,
                                'child' => 3,
                                'adolescent' => 4,
                                'adult' => 5,
                                'elderly' => 6,
                            );
                if (!empty($sadr['age_group']) && array_key_exists($sadr['age_group'], $ages)) echo '<patientagegroup>'.$ages[$sadr['age_group']].'</patientagegroup>';
                echo "\n";
            ?>
            <patientweight><?php echo $sadr['weight']; ?></patientweight>
            <patientheight><?php echo round($sadr['height']);?></patientheight>
            <patientsex><?php
                if($sadr['gender'] == 'Male') echo 1 ;
                elseif($sadr['gender'] == 'Female') echo 2 ;
            ?></patientsex>
            <lastmenstrualdateformat/>
            <patientlastmenstrualdate/>
            <patientmedicalhistorytext><?php echo $sadr['medical_history']; ?></patientmedicalhistorytext>
            <resultstestsprocedures/>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php echo $sadr['description_of_reaction']; ?></primarysourcereaction>
                <reactionmeddraversionllt>WHO-ART</reactionmeddraversionllt>
                <reactionmeddrallt><?php echo $sadr['description_of_reaction']; ?></reactionmeddrallt>
                <reactionmeddraversionpt/>
                <reactionmeddrapt/>
                <termhighlighted/>
                <reactionstartdateformat><?php
                    $onsetf = 102;
                    $a = explode('-', $sadr->date_of_onset_of_reaction);
                    $sadr->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
                    if (empty($sadr['date_of_onset_of_reaction']['day']) && empty($sadr['date_of_onset_of_reaction']['month'])) {
                        $onsetf = 602;
                    } else if (empty($sadr['date_of_onset_of_reaction']['day']) && !empty($sadr['date_of_onset_of_reaction']['month'])) {
                        $onsetf = 610;
                    } else if (!empty($sadr['date_of_onset_of_reaction']['day']) && empty($sadr['date_of_onset_of_reaction']['month'])) {
                        $onsetf = 602;
                    }
                    echo $onsetf;
                ?></reactionstartdateformat>
                <reactionstartdate><?php
                    if($onsetf == 102) echo date('Ymd', strtotime(implode('-', $sadr['date_of_onset_of_reaction'])));
                    if($onsetf == 602) echo $sadr['date_of_onset_of_reaction']['year'];
                    if($onsetf == 610) echo $sadr['date_of_onset_of_reaction']['year'].$sadr['date_of_onset_of_reaction']['month'];
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
                if (!empty($sadr['outcome'])) echo $outcomes[$sadr['outcome']];
                ?></reactionoutcome>
            </reaction>
            <?php foreach ($sadr['sadr_list_of_drugs'] as $sadrListOfDrug): ?>
            <drug>
                <drugcharacterization><?php
                    if ($sadrListOfDrug['suspected_drug']) echo 1 ;
                    else echo 2;
                ?></drugcharacterization>
                <medicinalproduct><?php echo $sadrListOfDrug['brand_name']; ?></medicinalproduct>
                <obtaindrugcountry/>
                <drugbatchnumb/>
                <drugauthorizationnumb/>
                <drugauthorizationcountry/>
                <drugauthorizationholder/>
                <drugstructuredosagenumb><?php echo $sadrListOfDrug['dose']; ?></drugstructuredosagenumb>
                <drugstructuredosageunit><?php
                    if(!empty($sadrListOfDrug['dose_id'])) {
                        $result = $doses->all();
                        $data = $result->toArray();
                        echo $data[$sadrListOfDrug['dose_id']];
                    };
                ?></drugstructuredosageunit>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext/>
                <drugdosageform/>
                <drugadministrationroute><?php
                    if(!empty($sadrListOfDrug['route_id'])) {
                        $result = $routes->all();
                        $data = $result->toArray();
                        echo $data[$sadrListOfDrug['route_id']];
                    };
                ?></drugadministrationroute>
                <drugparadministration/>
                <reactiongestationperiod/>
                <reactiongestationperiodunit/>
                <drugindicationmeddraversion/>
                <drugindication><?php echo $sadrListOfDrug['indication']; ?></drugindication>
                <drugstartdateformat><?php if (!empty($sadrListOfDrug['start_date'])) echo 102; ?></drugstartdateformat>
                <drugstartdate><?php if (!empty($sadrListOfDrug['start_date'])) echo date('Ymd', strtotime($sadrListOfDrug['start_date']))?></drugstartdate>
                <drugstartperiod/>
                <drugstartperiodunit/>
                <druglastperiod/>
                <druglastperiodunit/>
                <drugenddateformat>102</drugenddateformat>
                <drugenddate><?php
                    if (!empty($sadrListOfDrug['stop_date'])) {
                        echo date('Ymd', strtotime($sadrListOfDrug['stop_date']));
                    }
                ?></drugenddate>
                <drugtreatmentduration/>
                <drugtreatmentdurationunit/>
                <actiondrug><?php
                    $actions = array(
                        'drug withdrawn' => 1,
                        'dose increased' => 3,
                        'dose reduced' => 2,
                        'dose not changed' => 4,
                        'not applicable' => 6,
                        'unknown' => 5,
                        'medical treatment of adr' => 5
                    );
                    if (!empty($sadr['action_taken'])) echo $actions[strtolower($sadr['action_taken'])];
                ?></actiondrug>
                <drugrecurreadministration/>
                <drugadditional/>
                <activesubstance>
                    <activesubstancename><?php echo $sadrListOfDrug['drug_name']; ?></activesubstancename>
                </activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion>WHO-ART</drugreactionassesmeddraversion>
                    <drugreactionasses><?php echo $sadr['description_of_reaction']; ?></drugreactionasses>
                    <drugassessmentsource/>
                    <drugassessmentmethod>WHO causality</drugassessmentmethod>
                    <drugresult><?php
                            if(strtolower($sadr['relatedness']) == 'certain') echo 'certain';
                            if(strtolower($sadr['relatedness']) == 'probable / likely') echo 'probable/likely';
                            if(strtolower($sadr['relatedness']) == 'possible') echo 'possible';
                            if(strtolower($sadr['relatedness']) == 'unlikely') echo 'unlikely';
                            if(strtolower($sadr['relatedness']) == 'conditional / unclassified') echo 'conditional/unclassified';
                            if(strtolower($sadr['relatedness']) == 'unassessable / unclassifiable') echo 'unassessable/unclassifiable';
                    ?></drugresult>
                </drugreactionrelatedness>
            </drug>
            <?php  endforeach; ?>
            <summary>
                <narrativeincludeclinical><?php echo $sadr['description_of_reaction']; ?></narrativeincludeclinical>
                <reportercomment><?php echo $sadr['lab_test_results']; ?></reportercomment>
                <senderdiagnosismeddraversion>WHO-ART</senderdiagnosismeddraversion>
                <senderdiagnosis><?php echo $sadr['past_drug_therapy']; ?></senderdiagnosis>
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>
