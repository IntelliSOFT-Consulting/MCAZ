<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Log\Log;

class VigibaseApiComponent extends Component
{
    public function sadr_e2b($sadr, $doses, $routes)
    {
    	//TODO: Add causality assessment from reviewer to E2B file
    	$attachments = '';
    	foreach ($sadr['attachments'] as $attachment):
           $attachments = $attachments.'; '.$attachment['description'];
        endforeach;
        $arr = preg_split("/[\s]+/", $sadr['reporter_name']); 
        $birthday = '';
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
                    $birthday .= '<patientbirthdateformat>'.$birthdatef.'</patientbirthdateformat>';
                    $birthday .= "\n";
                } else {
                    $birthday .= '<patientbirthdateformat/>';
                    $birthday .= "\n";
                }

                if(isset($birthdatef)) {
                    $birthday .= '<patientbirthdate>';
                    if($birthdatef == 102) $birthday .= date('Ymd', strtotime(implode('-', $sadr['date_of_birth'])));
                    if($birthdatef == 602) $birthday .= $sadr['date_of_birth']['year'];
                    if($birthdatef == 610) $birthday .= $sadr['date_of_birth']['year'].$sadr['date_of_birth']['month'];
                    $birthday .= '</patientbirthdate>';
                    $birthday .= "\n";
                } else {
                    $birthday .= '<patientbirthdate/>';
                    $birthday .= "\n";
                }
                
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

        $onsetd = '';
        if($onsetf == 102) $onsetd = date('Ymd', strtotime(implode('-', $sadr['date_of_onset_of_reaction'])));
        if($onsetf == 602) $onsetd = $sadr['date_of_onset_of_reaction']['year'];
        if($onsetf == 610) $onsetd = $sadr['date_of_onset_of_reaction']['year'].$sadr['date_of_onset_of_reaction']['month'];

        $outcome ='';
        $outcomes =  ['Recovered' => 1, 
                              'Recovering' => 2, 
                              'Not yet recovered' => 4, 
                              'Fatal' => 5, 
                              'Unknown' => 6];
        if (!empty($sadr['outcome'])) $outcome = $outcomes[$sadr['outcome']];
        // List of Drugs 
        
        $result = $doses->all();
        $dose = $result->toArray();
        $route = $routes->toArray();
        $actions = array(
                        'drug withdrawn' => 1,
                        'dose increased' => 3,
                        'dose reduced' => 2,
                        'dose not changed' => 4,
                        'not applicable' => 6,
                        'unknown' => 5,
                    ); 
        $causality = '';
        if(strtolower($sadr['causality']) == 'certain') $causality = 'certain';
        if(strtolower($sadr['causality']) == 'probable / likely') $causality = 'probable/likely';
        if(strtolower($sadr['causality']) == 'possible') $causality = 'possible';
        if(strtolower($sadr['causality']) == 'unlikely') $causality = 'unlikely';
        if(strtolower($sadr['causality']) == 'conditional / unclassified') $causality = 'conditional/unclassified';
        if(strtolower($sadr['causality']) == 'unassessable / unclassifiable') $causality = 'unassessable/unclassifiable';

        $gender = ($sadr['gender'] == 'Male') ? 1 : 2;

        $listofdrugs = '';
        foreach ($sadr['sadr_list_of_drugs'] as $sadrListOfDrug) {
        	$suspected_drug = ($sadrListOfDrug['suspected_drug'] == 1) ? 1 : 2;
        	$dosage = (!empty($sadrListOfDrug['dose_id'])) ? $dose[$sadrListOfDrug['dose_id']] : '';
        	$aroute = (!empty($sadrListOfDrug['route_id'])) ? $route[$sadrListOfDrug['route_id']] : '';
        	$start_date = (!empty($sadrListOfDrug['start_date'])) ? date('Ymd', strtotime($sadrListOfDrug['start_date'])) : '';
        	$end_date = (!empty($sadrListOfDrug['stop_date'])) ? date('Ymd', strtotime($sadrListOfDrug['stop_date'])) : '';
        	$actiondrug = (!empty($sadr['action_taken'])) ? $actions[strtolower($sadr['action_taken'])] : '';
            $listofdrugs .= '<drug>
<drugcharacterization>'.$suspected_drug.'</drugcharacterization>
<medicinalproduct>'.$sadrListOfDrug['brand_name'].'</medicinalproduct>
<obtaindrugcountry/>
<drugbatchnumb/>
<drugauthorizationnumb/>
<drugauthorizationcountry/>
<drugauthorizationholder/>
<drugstructuredosagenumb>'.$sadrListOfDrug['dose'].'</drugstructuredosagenumb>
<drugstructuredosageunit>'.$dosage.'</drugstructuredosageunit>
<drugseparatedosagenumb/>
<drugintervaldosageunitnumb/>
<drugintervaldosagedefinition/>
<drugcumulativedosagenumb/>
<drugcumulativedosageunit/>
<drugdosagetext/>
<drugdosageform/>
<drugadministrationroute>'.$aroute.'</drugadministrationroute>
<drugparadministration/>
<reactiongestationperiod/>
<reactiongestationperiodunit/>
<drugindicationmeddraversion/>
<drugindication>'.$sadrListOfDrug['indication'].'</drugindication>
<drugstartdateformat>102</drugstartdateformat>
<drugstartdate>'.$start_date.'</drugstartdate>
<drugstartperiod/>
<drugstartperiodunit/>
<druglastperiod/>
<druglastperiodunit/>
<drugenddateformat>102</drugenddateformat>
<drugenddate>'.$end_date.'</drugenddate>
<drugtreatmentduration/>
<drugtreatmentdurationunit/>
<actiondrug>'.$actiondrug.'
                </actiondrug>
<drugrecurreadministration/>
<drugadditional/>
<activesubstance>
<activesubstancename>'.$sadrListOfDrug['drug_name'].'</activesubstancename>
</activesubstance>
<drugreactionrelatedness>
<drugreactionassesmeddraversion>WHO-ART</drugreactionassesmeddraversion>
<drugreactionasses/>
<drugassessmentsource/>
<drugassessmentmethod>WHO causality</drugassessmentmethod>
<drugresult>'.$causality.'</drugresult>
</drugreactionrelatedness>
</drug>
            ';
        }
        //end

$response = '<?xml version="1.0" encoding="UTF-8"?>
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
<messagedate>'.date('YmdHis').'</messagedate>
</ichicsrmessageheader>
<safetyreport>
<safetyreportversion>1</safetyreportversion>
<safetyreportid>ZW-MCAZ-'.$sadr['reference_number'].'</safetyreportid>
<primarysourcecountry>ZW</primarysourcecountry>
<occurcountry>ZW</occurcountry>
<transmissiondateformat/>
<transmissiondate/>
<reporttype>1</reporttype>
<serious>'.(($sadr['severity'] == 'Yes') ? 1 : 2).'</serious>
<seriousnessdeath>'.(($sadr['severity_reason'] == 'Death') ? 1 : 2).'</seriousnessdeath>
<seriousnesslifethreatening>'.(($sadr['severity_reason'] == 'Life-threatening') ? 1 : 2).'</seriousnesslifethreatening>
<seriousnesshospitalization>'.(($sadr['severity_reason'] == 'Hospitalizaion/Prolonged') ? 1 : 2).'</seriousnesshospitalization>
<seriousnessdisabling>'.(($sadr['severity_reason'] == 'Disabling') ? 1 : 2).'</seriousnessdisabling>
<seriousnesscongenitalanomali>'.(($sadr['severity_reason'] == 'Congenital-anomaly') ? 1 : 2).'</seriousnesscongenitalanomali>
<seriousnessother>'.(($sadr['severity_reason'] == 'Other Medically Important Reason') ? 1 : 2).'</seriousnessother>
<receivedateformat>102</receivedateformat>
<receivedate>'.date('Ymd', strtotime($sadr['created'])).'</receivedate>
<receiptdateformat>102</receiptdateformat>
<receiptdate>'.date('Ymd').'</receiptdate>
<additionaldocument>'.((count($sadr['attachments']) > 0) ? 1: 2 ).'
</additionaldocument>
<documentlist>'.$attachments.'</documentlist>
<fulfillexpeditecriteria>'.(($sadr['severity'] == 'Yes') ? 1: 2).'</fulfillexpeditecriteria>
<authoritynumb>ZW-MCAZ-'.$sadr['reference_number'].'</authoritynumb>
<companynumb/>
<duplicate/>
<casenullification/>
<nullificationreason/>
<medicallyconfirm>'.(($sadr['designation_id'] == 1 || $sadr['designation_id'] == 2 || $sadr['designation_id'] == 3 ) ? 1 : 2).'</medicallyconfirm>
<primarysource>
<reportergivename>'.$sadr['reporter_name'].'</reportergivename>
<reporterfamilyname>'.$sadr['reporter_name'].'</reporterfamilyname>
<reporterorganization>'.$sadr['institution_code'].'</reporterorganization>
<reporterdepartment/>
<reporterstreet/>
<reportercity/>
<reporterstate/>
<reporterpostcode/>
<reportercountry>ZW</reportercountry>
<qualification>'.$sadr['designation_id'].'</qualification>
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
<patientinitial>'.$sadr['patient_name'].'</patientinitial>
<patientgpmedicalrecordnumb>'.$sadr['ip_no'].'</patientgpmedicalrecordnumb>
<patientspecialistrecordnumb>'.$sadr['ip_no'].'</patientspecialistrecordnumb>
<patienthospitalrecordnumb>'.$sadr['ip_no'].'</patienthospitalrecordnumb>
<patientinvestigationnumb/>
'.$birthday.'
<patientonsetage/>
<patientonsetageunit/>
<gestationperiod/>
<gestationperiodunit/>
<patientweight>'.$sadr['weight'].'</patientweight>
<patientheight>'.round($sadr['height']).'</patientheight>
<patientsex>'.$gender.'</patientsex>
<lastmenstrualdateformat/>
<patientlastmenstrualdate/>
<patientmedicalhistorytext>'.$sadr['medical_history'].'</patientmedicalhistorytext>
<resultstestsprocedures/>
<patientdeath>
<patientdeathdateformat/>
<patientdeathdate/>
<patientautopsyyesno/>
</patientdeath>
<reaction>
<primarysourcereaction>'.$sadr['description_of_reaction'].'</primarysourcereaction>
<reactionmeddraversionllt>WHO-ART</reactionmeddraversionllt>
<reactionmeddrallt>'.$sadr['description_of_reaction'].'</reactionmeddrallt>
<reactionmeddraversionpt/>
<reactionmeddrapt/>
<termhighlighted/>
<reactionstartdateformat>'.$onsetf.'</reactionstartdateformat>
<reactionstartdate>'.$onsetd.'</reactionstartdate>
<reactionenddateformat/>
<reactionenddate/>
<reactionduration/>
<reactiondurationunit/>
<reactionfirsttime/>
<reactionfirsttimeunit/>
<reactionlasttime/>
<reactionlasttimeunit/>
<reactionoutcome>'.$outcome.'</reactionoutcome>
</reaction>
'.$listofdrugs.'
<summary>
<narrativeincludeclinical>'.$sadr['description_of_reaction'].'</narrativeincludeclinical>
<reportercomment>'.$sadr['lab_test_results'].'</reportercomment>
<senderdiagnosismeddraversion>WHO-ART</senderdiagnosismeddraversion>
<senderdiagnosis>'.$sadr['past_drug_therapy'].'</senderdiagnosis>
<sendercomment/>
</summary>
</patient>
</safetyreport>
</ichicsr>';
		
		//Log::write('debug', 'E2B Response:: '.$response);
        return $response;
    }
}
?>