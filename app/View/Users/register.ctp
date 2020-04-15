<?php
	$this->start('banner');
 	$this->Html->script('widgets', array('inline' => false));
	$this->Html->script('user', array('inline' => false));
?>
<header class="jumbotron subhead" id="overview">
	<div id="subheader">
		<h2>Register</h2>
		<!-- --><p class="lead">
		<div class="subnav">
			<ul class="nav nav-pills">
				<li><?echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
				<li class="active"><?echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?></li>
				<li><?echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'changePassword')); ?></li>
				<li><?echo $this->Html->link('Forgot Password?', array('controller' => 'users', 'action' => 'forgotPassword')); ?></li>
			</ul>
		</div>
	</div>
</header>
<?php
	$this->end();
	$this->assign('LOGIN', 'active');
 ?>

<div class="row-fluid">
	<div class="span12">

	<div class="whmcscontainer">
    <div class="contentpadded">

			<div class="page-header">
				<div class="styled_title"><h1>Register</h1></div>
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

		// echo $this->Form->error('SadrListOfDrug.1.drug_name');
		// print_r( $this->request->data['SadrListOfDrug']);
	?>



	<div class="row-fluid">
		<div class="span6">
			<?php
				echo $this->Form->input('username', array('label' => array('class' => 'control-label required', 'text' => 'Username'),));
				echo $this->Form->input('password', array('label' => array('class' => 'control-label required', 'text' => 'Password'),));
				echo $this->Form->input('confirm_password', array(
						'type' => 'password',
						'label' => array('class' => 'control-label required', 'text' => 'Confirm Password'), ));
				echo $this->Form->input('name', array('label' => array('class' => 'control-label required', 'text' => 'Name'),));
				echo $this->Form->input('email', array(
					'type' => 'email',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
				));
				echo $this->Form->input('phone_no', array('label' => array('class' => 'control-label', 'text' => 'Phone Number'),));

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



	<?php
		echo $this->Form->input('bot_stop', array(
								'div' => array('style' => 'display:none')
							));
		echo $this->Form->end(array(
			'label' => 'Submit',
			'value' => 'Save',
			'class' => 'btn btn-primary',
			'id' => 'SadrSaveChanges',
			'div' => array(
				'class' => 'form-actions',
			)
		));
	?>
		</div>
	</div>
</div>
</div>

