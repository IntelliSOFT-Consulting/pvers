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
	<div id="pqmpPrintArea" class="vformbackp">
	<?php
		Configure::load('appwide');
		$root = Configure::read('Domain.root');
	?>
			<div class="page">

				<img  style="width: 100%; background-color: #FCC2E7" src="img/pqmp_pdf.png" alt="SADR">
				<br>

				<table style="width: 100%;">
					<tr>
						<td  style="width: 50%;"><?php if($this->Session->read('Auth.User.group_id') == 1) { ?>
						<h3><small>PPB Reference Number:</small>
							<?php echo 'PV/'.date('y', strtotime($pqmp['Pqmp']['created'])).'/'.$pqmp['Pqmp']['id'] ?></h3> <?php } ?></td>
						<td><h2>Report ID: <?php echo $pqmp['Pqmp']['id'] ?></h2></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 25%;">Name of facility:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['facility_name'] ?></strong></td>
						<td style="width: 25%;">Facility Telephone:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['facility_phone'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Facility Address:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['facility_address'] ?></strong></td>
						<td style="width: 25%;">County:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['County']['county_name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Facility Code:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['facility_code'] ?></strong></td>						
						<td style="width: 25%;">Sub-County: </td>
						<td style="width: 25%;"><strong><?php echo $pqmp['SubCounty']['sub_county_name'] ?>	</strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 100%;">
							<h4 style="text-align:center;" class="well pqmpbanner">PRODUCT IDENTITY</h4>
						</td>
					</tr>
				</table>
				<table style="width: 100%;">

					<tr>
						<td style="width: 25%;">Brand Name:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['brand_name'] ?></strong></td>
						<td style="width: 25%;">Generic Name:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['generic_name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Batch/Lot Number:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['batch_number'] ?></strong></td>
						<td style="width: 25%;">Date of Expiry:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['expiry_date'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Date of Manufacture:</td>
						<td style="width: 25%;"><strong><?php
							$mod = $pqmp['Pqmp']['manufacture_date']; $dom = '';
							if(isset($mod['day'])) $dom.=$mod['day'].'-';
							if(isset($mod['month'])) $dom.=$mod['month'].'-';
							if(isset($mod['year'])) $dom.=$mod['year'];
							echo $dom;
						?></strong></td>
						<td style="width: 25%;">Date of Receipt:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['receipt_date'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Name of Manufacturer:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['name_of_manufacturer'] ?></strong></td>
						<td style="width: 25%;">Country of Origin:</td>
						<td style="width: 25%;" data="<?php echo $pqmp['Country']['name']; ?>"><strong><?php echo $pqmp['Country']['name'] ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Name of Distributor / Supplier:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['supplier_name'] ?></strong></td>
						<td style="width: 25%;">Distributor/ Supplier's Address:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['supplier_address'] ?></strong></td>
					</tr>
				</table>
				 <hr>


				<table style="width: 100%;">
					<tr>
						<td style="width: 50%;">
								<h4 style="text-align:center;" class="well pqmpbanner">PRODUCT FORMULATION</h4>
						</td>
						<td style="width: 50%;">
								<h4 style="text-align:center;" class="well pqmpbanner">COMPLAINT</h4>
						</td>
					</tr>
					<tr>
						<td style="width: 50%;">
							<p><strong><?php echo $pqmp['Pqmp']['product_formulation'] ?></strong></p>
							<p><?php echo $pqmp['Pqmp']['product_formulation_specify'] ?></p>
						</td>
						<td style="width: 50%;">
								<?php if ($pqmp['Pqmp']['colour_change'] == 1) echo  "<p>&#x2611;  Colour change </p>"  ?>
									<?php if ($pqmp['Pqmp']['separating'] == 1)  echo  "<p>&#x2611; separating	</p>"  ?>
									<?php if ($pqmp['Pqmp']['powdering'] == 1) echo "<p>&#x2611; Powdering / crumbling </p>" ?>
									<?php if ($pqmp['Pqmp']['caking'] == 1) echo  "<p>&#x2611; caking</p>"  ?>
									<?php if ($pqmp['Pqmp']['moulding'] == 1) echo "<p>&#x2611; Moulding</p>"  ?>
									<?php if ($pqmp['Pqmp']['odour_change'] == 1) echo "<p>&#x2611; Change of odour	</p>"  ?>
									<?php if ($pqmp['Pqmp']['mislabeling'] == 1) echo  "<p>&#x2611; Mislabeling </p>"  ?>
									<?php if ($pqmp['Pqmp']['incomplete_pack'] == 1) echo  "<p>&#x2611; Incomplete pack	</p>"  ?>
									<?php if ($pqmp['Pqmp']['complaint_other'] == 1) echo  "<p>&#x2611; Other	</p>"  ?>
								<p><?php echo $pqmp['Pqmp']['complaint_other_specify'] ?></p>
						</td>
					</tr>
				</table>

				<table>
					<tr>
						<td style="width: 50%;">Describe the complaint in detail:</td>
						<td style="width: 50%;"><strong><?php echo $pqmp['Pqmp']['complaint_description'] ?></strong></td>
					</tr>
				</table>
				<hr>


				<table style="width: 100%;" >
					  <tr>
						<td>Does the product require refrigeration?</td>
						<td><?php echo $pqmp['Pqmp']['require_refrigeration'] ?></td>
					  </tr>

					  <tr>
						<td>Was the product available at the facility?</td>
						<td><?php echo $pqmp['Pqmp']['product_at_facility'] ?></td>
					  </tr>

					  <tr>
						<td>Was the product dispensed and returned by client?</td>
						<td><?php echo $pqmp['Pqmp']['returned_by_client'] ?></td>
					  </tr>

					  <tr>
						<td>Was the product stored according to Manufacturer / MOH recommendations?</td>
						<td><?php echo $pqmp['Pqmp']['stored_to_recommendations'] ?></td>
					  </tr>
					  <tr>
						<td>Other Details:</td>
						<td><?php echo $pqmp['Pqmp']['other_details'] ?></td>
					  </tr>
			  </table>
			 <hr>

			<table style="width: 100%;">
				<tr>
					<td style="width: 50%;">Comments if any:</td>
					<td style="width: 50%;"><?php echo $pqmp['Pqmp']['comments'] ?></td>
				</tr>
			</table>
			 <hr>

			<?php if (count($pqmp['Attachment']) > 0) { ?>
			<table  class="change_order_items" style="width: 100%;">
				<tbody>
				  <tr id="attachmentsTableHeader">
					<th>#</th>
					<th class="required" style="width : 30%;"><label class="required">FILE</label></th>
					<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
				  </tr>
				<?php
					$i = 1;
					foreach ($pqmp['Attachment'] as $attachment): ?>
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
			<hr>
			<?php } ;?>

			<table style="width: 100%;">
				<tr>
					<td style="width: 15%;">Name of reporter:</td>
					<td style="width: 35%;"><strong><?php echo $pqmp['Pqmp']['reporter_name'] ?></strong></td>
					<td style="width: 15%;">Designation: </td>
					<td style="width: 35%;"><strong><?php echo $pqmp['Designation']['name'] ?></strong></td>
				</tr>
				<tr>
					<td style="width: 15%;">Contact Number:</td>
					<td style="width: 35%;"><strong><?php echo $pqmp['Pqmp']['contact_number'] ?></strong></td>
					<td style="width: 15%;">Reporter's Email:</td>
					<td style="width: 35%;"><strong><?php echo $pqmp['Pqmp']['reporter_email'] ?></strong></td>
				</tr>
			</table>
			 <hr>

		</div>
		</div>
	</body>
</html>
