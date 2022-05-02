<?php

use  App\Utility\Special; // include the Utility
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader>
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>999999</messagenumb>
        <messagesenderidentifier>MCAZ</messagesenderidentifier>
        <messagereceiveridentifier />
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis'); ?></messagedate>
    </ichicsrmessageheader>
    <safetyreport>
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>ZW-MCAZ-<?php
                                echo $saefi['reference_number'];
                                ?></safetyreportid>
        <primarysourcecountry>ZW</primarysourcecountry>
        <occurcountry>ZW</occurcountry>
        <transmissiondateformat />
        <transmissiondate />
        <reporttype>1</reporttype>
        <serious><?php
                    echo 1;
                    ?></serious>
        <seriousnessdeath><?= ($saefi['status_on_date'] == 'Died') ? 1 : 0; ?></seriousnessdeath>
        <seriousnesslifethreatening><?= ($saefi['status_on_date'] == 'Life-threatening') ? 1 : 0; ?>
        </seriousnesslifethreatening>
        <seriousnesshospitalization><?= (!empty($saefi['hospitalization_date'])) ? 1 : 0; ?>
        </seriousnesshospitalization>
        <seriousnessdisabling><?= ($saefi['status_on_date'] == 'Disabled') ? 1 : 0; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?= ($saefi['status_on_date'] == 'Congenital-anomaly') ? 1 : 0; ?>
        </seriousnesscongenitalanomali>
        <seriousnessother><?= ($saefi['status_on_date'] == 'Other Medically Important Reason') ? 1 : 0; ?>
        </seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($saefi['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd'); ?></receiptdate>
        <additionaldocument><?php
                            if (count($saefi['attachments']) > 0) {
                                echo 1;
                            } else {
                                echo 2;
                            }
                            ?></additionaldocument>
        <documentlist><?php
                        foreach ($saefi['attachments'] as $attachment) :
                            echo Special::escapeWord($attachment['description']) . ', ';
                        endforeach;
                        ?></documentlist>
        <fulfillexpeditecriteria><?php
                                    echo 1;
                                    ?></fulfillexpeditecriteria>
        <authoritynumb>ZW-MCAZ-<?php
                                echo $saefi['reference_number'];
                                ?></authoritynumb>
        <companynumb />
        <duplicate />
        <casenullification />
        <nullificationreason />
        <medicallyconfirm><?php
                            if ($saefi['designation_id'] == 1 || $saefi['designation_id'] == 2 || $saefi['designation_id'] == 3) {
                                echo 1;
                            } else {
                                echo 2;
                            }
                            ?></medicallyconfirm>
        <reportduplicate>
            <duplicatesource></duplicatesource>
            <duplicatenumb>ZW-MCAZ-<?php
                                    echo $saefi['reference_number'];
                                    ?></duplicatenumb>
        </reportduplicate>
        <?php $arr = preg_split("/[\s]+/", $saefi['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo Special::escapeWord($arr[0]); ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo Special::escapeWord($arr[1]) . ' ';
                                if (isset($arr[2])) echo Special::escapeWord($arr[2]);  ?></reporterfamilyname>
            <reporterorganization><?php echo Special::escapeWord($saefi['name_of_vaccination_site']); ?>
            </reporterorganization>
            <reporterdepartment />
            <reporterstreet />
            <reportercity />
            <reporterstate />
            <reporterpostcode />
            <reportercountry>ZW</reportercountry>
            <qualification>
                <?php
                $desg = [
                    1 => 1, 2 => 1, 3 => 3, 4 => 2, 5 => 3, 6 => 2, 7 => 3, 8 => 1, 9 => 1, 10 => 1, 11 => 1, 12 => 1,
                    13 => 1, 14 => 1, 15 => 1, 16 => 1, 17 => 1, 18 => 1, 19 => 3, 20 => 1, 21 => 5, 22 => 5, 23 => 3,
                ];
                $dr = 3;
                if ($saefi['designation_id']) {
                    $dr = $saefi['designation_id'];
                }
                echo $desg[$dr];
                ?>
            </qualification>
            <literaturereference />
            <studyname />
            <sponsorstudynumb />
            <observestudytype />
        </primarysource>
        <sender>
            <sendertype>3</sendertype>
            <senderorganization>Medicines Control Authority of Zimbabwe</senderorganization>
            <senderdepartment>Department of Pharmacovigilance</senderdepartment>
            <sendertitle />
            <sendergivename />
            <sendermiddlename />
            <senderfamilyname />
            <senderstreetaddress />
            <sendercity />
            <senderstate />
            <senderpostcode />
            <sendercountrycode>ZW</sendercountrycode>
            <sendertel>772145191</sendertel>
            <sendertelextension />
            <sendertelcountrycode>263</sendertelcountrycode>
            <senderfax>736980</senderfax>
            <senderfaxextension>04</senderfaxextension>
            <senderfaxcountrycode>263</senderfaxcountrycode>
            <senderemailaddress>mcaz@mcaz.co.zw</senderemailaddress>
        </sender>
        <receiver>
            <receivertype />
            <receiverorganization />
            <receiverdepartment />
            <receivertitle />
            <receivergivename />
            <receivermiddlename />
            <receiverfamilyname />
            <receiverstreetaddress />
            <receivercity />
            <receiverstate />
            <receiverpostcode />
            <receivercountrycode />
            <receivertel />
            <receivertelextension />
            <receivertelcountrycode />
            <receiverfax />
            <receiverfaxextension />
            <receiverfaxcountrycode />
            <receiveremailaddress />
        </receiver>
        <patient>
            <patientinitial><?php echo Special::escapeWord($saefi['patient_name']); ?></patientinitial>
            <patientgpmedicalrecordnumb><?php echo $saefi['ip_no']; ?></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb><?php echo $saefi['ip_no']; ?></patientspecialistrecordnumb>
            <patienthospitalrecordnumb><?php echo $saefi['ip_no']; ?></patienthospitalrecordnumb>
            <patientinvestigationnumb />
            <?php

            if (!empty($saefi['date_of_birth'])) {
                echo "<patientbirthdateformat>102</patientbirthdateformat>";
                echo "<patientbirthdate>" . date('Ymd', strtotime($saefi['date_of_birth'])) . "</patientbirthdate>";
            }

            ?>

            <?php
            if (!empty($saefi->age_at_onset_years)) {
                echo "<patientonsetage>" . $saefi->age_at_onset_years . "</patientonsetage>";
                echo "<patientonsetageunit>801</patientonsetageunit>";
            } elseif (!empty($saefi->age_at_onset_months)) {
                echo "<patientonsetage>" . $saefi->age_at_onset_months . "</patientonsetage>";
                echo "<patientonsetageunit>802</patientonsetageunit>";
            } elseif (!empty($saefi->age_at_onset_days)) {
                echo "<patientonsetage>" . $saefi->age_at_onset_days . "</patientonsetage>";
                echo "<patientonsetageunit>804</patientonsetageunit>";
            } else {
                echo "<patientonsetage/>";
                echo "<patientonsetageunit/>";
            }
            ?>

            <gestationperiod />
            <gestationperiodunit />
            <?php
            $ages = array(
                'neonate' => 1,
                'infant' => 2,
                'child' => 3,
                'adolescent' => 4,
                'adult' => 5,
                'elderly' => 6,
                '< 1 Year' => 2,
                '1-5 years' => 3,
                '> 5 years' => 3,
            );
            if (!empty($saefi['age_group']) && array_key_exists($saefi['age_group'], $ages)) echo '<patientagegroup>' . $ages[$saefi['age_group']] . '</patientagegroup>';
            echo "\n";
            ?>
            <patientweight><?php echo $saefi['weight']; ?></patientweight>
            <patientheight><?php echo round($saefi['height']); ?></patientheight>
            <patientsex><?php
                        if ($saefi['gender'] == 'Male') echo 1;
                        elseif ($saefi['gender'] == 'Female') echo 2;
                        ?></patientsex>
            <lastmenstrualdateformat />
            <patientlastmenstrualdate />
            <patientmedicalhistorytext><?php echo Special::escapeWord($saefi['medical_history']); ?>
            </patientmedicalhistorytext>
            <resultstestsprocedures />
            <patientdeath>
                <patientdeathdateformat />
                <patientdeathdate />
                <patientautopsyyesno />
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php echo Special::escapeWord($saefi['signs_symptoms']); ?>
                </primarysourcereaction>
                <reactionmeddraversionllt>WHO-ART</reactionmeddraversionllt>
                <reactionmeddrallt><?php echo Special::escapeWord($saefi->signs_symptoms); ?></reactionmeddrallt>
                <reactionmeddraversionpt />
                <reactionmeddrapt />
                <termhighlighted />
                <?php

                if (!empty($saefi['report_date'])) {
                    echo "<reactionstartdateformat>102</reactionstartdateformat>";
                    echo "<reactionstartdate>" . date('Ymd', strtotime($saefi['report_date'])) . "</reactionstartdate>";
                } else {
                    echo "<reactionstartdateformat/>
                              <reactionstartdate/>";
                }

                ?>
                <reactionenddateformat />
                <reactionenddate />
                <reactionduration />
                <reactiondurationunit />
                <reactionfirsttime />
                <reactionfirsttimeunit />
                <reactionlasttime />
                <reactionlasttimeunit />
                <reactionoutcome><?php
                                    $outcomes =  [
                                        'Recovered' => 1,
                                        'Recovering' => 2,
                                        'Not yet recovered' => 4,
                                        'Fatal' => 5,
                                        'Unknown' => 6,
                                        'Died' => 5,
                                        'Disabled' => 4,
                                        'Recovered completely' => 1,
                                    ];
                                    if (!empty($saefi['status_on_date'])) echo $outcomes[$saefi['status_on_date']];
                                    ?></reactionoutcome>
            </reaction>
            <?php foreach ($saefi['aefi_list_of_vaccines'] as $saefiListOfDrug) : ?>
            <drug>
                <drugcharacterization><?php
                                            if ($saefiListOfDrug['suspected_drug']) echo 1;
                                            else echo 2;
                                            ?></drugcharacterization>
                <medicinalproduct><?php echo $saefiListOfDrug['vaccine_name']; ?></medicinalproduct>
                <obtaindrugcountry />
                <drugbatchnumb><?php echo $saefiListOfDrug['batch_number']; ?></drugbatchnumb>
                <drugauthorizationnumb />
                <drugauthorizationcountry />
                <drugauthorizationholder />
                <drugstructuredosagenumb><?php echo $saefiListOfDrug['dose']; ?></drugstructuredosagenumb>
                <drugstructuredosageunit><?php
                                                if (!empty($saefiListOfDrug['dose_id'])) {
                                                    $result = $doses->all();
                                                    $data = $result->toArray();
                                                    echo $data[$saefiListOfDrug['dose_id']];
                                                };
                                                ?></drugstructuredosageunit>
                <drugseparatedosagenumb />
                <drugintervaldosageunitnumb />
                <drugintervaldosagedefinition />
                <drugcumulativedosagenumb />
                <drugcumulativedosageunit />
                <drugdosagetext><?php echo $saefiListOfDrug['dosage']; ?></drugdosagetext>
                <drugdosageform />
                <drugadministrationroute><?php
                                                if (!empty($saefiListOfDrug['route_id'])) {
                                                    $result = $routes->all();
                                                    $data = $result->toArray();
                                                    echo $data[$saefiListOfDrug['route_id']];
                                                };
                                                ?></drugadministrationroute>
                <drugparadministration />
                <reactiongestationperiod />
                <reactiongestationperiodunit />
                <drugindicationmeddraversion />
                <drugindication><?php echo $saefiListOfDrug['indication']; ?></drugindication>
                <drugstartdateformat><?php if (!empty($saefiListOfDrug['vaccination_date'])) echo 102; ?>
                </drugstartdateformat>
                <drugstartdate>
                    <?php if (!empty($saefiListOfDrug['vaccination_date'])) echo date('Ymd', strtotime($saefiListOfDrug['vaccination_date'])) ?>
                </drugstartdate>
                <drugstartperiod />
                <drugstartperiodunit />
                <druglastperiod />
                <druglastperiodunit />
                <drugenddateformat>102</drugenddateformat>
                <drugenddate><?php
                                    if (!empty($saefiListOfDrug['stop_date'])) {
                                        echo date('Ymd', strtotime($saefiListOfDrug['stop_date']));
                                    }
                                    ?></drugenddate>
                <drugtreatmentduration />
                <drugtreatmentdurationunit />
                <actiondrug><?php
                                $actions = array(
                                    'drug withdrawn' => 1,
                                    'dose increased' => 3,
                                    'dose reduced' => 2,
                                    'dose not changed' => 4,
                                    'not applicable' => 6,
                                    'unknown' => 5,
                                );
                                if (!empty($saefi['action_taken'])) echo $actions[strtolower($saefi['action_taken'])];
                                ?></actiondrug>
                <drugrecurreadministration />
                <drugadditional><?php echo $saefiListOfDrug['diluent_batch_number']; ?></drugadditional>
                <activesubstance>
                    <activesubstancename><?php echo Special::escapeWord($saefiListOfDrug['drug_name']); ?>
                    </activesubstancename>
                </activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion>WHO-ART</drugreactionassesmeddraversion>
                    <drugreactionasses><?php echo Special::escapeWord($saefi->signs_symptoms); ?></drugreactionasses>
                    <drugassessmentsource />
                    <drugassessmentmethod>WHO causality</drugassessmentmethod>
                    <drugresult><?php
                                    if (strtolower($saefi['causality']) == 'certain') echo 'certain';
                                    if (strtolower($saefi['causality']) == 'probable / likely') echo 'probable/likely';
                                    if (strtolower($saefi['causality']) == 'possible') echo 'possible';
                                    if (strtolower($saefi['causality']) == 'unlikely') echo 'unlikely';
                                    if (strtolower($saefi['causality']) == 'conditional / unclassified') echo 'conditional/unclassified';
                                    if (strtolower($saefi['causality']) == 'unassessable / unclassifiable') echo 'unassessable/unclassifiable';
                                    ?></drugresult>
                </drugreactionrelatedness>
            </drug>
            <?php endforeach; ?>
            <summary>
                <narrativeincludeclinical><?php echo Special::escapeWord($saefi['signs_symptoms']); ?>
                </narrativeincludeclinical>
                <reportercomment><?php echo Special::escapeWord($saefi['relevant_findings']); ?></reportercomment>
                <senderdiagnosismeddraversion>WHO-ART</senderdiagnosismeddraversion>
                <senderdiagnosis><?php echo Special::escapeWord($saefi['past_drug_therapy']); ?></senderdiagnosis>
                <sendercomment />
            </summary>
        </patient>
    </safetyreport>
</ichicsr>