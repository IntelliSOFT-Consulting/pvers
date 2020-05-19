<?php 
	$this->assign('AEFI', 'active');
 ?>

      <!-- AEFI
    ================================================== -->
    <section id="aefisadd">
	<div class="page-header" id="aefi_add_header">
		<h1>MEDICAL DEVICES INCIDENT REPORTING FORM </h1>  
	</div>	 
	
	<div class="row-fluid">	
		<div class="span5 columns">
			<div class="row-fluid">
				<div class="span12" id="aefi_add_left_content">
					<div class="accordion" id="accordion2">
						<div class="accordion-group">
						  <div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							  EXPLANATORY NOTES
							</a>
						  </div>
						  <div id="collapseThree" class="accordion-body collapse in">
							<div class="accordion-inner">
								  <!-- Headings & Paragraph Copy -->
								  <div class="row-fluid">
									<div class="span12">
									  	<h3>GUIDELINES ON COMPLETION OF THE FORM	</h3>
										
											
										<h4>WHAT HAPPENS TO SUBMITTED REPORTS	</h4>
										
										<p>Data obtained from this and other reports will be assessed and used improve policy and service delivery in the Ministry of Health  	
										<br>
											
										All information is handled in strict confidence 

										The Pharmacy and Poisons Board investigates all incidents reported to us in order to identify any faults with medical devices and to prevent similar incidents happening again. The Board may contact the manufacturer of this medical device to request they carry out an investigation. Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event. Patient’s identity is held in strict confidence. Information supplied by you will contribute to the improvement of the safety of medical devices in Kenya.	
											
										<b>Submission does not mean admission that the health worker or manufacturer or the product caused or contributed to the event. </b>
										</p>

										<address>
											<strong>THE PHARMACY AND POISONS BOARD</strong><br>
											Lenana Road.<br>
											<abbr title="Post Office Box">P.O. Box</abbr> 27663-00506 NAIROBI<br>
											<abbr title="Telephone Number">Tel:</abbr> (020)-2716905 / 6 Ext 114 
											<abbr title="Fascimile">Fax:</abbr> (020)-2713431 / 2713409 <br>
											E-mail: <a href="mailto:#">pv@pharmacyboardkenya.org</a>

											
										  </address>
									</div>
															
								  </div>
							   
							</div>
						  </div>
						</div>				
					</div>			
				</div><!--/span-->
			</div><!--/row-->
	
		</div> <!-- /span5 -->

		<div class="span3 columns">
			<div class="page-header" id="device_add_middle_header">
					<h3>Report Type<br></h3>		
			</div>	
			 <?php 	
				echo $this->Form->create('Device', array(
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
									<div class="controls"> <input type="hidden" value="" id="DeviceReportType_" name="data[Device][report_type]"> <label class="radio">',
					'after' => '</label>',
					'options' => array('Initial Report' => 'Initial Report'),
					'onclick' => ' $("#DeviceFormId").attr("disabled", "disabled"); $("#form_id").hide();',
				));
				echo $this->Form->input('report_type', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'report_type',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio">',
					'after' => '</label> </div> </div>',	
					'options' => array('Follow-up Report' => 'Follow-up Report'),
					'onclick' => ' $("#DeviceFormId").removeAttr("disabled"); $("#form_id").show();',
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
							'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS'.' <span style="color:red;">*</span>'),
							'title'=> null, 'data-content' => null,
							'after'=>'<p class="help-block" style="color:#C09853; font-weight:normal"> This information is <span class="label label-success">Confidential</span> </p></div>',
							'class' => null.''
						));
				if($this->Session->read('Auth.User.initial_email')) echo $this->Form->input('emails', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.initial_email')));
				
				echo $this->Form->input('bot_stop', array(
							'div' => array('style' => 'display:none')
						));						
				echo $this->Form->end(array(
						'label' => 'Go to report',
						'value' => 'Save',
						'class' => 'btn btn-primary tooltipper',
						'id' => 'DeviceSubmitEmail', 'title'=>'Start a New Incident', 
						'div' => array(
							'class' => 'form-actions',
						)
					));
				?>		
		</div> <!-- /span6 -->
		<div class="span4 columns">
			<div class="page-header">
				<h3>Search for Initial Report<small> Use Report ID</small></h3>			
			</div>	 
			<?php 	
				echo $this->Form->create('Device', array(
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
						'id' => 'DeviceSearchForm', 
						'title'=>'Search for an incident', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
			<div class="page-header">
				<h3>Search for follow up report<small> Use Report ID
			</div>	 
			<?php 	
				echo $this->Form->create('DeviceFollowup', array(
					'url' => array('controller' => 'device-followups', 'action' => 'find'),
					'class' => 'well', 	
				));
			
				echo $this->Form->input('search', array(
							'div' => false,	'label' => false, 'class' => "input-medium search-query", 'placeholder' => 'Report ID...'
						));
			
				echo $this->Form->end(array(
						'label' => 'Search',
						'value' => 'Save',
						'class' => 'btn',
						'id' => 'DeviceFollowupSearchForm', 
						'title'=>'Search for a Follow up Device report', 
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
						'id' => 'DeviceFollowupSearchForm', 
						'title'=>'Search for a Follow up AEFI report', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
		</div> <!-- /span6 -->
	   </div> <!-- /row-fluid -->
	</section>
