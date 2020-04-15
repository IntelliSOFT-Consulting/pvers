<?php 
	$this->assign('CMS', 'active');
?>

      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(EDIT PPB DRUG)</small></h3>
		<p>You may refer to the WHO DRUG DICTIONARY to get the drug.</p>	
		<hr>
	<div class="row-fluid" style="margin-bottom: 9px;">	
		<div class="span2 columns">
			<div class="row-fluid">
				<div class="span12">
					  <?php echo $this->element('admin/contentmenu')?>				  
				</div><!--/span-->
			</div><!--/row-->	
		</div> <!-- /span5 -->

		<div class="span10 columns">			
			<div class="row-fluid"> 	
				<div class="span12"> 	
					<div class="whmcscontainer">
					<div class="contentpadded">
						<div class="page-header">
							<div class="styled_title"><h1>EDIT PPB Drug</h1></div>
						</div>	
						<?php										
							echo $this->Form->create('DrugDictionary', array(
								'url' => array('action' => 'edit', 'admin' => true ),
								'class' => 'form-horizontal',
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
						<div class="row-fluid">
							<div class="span6">
								<?php								
									echo $this->Form->input('id', array(
										'label' => array('class' => 'control-label', 'text' => 'Medicinal Product Id'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('generic', array(
										'label' => array('class' => 'control-label', 'text' => 'Generic (Y/N)'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('drug_name', array(
										'label' => array('class' => 'control-label', 'text' => 'Drug Name'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('MedId', array(
										'label' => array('class' => 'control-label', 'text' => 'Med Id'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('drug_record_number', array(
										'label' => array('class' => 'control-label', 'text' => 'Drug Record Number'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('sequence_no_1', array(
										'label' => array('class' => 'control-label', 'text' => 'Sequence Number 1'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('sequence_no_2', array(
										'label' => array('class' => 'control-label', 'text' => 'Sequence Number 2'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('sequence_no_3', array(
										'label' => array('class' => 'control-label', 'text' => 'Sequence Number 3'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('sequence_no_4', array(
										'label' => array('class' => 'control-label', 'text' => 'Sequence Number 4'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('name_specifier', array(
										'label' => array('class' => 'control-label', 'text' => 'Name Specifier'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('market_authorization_number', array(
										'label' => array('class' => 'control-label', 'text' => 'Market Authorization Number'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('market_authorization_date', array(
										'label' => array('class' => 'control-label', 'text' => 'Market Authorization Date'),
										'class'=>'input-xlarge'));													
									
								?>
							</div>
							<div class="span6">
								<?php								
									echo $this->Form->input('market_authorization_withdrawal_date', array(
										'label' => array('class' => 'control-label', 'text' => 'Market Authorization Withdrawal Date'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('country', array(
										'label' => array('class' => 'control-label', 'text' => 'Country Code (3AN)'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('company', array(
										'label' => array('class' => 'control-label', 'text' => 'Company'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('marketing_authorization_holder', array(
										'label' => array('class' => 'control-label', 'text' => 'Marketing Authorization Holder'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('source_code', array(
										'label' => array('class' => 'control-label', 'text' => 'Source Code'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('source_country', array(
										'label' => array('class' => 'control-label', 'text' => 'Source Country'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('source_year', array(
										'label' => array('class' => 'control-label', 'text' => 'Source Year'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('product_type', array(
										'label' => array('class' => 'control-label', 'text' => 'Product Type'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('product_group', array(
										'label' => array('class' => 'control-label', 'text' => 'Product Group'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('create_date', array(
										'label' => array('class' => 'control-label', 'text' => 'Create Date'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('date_changed', array(
										'label' => array('class' => 'control-label', 'text' => 'Date Changed'),
										'class'=>'input-xlarge'));
								?>
							</div>
						</div>
						 <hr>						
							
						<?php echo $this->Form->end(array(
							'label' => 'Submit',
							'value' => 'Save',
							'class' => 'btn btn-primary',
							'id' => 'DrugDictionaryEditSave',  
							'div' => array(
								'class' => 'form-actions',
							)
						));?>
							
						</div>
					</div>
				</div>
			</div>
		</div> <!-- /row-fluid -->
				
	</div> <!-- /span6 -->		
</div> <!-- /row-fluid -->
