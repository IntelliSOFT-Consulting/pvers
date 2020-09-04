<?php  
	$this->assign('USERS', 'active');
 	$this->Html->script('widgets', array('inline' => false));
	$this->Html->script('user', array('inline' => false));
?>

<div class="row-fluid"> 	
	<div class="span12"> 	

	<div class="whmcscontainer">
    <div class="contentpadded">
			<?php echo $this->Html->link('<i class="icon-backward"></i> Back to Users', array('action' => 'index'), array('escape'=>false)); ?>
			<div class="page-header">
				<div class="styled_title"><h2>Update <?php echo $this->request->data['User']['username'].'\'s'?> Details</h2></div>
			</div>	
	<?php	
		//echo $this->element('banner');
		echo $this->Session->flash();
		
		echo $this->Form->create('User', array(
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
		
		echo $this->Form->input('id');
		// print_r( $this->request->data['SadrListOfDrug']);
	?>
		  

	
	<div class="row-fluid">
		<div class="span6">
			<?php
				echo $this->Form->input('username', array('label' => array('class' => 'control-label', 'text' => 'Username'),));
				// echo $this->Form->input('password', array('label' => array('class' => 'control-label', 'text' => 'Password'),));			
				// echo $this->Form->input('confirm_password', array(
						// 'type' => 'password',
						// 'label' => array('class' => 'control-label', 'text' => 'Confirm Password'), ));
				echo $this->Form->input('name', array('label' => array('class' => 'control-label', 'text' => 'Name'),));			
				echo $this->Form->input('email', array(
					'type' => 'email', 
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
				));
				echo $this->Form->input('phone_no', array('label' => array('class' => 'control-label', 'text' => 'Phone Number'),));			
				echo $this->Form->input('group_id', array('label' => array('class' => 'control-label', 'text' => 'Group/Role'), ));		
				echo $this->Form->input('password', array('label' => array('class' => 'control-label required', 'text' => 'New Password'.' <span style="color:red;">*</span>'),));			
				echo $this->Form->input('confirm_password', array(
						'type' => 'password',
						'label' => array('class' => 'control-label required', 'text' => 'Confirm New Password'.' <span style="color:red;">*</span>'), ));						
				echo $this->Form->input('is_active', array('label' => array('class' => 'control-label', 'text' => 'Is Active?'), ));		
				// echo $this->Form->input('is_admin', array('label' => array('class' => 'control-label', 'text' => 'Is Admin?'), ));		
				echo $this->Form->input('user_type', array('type' => 'select', 'label' => array('class' => 'control-label', 'text' => 'User Type'),
						'empty' => true, 'options' => ['Market Authority', 'County Pharmacist', 'Public Health Program']));
				echo $this->Form->input('sponsor_email', array('type' => 'email', 'label' => array('class' => 'control-label', 'text' => 'Sponsor email'),));
				?>
		</div><!--/span-->
		<div class="span6">
			<?php
				// echo $this->Form->input('group_id', array('label' => array('class' => 'control-label', 'text' => 'Group'), ));		
				echo $this->Form->input('designation_id', array('label' => array('class' => 'control-label', 'text' => 'Designation'),));	
				echo $this->Form->input('name_of_institution', array(
					'label' => array('class' => 'control-label', 'text' => 'Name of Institution'),
					'after'=>'<p class="help-block"> Start typing and suggestions will appear </p></div>',
				));	
				echo $this->Form->input('institution_code', array(
					'label' => array('class' => 'control-label', 'text' => 'Institution Code'),
					'after'=>'<p class="help-block"> Start typing and suggestions will appear </p></div>',
				));	
				echo $this->Form->input('institution_address', array('label' => array('class' => 'control-label', 'text' => 'Institution Address'),));			
				echo $this->Form->input('institution_contact', array('label' => array('class' => 'control-label', 'text' => 'Institution Contacts'),));			
				echo $this->Form->input('county_id', array(
									'label' => array('class' => 'control-label required', 'text' => 'County '), 
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));	
				echo $this->Form->input('initial_email', array(
													'type' => 'checkbox',  'class' => false, 'hiddenField' => false, 
													'label' => array('class' => 'control-label', 'text' => 'Turn off Notification Email?'),
													'between' => '<div class="controls"> <input type="hidden" value="0" id="UserInitialEmail_" name="data[User][initial_email]">
																	<label class="checkbox" style="color:#C09853; font-weight:normal">',
													'after' => 'Turn on/off the initial email sent after you create a report. Only the successful submit confirmation
																email will be sent. Check to turn off. Changes will take effect on next login.</label> </div>',));
			?>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>
	
	
	
	<?php echo $this->Form->end(array(
		'label' => 'Submit',
		'value' => 'Save',
		'class' => 'btn btn-primary',
		'id' => 'SadrSaveChanges',  
		'div' => array(
			'class' => 'form-actions',
		)
	));?>
	
		</div>
	</div>
</div>
</div>


