<?php echo '<?xml version="1.0" encoding="ISO-8859-1"?>'; echo "\n"; ?>
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
            echo date('Y').'-'.$sadr['Sadr']['id'];
        ?></safetyreportid>
        <primarysourcecountry>KE</primarysourcecountry>
        <occurcountry>KE</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php
				if ($sadr['Sadr']['severity'] == 'Severe' || $sadr['Sadr']['severity'] == 'Fatal') {
					echo 1;
				} else { echo 2;}
			?></serious>
        <seriousnessdeath/>
        <seriousnesslifethreatening/>
        <seriousnesshospitalization/>
        <seriousnessdisabling/>
        <seriousnesscongenitalanomali/>
        <seriousnessother/>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($sadr['Sadr']['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd'); ?></receiptdate>
        <additionaldocument><?php
			if (count($sadr['Attachment']) > 0) {
				echo 1;
			} else {
				echo 2;
			}
		?></additionaldocument>
        <documentlist><?php
			foreach ($sadr['Attachment'] as $attachment):
				echo $attachment['description'].', ';
			endforeach;
		?></documentlist>
        <fulfillexpeditecriteria><?php
			if ($sadr['Sadr']['severity'] == 'Severe' || $sadr['Sadr']['severity'] == 'Fatal') {
				echo 1;
			} else { echo 2;}
		?></fulfillexpeditecriteria>
        <authoritynumb>KE-PPB-<?php
            echo date('Y').'-'.$sadr['Sadr']['id'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate/>
        <casenullification/>
        <nullificationreason/>
        <medicallyconfirm><?php
			if ($sadr['Sadr']['designation_id'] == 1 || $sadr['Sadr']['designation_id'] == 2 || $sadr['Sadr']['designation_id'] == 3 ) {
				echo 1;
			} else { echo 2;}
		?></medicallyconfirm>
		<?php $arr = preg_split("/[\s]+/", $sadr['Sadr']['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $sadr['Sadr']['name_of_institution']; ?></reporterorganization>
            <reporterdepartment/>
            <reporterstreet><?php echo $sadr['Sadr']['contact']; ?></reporterstreet>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>KE</reportercountry>
            <qualification><?php echo $sadr['Sadr']['designation_id']; ?></qualification>
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
            <patientinitial><?php echo $sadr['Sadr']['patient_name']; ?></patientinitial>
            <patientgpmedicalrecordnumb><?php echo $sadr['Sadr']['ip_no']; ?></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb><?php echo $sadr['Sadr']['ip_no']; ?></patientspecialistrecordnumb>
            <patienthospitalrecordnumb><?php echo $sadr['Sadr']['ip_no']; ?></patienthospitalrecordnumb>
            <patientinvestigationnumb/>
            <?php
				if (!empty($sadr['Sadr']['date_of_birth']) && $sadr['Sadr']['date_of_birth'] != '--') {
					$birthdatef = 102;
					if (empty($sadr['Sadr']['date_of_birth']['day']) && empty($sadr['Sadr']['date_of_birth']['month'])) {
						$birthdatef = 602;
					} else if (empty($sadr['Sadr']['date_of_birth']['day']) && !empty($sadr['Sadr']['date_of_birth']['month'])) {
						$birthdatef = 610;
					} else if (!empty($sadr['Sadr']['date_of_birth']['day']) && empty($sadr['Sadr']['date_of_birth']['month'])) {
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
					if($birthdatef == 102) echo date('Ymd', strtotime(implode('-', $sadr['Sadr']['date_of_birth'])));
					if($birthdatef == 602) echo $sadr['Sadr']['date_of_birth']['year'];
					if($birthdatef == 610) echo $sadr['Sadr']['date_of_birth']['year'].$sadr['Sadr']['date_of_birth']['month'];
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
            <?php
				$ages = array(
								'neonate'=>1,
								'infant' => 2,
								'child' => 3,
								'adolescent' => 4,
								'adult' => 5,
								'elderly' => 6,
							);
				if (!empty($sadr['Sadr']['age_group']) && array_key_exists($sadr['Sadr']['age_group'], $ages)) echo '<patientagegroup>'.$ages[$sadr['Sadr']['age_group']].'</patientagegroup>';
				echo "\n";
			?>
            <patientweight><?php echo $sadr['Sadr']['weight']; ?></patientweight>
            <patientheight><?php echo round($sadr['Sadr']['height']);?></patientheight>
            <patientsex><?php
				if($sadr['Sadr']['gender'] == 'Male') echo 1 ;
				elseif($sadr['Sadr']['gender'] == 'Female') echo 2 ;
			?></patientsex>
            <lastmenstrualdateformat/>
            <patientlastmenstrualdate/>
            <patientmedicalhistorytext><?php echo $sadr['Sadr']['any_other_comment']; ?></patientmedicalhistorytext>
            <resultstestsprocedures/>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php echo $sadr['Sadr']['description_of_reaction']; ?></primarysourcereaction>
                <reactionmeddraversionllt>WHO-ART</reactionmeddraversionllt>
                <reactionmeddrallt><?php echo $sadr['Sadr']['report_title']; ?></reactionmeddrallt>
                <reactionmeddraversionpt/>
                <reactionmeddrapt/>
                <termhighlighted/>
                <reactionstartdateformat><?php
					$onsetf = 102;
					if (empty($sadr['Sadr']['date_of_onset_of_reaction']['day']) && empty($sadr['Sadr']['date_of_onset_of_reaction']['month'])) {
						$onsetf = 602;
					} else if (empty($sadr['Sadr']['date_of_onset_of_reaction']['day']) && !empty($sadr['Sadr']['date_of_onset_of_reaction']['month'])) {
						$onsetf = 610;
					} else if (!empty($sadr['Sadr']['date_of_onset_of_reaction']['day']) && empty($sadr['Sadr']['date_of_onset_of_reaction']['month'])) {
						$onsetf = 602;
					}
					echo $onsetf;
				?></reactionstartdateformat>
                <reactionstartdate><?php
					if($onsetf == 102) echo date('Ymd', strtotime(implode('-', $sadr['Sadr']['date_of_onset_of_reaction'])));
					if($onsetf == 602) echo $sadr['Sadr']['date_of_onset_of_reaction']['year'];
					if($onsetf == 610) echo $sadr['Sadr']['date_of_onset_of_reaction']['year'].$sadr['Sadr']['date_of_onset_of_reaction']['month'];
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
				$outcomes = array(
								'recovered/resolved'=>1,
								'recovering/resolving' => 2,
								'recovered/resolved with sequelae' => 3,
								'not recovered/not resolved' => 4,
								'fatal - unrelated to reaction' => 8,
								'fatal - reaction may be contributory' => 7,
								'fatal - due to reaction' => 5,
								'unknown' => 6,
							);
				if (!empty($sadr['Sadr']['outcome'])) echo $outcomes[strtolower($sadr['Sadr']['outcome'])];
				?></reactionoutcome>
            </reaction>
			<?php foreach ($sadr['SadrListOfDrug'] as $sadrListOfDrug): ?>
            <drug>
                <drugcharacterization><?php
					if ($sadrListOfDrug['suspected_drug'] == 1) echo 1 ;
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
					echo $doseUnit[$sadrListOfDrug['dose_id']];
				?></drugstructuredosageunit>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext/>
                <drugdosageform/>
                <drugadministrationroute><?php
					if(!empty($sadrListOfDrug['route_id'])) echo $routesMatch[$sadrListOfDrug['route_id']] ;
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
					);
					if (!empty($sadr['Sadr']['action_taken'])) echo $actions[strtolower($sadr['Sadr']['action_taken'])];
				?></actiondrug>
                <drugrecurreadministration/>
                <drugadditional/>
				<activesubstance>
					<activesubstancename><?php echo $sadrListOfDrug['drug_name']; ?></activesubstancename>
				</activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion>WHO-ART</drugreactionassesmeddraversion>
                    <drugreactionasses><?php echo $sadr['Sadr']['report_title']; ?></drugreactionasses>
                    <drugassessmentsource/>
                    <drugassessmentmethod>WHO causality</drugassessmentmethod>
                    <drugresult><?php
                            if(strtolower($sadr['Sadr']['causality']) == 'certain') echo 'certain';
                            if(strtolower($sadr['Sadr']['causality']) == 'probable / likely') echo 'probable/likely';
                            if(strtolower($sadr['Sadr']['causality']) == 'possible') echo 'possible';
                            if(strtolower($sadr['Sadr']['causality']) == 'unlikely') echo 'unlikely';
                            if(strtolower($sadr['Sadr']['causality']) == 'conditional / unclassified') echo 'conditional/unclassified';
                            if(strtolower($sadr['Sadr']['causality']) == 'unassessable / unclassifiable') echo 'unassessable/unclassifiable';
                    ?></drugresult>
                </drugreactionrelatedness>
            </drug>
			<?php  endforeach; ?>
            <summary>
                <narrativeincludeclinical><?php echo $sadr['Sadr']['description_of_reaction']; ?></narrativeincludeclinical>
                <reportercomment><?php echo $sadr['Sadr']['any_other_comment']; ?></reportercomment>
                <senderdiagnosismeddraversion>WHO-ART</senderdiagnosismeddraversion>
                <senderdiagnosis><?php echo $sadr['Sadr']['diagnosis']; ?></senderdiagnosis>
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>
