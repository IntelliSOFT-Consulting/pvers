<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
		<style>
		* { padding: 0; margin: 0; }

		body {
			background-color:#FCEBBA;
			font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			font-size: 13px;
			line-height: 18px;
		}

		div.page {
		  margin:4mm;
		  padding:4mm;
		  border:2.5pt solid blue;
		}
		
		hr {
			-moz-border-bottom-colors: none;
			-moz-border-image: none;
			-moz-border-left-colors: none;
			-moz-border-right-colors: none;
			-moz-border-top-colors: none;
			border-color: #EEEEEE -moz-use-text-color #FFFFFF;
			border-left: 0 none;
			border-right: 0 none;
			border-style: solid none;
			border-width: 1px 0;
			margin: 18px 0;
		}
		</style>
	</head>
<body>
	<div class="page">
	<div class="row-fluid">
		<div class="span12">				
			<div class="row-fluid">
				<div class="span12">
					<img  style="width: 100%;" src="pdf/img/sadr_header.png" alt="SADR">				</div>
			</div><br>
			
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
					<td style="width: 25%;"><strong>N<?php echo $sadr['County']['county_name'] ?>	</strong></td>
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
					<td style="width: 25%;">IP/OP. NO.: </td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['ip_no'] ?>	</strong></td>
				</tr>			
				<tr>
					<td style="width: 25%;">DATE OF BIRTH:</td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['date_of_birth'] ?>		</strong></td>
					<td style="width: 25%;">AGE GROUP: </td>
					<td style="width: 25%;"><strong>	<?php echo $sadr['Sadr']['age_group'] ?>	</strong></td>
				</tr>
				<tr>
					<td style="width: 25%;">WARD / CLINIC: </td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['ward'] ?>	</strong></td>
					<td style="width: 25%;">ANY KNOWN ALLERGY:</td>
					<td style="width: 25%;">
						<strong><?php echo $sadr['Sadr']['known_allergy'] ?> 	</strong> <br>
						<?php echo $sadr['Sadr']['known_allergy_specify'] ?>
					</td>
				</tr>
				<tr>
					<td style="width: 25%;">IP/OP. NO.: </td>
					<td style="width: 25%;"><strong>	</strong></td>
					<td style="width: 25%;">PATIENT'S ADDRESS:</td>
					<td style="width: 25%;"><strong>	</strong></td>
				</tr>
				<tr>
					<td style="width: 25%;">IP/OP. NO.: </td>
					<td style="width: 25%;"><strong>	</strong></td>
					<td style="width: 25%;">PATIENT'S ADDRESS:</td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['patient_address'] ?>	</strong></td>
				</tr>
				<tr>
					<td style="width: 25%;">GENDER: </td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['gender'] ?>	</strong></td>
					<td style="width: 25%;">PREGNANCY STATUS:</td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['pregnancy_status'] ?>	</strong></td>
				</tr>
				<tr>
					<td style="width: 25%;">WEIGHT (kg): </td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['weight'] ?>	</strong></td>
					<td style="width: 25%;">HEIGHT (cm):</td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['height'] ?>	</strong></td>
				</tr>
			</table>
			 <hr>

			<table style="width: 100%;">
				<tr>
					<td style="width: 25%;">DIAGNOSIS:</td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['diagnosis'] ?></strong></td>
					<td style="width: 25%;">BRIEF DESCRIPTION OF REACTION: </td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['description_of_reaction'] ?></strong></td>
				</tr>
				<tr>
					<td style="width: 25%;">DATE OF ONSET OF REACTION:</td>
					<td style="width: 25%;"><strong><?php echo $sadr['Sadr']['date_of_onset_of_reaction'] ?></strong></td>
					<td style="width: 25%;"></td>
					<td style="width: 25%;"><strong></strong></td>
				</tr>
			</table>
			 <hr>	
			 		
			<table style="width: 100%; font-size: 7pt" >
				<thead>
				  <tr>
					<th class="required" style="width: 25%;" colspan="2">
						LIST OF ALL DRUGS USED IN THE LAST 3 MONTHS PRIOR TO REACTION. 
						IF PREGNANT, INDICATE THE DRUGS USED DURING THE 1st TRIMESTER  
						<br>						
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
						<input id="SadrList" value="" class="" name="data[Sadr][list]" type="hidden">						</th>
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

			<table  style="width: 100%;">
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
			</table>
			 <hr>	
									
		</div>
	</div>		
	</div> <!-- /art-sheet -->
		
	</body>
</html>