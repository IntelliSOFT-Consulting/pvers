<?php
	$this->assign('MEDICATION', 'active');
	// pr($this->Session->read('Auth.User.initial_email'));
 ?>
 
  <!-- SADR
================================================== -->
<section id="medicationsadd">
	<div class="page-header" id="medication_add_header">
		<h1>MEDICATION ERROR REPORTING FORM  </h1>  
	</div>	 
	
	<div class="row-fluid">
		<div class="span5 columns">
			<div class="row-fluid">
				<div class="span12" id="medication_add_left_content">
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
										
										<p>Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event.
Patient’s identity is held in strict confidence and program staff is not is not expected to and will not disclose reporter’s identity in response to any public request. Information supplied by you will contribute to the improvement of medicine safety and therapy in Kenya.

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
			<div class="page-header" id="medication_add_middle_header">
				<h3>Report Type<br></h3>	
			</div>	
			 <?php 	
				echo $this->Form->create('Medication', array(
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
			
				echo $this->Form->input('reporter_email', array(
							'type' => 'email', 'value' => $this->Session->read('Auth.User.email'), 
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
						));
				if($this->Session->read('Auth.User.initial_email')) echo $this->Form->input('emails', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.initial_email')));
				echo $this->Form->input('bot_stop', array(
							'div' => array('style' => 'display:none')
						));
				echo $this->Form->end(array(
						'label' => 'Go to report',
						'value' => 'Save',
						'class' => 'btn btn-primary',
						'id' => 'SadrSubmitEmail', 'title'=>'Start a New PQMP', 
						'data-content' => 'Please provide us with your email address to start filling in the PQMP.',
						'div' => array(
							'class' => 'form-actions',
						)
					));
			?>	
		</div> <!-- /span4 -->
		<div class="span4 columns">
			
		</div> <!-- /span6 -->
	</div> <!-- /row -->
</section> <!-- /section -->
