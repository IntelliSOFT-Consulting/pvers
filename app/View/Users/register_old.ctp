<?php 
	$this->start('banner');
?>
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Register</h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<?php
	$this->end(); 
	$this->assign('LOGIN', 'active');
 ?>

<div class="span12">
	<div class="topbar">
	  <div class="fill">
		<div class="whmcscontainer">
		  <ul>
			<li><?echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
		  </ul>
		  <ul>
			<li class="active"><?echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?></li>
		  </ul>
		  <?php if($this->Session->read('Auth.User')) { ?>
		  <ul>
				<li class="menu">
				  <a href="#" class="menu">Account</a>
				  <ul class="menu-dropdown">
						<li><a href="https://www.ssdnodes.com/manage/clientarea.php">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="https://www.ssdnodes.com/manage/pwreset.php">Forgot Password?</a></li>
				  </ul>
				</li>
		  </ul>
		  <ul>
				<li><a href="https://www.ssdnodes.com/manage/submitticket.php?step=2&amp;deptid=1">Profile</a></li>
		  </ul>
		  <?php } ?>
		</div>
	  </div>
	</div>   	

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
				echo $this->Form->input('username', array('label' => array('class' => 'control-label', 'text' => 'Username'),));
				echo $this->Form->input('password', array('label' => array('class' => 'control-label', 'text' => 'Password'),));			
				echo $this->Form->input('confirm_password', array(
						'type' => 'password',
						'label' => array('class' => 'control-label', 'text' => 'Confirm Password'), ));
				echo $this->Form->input('name', array('label' => array('class' => 'control-label', 'text' => 'Name'),));			
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
				echo $this->Form->input('name_of_institution', array('label' => array('class' => 'control-label', 'text' => 'Name of Institution'),));			
				echo $this->Form->input('institution_code', array('label' => array('class' => 'control-label', 'text' => 'Institution Code'),));			
				echo $this->Form->input('institution_address', array('label' => array('class' => 'control-label', 'text' => 'Institution Address'),));			
				echo $this->Form->input('institution_contact', array('label' => array('class' => 'control-label', 'text' => 'Institution Contacts'),));			
				echo $this->Form->input('ward', array('label' => array('class' => 'control-label', 'text' => 'Ward / Clinic'),));			
		
			?>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>
	
	
	
	<?php echo $this->Form->end(array(
		'label' => 'Save changes',
		'value' => 'Save',
		'class' => 'btn btn-primary',
		'id' => 'SadrSaveChanges', 'title'=>'Save & continue editing', 
		'data-content' => 'Save changes to form without submitting it. 
																The form will still be available for further editing.',
		'div' => array(
			'class' => 'form-actions',
		)
	));?>
	
		</div>
	</div>
</div>

