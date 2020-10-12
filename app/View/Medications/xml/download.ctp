<?php echo '<?xml version="1.0" encoding="ISO-8859-1"?>'; echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader>
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>KE-PPB-<?php
            echo date('Y').'-'.$medication['Medication']['id'];
        ?></messagenumb>
        <messagesenderidentifier>PPB</messagesenderidentifier>
        <messagereceiveridentifier>KE</messagereceiveridentifier>
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis');?></messagedate>
    </ichicsrmessageheader>
    <safetyreport>
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>KE-PPB-<?php
            echo $medication['Medication']['reference_no'];
        ?></safetyreportid>
        <primarysourcecountry>KE</primarysourcecountry>
        <occurcountry>KE</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php
				if ($medication['Medication']['reach_patient'] == 'Yes') {
					echo 1;
				} else { echo 2;}
			?></serious>
        <seriousnessdeath><?php echo ($medication['Medication']['outcome'] == 'Death') ? 1 : 2; ?></seriousnessdeath>
        <seriousnesslifethreatening><?php echo ($medication['Medication']['outcome'] == 'Near death event') ? 1 : 2; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?php echo ($medication['Medication']['outcome'] == 'Initial/prolonged hospitalization-caused temporary harm') ? 1 : 2; ?></seriousnesshospitalization>
        <seriousnessdisabling><?php echo ($medication['Medication']['outcome'] == 'Caused permanent harm') ? 1 : 2; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali/>
        <seriousnessother></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo (!empty($medication['Medication']['reporter_date'])) ?  date('Ymd', strtotime($medication['Medication']['reporter_date'])) : date('Ymd', strtotime($medication['Medication']['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo (!empty($medication['Medication']['reporter_date'])) ?  date('Ymd', strtotime($medication['Medication']['reporter_date'])) : date('Ymd', strtotime($medication['Medication']['created'])); ?></receiptdate>
        <additionaldocument><?php
			if (isset($medication['Attachment']) && count($medication['Attachment']) > 0) {
				echo 1;
			} else {
				echo 2;
			}
		?></additionaldocument>
        <documentlist><?php
			foreach ($medication['Attachment'] as $attachment):
				echo $attachment['description'].', ';
			endforeach;
		?></documentlist>
        <fulfillexpeditecriteria><?php
			if ($medication['Medication']['reach_patient'] == 'Yes') {
				echo 1;
			} else { echo 2;}
		?></fulfillexpeditecriteria>
        <authoritynumb>KE-PPB-<?php
            echo $medication['Medication']['reference_no'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate>0</duplicate>
        <casenullification>0</casenullification>
        <nullificationreason/>
        <medicallyconfirm><?php
            if (!in_array($medication['Medication']['designation_id'], [26, 27])) {
                echo 1;
            } else { echo 2;}
		?></medicallyconfirm>
		<?php $arr = preg_split("/[\s]+/", $medication['Medication']['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $medication['Medication']['name_of_institution']; ?></reporterorganization>
            <reporterdepartment/>
            <reporterstreet><?php echo $medication['Medication']['reporter_phone']; ?></reporterstreet>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>KE</reportercountry>
            <qualification><?php echo $medication['Designation']['category']; ?></qualification>
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
            <patientinitial><?php echo $medication['Medication']['patient_name']; ?></patientinitial>
            <patientgpmedicalrecordnumb></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb></patientspecialistrecordnumb>
            <patienthospitalrecordnumb></patienthospitalrecordnumb>
            <patientinvestigationnumb/>
            <?php
				if (!empty($medication['Medication']['date_of_birth']) && $medication['Medication']['date_of_birth'] != '--') {
					$birthdatef = 102;
					/*if (empty($medication['Medication']['date_of_birth']['day']) && empty($medication['Medication']['date_of_birth']['month'])) {
						$birthdatef = 602;
					} else if (empty($medication['Medication']['date_of_birth']['day']) && !empty($medication['Medication']['date_of_birth']['month'])) {
						$birthdatef = 610;
					} else if (!empty($medication['Medication']['date_of_birth']['day']) && empty($medication['Medication']['date_of_birth']['month'])) {
						$birthdatef = 602;
					}*/
					echo '<patientbirthdateformat>'.$birthdatef.'</patientbirthdateformat>';
					echo "\n";
				} else {
					echo '<patientbirthdateformat/>';
					echo "\n";
				}

				if(isset($birthdatef)) {
					echo '<patientbirthdate>';
					if($birthdatef == 102) echo date('Ymd', strtotime($medication['Medication']['date_of_birth']));					
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
            <patientweight></patientweight>
            <patientheight></patientheight>
            <patientsex><?php
				if($medication['Medication']['gender'] == 'Male') echo 1 ;
				elseif($medication['Medication']['gender'] == 'Female') echo 2 ;
			?></patientsex>
            <lastmenstrualdateformat/>
            <patientlastmenstrualdate/>
            <patientmedicalhistorytext></patientmedicalhistorytext>
            <resultstestsprocedures><?php echo $medication['Medication']['direct_result']; ?></resultstestsprocedures>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php echo $medication['Medication']['description_of_error']; ?></primarysourcereaction>
                <reactionmeddraversionllt>23.0</reactionmeddraversionllt>
                <reactionmeddrallt><?php echo $medication['Medication']['description_of_error']; ?></reactionmeddrallt>
                <reactionmeddraversionpt></reactionmeddraversionpt>
                <reactionmeddrapt></reactionmeddrapt>
                <termhighlighted/>
                <reactionstartdateformat><?php
					$onsetf = 102;
					echo $onsetf;
				?></reactionstartdateformat>
                <reactionstartdate><?php
					if($onsetf == 102) echo date('Ymd', strtotime($medication['Medication']['date_of_event']));
				?></reactionstartdate>
                <reactionenddateformat/>
                <reactionenddate/>
                <reactionduration/>
                <reactiondurationunit/>
                <reactionfirsttime/>
                <reactionfirsttimeunit/>
                <reactionlasttime/>
                <reactionlasttimeunit/>
                <reactionoutcome></reactionoutcome>
            </reaction>
			<?php foreach ($medication['MedicationProduct'] as $medicationProduct): ?>
            <drug>
                <drugcharacterization><?php
					echo 1 ;
				?></drugcharacterization>
                <medicinalproduct><?php echo $medicationProduct['product_name_ii']; ?></medicinalproduct>
                <obtaindrugcountry/>
                <drugbatchnumb/>
                <drugauthorizationnumb/>
                <drugauthorizationcountry/>
                <drugauthorizationholder/>
                <drugstructuredosagenumb><?php echo $medicationProduct['dosage_ii']; ?></drugstructuredosagenumb>
                <drugstructuredosageunit><?php
					echo $medicationProduct['dosage_form_ii'];
				?></drugstructuredosageunit>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext/>
                <drugdosageform/>
                <drugadministrationroute><?php
					echo $medicationProduct['dosage_ii'] ;
				?></drugadministrationroute>
                <drugparadministration/>
                <reactiongestationperiod/>
                <reactiongestationperiodunit/>
                <drugindicationmeddraversion/>
                <drugindication></drugindication>
                <drugstartdateformat></drugstartdateformat>
                <drugstartdate></drugstartdate>
                <drugstartperiod/>
                <drugstartperiodunit/>
                <druglastperiod/>
                <druglastperiodunit/>
                <drugenddateformat>102</drugenddateformat>
                <drugenddate></drugenddate>
                <drugtreatmentduration/>
                <drugtreatmentdurationunit/>
                <actiondrug></actiondrug>
                <drugrecurreadministration/>
                <drugadditional/>
				<activesubstance>
					<activesubstancename><?php echo $medicationProduct['generic_name_ii']; ?></activesubstancename>
				</activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion />
                    <drugreactionasses />
                    <drugassessmentsource/>
                    <drugassessmentmethod />
                    <drugresult />
                </drugreactionrelatedness>
            </drug>
			<?php  endforeach; ?>
            <summary>
                <narrativeincludeclinical><?php echo $medication['Medication']['description_of_error']; ?></narrativeincludeclinical>
                <reportercomment><?php echo $medication['Medication']['direct_result']; ?></reportercomment>
                <senderdiagnosismeddraversion />
                <senderdiagnosis />
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>
