<?php 
	$this->start('banner');
?>
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Suspected Adverse Drug Report NO : <?php echo $sadr['Sadr']['id'] ?></h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<?php
	$this->end(); 
	$this->assign('SADR', 'active');
 ?>


<div class="span12">
 <?php 
 // pr($sadr['SadrListOfDrug']);?>
	   	
<?php 
		echo $this->Session->flash();
		echo $this->Form->create('Sadr', array(
				'type' => 'file',
				'class' => 'well form-horizontal formback',
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
?>
	<div class="row-fluid">
		<div class="span8">
			<div class="control-group">
				<label class="control-label required" for="SadrReportTitle">REPORT TITLE:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['report_title'] ?>
				</div>
			</div>		
		</div>
		<div class="span4">
		  <h2>Form ID: <?php echo $sadr['Sadr']['id'] ?></h2>
		  <h6><span class="label label-important">Important</span> Unique Form ID</h6>		  
		</div>
	</div><!--/row-->
	 <hr>	
	<div class="row-fluid">
		<div class="span6">	
			<div class="control-group"> 
				<label class="control-label required">Report Type: </label>
				<div class="control-label"> 
					<?php echo $sadr['Sadr']['report_type'] ?>
				</div> 
			</div>		
		</div><!--/span-->
		<div class="span6">
			<div class="control-group">
				<label class="control-label required" for="SadrCountyId">COUNTY:</label>
				<div class="control-label">
					<?php echo $sadr['County']['county_name'] ?>
				</div>
			</div>		
		</div><!--/span-->
	</div><!--/row-->
	 <hr>

	<div class="row-fluid">
		<div class="span6">
			<div class="control-group">
				<label class="control-label required">NAME OF INSTITUTION:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['name_of_institution'] ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrAddress">ADDRESS:</label>	
				<div class="control-label">
					<?php echo $sadr['Sadr']['address'] ?>
				</div>
			</div>		
		</div><!--/span-->
		<div class="span6">
			<div class="control-group">
				<label class="control-label required" for="SadrInstitutionCode">INSTITUTION CODE:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['institution_code'] ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrContact">CONTACT:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['contact'] ?>
				</div>		
			</div>		
		</div><!--/span-->
	</div><!--/row-->
	 <hr>
	
	<div class="row-fluid">
		<div class="span6">
			<div class="control-group">
				<label class="control-label required">PATIENT'S INITIALS</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['patient_name'] ?>
				</div>
			</div>			
			<div class="well-mine">
				<div class="control-group">
					<label class="control-label required">DATE OF BIRTH:</label>
					<div class="control-label">
						<?php echo $sadr['Sadr']['date_of_birth'] ?>
					</div>
				</div>			
				<div class="control-group">
					<label class="control-label required">AGE GROUP:</label>
					<div class="control-label">
						<?php echo $sadr['Sadr']['age_group'] ?>
					</div>
				</div>			
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrWard">WARD / CLINIC</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['ward'] ?>
				</div>
			</div>
			<div class="control-group">  
				<div class="required">  
					<label class="control-label required">ANY KNOWN ALLERGY:</label> 
				</div>
				<div class="control-label"> 
					<?php echo $sadr['Sadr']['known_allergy'] ?>
				</div> 
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo $sadr['Sadr']['known_allergy_specify'] ?>
				</div>
			</div>		
		</div><!--/span-->
		
		<div class="span6">
		  	<div class="control-group">
				<label class="control-label required" for="SadrIpNo">IP/OP. NO.:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['ip_no'] ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrPatientAddress">PATIENT'S ADDRESS:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['patient_address'] ?>
				</div>
			</div>
			<div class="control-group"> 
				<label class="control-label required">GENDER:</label> 
				<div class="control-label">  
					<?php echo $sadr['Sadr']['gender'] ?>
				</div> 
			</div>
			<div class="control-group"> 
				<label class="control-label required">PREGNANCY STATUS:</label>
					<div class="control-label">  
						<?php echo $sadr['Sadr']['pregnancy_status'] ?>
					</div> 
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrWeight">WEIGHT (kg):</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['weight'] ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrHeight">HEIGHT (cm):</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['height'] ?>
				</div>
			</div>
		</div><!--/span-->
	</div><!--/row-->
		
	<div class="row-fluid">
		<div class="span12">
			<div class="control-group">
				<label class="control-label required" for="SadrDiagnosis">DIAGNOSIS:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['diagnosis'] ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrDescriptionOfReaction">BRIEF DESCRIPTION OF REACTION:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['description_of_reaction'] ?>
				</div>
			</div>
			<div class="control-group">	
				<label class="control-label required" for="SadrDateOfOnsetOfReaction">DATE OF ONSET OF REACTION:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['date_of_onset_of_reaction'] ?>
				</div>
			</div>
		</div><!--/span-->
	</div><!--/row-->
	
	<div class="row-fluid">
		<div class="span12">
		    <table class="table table-bordered  table-condensed table-pvborder" id="buildyourform">
				<thead>
				  <tr>
					<th class="required" style="width: 25%;" colspan="2">
						LIST OF <em>ALL</em> DRUGS USED IN THE  
						LAST 3 MONTHS PRIOR TO REACTION. 
						IF PREGNANT, INDICATE THE DRUGS USED 
						DURING THE 1st TRIMESTER <br>						
						 <label>(include OTC and herbals)</label>					
					</th>
					<th style="width: 9%;">BRAND NAME</th>
					<th class="required" style="width: 8%;"><label class="required">DOSE</label></th>
					<th class="required" style="width: 23%;" colspan="2">ROUTE AND FREQUENCY<label></label></th>
					<th class="required" style="width: 10%;">DATE STARTED<label class="help-block required">	(dd-mm-yyyy) </label></th>
					<th style="width: 10%;">DATE STOPPED<p class="help-block">	(dd-mm-yyyy) </p></th>
					<th style="width: 10%;">INDICATION</th>
					<th class="required" style="width: 10%;">
						 <label class="required">TICK (&#x2713;)  <br> SUSPTECTED DRUG(S)</label>
						<input type="hidden" id="SadrList" value="" class="" name="data[Sadr][list]">						</th>
				  </tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					foreach ($sadr['SadrListOfDrug'] as $sadrListOfDrug): ?>
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $sadrListOfDrug['drug_name'];?></td>
						<td><?php echo $sadrListOfDrug['brand_name'];?></td>
						<td><?php echo $sadrListOfDrug['dose'];?></td>
						<td><?php echo $sadrListOfDrug['route'];?></td>
						<td><?php echo $sadrListOfDrug['frequency'];?></td>
						<td><?php echo $sadrListOfDrug['start_date'];?></td>
						<td><?php echo $sadrListOfDrug['stop_date'];?></td>
						<td><?php echo $sadrListOfDrug['indication'];?></td>
						<td><?php if ($sadrListOfDrug['suspected_drug'] == 1) { echo "<strong>&#x2713;</strong>" ;} ?></td>
					</tr>
				<?php endforeach; ?>				  
				</tbody>
		  </table>
		</div><!--/span-->
	</div><!--/row-->
	<hr>			  
	<div class="row-fluid">
		<div class="span3">
			<h5>SEVERITY OF THE REACTION:</h5>		
			<a id="SadrSeverityT" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle" href="#collapseOne" data-original-title="Click here to expand content below">Refer to scale overleaf</a>
			<div class="control-group required"> 
					<?php echo $sadr['Sadr']['severity'] ?>
			</div>		
		</div><!--/span-->
		<div class="span2">
			<div class="required">
				<label class="required"><strong>ACTION TAKEN:</strong></label>
			</div>	<br>	
			<div class="control-group"> 
					<?php echo $sadr['Sadr']['action_taken'] ?>
			</div>	
		</div><!--/span-->
		<div class="span4">
			<h5>OUTCOME:</h5>	<br>
			<div class="control-group">
					<?php echo $sadr['Sadr']['outcome'] ?>
			</div>		
		</div><!--/span-->
		<div class="span3">
			<h5>CAUSALITY OF THE REACTION:</h5>		
			<a data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle" href="#collapseTwo">Refer to scale overleaf</a>
			<div class="control-group"> 
					<?php echo $sadr['Sadr']['causality'] ?>
			</div>	
		</div><!--/span-->
	</div><!--/row-->

	<?php echo $this->element('help/assessment'); ?>

	<div class="row-fluid">
		<div class="span12">
			<div class="control-group">
				<label class="control-label required" for="SadrAnyOtherComment">ANY OTHER COMMENT:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['any_other_comment'] ?>
				</div>
			</div>		
		</div><!--/span-->
	</div><!--/row-->
	 <hr>

	<div class="row-fluid">
		<div class="span12">
			<h4>
				Do you have files that you would like to attach?: 
			</h4>
		    <table class="table table-bordered  table-condensed table-pvborder" id="buildattachmentsform">
				<thead>
				  <tr id="attachmentsTableHeader">
					<th>#</th>
					<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
					<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
				  </tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					foreach ($sadr['Attachment'] as $attachment): ?>
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $attachment['filename'];?></td>
						<td><?php echo $attachment['description'];?></td>
					</tr>
				<?php endforeach; ?>					  
				</tbody>
		  </table>
		</div><!--/span-->
	</div><!--/row-->
	<hr>	
	<div class="row-fluid">
		<div class="span6">
			<div class="control-group">
				<label class="control-label required" for="SadrReporterName">NAME OF PERSON REPORTING:</label>
				<div class="control-label">
						<?php echo $sadr['Sadr']['reporter_name'] ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrReporterEmail">E-MAIL ADDRESS:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['reporter_email'] ?>
				</div>
			</div>		
		</div><!--/span-->
		<div class="span6">
			<div class="control-group">
				<label class="control-label required" for="SadrDesignationId">DESIGNATION:</label>
				<div class="control-label">
					<?php echo $sadr['Designation']['name'] ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label required" for="SadrReporterPhone">PHONE NO.:</label>
				<div class="control-label">
					<?php echo $sadr['Sadr']['reporter_phone'] ?>
				</div>
			</div>		
		</div><!--/span-->
	</div><!--/row-->
	
	<?php echo $this->element('help/explanatory'); ?>
	<?php if($sadr['Sadr']['submitted'] == 1) { ?>
	<div class="form-actions">
		<div class="row-fluid">
			<div class="span6">
				<?php
					
					echo $this->Form->button('Send to PPB', array(
							'name' => 'sendToPPB',
							'onclick'=>"return confirm('Are you sure you wish to send the form to PPB? You will not be able to edit it later.');",
							'class' => 'btn btn-primary mapop',
							'id' => 'SadrSaveChanges', 'title'=>'Send Form to PPB', 
							'data-content' => 'Send the report to PPB for further review. You will not be able to edit the form after this',
							'div' => false,
						));
				?>	
			</div>
			<div class="span6">
				<?php
					
						echo $this->Form->button('Continue Editing', array(
							'name' => 'continueEditing',
							'onclick'=>"return confirm('Are you sure you wish to continue editing the form?');",
							'class' => 'btn mapop',
							'id' => 'SadrCancelReport', 'title'=>'Continue Editing form', 
							'data-content' => 'Modify the contents of the form before submit',
							'div' => false,
						));
				?>
			</div>
	    </div>
	</div>
	<?php
		}
		echo $this->Form->end();
	?>
	
</div>