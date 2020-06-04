<?php 
	$this->assign('CMS', 'active');
	$this->Html->script('jHtmlArea-0.7.5', array('inline' => false));
	$this->Html->css('jHtmlArea', null, array('inline' => false));
?>

      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(EDIT CONTENT)</small></h3>
		<p>Change the content for the front end. Please make sure that the text in the front end exactly matches the text you intend to edit.</p>	
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
							<div class="styled_title"><h1>Change Content</h1></div>
						</div>	
						<?php										
							echo $this->Form->create('HelpInfo', array(
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
									echo $this->Form->input('id');
									echo $this->Form->input('field_label', array(
										'label' => array('class' => 'control-label', 'text' => 'Field Label'),
										'class'=>'input-xlarge'));
									echo $this->Form->input('place_holder', array(
										'label' => array('class' => 'control-label', 'text' => 'Place Holder'),
										'class'=>'input-xlarge'));
								?>
							</div>
							<div class="span6">
								<?php
									echo $this->Form->input('help_type', array(
										'options' => array('tooltipper'=>'tooltip', 'mapop'=>'popover'),
										'empty' => true,
										'class'=>'input-xlarge'
									));
									echo $this->Form->input('title', array('label' => array('class' => 'control-label', 'text' => 'Title'),
										'class'=>'input-xlarge'));	
									echo $this->Form->input('help_text', array('label' => array('class' => 'control-label', 'text' => 'help_text'),
										'class'=>'input-xlarge'));	
								?>
							</div>
						</div>
						 <hr>						
						<div class="row-fluid">
							<div class="span12">
								<?php								
											
									echo $this->Form->input('content', array('rows'=>'20', 'label' => array('class' => 'control-label', 'text' => 'Content'),
										'class'=>'span12'));			
								
								?>
							</div><!--/span-->
						</div><!--/row-->
							
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
<script>
$(document).ready(function() {
	$('#HelpInfoContent').htmlarea();
});
</script>