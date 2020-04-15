

<div id="printAreade" class="vformback">
	<div class="page">
	
	<table  style="width: 100%;" >
	<tr>
		<td  style="width: 100%;" > <img  style="width: 100%;" src="img/sadr_header.gif" alt="SADR"> </td>
	</tr>
	</table>
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
			<td style="width: 25%;">NAME OF INSTITUTION:</td>
			<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['name_of_institution'] ?>	</strong></td>
			<td style="width: 25%;">INSTITUTION CODE: </td>
			<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['institution_code'] ?>		</strong></td>
		</tr>
		<tr>
			<td style="width: 25%;">ADDRESS: </td>
			<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['address'] ?>	</strong></td>
			<td style="width: 25%;">CONTACT:</td>
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
			<td style="width: 25%;"><strong>	</strong></td>
		</tr>		
		<tr>		
			<td style="width: 25%;">DATE OF BIRTH:</td>
			<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['date_of_birth'] ?>		</strong></td>
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
			<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['date_of_onset_of_reaction'] ?></strong></td>
			<td style="width: 25%;"></td>
			<td style="width: 25%;"><strong></strong></td>
		</tr>
	</table>
	 <hr>	
			
	<table  class="change_order_items" style="width: 100%; font-size: 7pt" >
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
					<td style="width: 8%;"><?php echo $sadrListOfDrug['dose'];?></td>
					<td style="width: 10%;"><?php echo $sadrListOfDrug['route'];?></td>
					<td style="width: 10%;"><?php echo $sadrListOfDrug['frequency'];?></td>
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
					<a href="<?php echo $root?>attachments/download/<?php echo $attachment['id']; ?>"><?php echo __($attachment['filename']);?></a>
				</td>
				<td><?php echo $attachment['description'];?></td>
			</tr>
		<?php endforeach; ?>					  
		</tbody>
	</table>
		  
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
