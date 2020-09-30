<?php
	$this->assign('SADR', 'active');
	$ichecked = "&#x2611;";
    $nchecked = "&#x2610;";
?>

      <!-- SADR
    ================================================== -->

	<div class="row-fluid" id="abonokode">
		<div class="span12">

			<div id="printAreade">
				<div class="formback">

				<p><b>(FOM001/MIP/PMS/SOP/001)</b></p>
	            <div class="row-fluid">
	                <div class="span12">
	                    <?php
                        	echo $this->Html->image('confidence.png', array('alt' => 'in confidence', 'class' => 'pull-right'));
	                        echo $this->Html->image('coa.png', array('alt' => 'COA', 'style' => 'margin-left: 45%;'));
	                    ?>
	                    <div class="babayao" style="text-align: center;">
	                      <h4>MINISTRY OF HEALTH</h4>
	                      <h5>PHARMACY AND POISONS BOARD</h5>
	                      <h5>P.O. Box 27663-00506 NAIROBI</h5>
	                      <h5>Tel: +254 709 770 100/+254 709 770 xxx (Replace xxx with extension)</h5>
	                      <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
	                    <h5 style="color: red;">SUSPECTED ADVERSE DRUG REACTION REPORTING FORM</h5>
	                    </div>
	                </div>
	            </div>

				<table class="table" style="width: 100%;">
					<tr>
						<td style="width: 25%;">REPORT TITLE:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['report_title'] ?></strong></td>
						<td style="width: 25%;">REPORT ID: </td>
						<td style="width: 25%;">
							<p><strong><?php echo $sadr['Sadr']['reference_no'] ?></strong></p>
							<p><strong><?php echo $sadr['Sadr']['report_type'] ?></strong></p>
						</td>
					</tr>
				</table>

				<table class="table" style="width: 100%;">
					<tr>
						<td style="width: 50%;">
							<h5>The report is on:</h5>
							<p> <?php echo ($sadr['Sadr']['report_sadr']   ? $ichecked : $nchecked ); ?> Suspected adverse drug reaction  </p>
							<p> <?php echo ($sadr['Sadr']['report_therapeutic']   ? $ichecked : $nchecked ); ?> Suspected Therapeutic ineffectiveness </p>
						</td>
						<td style="width: 50%;">
							<h5>Product category (Tick appropriate box)</h5>
							<p> <?php echo ($sadr['Sadr']['medicinal_product']   ? $ichecked : $nchecked ); ?> Medicinal product  </p>
							<p> <?php echo ($sadr['Sadr']['blood_products']   ? $ichecked : $nchecked ); ?> Blood and blood products  </p>
							<p> <?php echo ($sadr['Sadr']['herbal_product']   ? $ichecked : $nchecked ); ?> Herbal product   </p>
							<p> <?php echo ($sadr['Sadr']['cosmeceuticals']   ? $ichecked : $nchecked ); ?> Cosmeceuticals   </p>
							<p> <?php echo ($sadr['Sadr']['product_other']   ? $ichecked : $nchecked ); ?> Others  </p>
							<p> <?php echo $sadr['Sadr']['product_specify']; ?>   </p>
						</td>
					</tr>
				</table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">NAME OF INSTITUTION:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['name_of_institution'] ?>	</strong></td>
						<td style="width: 25%;">COUNTY: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['County']['county_name'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['address'] ?>	</strong></td>
						<td style="width: 25%;">SUB-COUNTY: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['SubCounty']['sub_county_name'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">INSTITUTION CODE: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['institution_code'] ?>		</strong></td>
						<td style="width: 25%;">Phone:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['contact'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">PATIENT'S INITIALS:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['patient_name'] ?>	</strong></td>
						<td style="width: 25%;">WARD / CLINIC: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['ward'] ?>	</strong></td></tr>
					<tr>
						<td style="width: 25%;">IP/OP. NO.: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['ip_no'] ?>	</strong></td>
						<td style="width: 25%;">PATIENT'S ADDRESS:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['patient_address'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">DATE OF BIRTH:</td>
						<td style="width: 25%;"><strong><?php
							$dob = ''; $bod = $sadr['Sadr']['date_of_birth'];
							if(isset($bod['day'])) $dob.=$bod['day'].'-';
							if(isset($bod['month'])) $dob.=$bod['month'].'-';
							if(isset($bod['year'])) $dob.=$bod['year'];
							echo $dob; ?></strong></td>
						<td style="width: 25%;">GENDER: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['gender'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">AGE GROUP: </td>
						<td style="width: 25%;"><strong>	<?php echo $sadr['Sadr']['age_group'] ?>	</strong></td>
						<td style="width: 25%;">PREGNANCY STATUS:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['pregnancy_status'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">ANY KNOWN ALLERGY:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['known_allergy'] ?> </strong> <br> </td>
						<td style="width: 25%;">WEIGHT (kg): </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['weight'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">If yes specify:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['known_allergy_specify'] ?>	</strong></td>
						<td style="width: 25%;">HEIGHT (cm):</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['height'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">DATE OF ONSET OF REACTION:</td>
						<td style="width: 25%;"><strong><?php
							// pr($sadr['Sadr']['date_of_onset_of_reaction']);
							$rod = $sadr['Sadr']['date_of_onset_of_reaction']; $dor = '';
							if(isset($rod['day'])) $dor.=$rod['day'].'-';
							if(isset($rod['month'])) $dor.=$rod['month'].'-';
							if(isset($rod['year'])) $dor.=$rod['year'];
							echo $dor ?></strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"><strong></strong></td>
					</tr>
					<tr>
						<td style="width: 30%;">BRIEF DESCRIPTION OF REACTION: </td>
						<td style="width: 70%;"><strong><?php echo $sadr['Sadr']['description_of_reaction'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 30%;">MEDICAL HISTORY:</td>
						<td style="width: 70%;"><strong><?php echo $sadr['Sadr']['medical_history'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				<table  class="change_order_items" style="width: 100%;" >
					<tbody>
					  <tr>
						<th class="required" colspan="11">
							List all medicines used in the last 3 months including OTC, herbals, if pregnant indicate medicines used in the 1st trimester)-tick the suspected medicine 
						</th>
					  </tr>
					  <tr>
						<th style="width: 10%;">INN/GENERIC NAME</th>
						<th style="width: 10%;">BRAND NAME</th>
						<th style="width: 7%;">BATCH/ LOT NO.</th>
						<th style="width: 7%;">MANUFACTURER</th>
						<th class="required" style="width: 8%;"><label class="required">DOSE</label></th>
						<th class="required" colspan="2" style="width: 20%;">ROUTE AND FREQUENCY</th>
						<th class="required" style="width: 10%;">DATE STARTED<label class="help-block required">	(dd-mm-yyyy) </label></th>
						<th style="width: 10%;">DATE STOPPED<label class="help-block">	(dd-mm-yyyy) </label></th>
						<th style="width: 10%;">INDICATION</th>
						<th class="required" style="width: 10%;">
							 <label class="required">TICK (&#x2713;)  <br> SUSPTECTED DRUG(S)</label>
						</th>
					  </tr>
						<?php
							$i = 1;
							foreach ($sadr['SadrListOfDrug'] as $sadrListOfDrug): ?>
							<tr>
								<td><?php echo $i++;?>  &nbsp; <?php echo $sadrListOfDrug['drug_name'];?></td>
								<td><?php echo $sadrListOfDrug['brand_name'];?></td>
								<td><?php echo $sadrListOfDrug['batch_no'];?></td>
								<td><?php echo $sadrListOfDrug['manufacturer'];?></td>
								<td><?php echo $sadrListOfDrug['dose'];
										  if(!empty($sadrListOfDrug['Dose']['name'])) echo ' - '.$sadrListOfDrug['Dose']['name'];?></td>
								<td style="width: 10%;"><?php if(!empty($sadrListOfDrug['Route']['name'])) echo $sadrListOfDrug['Route']['name'];?></td>
								<td style="width: 10%;"><?php if(!empty($sadrListOfDrug['Frequency']['name'])) echo $sadrListOfDrug['Frequency']['name'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['start_date'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['stop_date'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['indication'];?></td>
								<td style="width: 10%;"><?php if ($sadrListOfDrug['suspected_drug'] == 1) { echo "<strong>&#x2713;</strong>" ;} ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
			  </table>
				<hr>

				<table  class="change_order_items" style="width: 100%;" >
					<tbody>
					  <tr>
						<th class="required" colspan="10">
							Past medication history (List all medicines including OTC, herbals)
						</th>
					  </tr>
					  <tr>
						<th style="width: 10%;">INN/GENERIC NAME</th>
						<th style="width: 10%;">BRAND NAME</th>
						<th style="width: 7%;">BATCH/ LOT NO.</th>
						<th style="width: 7%;">MANUFACTURER</th>
						<th class="required" style="width: 8%;"><label class="required">DOSE</label></th>
						<th class="required" colspan="2" style="width: 20%;">ROUTE AND FREQUENCY</th>
						<th class="required" style="width: 10%;">DATE STARTED<label class="help-block required">	(dd-mm-yyyy) </label></th>
						<th style="width: 10%;">DATE STOPPED<label class="help-block">	(dd-mm-yyyy) </label></th>
						<th style="width: 10%;">INDICATION</th>
					  </tr>
						<?php
							$i = 1;
							foreach ($sadr['SadrListOfMedicine'] as $sadrListOfMedicine): ?>
							<tr>
								<td><?php echo $i++;?>  &nbsp; <?php echo $sadrListOfMedicine['drug_name'];?></td>
								<td><?php echo $sadrListOfMedicine['brand_name'];?></td>
								<td><?php echo $sadrListOfMedicine['batch_no'];?></td>
								<td><?php echo $sadrListOfMedicine['manufacturer'];?></td>
								<td><?php echo $sadrListOfMedicine['dose'];
										  if(!empty($sadrListOfMedicine['Dose']['name'])) echo ' - '.$sadrListOfMedicine['Dose']['name'];?></td>
								<td style="width: 10%;"><?php if(!empty($sadrListOfMedicine['Route']['name'])) echo $sadrListOfMedicine['Route']['name'];?></td>
								<td style="width: 10%;"><?php if(!empty($sadrListOfMedicine['Frequency']['name'])) echo $sadrListOfMedicine['Frequency']['name'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfMedicine['start_date'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfMedicine['stop_date'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfMedicine['indication'];?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
			  </table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="2"><h5 style="color: #884805;">Dechallenge/Rechallenge</h5></td>
						<td colspan="2"><h5 style="color: #884805;">Grading of the reaction /event</h5></td>
					</tr>
					<tr>
						<td style="width: 25%;">Did the reaction resolve after the drug was stopped or when the dose was reduced?</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reaction_resolve'] ?>	</strong></td>
						<td style="width: 25%;">Severity of reaction: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['severity'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Did the reaction reappear after the drug was reintroduced? </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reaction_reappear'] ?>	</strong></td>
						<td style="width: 25%;">Is the reaction serious: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['serious'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Any lab investigations and results: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['lab_investigation'] ?>		</strong></td>
						<td style="width: 25%;">Criteria/reason for seriousness:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['serious_reason'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Outcome: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['outcome'] ?>		</strong></td>
						<td style="width: 25%;">Action taken:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['action_taken'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 50%;">ANY OTHER COMMENT:</td>
						<td style="width: 50%;"><strong><?php echo $sadr['Sadr']['any_other_comment'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				<?php if (count($sadr['Attachment']) > 0) { ?>
				<table  class="change_order_items" style="width: 100%;">
					<tbody>
					  <tr id="attachmentsTableHeader">
						<th>#</th>
						<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
						<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
					  </tr>
					<?php
						$i = 1;
						foreach ($sadr['Attachment'] as $attachment): ?>
						<tr>
							<td style="width: 10%;"><?php echo $i++;?></td>
							<td>
								<a href="attachments/download/<?php echo $attachment['id']; ?>"><?php echo __($attachment['basename']);?></a>
							</td>
							<td><?php echo $attachment['description'];?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<?php } ;?>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">NAME OF PERSON REPORTING:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_name'] ?></strong></td>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_email'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Designation']['name'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_phone'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Date:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_date'] ?></strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>
				</table>
				 <hr>
				<table style="width: 100%;">
					<tr>
						<td style="width: 50%;">Is the person submitting different from reporter?</td>
						<td><strong><?php echo $sadr['Sadr']['person_submitting'] ?></strong></td>
					</tr>
				</table>
				 <hr>
				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">NAME OF PERSON REPORTING:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_name_diff'] ?></strong></td>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_email_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_designation_diff'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_phone_diff'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Date:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['reporter_date_diff'] ?></strong></td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"></td>
					</tr>
				</table>
				 <hr>


				</div> <!-- /art-sheet -->
			</div> <!-- /art-sheet -->
		</div>
	</div>

