<?php
	$this->Html->script('jqprint.0.3', array('inline' => false));
	$this->assign('PQHPT', 'active');
 ?>


<section id="pqmpsview">
	<div class="row-fluid">
		<div class="span12">
		<?php
				echo $this->Session->flash();
		?>
		<div class="row-fluid">
		<div class="span3 columns">
			<div class="page-header">
				<h3>Feedback <small>Your Feedback will help us serve you better</small></h3>
			</div>
				<p>Your feedback is confidential .....</p>
			 <?php
				echo $this->Form->create('Feedback', array(
					'action' => 'add',
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

				echo $this->Form->input('pqmp_id', array('type' => 'hidden', 'value' => $pqmp['Pqmp']['id']));
				echo $this->Form->input('email', array('label' => 'Email / Phone No.'));
				echo $this->Form->input('feedback', array( 'rows' => '5', 'label' => array('class' => 'control-label required',
																					'text' => 'FEEDBACK')));
				echo $this->Form->end(array(
						'label' => 'Submit',
						'value' => 'Save',
						'class' => 'btn btn-primary',
						'id' => 'SadrFeedback', 'title'=>'Start a New PQHPT',
						'data-content' => 'Please provide us with your email address to start filling in the PQHPT.',
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
						echo $this->Html->link('Download PDF', array('controller'=>'pqmps','action'=>'download', 'ext'=> 'pdf', $pqmp['Pqmp']['id']),
													array('class' => 'btn btn-primary mapop', 'title'=>'Download PDF',
													'data-content' => 'Download the pdf version of the report',));
					?>
					</div>
					<div class="span4">
						<?php
								echo $this->Form->button('Print Report', array('type' => 'button', 'class'=>'btn btn-inverse btnPrint' ,
														'onclick' => '$(\'#pqmpPrintArea\').jqprint(); '
														));
						?>
					</div>
					<div class="span4">
						<?php
								if($pqmp['Pqmp']['submitted'] > 1) {
									echo $this->Html->link('Edit Report', '#', array(
										'name' => 'continueEditing',
										'class' => 'btn mapop disabled',
										'id' => 'PqmpContinueReport', 'title'=>'Submitted Report!',
										'data-content' => 'This report has been submitted to PPB and cannot be edited',
										'div' => false,
									));
								} else {
									echo $this->Html->link('Edit Report', array('action' => 'edit', $pqmp['Pqmp']['id']), array(
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

	   <div id="pqmpPrintArea">
			<div class="vformbackp">
				<?php
					echo $this->Html->image('pqmp_header.gif', array('alt' => 'PQHPT'));
				?>
				<br>
				<br>

				<table style="width: 100%;">
					<tr>
						<td  style="width: 50%;"></td>
						<td><h3>Report ID: <?php echo $pqmp['Pqmp']['id'] ?></h3></td>
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
						<td style="width: 25%;">Sub County:</td>
						<td style="width: 25%;"><strong><?php echo $pqmp['SubCounty']['sub_county_name'] ?></strong></td>
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
						<td style="width: 25%;"><strong><?php echo $pqmp['Country']['name'] ?></strong></td>
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
				 <hr>

				<table>
					<tr>
						<td style="width: 50%;">Describe the complaint in detail</td>
						<td style="width: 50%;"><strong><?php echo $pqmp['Pqmp']['complaint_description'] ?></strong></td>
					</tr>
				</table>
				<hr>


				<table  class="change_order_items" style="width: 100%; font-size: 7pt" >
					<tbody>
					  <tr>
						<td><h4>Does the product require refrigeration?</h4>
						</td>
						<td>
							<div class="form-inline">
									<label class="radio">
									(&#10004;)<?php echo $pqmp['Pqmp']['require_refrigeration'] ?>
									</label>&nbsp;&nbsp;
							</div>
						</td>

						<td rowspan="4">
							<?php echo $pqmp['Pqmp']['other_details'] ?>
						</td>
					  </tr>

					  <tr>
						<td>
							<h4>Was the product available at the facility?</h4>
						</td>
						<td>
							<div class="form-inline">
								<label class="radio">
									(&#10004;)<?php echo $pqmp['Pqmp']['product_at_facility'] ?>
								</label>&nbsp;&nbsp;
							</div>
						</td>
					  </tr>

					  <tr>
						<td>
							<h4>Was the product dispensed and returned by client?</h4>
						</td>
						<td>
							<div class="form-inline">
								<label class="radio">
									(&#10004;)<?php echo $pqmp['Pqmp']['returned_by_client'] ?>
								</label>&nbsp;&nbsp;
							</div>
						</td>
					  </tr>

					  <tr>
						<td>
							<h4>Was the product stored according to Manufacturer / MOH recommendations?</h4>
						</td>
						<td>
							<div class="form-inline">
								<label class="radio">
									(&#10004;)<?php echo $pqmp['Pqmp']['stored_to_recommendations'] ?>
								</label>&nbsp;&nbsp;
							</div>
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
					<td style="width: 25%;">Name of reporter:</td>
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
			</table>
			 <hr>

		</div>
		</div>

		</div>
		</div>
		</div>
		</div>
	</div>
</section>
