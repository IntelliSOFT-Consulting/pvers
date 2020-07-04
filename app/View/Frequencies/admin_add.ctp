<?php 
	$this->assign('CMS', 'active');
?>

      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(ADD A NEW DRUG FREQUENCY)</small></h3>
		<p>Please ensure the code corresponds to the ICSR specified code and that the code does not already exist.</p>	
		<hr>
	<div class="row-fluid" style="margin-bottom: 9px;">	
		<div class="span2 columns">
			<div class="row-fluid">
				<div class="span12">
					  <?php // echo $this->element('admin/contentmenu')?>				  
				</div><!--/span-->
			</div><!--/row-->	
		</div> <!-- /span5 -->

		<div class="span10 columns">			
			<div class="row-fluid"> 	
				<div class="span12"> 	
					<div class="whmcscontainer">
					<div class="contentpadded">
						<div class="page-header">
							<div class="styled_title"><h1>Add A New Frequency</h1></div>
						</div>	
						<?php										
							echo $this->Form->create('Frequency', array(
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
							<div class="span12">
								<?php								
									echo $this->Form->input('value', array(
										'label' => array('class' => 'control-label', 'text' => 'Value'),
										'class'=>'input-xlarge'));													
									echo $this->Form->input('name', array(
										'label' => array('class' => 'control-label', 'text' => 'Frequency Name'),
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
