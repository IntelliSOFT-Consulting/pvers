<?php
	$this->assign('SADR', 'active');
	// $this->Html->script('jqprint.0.3', array('inline' => false));
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
	                      <h5>Tel: (020)-3562107 Ext 114, 0720 608811, 0733 884411 Fax: (020) 2713431/2713409</h5>
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
							<h4>The report is on:</h4>
							<p> <?php echo ($sadr['Sadr']['report_sadr']   ? $ichecked : $nchecked ); ?> Suspected adverse drug reaction  </p>
							<p> <?php echo ($sadr['Sadr']['report_therapeutic']   ? $ichecked : $nchecked ); ?> Therapeutic ineffectiveness </p>
						</td>
						<td style="width: 50%;">
							<h4>Product category (Tick appropriate box)</h4>
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
						<td style="width: 25%;">COUNTY: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['County']['county_name'] ?>	</strong></td>
						<td style="width: 25%;">SUB-COUNTY: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['SubCounty']['sub_county_name'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">NAME OF INSTITUTION:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['name_of_institution'] ?>	</strong></td>
						<td style="width: 25%;">INSTITUTION CODE: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['institution_code'] ?>		</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['address'] ?>	</strong></td>
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
						<td style="width: 30%;">DIAGNOSIS:</td>
						<td style="width: 70%;"><strong><?php echo $sadr['Sadr']['diagnosis'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 30%;">BRIEF DESCRIPTION OF REACTION: </td>
						<td style="width: 70%;"><strong><?php echo $sadr['Sadr']['description_of_reaction'] ?></strong></td>
					</tr>
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
				</table>
				 <hr>

				<table  class="change_order_items" style="width: 100%;" >
					<tbody>
					  <tr>
						<th class="required" style="width: 22%;">
							LIST OF ALL DRUGS USED IN THE LAST 3 MONTHS PRIOR TO REACTION.
							IF PREGNANT, INDICATE THE DRUGS USED DURING THE 1st TRIMESTER
							<br>
							 <label>(include OTC and herbals)</label>
						</th>
						<th style="width: 10%;">BRAND NAME</th>
						<th class="required" style="width: 8%;"><label class="required">DOSE</label></th>
						<th class="required" style="width: 10%;">ROUTE AND<label></label></th>
						<th class="required" style="width: 10%;">FREQUENCY<label></label></th>
						<th class="required" style="width: 10%;">DATE STARTED<label class="help-block required">	(dd-mm-yyyy) </label></th>
						<th style="width: 10%;">DATE STOPPED<p class="help-block">	(dd-mm-yyyy) </p></th>
						<th style="width: 10%;">INDICATION</th>
						<th class="required" style="width: 10%;">
							 <label class="required">TICK (&#x2713;)  <br> SUSPTECTED DRUG(S)</label>
						</th>
					  </tr>
						<?php
							$i = 1;
							foreach ($sadr['SadrListOfDrug'] as $sadrListOfDrug): ?>
							<tr>
								<td style="width: 22%;"><?php echo $i++;?>  &nbsp; <?php echo $sadrListOfDrug['drug_name'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['brand_name'];?></td>
								<td style="width: 8%;"><?php echo $sadrListOfDrug['dose'].' - '.$sadrListOfDrug['Dose']['name'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['Route']['name'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['Frequency']['name'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['start_date'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['stop_date'];?></td>
								<td style="width: 10%;"><?php echo $sadrListOfDrug['indication'];?></td>
								<td style="width: 10%;"><?php if ($sadrListOfDrug['suspected_drug'] == 1) { echo "<strong>&#x2713;</strong>" ;} ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
			  </table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">SEVERITY OF THE REACTION:</td>
						<td style="width: 25%;">ACTION TAKEN</td>
						<td style="width: 25%;">OUTCOME: </td>
						<td style="width: 25%;">CAUSALITY OF THE REACTION</td>
					</tr>
					<tr>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['severity'] ?></strong></td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['action_taken'] ?></strong></td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['outcome'] ?></strong></td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['causality'] ?></strong></td>
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
						<td style="width: 30%;">NAME OF PERSON REPORTING:</td>
						<td style="width: 70%;"><strong><?php echo $sadr['Sadr']['reporter_name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 30%;">E-MAIL ADDRESS: </td>
						<td style="width: 70%;"><strong><?php echo $sadr['Sadr']['reporter_email'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 30%;">DESIGNATION:</td>
						<td style="width: 70%;"><strong><?php echo $sadr['Designation']['name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 30%;">PHONE NO.</td>
						<td style="width: 70%;"><strong><?php echo $sadr['Sadr']['reporter_phone'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				</div> <!-- /art-sheet -->
			</div> <!-- /art-sheet -->
		</div>
	</div>

