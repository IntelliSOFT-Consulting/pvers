<?php 
	$this->assign('SADR', 'active');
 ?>

      <!-- SADR
    ================================================== -->
    <section id="sadrsadd">
	<div class="page-header" id="sadr_add_header">
		<?php echo $help_infos['sadr_add_header']['content'];?>    
	</div>	 
	
	<div class="row-fluid">	
		<div class="span5 columns">
			<div class="row-fluid">
				<div class="span12" id="sadr_add_left_content">
					<?php echo $help_infos['sadr_add_left_content']['content']; ?> 					
				</div><!--/span-->
			</div><!--/row-->
	
		</div> <!-- /span5 -->

		<div class="span3 columns">
			<div class="page-header" id="sadr_add_middle_header">
					<?php echo $help_infos['sadr_add_middle_header']['content']; ?> 				
			</div>	
			 <?php 	
				echo $this->Form->create('Sadr', array(
					'url' => 'add',
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
				echo $this->Form->input('report_type', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'report_type',
					'before' => '<div class="control-group required"> <label class="control-label required"> Report Type </label>
									<div class="controls"> <input type="hidden" value="" id="SadrReportType_" name="data[Sadr][report_type]"> <label class="radio">',
					'after' => '</label>',
					'options' => array('Initial Report' => 'Initial Report'),
					'onclick' => ' $("#SadrFormId").attr("disabled", "disabled"); $("#form_id").hide();',
				));
				echo $this->Form->input('report_type', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'report_type',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio">',
					'after' => '</label> </div> </div>',	
					'options' => array('Follow-up Report' => 'Follow-up Report'),
					'onclick' => ' $("#SadrFormId").removeAttr("disabled"); $("#form_id").show();',
				));
						
				echo $this->Form->input('form_id', array(
							'type' => 'text',
							'div' => array('class' => 'control-group required', 'id' => 'form_id'),
							'label' => array('class' => 'control-label required', 'text' => 'UNIQUE FORM ID'),
							'after'=>'<p class="help-block" style="color:#C09853; font-weight:normal"> Please enter the ID of the previous report.<br> You can get it from your email. </p></div>',
						));	
				
				echo $this->Form->input('reporter_email', array(
							'type' => 'email', 'value' => $this->Session->read('Auth.User.email'), 
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => $help_infos['SadrReporterEmail']['field_label'].' <span style="color:red;">*</span>'),
							'title'=>$help_infos['SadrReporterEmail']['title'], 'data-content' => $help_infos['SadrReporterEmail']['content'],
							'after'=>'<p class="help-block" style="color:#C09853; font-weight:normal"> '.$help_infos['SadrReporterEmail']['help_text'].' </p></div>',
							'class' => $help_infos['SadrReporterEmail']['help_type'].''
						));
				if($this->Session->read('Auth.User.initial_email')) echo $this->Form->input('emails', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.initial_email')));
				
				echo $this->Form->input('bot_stop', array(
							'div' => array('style' => 'display:none')
						));						
				echo $this->Form->end(array(
						'label' => 'Go to report',
						'value' => 'Save',
						'class' => 'btn btn-primary tooltipper',
						'id' => 'SadrSubmitEmail', 'title'=>'Start a New SADR', 
						'div' => array(
							'class' => 'form-actions',
						)
					));
				?>		
		</div> <!-- /span6 -->
		<div class="span4 columns">
			<div class="page-header">
				<?php echo $help_infos['sadr_add_right_content1']['content']; ?> 				
			</div>	 
			<?php 	
				echo $this->Form->create('Sadr', array(
					'url' => 'find',
					'class' => 'well', 	
				));
			
				echo $this->Form->input('search', array(
							'div' => false,	'label' => false, 'class' => "input-medium search-query", 'placeholder' => 'Report ID...'
						));
			
				echo $this->Form->end(array(
						'label' => 'Search',
						'value' => 'Save',
						'class' => 'btn',
						'id' => 'SadrSearchForm', 
						'title'=>'Search for an SADR', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
			<div class="page-header">
				<?php echo $help_infos['sadr_add_right_content2']['content']; ?>
			</div>	 
			<?php 	
				echo $this->Form->create('SadrFollowup', array(
					'url' => array('controller' => 'sadr-followups', 'action' => 'find'),
					'class' => 'well', 	
				));
			
				echo $this->Form->input('search', array(
							'div' => false,	'label' => false, 'class' => "input-medium search-query", 'placeholder' => 'Report ID...'
						));
			
				echo $this->Form->end(array(
						'label' => 'Search',
						'value' => 'Save',
						'class' => 'btn',
						'id' => 'SadrFollowupSearchForm', 
						'title'=>'Search for a Follow up SADR report', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
			<div class="page-header">
				<h3>Request for Submitted reports <small>Get all reports you have submitted using this email address...</small></h3>	
			</div>	 
			<?php 	
				echo $this->Form->create('Message', array(
					'url' => array('controller' => 'messages', 'action' => 'add'),
					'class' => 'well', 	
				));
			
				echo $this->Form->email('receiver', array(
							'div' => false,	'label' => false, 'class' => "input-medium search-query", 'placeholder' => 'Email...'
						));
				echo $this->Form->input('sent', array('type' => 'hidden', 'value' => 2));
				
				echo $this->Form->end(array(
						'label' => 'Request',
						'value' => 'Save',
						'class' => 'btn',
						'id' => 'SadrFollowupSearchForm', 
						'title'=>'Search for a Follow up SADR report', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
		</div> <!-- /span6 -->
	   </div> <!-- /row-fluid -->
	</section>
