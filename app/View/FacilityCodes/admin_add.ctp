<?php 
	$this->assign('CMS', 'active');
?>

      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(ADD A NEW FACILITY)</small></h3>
		<p>This is from the Ministry of Health List of Health facilities in Kenya.</p>	
		<hr>
	<div class="row-fluid" style="margin-bottom: 9px;">	
		<div class="span0 columns">
			<div class="row-fluid">
				<div class="span12">
					  <?php echo $this->element('admin/contentmenu')?>				  
				</div><!--/span-->
			</div><!--/row-->	
		</div> <!-- /span5 -->

		<div class="span11 columns">			
			<div class="row-fluid"> 	
				<div class="span12"> 	
					<div class="whmcscontainer">
					<div class="contentpadded">
						<div class="page-header">
							<div class="styled_title"><h1>Add A New Facility</h1></div>
						</div>	
						<?php										
							echo $this->Form->create('FacilityCode', array(
								'url' => array('action' => 'add', 'admin' => true ),
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
									echo $this->Form->input('facility_code', array(
										'label' => array('class' => 'control-label', 'text' => 'Facility Code'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('facility_name', array(
										'label' => array('class' => 'control-label', 'text' => 'Facility Name'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('type', array(
										'label' => array('class' => 'control-label', 'text' => 'Type'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('owner', array(
										'label' => array('class' => 'control-label', 'text' => 'Owner'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('province', array(
										'label' => array('class' => 'control-label', 'text' => 'Province'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('district', array(
										'label' => array('class' => 'control-label', 'text' => 'District'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('Division', array(
										'label' => array('class' => 'control-label', 'text' => 'Division'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('sub_location', array(
										'label' => array('class' => 'control-label', 'text' => 'Sub-location'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('constituency', array(
										'label' => array('class' => 'control-label', 'text' => 'Constituency'),
										'class'=>'input-xlarge'));
								?>
							</div>
							<div class="span6">
								<?php								
									echo $this->Form->input('nearest_town', array(
										'label' => array('class' => 'control-label', 'text' => 'Nearest Town'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('keph_level', array(
										'label' => array('class' => 'control-label', 'text' => 'keph_level'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('plot_number', array(
										'label' => array('class' => 'control-label', 'text' => 'Plot Number'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('open_24hrs', array(
										'label' => array('class' => 'control-label', 'text' => 'Open 24 Hrs'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('open_weekends', array(
										'label' => array('class' => 'control-label', 'text' => 'Open Weekends'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('beds', array(
										'label' => array('class' => 'control-label', 'text' => 'Beds'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('cots', array(
										'label' => array('class' => 'control-label', 'text' => 'Cots'),
										'class'=>'input-xlarge'));					
									echo $this->Form->input('operational_status', array(
										'label' => array('class' => 'control-label', 'text' => 'Operational Status'),
										'class'=>'input-xlarge'));		
								?>
							</div>
						</div>
						 <hr>						
							
						<?php echo $this->Form->end(array(
							'label' => 'Submit',
							'value' => 'Save',
							'class' => 'btn btn-primary',
							'id' => 'HelpInfoEditSave',  
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
