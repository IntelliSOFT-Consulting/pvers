<?php
	$this->assign('Register', 'active');
	$this->Html->script('jquery/combobox', array('inline' => false));
	$this->Html->script('register', array('inline' => false));
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
				echo $this->Form->input('designation_id', array('label' => array('class' => 'control-label', 'text' => 'Designation'),));

				?>
		</div><!--/span-->
		<div class="span6">
			<?php
				// echo $this->Form->input('group_id', array('label' => array('class' => 'control-label', 'text' => 'Group'), ));
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

      			echo $this->Captcha->input('User', array('label' => false, 'type' => 'number'));
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

