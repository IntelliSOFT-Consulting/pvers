<?php echo '<?xml version="1.0" encoding="ISO-8859-1"?>'; echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader>
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>KE-PPB-<?php
            echo date('Y').'-'.$sadr['Sadr']['id'];
        ?></messagenumb>
        <messagesenderidentifier>PPB</messagesenderidentifier>
        <messagereceiveridentifier>KE</messagereceiveridentifier>
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis');?></messagedate>
    </ichicsrmessageheader>
    <safetyreport>
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>KE-PPB-<?php
            echo $sadr['Sadr']['reference_no'];
        ?></safetyreportid>
        <primarysourcecountry>KE</primarysourcecountry>
        <occurcountry>KE</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php
				if ($sadr['Sadr']['serious'] == 'Yes') {
					echo 1;
				} else { echo 2;}
			?></serious>
        <seriousnessdeath><?php echo ($sadr['Sadr']['serious_reason'] == 'Death') ? 1 : 2; ?></seriousnessdeath>
        <seriousnesslifethreatening><?php echo ($sadr['Sadr']['serious_reason'] == 'Life threatening') ? 1 : 2; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?php echo ($sadr['Sadr']['serious_reason'] == 'Hospitalization/ Prolonged Hospitalization') ? 1 : 2; ?></seriousnesshospitalization>
        <seriousnessdisabling><?php echo ($sadr['Sadr']['serious_reason'] == 'Disability') ? 1 : 2; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?php echo ($sadr['Sadr']['serious_reason'] == 'Congenital anomality') ? 1 : 2; ?></seriousnesscongenitalanomali>
        <seriousnessother><?php echo ($sadr['Sadr']['serious_reason'] == 'Other Medically Important Reason') ? 1 : 2; ?></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo (!empty($sadr['Sadr']['reporter_date'])) ?  date('Ymd', strtotime($sadr['Sadr']['reporter_date'])) : date('Ymd', strtotime($sadr['Sadr']['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo (!empty($sadr['Sadr']['reporter_date'])) ?  date('Ymd', strtotime($sadr['Sadr']['reporter_date'])) : date('Ymd', strtotime($sadr['Sadr']['created'])); ?></receiptdate>
        <additionaldocument><?php
			if (isset($sadr['Attachment']) && count($sadr['Attachment']) > 0) {
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
			if ($sadr['Sadr']['serious'] == 'Yes') {
				echo 1;
			} else { echo 2;}
		?></fulfillexpeditecriteria>
        <authoritynumb>KE-PPB-<?php
            echo $sadr['Sadr']['reference_no'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate>0</duplicate>
        <casenullification>0</casenullification>
        <nullificationreason/>
        <medicallyconfirm><?php
            if (!in_array($sadr['Sadr']['designation_id'], [26, 27])) {
                echo 1;
            } else { echo 2;}
		?></medicallyconfirm>
		<?php $arr = preg_split("/[\s]+/", $sadr['Sadr']['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $sadr['Sadr']['name_of_institution']; ?></reporterorganization>
            <reporterdepartment/>
            <reporterstreet><?php echo $sadr['Sadr']['reporter_phone']; ?></reporterstreet>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>KE</reportercountry>
            <qualification><?php echo $sadr['Designation']['category']; ?></qualification>
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
            <patientmedicalhistorytext><?php echo $sadr['Sadr']['medical_history']; ?></patientmedicalhistorytext>
            <resultstestsprocedures><?php echo $sadr['Sadr']['lab_investigation']; ?></resultstestsprocedures>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php echo $sadr['Sadr']['description_of_reaction']; ?></primarysourcereaction>
                <reactionmeddraversionllt>23.0</reactionmeddraversionllt>
                <reactionmeddrallt><?php echo $sadr['Sadr']['report_title']; ?></reactionmeddrallt>
                <reactionmeddraversionpt></reactionmeddraversionpt>
                <reactionmeddrapt></reactionmeddrapt>
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
								// 'fatal - unrelated to reaction' => 8,
								// 'fatal - reaction may be contributory' => 7,
								'fatal' => 5,
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
					echo $sadrListOfDrug['Dose']['icsr_code'];
				?></drugstructuredosageunit>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext/>
                <drugdosageform/>
                <drugadministrationroute><?php
					echo $sadrListOfDrug['Route']['icsr_code'] ;
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
					if (!empty($sadr['Sadr']['action_taken']) && $sadrListOfDrug['suspected_drug'] == 1) echo $actions[strtolower($sadr['Sadr']['action_taken'])];
				?></actiondrug>
                <drugrecurreadministration/>
                <drugadditional/>
				<activesubstance>
					<activesubstancename><?php echo $sadrListOfDrug['drug_name']; ?></activesubstancename>
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
                <narrativeincludeclinical><?php echo $sadr['Sadr']['description_of_reaction']; ?></narrativeincludeclinical>
                <reportercomment><?php echo $sadr['Sadr']['any_other_comment']; ?></reportercomment>
                <senderdiagnosismeddraversion />
                <senderdiagnosis />
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>
