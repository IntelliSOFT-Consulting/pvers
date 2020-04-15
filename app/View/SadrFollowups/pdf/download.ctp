<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
	<link rel="STYLESHEET" href="css/pv.css" type="text/css" />
	 <style type="text/css"> 
      * {
      font-family: "DejaVu Sans";
      font-size: 10px;
    }
    </style> 
	<title></title>
	</head>
<body>
	<?php
		Configure::load('appwide');
		$root = Configure::read('Domain.root');
	?>

<div id="printAreade" class="vformback">	
	<div class="page">
		
	<img  style="width: 100%; background-color: #FFFD77" src="img/sadr_pdf.png" alt="SADR">			
	<br>

	<table style="width: 100%;">
		<tr>
			<td style="width: 25%;">REPORT ID: </td>
			<td style="width: 25%;"><strong><?php echo $SadrFollowups['SadrFollowup']['id'] ?></strong></td>
			<td style="width: 25%;"> </td>
			<td style="width: 25%;"> </td>
		</tr>
	</table>
	 <hr>	
	 
	<table style="width: 100%;">
		<tr>
			<td style="width: 40%;">BRIEF DESCRIPTION OF REACTION: </td>
			<td style="width: 60%;"><strong><?php echo $SadrFollowups['SadrFollowup']['description_of_reaction'] ?></strong></td>
		</tr>
		<tr>
			<td style="width: 25%;">INITIAL REPORT ID:</td>
			<td style="width: 25%;"><strong><?php echo $SadrFollowups['SadrFollowup']['sadr_id'] ?></strong></td>
			<td style="width: 25%;"></td>
			<td style="width: 25%;"><strong></strong></td>
		</tr>
	</table>
	 <hr>	
				
	<table style="width: 92%; font-size: 7pt" >
		<tbody>
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
			</th>
		  </tr>
			<?php
				$i = 1;
				foreach ($SadrFollowups['SadrListOfDrug'] as $sadrListOfDrug): ?>
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $sadrListOfDrug['drug_name'];?></td>
					<td><?php echo $sadrListOfDrug['brand_name'];?></td>
					<td style="width: 8%;" data="<?php echo $dose[$sadrListOfDrug['dose_id']]; ?>">
						<?php echo $sadrListOfDrug['dose'].' - '.$dose[$sadrListOfDrug['dose_id']];?>
					</td>
					<td><?php echo $routes[$sadrListOfDrug['route_id']];?></td>
					<td><?php echo $frequency[$sadrListOfDrug['frequency_id']];?></td>
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
				<td style="width: 100%;">OUTCOME: </td>
			</tr>
			<tr>
				<td style="width: 100%;"><strong><?php echo $SadrFollowups['SadrFollowup']['outcome'] ?></strong></td>
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
				foreach ($SadrFollowups['Attachment'] as $attachment): ?>
				<tr>
					<td><?php echo $i++;?></td>
					<td>
						<a href="<?php echo $root?>attachments/download/<?php echo $attachment['id']; ?>"><?php echo __($attachment['basename']);?></a>
					</td>
					<td><?php echo $attachment['description'];?></td>
				</tr>
			<?php endforeach; ?>					  
			</tbody>
		</table>			
		 <hr>										
		</div>		
	</div>		
		
	</body>
</html>