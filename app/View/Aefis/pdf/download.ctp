<?php
	$this->assign('AEFI', 'active');
	$this->Html->script('jqprint.0.3', array('inline' => false));
    $ichecked = "&#x2611;";
    $nchecked = "&#x2610;";
 ?>

      <!-- AEFI
    ================================================== -->
<section id="aefisview">
	<div class="row-fluid">
		<div class="span12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $aefi['Aefi']['id']; ?></a></li>
			<li></li>
		</ul>
		<?php
			echo $this->Session->flash();
		?>
		<div class="row-fluid" id="abonokode">
		<div class="span12">
			<div class="form-actions">
				<div class="row-fluid">
					<div class="span4">
						<?php
							echo $this->Html->link('Download PDF', array('controller'=>'aefis','action'=>'download', 'ext'=> 'pdf', $aefi['Aefi']['id']),
														array('class' => 'btn btn-primary mapop', 'title'=>'Download PDF',
														'data-content' => 'Download the pdf version of the report',));
						?>
					</div>
					<div class="span4">
						<?php
								echo $this->Form->button('Print Report', array('type' => 'button', 'class'=>'btn btn-inverse btnPrint' ,
														'onclick' => '$(\'#printAreade\').jqprint(); '
														));
						?>
					</div>
					<div class="span4">
						<?php
								if($aefi['Aefi']['submitted'] > 1) {
									echo $this->Html->link('Edit Report', '#', array(
										'name' => 'continueEditing',
										'class' => 'btn mapop disabled',
										'id' => 'AefiContinueReport', 'title'=>'Submitted Report!',
										'data-content' => 'This report has been submitted to PPB and cannot be edited',
										'div' => false,
									));
								} else {
									echo $this->Html->link('Edit Report', array('action' => 'edit', $aefi['Aefi']['id']), array(
										'name' => 'continueEditing',
										'class' => 'btn mapop',
										'id' => 'AefiContinueReport', 'title'=>'Edit Report',
										'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
										'div' => false,
									));
								}
						?>
					</div>
				</div>
			</div>


			<div id="printAreade">
				<div class="formbacka">

				<div class="row-fluid">
					<div class="span2">
						<?php
							echo $this->Html->image('header-object.png', array('alt' => 'AEFI'));
						?>
					</div>
					<div class="span8" style="text-align: center;">
						<h2>MINISTRY OF HEALTH</h2>
						<p class="lead">UNIT OF VACCINES AND IMMUNIZATION SERVICES</p>
						<h3>AEFI Reporting Form</h3>
					</div>
					<div class="span2">
						<?php
							echo $this->Html->image('med-blue.png', array('alt' => 'AEFI'));
						?>
					</div>
				</div><br>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">INSTITUTION NAME</td>
						<td style="width: 45%;"><strong><?php echo $aefi['Aefi']['name_of_institution'] ?></strong></td>
						<td style="width: 15%;">REPORT ID: </td>
						<td style="width: 15%;"><strong><?php echo $aefi['Aefi']['id'] ?></strong></td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">Report Type</td>
						<td style="width: 25%;"></td>
						<td style="width: 25%;">COUNTY </td>
						<td style="width: 25%;"><strong><?php echo $aefi['County']['county_name'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">INSTITUTION CODE</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['institution_code'] ?></strong></td>
						<td style="width: 25%;">SUB-COUNTY </td>
						<td style="width: 25%;"><strong><?php echo $aefi['SubCounty']['sub_county_name'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">PATIENT'S NAME</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['patient_name'] ?>	</strong></td>
						<td style="width: 25%;">NAME OF GUARDIAN </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['guardian_name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">IP/OP NO.</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['ip_no'] ?></td>
						<td style="width: 25%;">ADDRESS </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['patient_address'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">DATE OF BIRTH</td>
						<td style="width: 25%;"><strong><?php
							$dob = ''; $bod = $aefi['Aefi']['date_of_birth'];
							if(isset($bod['day'])) $dob.=$bod['day'].'-';
							if(isset($bod['month'])) $dob.=$bod['month'].'-';
							if(isset($bod['year'])) $dob.=$bod['year'];
							echo $dob; ?></strong>
						</td>
						<td style="width: 25%;">PHONE NUMBER </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['patient_phone'] ?>		</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Age in months </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['age_months'] ?>	</strong></td>
						<td style="width: 25%;">VILLAGE</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['patient_village'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">COUNTY </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['patient_county'] ?>	</strong></td>
						<td style="width: 25%;">WARD</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['patient_ward'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">VACCINATION CENTRE </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['vaccination_center'] ?>	</strong></td>
						<td style="width: 25%;">GENDER</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['gender'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">TYPE OF VACCINATION SERVICE </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['vaccination_type'] ?>	</strong></td>
						<td style="width: 25%;">SUB-COUNTY</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['patient_sub_county'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;">COUNTY OF VACCINATION CENTRE</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['vaccination_county'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 5%;"></td>
						<td style="width: 45%;">
							<p> <?php echo ($aefi['Aefi']['bcg']   ? $ichecked : $nchecked ); ?> BCG Lymphadenitis </p>
							<p> <?php echo ($aefi['Aefi']['convulsion']   ? $ichecked : $nchecked ); ?> Convulsion </p>
							<p> <?php echo ($aefi['Aefi']['urticaria']   ? $ichecked : $nchecked ); ?> Generalized urticaria (hives) </p>
							<p> <?php echo ($aefi['Aefi']['high_fever']   ? $ichecked : $nchecked ); ?> High Fever </p>
							<p> <?php echo ($aefi['Aefi']['abscess']   ? $ichecked : $nchecked ); ?> Injection site abscess </p>
							<p> <?php echo ($aefi['Aefi']['local_reaction']   ? $ichecked : $nchecked ); ?> Severe Local Reaction  </p>
							<p> <?php echo ($aefi['Aefi']['anaphylaxis']   ? $ichecked : $nchecked ); ?> Anaphylaxis </p>
							<p> <?php echo ($aefi['Aefi']['meningitis']   ? $ichecked : $nchecked ); ?> Encephalopathy, Encephalitis/Meningitis </p>
							<p> <?php echo ($aefi['Aefi']['paralysis']   ? $ichecked : $nchecked ); ?> Paralysis </p>
							<p> <?php echo ($aefi['Aefi']['toxic_shock']   ? $ichecked : $nchecked ); ?> Toxic shock </p>
							<p> <?php echo ($aefi['Aefi']['complaint_other']   ? $ichecked : $nchecked ); ?> Other </p>
							<p> <?php echo $aefi['Aefi']['complaint_other_specify']; ?> </p>
						</td>
						<td style="width: 50%; vertical-align: top;">
							<p><strong>Brief details on the event</strong></p>
							<strong><?php echo $aefi['Aefi']['description_of_reaction'] ?>	</strong>
						</td>
					</tr>
				</table>
				 <hr>

			  	<table id="change_order_items" style="width: 100%;" class="table table-bordered table-condensed table-pvborder">
	                <thead>
	                  <tr>
	                    <th colspan="8" style="width: 70%"><label class="required">Details of Vaccines</label></th>
	                    <th colspan="4"><label class="required">Details of Diluents</label></th>
	                  </tr>
	                  <tr>
	                    <th colspan="2" style="width: 20%"> <label class="required">Name of Vaccine <span style="color:red;">*</span></label><small class="help-block">(e.g. BCG, DPT-Hib-HeB)</small></th>
	                    <th style="width: 7%"> <label class="required">Dose No.</label></th>
	                    <th> <label class="required"> Date vaccinated <span style="color:red;">*</span><br><small class="help-block">(dd-mm-yyyy)</small></label></th>
	                    <th> Route,site of vaccination <br><small class="help-block">(i.m.,s.c., i.d.)</small></th>
	                    <th style="width: 5%"> <label class="required">Batch/Lot number <span style="color:red;">*</span></label></th>
	                    <th> <label class="required">Manufacturer's Name <span style="color:red;">*</span></label></th>
	                    <th> <label class="required">Expiry date <span style="color:red;">*</span></label></th>
	                    <th style="width: 7%"> <label class="required">Batch/ Lot Number <span style="color:red;">*</span></label></th>
	                    <th style="width: 10%">Manufacturer's Name</th>
	                    <th> Expiry date </th>
	                    <th> # </th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php
	                  	$i = 0;
	                     foreach ($aefi['AefiListOfVaccine'] as $aefiListOfVaccine): 
	                  ?>
	                  <tr>
	                    <td><?= $i+1; ?></td>
	                    <td><?php echo $aefiListOfVaccine['vaccine_name'];?></td>
	                    <td><?php echo $aefiListOfVaccine['dosage'];?></td>
	                    <td><?php echo $aefiListOfVaccine['vaccination_date'];?></td>
	                    <td><?php echo $aefiListOfVaccine['vaccination_route'];?></td>
	                    <td><?php echo $aefiListOfVaccine['batch_number'];?></td>
	                    <td><?php echo $aefiListOfVaccine['vaccine_manufacturer'];?></td>
	                    <td><?php echo $aefiListOfVaccine['expiry_date'];?></td>
	                    <td><?php echo $aefiListOfVaccine['diluent_batch_number'];?></td>
	                    <td><?php echo $aefiListOfVaccine['diluent_manufacturer'];?></td>
	                    <td><?php echo $aefiListOfVaccine['diluent_expiry_date'];?></td>                    
	                    <td> </td>
	                  </tr>
	                
	                <?php endforeach; ?>

	                </tbody>
          		</table>
				<hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">Past medical history</td>
						<td style="width: 75%;"><strong><?php echo $aefi['Aefi']['medical_history'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>


				<table style="width: 100%;">
					<tr>
						<td colspan="2"><p style="text-align: center;">Action Taken:</p></td>
						<td colspan="2"><p style="text-align: center;">AEFI Outcome:</p></td>
					</tr>
					<tr>
						<td style="width: 25%;">Treatment given</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['treatment_given'] ?></strong></td>
						<td style="width: 25%;"> </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['outcome'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<?php if (count($aefi['Attachment']) > 0) { ?>
				<table  class="change_order_items" style="width: 100%;">
					<tbody>
					  <tr id="attachmentsTableHeader">
						<th>#</th>
						<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
						<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
					  </tr>
					<?php
						$i = 1;
						foreach ($aefi['Attachment'] as $attachment): ?>
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
						<td style="width: 25%;">NAME OF PERSON REPORTING:</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['reporter_name'] ?></strong></td>
						<td style="width: 25%;">DESIGNATION:</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Designation']['name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">E-MAIL ADDRESS: </td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['reporter_email'] ?></strong></td>
						<td style="width: 25%;">PHONE NO.</td>
						<td style="width: 25%;"><strong><?php echo $aefi['Aefi']['reporter_phone'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				</div> <!-- /art-sheet -->
			</div> <!-- /art-sheet -->
		</div>
		</div>
		</div>
	</div>
</section>
