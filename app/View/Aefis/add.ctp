<?php 
	$this->assign('AEFI', 'active');
 ?>

      <!-- AEFI
    ================================================== -->
    <section id="aefisadd">
	<div class="page-header" id="aefi_add_header">
		<h1>Adverse Event Following Immunization Form </h1>  
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
										<h4>WHEN TO COMPLETE THIS FORM	</h4>
										<p>An <em>adverse event following immunization (AEFI)</em> is defined as any unfavorable medical occurrence which follows immunization and which may or may not be caused by the usage of the vaccine. The adverse event may be any unfavorable or unintended sign, abnormal laboratory finding, symptom or disease.	</p>								
										
										<p><b>Complete the AEFI reporting form when any Adverse Event Following Immunization (AEFI) occurs and especially those of parental and/or health worker concern e.g.</b>
											
										<br>1. Serious Events (results in death, hospitalization or prolongation of hospitalization) persistent or significant disability/incapacity, or is life-threatening	
											
										<br>2. Injection Site Abscesses	
										<br>3. BCG Lymphadenitis-Lumps In The Armpit Following BCG Vaccination	
										<br>4. Severe Local Reaction –  Redness, swelling or pain extends past the nearest joint; inability to move the limb; Redness, swelling or pain persist for more than 3 days	
											
										<br>5. Seizures
										<br>6. Allergic reaction- anaphylaxis, hives, bronchospasm, edema	
										<br>7. Clusters of events(> 2 cases of same event in same month) apart from fever	
										<br>8. Any Uncommon Or Unexpected Events and events that are of public concern 	
											
										<br>- Report even if you are not certain the vaccine caused the event or you do not have all the details.	
											
										<br>- Indicate if it is an <b>initial</b> or <b>follow-up</b> report	
										<br>- Information on the Manufacturer and Expiry dates of the Vaccine and/or diluents may be obtained from the label of its container. If multiple vaccines are suspected, provide the required information on each of them.
										<br>- Enter date of birth if available, if not enter the age at the time the AEFI began 
										<br>- Where more than one AEFI if they occur in the same patient and same time tick the multiple options provided, also provide a description of the AEFI in the space provided
										</p>
											
										<h4>WHAT HAPPENS TO SUBMITTED REPORTS	</h4>
										
										<p>Data obtained from this and other reports will be assessed and used improve policy and service delivery in the Ministry of Health  	
										<br>
											
										All information is handled in strict confidence 	
											
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
			<div class="page-header" id="aefi_add_middle_header">
					<h3>Report Type<br></h3>		
			</div>	
			 <?php 	
				echo $this->Form->create('Aefi', array(
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
									<div class="controls"> <input type="hidden" value="" id="AefiReportType_" name="data[Aefi][report_type]"> <label class="radio">',
					'after' => '</label>',
					'options' => array('Initial Report' => 'Initial Report'),
					'onclick' => ' $("#AefiFormId").attr("disabled", "disabled"); $("#form_id").hide();',
				));
				echo $this->Form->input('report_type', array(
					'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'report_type',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio">',
					'after' => '</label> </div> </div>',	
					'options' => array('Follow-up Report' => 'Follow-up Report'),
					'onclick' => ' $("#AefiFormId").removeAttr("disabled"); $("#form_id").show();',
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
						'id' => 'AefiSubmitEmail', 'title'=>'Start a New AEFI', 
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
				echo $this->Form->create('Aefi', array(
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
						'id' => 'AefiSearchForm', 
						'title'=>'Search for an AEFI', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
			<div class="page-header">
				<h3>Search for follow up report<small> Use Report ID
			</div>	 
			<?php 	
				echo $this->Form->create('AefiFollowup', array(
					'url' => array('controller' => 'aefi-followups', 'action' => 'find'),
					'class' => 'well', 	
				));
			
				echo $this->Form->input('search', array(
							'div' => false,	'label' => false, 'class' => "input-medium search-query", 'placeholder' => 'Report ID...'
						));
			
				echo $this->Form->end(array(
						'label' => 'Search',
						'value' => 'Save',
						'class' => 'btn',
						'id' => 'AefiFollowupSearchForm', 
						'title'=>'Search for a Follow up AEFI report', 
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
						'id' => 'AefiFollowupSearchForm', 
						'title'=>'Search for a Follow up AEFI report', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
		</div> <!-- /span6 -->
	   </div> <!-- /row-fluid -->
	</section>
