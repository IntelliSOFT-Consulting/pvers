<?php 
	$this->assign('REPORTS', 'active');
	$this->Html->script('jHtmlArea-0.7.5', array('inline' => false));
	$this->Html->css('jHtmlArea', null, array('inline' => false));
?>

      <!-- REPLY/ REQUEST FOR MORE INFO
    ================================================== -->
	<h3>Send an Email to the reporter <small>()</small></h3>
		<p>Send an email to the report sender. Edit the content appropriately.</p>	
		<hr>
	<div class="row-fluid" style="margin-bottom: 9px;">	
		<div class="span2 columns">
			<div class="row-fluid">
				<div class="span12">
					  <div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						  <li class="divider"></li>
						  <li class="active">
							<?php echo $this->Html->link('<i class="icon-backward"></i> Back', 
										array('controller' => 'pqmps',  'submitted'=>'1', 'action' => 'index', 'admin' => true), 
										array('escape' => false)); ?>
						  </li>
						  <li class="divider"></li>
						  
						</ul>
					  </div> <!-- /well -->			  
				</div><!--/span-->
			</div><!--/row-->	
		</div> <!-- /span5 -->

		<div class="span10 columns">			
			<div class="row-fluid"> 	
				<div class="span12"> 	
					<div class="whmcscontainer">
					<div class="contentpadded">
						<div class="page-header">
							<div class="styled_title"><h1>Email</h1></div>
						</div>	
						<?php										
							echo $this->Form->create('Message', array(
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
									echo $this->Form->input('pqmp_id', array('type' => 'hidden', 'value' => $pqmp['Pqmp']['id']));
									echo $this->Form->input('receiver', array('type' => 'hidden', 'value' => $pqmp['Pqmp']['reporter_email']));									
								?>
								<p>To: <strong><?php
									echo $pqmp['Pqmp']['reporter_email'];
								?></strong></p>
							</div>
						</div>
						 <hr>						
						<div class="row-fluid">
							<div class="span12">
								<?php								
									echo $this->Form->input('subject', array(
										'label' => array('class' => 'control-label', 'text' => 'Subject'), 'class'=>'input-xlarge'));
									echo $this->Form->input('message', 
										array('rows'=>'20', 'value' => $this->element('emails/reply_pqmp'),
										'label' => array('class' => 'control-label', 'text' => 'Message'),
										'class'=>'span12'));			
								
								?>
							</div><!--/span-->
						</div><!--/row-->
							
						<?php echo $this->Form->end(array(
							'label' => 'Send',
							'value' => 'Save',
							'class' => 'btn btn-primary',
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
	$('#MessageMessage').htmlarea();
});
</script>