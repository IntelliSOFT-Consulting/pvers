<?php
    $this->assign('DEV', 'active');
	$ichecked = "&#x2611;";
    $nchecked = "&#x2610;";
?>
<div id="printAreade">
				<div class="formbackd">

				<table style="width: 100%;">
					<tr>
						<td><p><b>(FOM019/HPT/VMS/SOP/001)</b></p></td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<?php
		                        echo $this->Html->image('coa.png', array('alt' => 'COA'));
		                    ?>
		                    <h4>MINISTRY OF HEALTH</h4>
		                    <h4>PHARMACY AND POISONS BOARD</h4>
		                    <h4>P.O. Box 27663-00506 NAIROBI</h4>
		                    <h4>Tel: +254795743049</h4>
		                    <h4><b>Email:</b> pv@pharmacyboardkenya.org/medicaldevices@pharmacyboardkenya.org</h4>
		                    <h4 style="color: red;">MEDICAL DEVICES INCIDENT REPORTING FORM</h4>
						</td>
					</tr>
				</table><br>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">REPORT TITLE</td>
						<td style="width: 45%;"><strong><?php echo $device['Device']['report_title'] ?></strong></td>
						<td style="width: 15%;">REPORT ID/Type: </td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['reference_no'];  ?></strong></td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">NAME OF INSTITUTION/ ORGANZIATION</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['name_of_institution'] ?>	</strong></td>
						<td style="width: 25%;">PHYSICAL ADDRESS </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['institution_address'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">INSTITUTION CODE</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['institution_code'] ?></strong></td>
						<td style="width: 25%;">CONTACT </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['institution_contact'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">COUNTY </td>
						<td style="width: 25%;"><strong><?php echo $device['County']['county_name'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">PATIENT INFORMATION</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;">PATIENT'S NAME/ INITIALS <span style="color:red;">*</span></td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['patient_name'] ?>	</strong></td>
						<td style="width: 25%;">PATIENT ADDRESS </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['patient_address'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">IP/OP NO.</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['ip_no'] ?></td>
						<td style="width: 25%;">PHONE NUMBER </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['patient_phone'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">DATE OF BIRTH</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['date_of_birth'];?></strong>
						</td>
						<td style="width: 25%;">GENDER </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['gender'] ?>		</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Age group </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['age_years'] ?>	</strong></td>
						<td style="width: 25%;">PREGNANCY STATUS</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['pregnancy_status'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">ANY KNOWN ALLERGY </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['allergy'] ?>	</strong></td>
						<td style="width: 25%;">WEIGHT (kg)</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['patient_weight'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> (If yes, specify) </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['allergy_specify'] ?>	</strong></td>
						<td style="width: 25%;">HEIGHT (cm)</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['patient_height'] ?>	</strong></td>
					</tr>					
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">Device/In vitro Diagnostic information</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;"> 1. PROBLEM NOTED PRIOR TO USE </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['problem_noted'] ?>	</strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>
					<tr>
						<td style="width: 25%;"> BRAND NAME/ COMMERCIAL NAME </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['brand_name'] ?>	</strong></td>
						<td style="width: 25%;">SERIAL/ LOT NO.</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['serial_no'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> COMMON NAME </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['common_name'] ?>	</strong></td>
						<td style="width: 25%;">CATALOGUE NUMBER</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['catalogue'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> MODEL </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['device_model'] ?>	</strong></td>
						<td style="width: 25%;">MANUFACTURER ADDRESS</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['manufacturer_address'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> NAME OF MANUFACTURER</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['manufacturer_name'] ?>	</strong></td>
						<td style="width: 25%;">DEVICE MANUFACTURE DATE</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['manufacture_date'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;">EXPIRY DATE</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['expiry_date'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">2. Operator of the device at time of onset </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['operator'] ?>	</strong></td>
						<td style="width: 25%;">3. Usage of device (choose whichever applies)</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['device_usage'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Other (specify) </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['operator_specify'] ?>	</strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>
					<tr>
						<td colspan="2"> 4. How long was the device/ equipment/ machine in use </td>
						<td><strong><?php echo $device['Device']['device_duration'].' '.$device['Device']['device_duration_type']; ?>	</strong></td>
						<td style="width: 15%;"></td>
					</tr>
					<tr>
						<td style="width: 25%;"> 5. Availability of device for evaluation </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['device_availability'] ?>	</strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>
					<tr>
						<td style="width: 25%;"> If No</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['device_unavailability'] ?>	</strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>
				</table>
				 <hr>


				<table style="width: 100%;">
					<tr>
						<td colspan="4"><h4 style="text-align: center; color: #884805;">For implants only (e.g. intrauterine devices, pacemakers)</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;"> Implant date </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['implant_date'] ?>	</strong></td>
						<td style="width: 25%;"> Explant date </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['explant_date'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> Duration of implantation </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['implant_duration'].' '.$device['Device']['implant_duration_type'] ?>	</strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">For diagnostics only <small style="color: #884805;">(including machines and equipment e.g. rapid diagnostic test kits, glucometer)</small></h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;"> Type of specimen used </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['implant_date'] ?>	</strong></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style="width: 15%;"> No. of patients involved </td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['patients_involved'] ?>	</strong></td>
						<td style="width: 15%;">No. of tests done</td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['tests_done'] ?>	</strong></td>
						<td style="width: 15%;">No. of false positives</td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['false_positives'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 15%;"> No. of false negatives </td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['false_negatives'] ?>	</strong></td>
						<td style="width: 15%;">No. of true positives</td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['tests_done'] ?>	</strong></td>
						<td style="width: 15%;">No. of true negatives</td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['true_negatives'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				 <table style="width: 100%;">
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">List of other/associated devices involved in the event</h4> </td>
					</tr>
				</table>
			  	<table  style="width: 100%;" class="table table-bordered table-condensed table-pvborder">
	                <thead>
	                  <tr>
	                  	<th colspan="2" style="width: 15%"> <label class="required">Brand Name/Commercial Name</th>
	                    <th> <label>Serial/Lot No.</label></th>
	                    <th> <label>Common Name</label></th>
	                    <th> <label>Manufacturer's Name</label></th>
	                    <th> <label>Manufacture Date </label></th>
	                    <th> <label>Expiry date </label></th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php
	                  	$i = 0;
	                     foreach ($device['ListOfDevice'] as $listOfDevice): 
	                  ?>
	                  <tr>
	                    <td><?= $i+1; ?></td>
	                    <td><?php echo $listOfDevice['brand_name'];?></td>
	                    <td><?php echo $listOfDevice['serial_no'];?></td>
	                    <td><?php echo $listOfDevice['common_name'];?></td>
	                    <td><?php echo $listOfDevice['manufacturer'];?></td>
	                    <td><?php echo $listOfDevice['manufacture_date'];?></td>
	                    <td><?php echo $listOfDevice['expiry_date'];?></td>              
	                  </tr>
	                
	                <?php endforeach; ?>

	                </tbody>
          		</table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">Incident information</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;">Date of onset of the incident</td>
						<td colspan="5"><strong><?php echo $device['Device']['date_onset_incident'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Event classification</td>
						<td colspan="5"><strong><?php echo $device['Device']['serious'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 15%;">Reason for seriousness</td>
						<td style="width: 15%;"><strong>
							<?php echo $device['Device']['serious_yes']; if($device['Device']['serious_yes'] == 'Death') echo ' - '.$device['Device']['death_date']; ?>	</strong>
						</td>
						<td style="width: 15%;">Description of event</td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['description_of_reaction'] ?>	</strong></td>
						<td style="width: 15%;">Remedial Action/Corrective action/preventive action taken by the healthcare facility relevant to the care of the patient</td>
						<td style="width: 15%;"><strong><?php echo $device['Device']['remedial_action'] ?>	</strong></td>
					</tr>
				</table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">Patient Outcome</td>
						<td style="width: 75%;"><strong><?php echo $device['Device']['outcome'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<?php if (count($device['Attachment']) > 0) { ?>
				<table  class="change_order_items" style="width: 100%;">
					<tbody>
					  <tr id="attachmentsTableHeader">
						<th>#</th>
						<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
						<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
					  </tr>
					<?php
						$i = 1;
						foreach ($device['Attachment'] as $attachment): ?>
						<tr>
							<td style="width: 10%;"><?php echo $i++;?></td>
							<td>
								<a href="<?php echo $root?>attachments/download/<?php echo $attachment['id']; ?>"><?php echo __($attachment['basename']);?></a>
							</td>
							<td><?php echo $attachment['description'];?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<?php } ;?>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">Name of Person Reporting</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_name'] ?></strong></td>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $device['Designation']['name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_email'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_phone'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">Date</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_date'] ?></strong></td>
					</tr>
					<tr>
						<td colspan="6"><h4 style="text-align: center; color: #884805;">If Person Submitting if Different from Reporter</h4> </td>
					</tr>
					<tr>
						<td style="width: 25%;">Name</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_name_diff'] ?></strong></td>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_designation_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_email_diff'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_phone_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">Date</td>
						<td style="width: 25%;"><strong><?php echo $device['Device']['reporter_date_diff'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				</div> <!-- /art-sheet -->
			</div> <!-- /art-sheet -->