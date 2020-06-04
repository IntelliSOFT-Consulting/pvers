<div class="span3">
  <div class="well sidebar-nav">	
	<ul class="nav nav-list">
		<li class="nav-header">Links</li>
		<?php echo $this->fetch('sidebar'); ?>
	</ul>
  </div><!--/.well -->
</div><!--/span-->


<div class="span9">
	   	
	<?php	
		//echo $this->element('banner');
		echo $this->Session->flash();
		
		echo $this->Form->create('Pqmp', array(
			'class' => 'well form-horizontal formbackp',
			 'inputDefaults' => array(
				'div' => array('class' => 'control-group'),
				'label' => array('class' => 'control-label'),
				'between' => '<div class="controls">',
				'after' => '</div>',
				'class' => '',
				'format' => array('before', 'label', 'between', 'input', 'after','error'),
				'error' => array('attributes' => array('class' => 'controls help-block')),
			 ),		
		));
	?>
	
	<?php echo $this->fetch('form.id'); ?>
	
	<div class="row-fluid">
		<div class="span12">	
			<?php
				echo $this->Session->flash();
			?>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>

	<div class="row-fluid">
		<div class="span6">
			<?php
				echo $this->Form->input('facility_name', array('label' => array('class' => 'control-label', 'text' => 'Name of Facility'),));
				echo $this->Form->input('facility_address', array('label' => array('class' => 'control-label', 'text' => 'Facility Address'),));			
				echo $this->Form->input('facility_phone', array('label' => array('class' => 'control-label', 'text' => 'Facility Telephone'), ));
			?>
		</div><!--/span-->
		<div class="span6">
			<?php
				echo $this->Form->input('district_name', array('label' => array('class' => 'control-label', 'text' => 'District Name'), ));
				echo $this->Form->input('province_name', array('label' => array('class' => 'control-label', 'text' => 'Province Name'), ));
			?>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>
	 
	<div class="row-fluid">
		<div class="span12">
			<h4 class="well" style="text-align:center;">PRODUCT IDENTITY</h4>
		</div><!--/span-->
	</div><!--/row-->
	
	<div class="row-fluid">
		<div class="span6">
			<?php
				echo $this->Form->input('brand_name', array('label' => array('class' => 'control-label required', 'text' => 'Brand Name'), ));
				echo $this->Form->input('batch_number', array('label' => array('class' => 'control-label', 'text' => 'Batch/Lot Number'), ));
				echo $this->Form->input('manufacture_date', array(
					'div' => array('class' => 'control-group required'),
					'type' => 'text',
					'label' => array('class' => 'control-label required', 'text' => 'Date of Manufacture'),
					'after'=>'<p class="help-block">	Date format dd-mm-yyyy e.g (18-05-2012) </p></div>',
				));
				echo $this->Ajax->datepicker('PqmpManufactureDate', array(
					'minDate' => '"-100Y"', 
					'maxDate' => '"-0D"',
					'dateFormat' => 'dd-mm-yy',
					'showButtonPanel' => true,
					'changeMonth' => true,
					'changeYear' => true,
					'showAnim' => 'show',
					'buttonImageOnly' => true,
					'showOn' => 'both',
					'buttonImage' => '/pv/img/calendar.gif',
				));
				
				echo $this->Form->input('name_of_manufacturer', array('label' => array('class' => 'control-label required', 'text' => 'Name of Manufacturer'), ));
				echo $this->Form->input('supplier_name', array('label' => array('class' => 'control-label', 'text' => 'Name of Distributor / Supplier'), ));
			?>
		</div><!--/span-->
		<div class="span6">
		  	<?php
				echo $this->Form->input('generic_name', array('label' => array('class' => 'control-label', 'text' => 'Generic Name'), ));				

				echo $this->Form->input('expiry_date', array(
					'div' => array('class' => 'control-group required'),
					'type' => 'text',
					'label' => array('class' => 'control-label required', 'text' => 'Date of Expiry'),
					'after'=>'<p class="help-block">	Date format (dd-mm-yyyy) </p></div>',
				));
				echo $this->Ajax->datepicker('PqmpExpiryDate', array(
					'minDate' => '"-100Y"', 
					'maxDate' => '"-0D"',
					'dateFormat' => 'dd-mm-yy',
					'showButtonPanel' => true,
					'changeMonth' => true,
					'changeYear' => true,
					'showAnim' => 'show',
					'buttonImageOnly' => true,
					'showOn' => 'both',
					'buttonImage' => '/pv/img/calendar.gif',
				));
				
				echo $this->Form->input('receipt_date', array(
					'div' => array('class' => 'control-group required'),
					'type' => 'text',
					'label' => array('class' => 'control-label required', 'text' => 'Date of Receipt'),
					'after'=>'<p class="help-block">	Date format (dd-mm-yyyy) </p></div>',
				));
				echo $this->Ajax->datepicker('PqmpReceiptDate', array(
					'minDate' => '"-100Y"', 
					'maxDate' => '"-0D"',
					'dateFormat' => 'dd-mm-yy',
					'showButtonPanel' => true,
					'changeMonth' => true,
					'changeYear' => true,
					'showAnim' => 'show',
					'buttonImageOnly' => true,
					'showOn' => 'both',
					'buttonImage' => '/pv/img/calendar.gif',
				));
				
				echo $this->Form->input('country_of_origin', array('label' => array('class' => 'control-label', 'text' => 'Country of Origin'), ));
				echo $this->Form->input('supplier_address', array('label' => array('class' => 'control-label', 'text' => 'Distributor/ Supplier\'s Address'), ));
			?>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>
	 
	<div class="row-fluid">
		<div class="span6 well">
			<h4>PRODUCT FORMULATION</h4>
			<h6>(select appropriate option)</h6>
		</div><!--/span-->
		<div class="span6 well">
			<h4>COMPLAINT</h4>
			<h6>(Tick appropriate box / boxes)</h6>
		</div><!--/span-->
	</div><!--/row-->
	
	<div class="row-fluid">
		<div class="span6">
			<?php
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<div class="control-group"> <input type="hidden" value="" id="PqmpProductFormulation_" name="data[Pqmp][product_formulation]"> 
								 <label class="radio">',
					'after' => '</label>',
					'options' => array('Oral tablets / capsules' => 'Oral tablets / capsules'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',	
					'options' => array('Oral suspension / syrup' => 'Oral suspension / syrup'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));				
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',	
					'options' => array('Injection' => 'Injection'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));				
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',	
					'options' => array('Diluent' => 'Diluent'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));				
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',	
					'options' => array('Powder for reconstruction of suspension' => 'Powder for reconstruction of suspension'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));				
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',	
					'options' => array('Powder for reconstruction of injection' => 'Powder for reconstruction of injection'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));				
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',	
					'options' => array('Eye drops' => 'Eye drops'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));				
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',	
					'options' => array('Ear drops' => 'Ear drops'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));				
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',
					'options' => array('Nebuliser solution' => 'Nebuliser solution'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'before' => '<label class="radio">',	'after' => '</label>',
					'options' => array('Cream / Ointment / Liniment / Paste' => 'Cream / Ointment / Liniment / Paste'),
					'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
				));
				echo $this->Form->input('product_formulation', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
					'format' => array('before', 'label', 'between', 'input','error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio">',
					'after' => '</label>',	
					'options' => array('Other' => 'Other'),
					'onclick' => '$("#PqmpProductFormulationSpecify").removeAttr("disabled")',
				));
				echo $this->Form->input('product_formulation_specify', array(
							// 'label' => array('class' => 'control-label', 'text' => '(specify)'),
							'label' => false, 'disabled' => true, 'between' => false, 'div' => false, 'class' => 'span7', 
							'placeholder' => 'If other, specify', 
							'after'=>'<p class="help-block">  </p>  </div>'
						));
			?>
		</div><!--/span-->
		<div class="span6">
			<?php
				echo $this->Form->input('colour_change', array(
											'before' => '<div class="control-group">',
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpColourChange_" name="data[Pqmp][colour_change]"> 
															<label class="checkbox">',
											'after' => 'Colour change </label>',));
				echo $this->Form->input('separating', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpSeparating_" name="data[Pqmp][separating]">
															<label class="checkbox">',
											'after' => 'separating	</label>',));
				echo $this->Form->input('powdering', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpPowdering_" name="data[Pqmp][powdering]">
															<label class="checkbox">',
											'after' => 'Powdering / crumbling </label>',));
				echo $this->Form->input('caking', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpCaking_" name="data[Pqmp][caking]"> 
															<label class="checkbox">',
											'after' => 'caking	</label>',));
				echo $this->Form->input('moulding', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpMoulding_" name="data[Pqmp][moulding]">
															<label class="checkbox">',
											'after' => 'Moulding </label>',));
				echo $this->Form->input('odour_change', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpOdourChange_" name="data[Pqmp][odour_change]">
															<label class="checkbox">',
											'after' => 'Change of odour	</label>',));
				echo $this->Form->input('mislabeling', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpMislabeling_" name="data[Pqmp][mislabeling]">
															<label class="checkbox">',
											'after' => 'Mislabeling </label>',));
				echo $this->Form->input('incomplete_pack', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpIncompletePack_" name="data[Pqmp][incomplete_pack]">
															<label class="checkbox">',
											'after' => 'Incomplete pack	</label>',));
				echo $this->Form->input('complaint_other', array(
											'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false, 
											'between' => '<input type="hidden" value="0" id="PqmpComlaintOther_" name="data[Pqmp][complaint_other]">
															<label class="checkbox">',
											'after' => 'Other	</label>',
											));
				echo $this->Form->input('complaint_other_specify', array(
											'class' => 'span6',  'rows' => '3', 'label' => false, 'between' => false,
											'after'=>'<p class="help-block">  </p>',
											'disabled' => true, 'placeholder' => 'If other, specify', ));	
			?>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>
	 
	<div class="row-fluid">
		<div class="span12">
			<?php
				echo $this->Form->input('complaint_description', array('class' => 'span8', 'rows' => '3', 
															'label' => array('class' => 'control-label required', 'text' => 'Describe the complaint in detail'),
															'after'=>'<p class="help-block">  </p></div>',
															));
			
			?>
		</div><!--/span-->
	</div><!--/row-->	
	<hr>
		 
	<div class="row-fluid">
		<div class="span12">
			<table class="table table-bordered  table-condensed table-pvborderless">
				<tbody>
				  <tr>
					<td><h4>Does the product require refrigeration?</h4>
					   </td>
					<td>
						<?php
							echo $this->Form->input('require_refrigeration', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
								'before' => '<div class="form-inline"> 
											<input type="hidden" value="" id="PqmpRequireRefrigeration_" name="data[Pqmp][require_refrigeration]"> 
											<label class="radio">',
								'after' => '</label>&nbsp;&nbsp;',
								'options' => array('Yes' => 'Yes'),
							));				
							echo $this->Form->input('require_refrigeration', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
								'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
								'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
								'before' => '<label class="radio">', 'after' => '</label> </div>',	
								'options' => array('No' => 'No'),
							));
						?>
					</td>
					
					<td rowspan="4">
						<?php
							echo $this->Form->input('other_details', array(
										'class' => 'span10',  'rows' => '4', 'label' => false, 'between' => false, 'div' => false,
										'after'=>'<p class="help-block">  </p>',
										'placeholder' => 'Other details if necessary', ));
						?>
					</td>
				  </tr>
				  
				  <tr>
					<td><h4>Was the product available at the facility?</h4>
					   </td>
					<td>
						<?php
							echo $this->Form->input('product_at_facility', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
								'before' => ' <div class="form-inline"> 
											<input type="hidden" value="" id="PqmpProductAtFacility_" name="data[Pqmp][product_at_facility]"> <label class="radio">',
								'after' => '</label>&nbsp;&nbsp;',
								'options' => array('Yes' => 'Yes'),
							));				
							echo $this->Form->input('product_at_facility', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
								'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
								'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
								'before' => '<label class="radio">', 'after' => '</label> </div> ',	
								'options' => array('No' => 'No'),
							));
						?>
					</td>					
				  </tr>
				  				  
				  <tr>
					<td><h4>Was the product dispensed and returned by client?</h4>
					   </td>
					<td>
						<?php
							echo $this->Form->input('returned_by_client', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
								'before' => ' <div class="form-inline"> 
											<input type="hidden" value="" id="PqmpReturnedByClient_" name="data[Pqmp][returned_by_client]"> <label class="radio">',
								'after' => '</label>&nbsp;&nbsp;',
								'options' => array('Yes' => 'Yes'),
							));				
							echo $this->Form->input('returned_by_client', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
								'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
								'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
								'before' => '<label class="radio">', 'after' => '</label> </div> ',	
								'options' => array('No' => 'No'),
							));
						?>
					</td>					
				  </tr>
				  				  
				  <tr>
					<td><h4>Was the product stored according to Manufacturer / MOH recommendations?</h4>
					   </td>
					<td>
						<?php
							echo $this->Form->input('stored_to_recommendations', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
								'before' => ' <div class="form-inline"> 
											<input type="hidden" value="" id="PqmpStoredToRecommendations_" name="data[Pqmp][stored_to_recommendations]"> <label class="radio">',
								'after' => '</label>&nbsp;&nbsp;',
								'options' => array('Yes' => 'Yes'),
							));				
							echo $this->Form->input('stored_to_recommendations', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
								'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
								'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
								'before' => '<label class="radio">', 'after' => '</label> </div> ',	
								'options' => array('No' => 'No'),
							));
						?>
					</td>					
				  </tr>
				  
				</tbody>
		  </table>
			
		</div><!--/span-->
	</div><!--/row-->	

	<div class="row-fluid">
		<div class="span12">
			<?php
				echo $this->Form->input('comments', array('class' => 'span8', 'rows' => '3', 
															'label' => array('class' => 'control-label required', 'text' => 'Comments (if any)'),
															'after'=>'<p class="help-block">  </p></div>',
															));
			
			?>
		</div><!--/span-->
	</div><!--/row-->	
	<hr>
	
				
	<div class="row-fluid">
		<div class="span6">
			<?php
				echo $this->Form->input('reporter_name', array(	
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Name of Reporter')
				));
				echo $this->Form->input('job_title', array(
					'div' => array('class' => 'control-group'),
					'label' => array('class' => 'control-label', 'text' => 'Cadre / Job title')
				));
			?>
		</div><!--/span-->
		<div class="span6">
			<?php
				echo $this->Form->input('signature', array(
					'div' => array('class' => 'control-group'),
					'label' => array('class' => 'control-label', 'text' => 'Signature')
				));				
				echo $this->Form->input('contact_number', array(
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Contact Number')
				));

			?>
		</div><!--/span-->
	</div><!--/row-->
		
	<?php echo $this->fetch('form.submit'); ?>
	
</div>

<?php echo $this->fetch('content'); ?>
