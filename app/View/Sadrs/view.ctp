<?php
	$this->assign('SADR', 'active');
	$this->Html->script('jqprint.0.3', array('inline' => false));
 ?>

      <!-- SADR
    ================================================== -->
<section id="sadrsview">
	<div class="row-fluid">
		<div class="span12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $sadr['Sadr']['id']; ?></a></li>
			<li><?php 	echo $this->Html->link('Follow Ups ('.$followups.')', array('controller' => 'sadr_followups', 'action' => 'sadrIndex', $sadr['Sadr']['id'])); ?></li>
		</ul>
		<?php
			echo $this->Session->flash();
		?>
		<div class="row-fluid" id="abonokode">
		<div class="span3 columns">
			<div class="page-header">
				<h3>Feedback <small>Your Feedback will help us serve you better</small></h3>
			</div>
				<p>Your feedback is confidential .....</p>
			 <?php
				echo $this->Form->create('Feedback', array(
					'url' => 'add',
					'inputDefaults' => array(
						'div' => array('class' => 'control-group'),
						'label' => array('class' => 'control-label'),
						'between' => '<div class="controls">',
						'after' => '</div>',
						'class' => '',
						'format' => array('before', 'label', 'between', 'input', 'after','error'),
						'error' => array('attributes' => array( 'class' => 'controls help-block')),
					 ),
				));

				echo $this->Form->input('sadr_id', array('type' => 'hidden', 'value' => $sadr['Sadr']['id']));
				echo $this->Form->input('email', array('label' => 'Email / Phone No.'));
				echo $this->Form->input('feedback', array( 'rows' => '5', 'label' => array('class' => 'control-label required',
																					'text' => 'FEEDBACK')));
				echo $this->Form->end(array(
						'label' => 'Submit',
						'value' => 'Save',
						'class' => 'btn btn-primary',
						'id' => 'SadrFeedback', 'title'=>'Start a New PQMP',
						'data-content' => 'Please provide us with your email address to start filling in the PQMP.',
						'div' => array(
							'class' => 'form-actions',
						)
					));
			?>

		</div>
		<div class="span9">
			<div class="form-actions">
				<div class="row-fluid">
					<div class="span4">
						<?php
							echo $this->Html->link('Download PDF', array('controller'=>'sadrs','action'=>'download', 'ext'=> 'pdf', $sadr['Sadr']['id']),
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
								if($sadr['Sadr']['submitted'] > 1) {
									echo $this->Html->link('Edit Report', '#', array(
										'name' => 'continueEditing',
										'class' => 'btn mapop disabled',
										'id' => 'SadrContinueReport', 'title'=>'Submitted Report!',
										'data-content' => 'This report has been submitted to PPB and cannot be edited',
										'div' => false,
									));
								} else {
									echo $this->Html->link('Edit Report', array('action' => 'edit', $sadr['Sadr']['id']), array(
										'name' => 'continueEditing',
										'class' => 'btn mapop',
										'id' => 'SadrContinueReport', 'title'=>'Edit Report',
										'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
										'div' => false,
									));
								}
						?>
					</div>
				</div>
			</div>


			<div id="printAreade">
				<div class="vformback">

				<?php
					echo $this->Html->image('sadr_header.gif', array('alt' => 'SADR'));
				?>
				<br>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">REPORT TITLE:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['report_title'] ?></strong></td>
						<td style="width: 25%;">REPORT ID: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['id'] ?></strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">REPORT TYPE:</td>
						<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['report_type'] ?>	</strong></td>
						<td style="width: 25%;">COUNTY: </td>
						<td style="width: 25%;"><strong><?php echo $sadr['County']['county_name'] ?>	</strong></td>
					</tr>
					<tr>
						<td style="width: 25%;"></td>
						<td style="width: 25%;"> </td>
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
						<td style="width: 25%;"><?php echo $help_infos['sadr_contact']['field_label'];?>:</td>
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
								<td style="width: 8%;"><?php echo $sadrListOfDrug['dose'].' - '.$dose[$sadrListOfDrug['dose_id']];?></td>
								<td style="width: 10%;"><?php echo $routes[$sadrListOfDrug['route_id']];?></td>
								<td style="width: 10%;"><?php echo $frequency[$sadrListOfDrug['frequency_id']];?></td>
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
				<?php echo $this->element('help/assessment'); ?>

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
				<?php echo $this->element('help/explanatory'); ?>

				</div> <!-- /art-sheet -->
			</div> <!-- /art-sheet -->
		</div>
		</div>
		</div>
	</div>
</section>
