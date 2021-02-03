<?php
	$this->assign('PQMP', 'active');
	$ichecked = "&#x2611;";
    $nchecked = "&#x2610;";
?>


	<div class="row-fluid">
		<div class="span12">

	   <div id="pqmpPrintArea">
			<div class="formbackp">
				
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
		                    <h5 style="background-color: #F7A3D8;">FORM FOR REPORTING SUSPECTED POOR-QUALITY MEDICAL PRODUCTS AND HEALTH TECHNOLOGIES</h5>
	                    </div>
	                </div>
	            </div>

				<table style="width: 100%;">
					<tr>
						<td  style="width: 75%;"></td>
						<td>
							<h5>Form ID: <?php 	echo $pqmp['Pqmp']['reference_no']; ?></h5>
				 		    <h6><span class="label label-important">Important</span> Unique Form ID</h6>
						</td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr><td colspan="2"><h5>Product category (Tick appropriate box)</h5></td></tr>
					<tr>
						<td style="width: 50%;">							
							<p> <?php echo ($pqmp['Pqmp']['medicinal_product']   ? $ichecked : $nchecked ); ?> Medicinal product  </p>
							<p> <?php echo ($pqmp['Pqmp']['blood_products']   ? $ichecked : $nchecked ); ?> Blood and blood products  </p>
							<p> <?php echo ($pqmp['Pqmp']['herbal_product']   ? $ichecked : $nchecked ); ?> Herbal product   </p>
							<p> <?php echo ($pqmp['Pqmp']['medical_device']   ? $ichecked : $nchecked ); ?> Medical device   </p>
						</td>
						<td style="width: 50%;">
							<p> <?php echo ($pqmp['Pqmp']['product_vaccine']   ? $ichecked : $nchecked ); ?> Vaccine   </p>
							<p> <?php echo ($pqmp['Pqmp']['cosmeceuticals']   ? $ichecked : $nchecked ); ?> Cosmeceuticals   </p>
							<p> <?php echo ($pqmp['Pqmp']['product_other']   ? $ichecked : $nchecked ); ?> Others  </p>
							<p> <?php echo $pqmp['Pqmp']['product_specify']; ?>   </p>
						</td>
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
						<td style="width: 25%;"><strong><?php echo (!empty($pqmp['County']['county_name'])) ? $pqmp['County']['county_name'] : null; ?></strong></td>
					</tr>
					<tr>
						<td style="width: 25%;">Facility Code:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['facility_code'] ?></strong></td>
						<td style="width: 25%;">Sub County:</td>
						<td style="width: 25%;"><strong><?php echo (!empty($pqmp['SubCounty']['sub_county_name'])) ? $pqmp['SubCounty']['sub_county_name'] : null; ?></strong></td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td style="width: 100%;">
							<h5 style="text-align:left;" class="pqmpbanner">PRODUCT IDENTITY</h5>
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
						<td style="width: 25%;"><strong><?php echo (!empty($pqmp['Country']['name'])) ? $pqmp['Country']['name'] : null; ?></strong></td>
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
								<h5 style="text-align:center;" class="pqmpbanner">PRODUCT FORMULATION</h5>
						</td>
						<td style="width: 50%;">
								<h5 style="text-align:center;" class="pqmpbanner">COMPLAINT</h5>
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
							<?php if ($pqmp['Pqmp']['therapeutic_ineffectiveness'] == 1) echo  "<p>&#x2611; Therapeutic ineffectiveness	</p>"  ?>
							<?php if ($pqmp['Pqmp']['particulate_matter'] == 1) echo  "<p>&#x2611; Particulate matter in infusions/injectables	</p>"  ?>
							<?php if ($pqmp['Pqmp']['complaint_other'] == 1) echo  "<p>&#x2611; Other	</p>"  ?>
							<p><?php echo $pqmp['Pqmp']['complaint_other_specify'] ?></p>
						</td>
					</tr>
				</table>
				 <hr>

				<table style="width: 100%;">
					<tr>
						<td colspan="2">
							<h5 style="text-align:center;" class="pqmpbanner">FOR MEDICAL DEVICE AND INVITRO DIAGNOSTIC</h5>
						</td>
					</tr>
					<tr>
						<td style="width: 50%;">
							<?php if ($pqmp['Pqmp']['packaging'] == 1) echo  "<p>&#x2611; Packaging </p>"  ?>
							<?php if ($pqmp['Pqmp']['labelling'] == 1)  echo  "<p>&#x2611; Labelling </p>"  ?>
							<?php if ($pqmp['Pqmp']['sampling'] == 1) echo "<p>&#x2611; Sampling </p>" ?>
							<?php if ($pqmp['Pqmp']['mechanism'] == 1) echo  "<p>&#x2611; Mechanism </p>"  ?>
							<?php if ($pqmp['Pqmp']['electrical'] == 1) echo "<p>&#x2611; Electrical </p>"  ?>
							<?php if ($pqmp['Pqmp']['device_data'] == 1) echo "<p>&#x2611; Data	</p>"  ?>
						</td>
						<td style="width: 50%;">
							<?php if ($pqmp['Pqmp']['software'] == 1) echo  "<p>&#x2611;  Software </p>"  ?>
							<?php if ($pqmp['Pqmp']['environmental'] == 1)  echo  "<p>&#x2611; Environmental	</p>"  ?>
							<?php if ($pqmp['Pqmp']['failure_to_calibrate'] == 1) echo "<p>&#x2611; Failure to calibrate </p>" ?>
							<?php if ($pqmp['Pqmp']['results'] == 1) echo  "<p>&#x2611; Results </p>"  ?>
							<?php if ($pqmp['Pqmp']['readings'] == 1) echo "<p>&#x2611; Readings </p>"  ?>
						</td>
					</tr>
				</table>
				 <hr>

				<table>
					<tr>
						<td>Describe the complaint in detail: <br>
						<strong><?php echo $pqmp['Pqmp']['complaint_description'] ?></strong></td>
					</tr>
					<tr>
						<td>Was the cold chain maintained for both transportation and storage? &nbsp;
						<strong><?php echo $pqmp['Pqmp']['cold_chain'] ?></strong></td>
					</tr>
				</table>
				<hr>


				<table  class="change_order_items" style="width: 100%; font-size: 7pt" >
					<tbody>
					  <tr>
						<td><h5>Does the product require refrigeration?</h5>
						</td>
						<td>
							<?php echo $pqmp['Pqmp']['require_refrigeration'] ?>
						</td>
						<td rowspan="4">
							<?php echo $pqmp['Pqmp']['other_details'] ?>
						</td>
					  </tr>

					  <tr>
						<td>
							<h5>Was the product available at the facility?</h5>
						</td>
						<td>
							<?php echo $pqmp['Pqmp']['product_at_facility'] ?>
						</td>
					  </tr>

					  <tr>
						<td>
							<h5>Was the product dispensed and returned by client?</h5>
						</td>
						<td>
							<?php echo $pqmp['Pqmp']['returned_by_client'] ?>
						</td>
					  </tr>

					  <tr>
						<td>
							<h5>Was the product stored according to Manufacturer / MOH recommendations?</h5>
						</td>
						<td>
							<?php echo $pqmp['Pqmp']['stored_to_recommendations'] ?>
						</td>
					  </tr>

					</tbody>
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
					<td style="width: 25%;">Name of person reporting:</td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['reporter_name'] ?></strong></td>
					<td style="width: 25%;">Designation: </td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Designation']['name'] ?></strong></td>
				</tr>
				<tr>
					<td style="width: 25%;">Contact Number:</td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['contact_number'] ?></strong></td>
					<td style="width: 25%;">Reporter's Email:</td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['reporter_email'] ?></strong></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>Date:</td>
					<td><strong><?php echo $pqmp['Pqmp']['reporter_date'] ?></strong></td>
				</tr>
			</table>
			<table style="width: 100%;">
				<tr>
					<td style="width: 55%;">Is the person submitting different from reporter?</td>
					<td><strong><?php echo $pqmp['Pqmp']['person_submitting'] ?></strong></td>
				</tr>
			</table>
			<table style="width: 100%;">
				<tr>
					<td style="width: 25%;">Name:</td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['reporter_name_diff'] ?></strong></td>
					<td style="width: 25%;">Designation: </td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['reporter_designation_diff'] ?></strong></td>
				</tr>
				<tr>
					<td style="width: 25%;">Contact Number:</td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['reporter_phone_diff'] ?></strong></td>
					<td style="width: 25%;">Reporter's Email:</td>
					<td style="width: 25%;"><strong><?php echo $pqmp['Pqmp']['reporter_email_diff'] ?></strong></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>Date:</td>
					<td><strong><?php echo $pqmp['Pqmp']['reporter_date_diff'] ?></strong></td>
				</tr>
			</table>
			 <hr>

		</div>
		</div>

		</div>
	</div>
