<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader>
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>999999</messagenumb>
        <messagesenderidentifier>PPB</messagesenderidentifier>
        <messagereceiveridentifier/>
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis');?></messagedate>
    </ichicsrmessageheader>
     <safetyreport>
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>KE-PPB-<?php
            echo $aefi['Aefi']['id'];
        ?></safetyreportid>
        <primarysourcecountry>KE</primarysourcecountry>
        <occurcountry>KE</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php
                if ($aefi['Aefi']['outcome'] == 'Died') {
                    echo 1;
                } else { echo 2;}
            ?></serious>
        <seriousnessdeath><?php   echo ($aefi['Aefi']['outcome'] == 'Died') ? 1 : 0; ?></seriousnessdeath>
        <seriousnesslifethreatening><?php   echo ($aefi['Aefi']['anaphylaxis'] || $aefi['Aefi']['meningitis'] || $aefi['Aefi']['convulsion']) ? 1 : 0; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?php   echo ($aefi['Aefi']['bcg'] || $aefi['Aefi']['high_fever'] || $aefi['Aefi']['local_reaction']) ? 1 : 0; ?></seriousnesshospitalization>
        <seriousnessdisabling><?php   echo ($aefi['Aefi']['toxic_shock'] || $aefi['Aefi']['paralysis']) ? 1 : 0; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?php   echo ($aefi['Aefi']['urticaria']) ? 1 : 0; ?></seriousnesscongenitalanomali>
        <seriousnessother><?php   echo ($aefi['Aefi']['abscess'] || $aefi['Aefi']['complaint_other']) ? 1 : 0; ?></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($aefi['Aefi']['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd'); ?></receiptdate>
        <additionaldocument><?php
            if (isset($aefi['Aefi']['attachments']) && count($aefi['Aefi']['attachments']) > 0) {
                echo 1;
            } else {
                echo 2;
            }
        ?></additionaldocument>
        <documentlist><?php
            if(isset($aefi['Aefi']['attachments'])) {
                foreach ($aefi['Aefi']['attachments'] as $attachment):
                    echo $attachment['description'].', ';
                endforeach;   
            }
        ?></documentlist>
        <fulfillexpeditecriteria><?php
            if ($aefi['Aefi']['outcome'] == 'Died') {
                echo 1;
            } else { echo 2;}
        ?></fulfillexpeditecriteria>
        <authoritynumb>KE-PPB-<?php
            echo $aefi['Aefi']['id'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate/>
        <casenullification/>
        <nullificationreason/>
        <medicallyconfirm><?php
            if ($aefi['Aefi']['designation_id'] == 1 || $aefi['Aefi']['designation_id'] == 2 || $aefi['Aefi']['designation_id'] == 3  ) {
                echo 1;
            } else { echo 2;}
        ?></medicallyconfirm>        
        <reportduplicate>
            <duplicatesource></duplicatesource>
            <duplicatenumb>KE-PPB-<?php
                echo $aefi['Aefi']['id'];
            ?></duplicatenumb>
        </reportduplicate>
        <?php $arr = preg_split("/[\s]+/", $aefi['Aefi']['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $aefi['Aefi']['name_of_institution']; ?></reporterorganization>
            <reporterdepartment/>
            <reporterstreet/>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>KE</reportercountry>
            <qualification>
                <?php 
                    $desg = [1 => 1, 2 => 1, 3 => 3, 4 => 2, 5 => 3, 6 => 2, 7 => 3, 8 => 1, 9 => 1, 10 => 1, 11 => 1, 12 => 1, 
                             13 => 1, 14 => 1, 15 => 1, 16 => 1, 17 => 1, 18 => 1, 19 => 3, 20 => 1, 21 => 5, 22 => 5, 23 => 3, 
                          ];
                    // echo $desg[($aefi['Aefi']['designation_id']) ?? 3]; 
                    echo 3;
                ?>
            </qualification>
            <literaturereference/>
            <studyname/>
            <sponsorstudynumb/>
            <observestudytype/>
        </primarysource>
        <sender>
            <sendertype>3</sendertype>
            <senderorganization>Pharmacy and Poisons Board</senderorganization>
            <senderdepartment>Department of Pharmacovigilance</senderdepartment>
            <sendertitle>Dr.</sendertitle>
            <sendergivename>Christabel</sendergivename>
            <sendermiddlename>N.</sendermiddlename>
            <senderfamilyname>Khaemba</senderfamilyname>
            <senderstreetaddress>P.O. Box:27663-00506</senderstreetaddress>
            <sendercity>Nairobi</sendercity>
            <senderstate/>
            <senderpostcode>00506</senderpostcode>
            <sendercountrycode>KE</sendercountrycode>
            <sendertel>720608811</sendertel>
            <sendertelextension/>
            <sendertelcountrycode>254</sendertelcountrycode>
            <senderfax>2713409</senderfax>
            <senderfaxextension>20</senderfaxextension>
            <senderfaxcountrycode>254</senderfaxcountrycode>
            <senderemailaddress>pv@pharmacyboardkenya.org</senderemailaddress>
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
            <patientinitial><?php echo $aefi['Aefi']['patient_name']; ?></patientinitial>
            <patientgpmedicalrecordnumb><?php echo $aefi['Aefi']['ip_no']; ?></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb><?php echo $aefi['Aefi']['ip_no']; ?></patientspecialistrecordnumb>
            <patienthospitalrecordnumb><?php echo $aefi['Aefi']['ip_no']; ?></patienthospitalrecordnumb>
            <patientinvestigationnumb/>
            <?php
                if (!empty($aefi['Aefi']['date_of_birth'])) {
                    // $a = explode('-', $aefi['Aefi']['date_of_birth']);
                    // $aefi['Aefi']['date_of_birth'] = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
                    $birthdatef = 102;
                    if (empty($aefi['Aefi']['date_of_birth']['day']) && empty($aefi['Aefi']['date_of_birth']['month'])) {
                        $birthdatef = 602;
                    } else if (empty($aefi['Aefi']['date_of_birth']['day']) && !empty($aefi['Aefi']['date_of_birth']['month'])) {
                        $birthdatef = 610;
                    } else if (!empty($aefi['Aefi']['date_of_birth']['day']) && empty($aefi['Aefi']['date_of_birth']['month'])) {
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
                    if($birthdatef == 102) echo date('Ymd', strtotime(implode('-', $aefi['Aefi']['date_of_birth'])));
                    if($birthdatef == 602) echo $aefi['Aefi']['date_of_birth']['year'];
                    if($birthdatef == 610) echo $aefi['Aefi']['date_of_birth']['year'].$aefi['Aefi']['date_of_birth']['month'];
                    echo '</patientbirthdate>';
                    echo "\n";
                } else {
                    echo '<patientbirthdate/>';
                    echo "\n";
                }
            ?>

            <?php
                if (!empty($aefi['Aefi']['age_months'])) {
                    echo "<patientonsetage>".$aefi['Aefi']['age_months']."</patientonsetage>";
                    echo "<patientonsetageunit>802</patientonsetageunit>";
                } else {
                    echo "<patientonsetage/>";
                    echo "<patientonsetageunit/>";
                }
            ?>
            <gestationperiod/>
            <gestationperiodunit/>
            <patientagegroup/>
            <patientweight/>
            <patientheight/>
            <patientsex><?php
                if($aefi['Aefi']['gender'] == 'Male') echo 1 ;
                elseif($aefi['Aefi']['gender'] == 'Female') echo 2 ;
            ?></patientsex>
            <lastmenstrualdateformat/>
            <patientlastmenstrualdate/>
            <patientmedicalhistorytext><?php echo $aefi['Aefi']['medical_history']; ?></patientmedicalhistorytext>
            <resultstestsprocedures/>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction>
                    <?php 
                    if($aefi['Aefi']['local_reaction']) echo 'Severe, ';
                    if($aefi['Aefi']['convulsion']) echo 'Seizures, ';
                    if($aefi['Aefi']['abscess']) echo 'Abscess, ';
                    if($aefi['Aefi']['bcg']) echo 'BCG Lymphadenitis, ';
                    if($aefi['Aefi']['meningitis']) echo 'Encephalopathy, ';
                    if($aefi['Aefi']['toxic_shock']) echo 'Toxic, ';
                    // if($aefi['Aefi']['ae_thrombocytopenia']) echo 'Thrombocytopenia, ';
                    if($aefi['Aefi']['anaphylaxis']) echo 'Anaphylaxis, ';
                    if($aefi['Aefi']['high_fever']) echo 'Fever, ';
                    // if($aefi['Aefi']['ae_3days']) echo 'Severe local reaction > 3 days, ';
                    // if($aefi['Aefi']['ae_febrile']) echo 'febrile, ';
                    if($aefi['Aefi']['paralysis']) echo 'Paralysis, ';
                    if($aefi['Aefi']['urticaria']) echo 'Generalized urticaria, '; 
                    ?>                 
                </primarysourcereaction>
                <reactionmeddraversionllt>WHO-ART</reactionmeddraversionllt>
                <reactionmeddrallt><?php echo $aefi['Aefi']['description_of_reaction']; ?></reactionmeddrallt>
                <reactionmeddraversionpt/>
                <reactionmeddrapt/>
                <termhighlighted/>
                <?php

                    // if (!empty($aefi['Aefi']['aefi_date'])) {
                    //     echo "<reactionstartdateformat>102</reactionstartdateformat>";
                    //     echo "<reactionstartdate>".date('Ymd', strtotime($aefi['Aefi']['aefi_date']))."</reactionstartdate>";
                    // } else {
                    //     echo "<reactionstartdateformat/>
                    //           <reactionstartdate/>";
                    // }

                ?>
                
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
                              'Not recovered' => 4, 
                              'Died' => 5, 
                              'Unknown' => 6];
                if (!empty($aefi['Aefi']['outcome']) && isset($outcomes[$aefi['Aefi']['outcome']])) echo $outcomes[$aefi['Aefi']['outcome']];
                ?></reactionoutcome>
            </reaction>
            <?php foreach ($aefi['AefiListOfVaccine'] as $num => $listOfVaccine): ?>
            <drug>
                <drugcharacterization><?php
                    if ($num == 0) echo 1 ;
                    else echo 2;
                ?></drugcharacterization>
                <medicinalproduct><?php echo $listOfVaccine['vaccine_name']; ?></medicinalproduct>
                <obtaindrugcountry/>
                <drugbatchnumb><?php echo $listOfVaccine['batch_number']; ?></drugbatchnumb>
                <drugauthorizationnumb/>
                <drugauthorizationcountry/>
                <drugauthorizationholder/>
                <drugstructuredosagenumb><?php echo $listOfVaccine['dosage']; ?></drugstructuredosagenumb>
                <drugstructuredosageunit/>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext><?php echo $listOfVaccine['dosage']; ?></drugdosagetext>
                <drugdosageform/>
                <drugadministrationroute/>
                <drugparadministration/>
                <reactiongestationperiod/>
                <reactiongestationperiodunit/>
                <drugindicationmeddraversion/>
                <drugindication/>
                <drugstartdateformat><?php if (!empty($listOfVaccine['vaccination_date'])) echo 102; ?></drugstartdateformat>
                <drugstartdate><?php if (!empty($listOfVaccine['vaccination_date'])) echo date('Ymd', strtotime($listOfVaccine['vaccination_date']))?></drugstartdate>
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
                <drugadditional><?php echo $listOfVaccine['diluent_batch_number']; ?></drugadditional>
                <activesubstance>
                    <activesubstancename><?php echo $listOfVaccine['vaccine_name']; ?></activesubstancename>
                </activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion>WHO-ART</drugreactionassesmeddraversion>
                    <drugreactionasses><?php echo $aefi['Aefi']['description_of_reaction']; ?></drugreactionasses>
                    <drugassessmentsource/>
                    <drugassessmentmethod/>
                    <drugresult/>
                </drugreactionrelatedness>
            </drug>
            <?php  endforeach; ?>
            <summary>
                <narrativeincludeclinical><?php echo $aefi['Aefi']['description_of_reaction']; ?></narrativeincludeclinical>
                <reportercomment/>
                <senderdiagnosismeddraversion>WHO-ART</senderdiagnosismeddraversion>
                <senderdiagnosis><?php echo $aefi['Aefi']['medical_history']; ?></senderdiagnosis>
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>
