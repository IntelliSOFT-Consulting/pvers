<?php 
	$this->assign('SADR', 'active');
 ?>

      <!-- SADR
    ================================================== -->
    <section id="sadrsadd">
	<div class="page-header">
		<h2>User Profile  <small><?php echo $this->Session->read('Auth.User.username') ?></small></h2>
	</div>	 
	
	<div class="row-fluid">	
		<div class="span3 columns">
				<h3>Welcome to your profile</h3>
				<hr>	
				<p>Thank you for being a registered user. As a registered user, you stand to have many benefits while using the system.</p>
				<p>For example, you are able to view reports that you submitted while being logged in and export the data</p>
		</div> <!-- /span5 -->

		<div class="span5 columns">			
			 <h3>Registration details</h3>
			 <hr>
			  <dl class="dl-horizontal">
				<dt>Username</dt>
				<dd><?php echo $this->Session->read('Auth.User.username') ?> &nbsp; </dd>
				<dt>Name</dt>
				<dd><?php echo $this->Session->read('Auth.User.name') ?> &nbsp; </dd>
				<dt>Email</dt>
				<dd><?php echo $this->Session->read('Auth.User.email') ?> &nbsp; </dd>
				<dt>Phone No</dt>
				<dd><?php echo $this->Session->read('Auth.User.phone_no') ?> &nbsp; </dd>
				<dt>Designation</dt>
				<dd><?php echo ($designation['Designation']['name']) ?> &nbsp;</dd>
				<dt>Name of institution</dt>
				<dd><?php echo $this->Session->read('Auth.User.name_of_institution') ?>&nbsp; </dd>
				<dt>Institution Code</dt>
				<dd><?php echo $this->Session->read('Auth.User.institution_code') ?> &nbsp; </dd>
				<dt>Institution Address</dt>
				<dd><?php echo $this->Session->read('Auth.User.institution_address') ?> &nbsp; </dd>
				<dt>Institution Contact</dt>
				<dd><?php echo $this->Session->read('Auth.User.institution_contact') ?> &nbsp; </dd>
				<dt>County</dt>
				<dd><?php if(!empty($user->county_id)) echo ($county['County']['county_name']) ?> &nbsp; </dd>
				<dt></dt>
				<dd>
					<?php echo $this->Html->link('edit', array('action' => 'edit', $this->Session->read('Auth.User.id')), array('class' => 'btn btn-primary')); ?>
				</dd>
			  </dl>
			  <hr>	
		</div> <!-- /span6 -->
		<div class="span4 columns">
			<h3>Change Password<small> If you want</small></h3>
			<hr>	 
			<?php 	
				echo $this->Form->create('User', array(
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
				
				echo $this->Form->input('old_password', array(
							'type' => 'password',
							'label' => array('class' => 'control-label required', 'text' => 'Old Password'.' <span style="color:red;">*</span>'),
							'div' => array('class' => 'control-group'),
							'after'=>'<p class="help-block"> Your current password! </p></div>',				
				));			
				echo $this->Form->input('password', array('label' => array('class' => 'control-label required', 'text' => 'New Password'.' <span style="color:red;">*</span>'),));			
				echo $this->Form->input('confirm_password', array(
						'type' => 'password',
						'label' => array('class' => 'control-label required', 'text' => 'Confirm New Password'.' <span style="color:red;">*</span>'), ));

				echo $this->Form->end(array(
						'label' => 'Change',
						'value' => 'Change',
						'onclick'=>"return confirm('Are you sure you wish to change your password?');",
						'class' => 'btn btn-primary tooltipper',
						'id' => 'UserChangePassword', 
						'div' => array(
							'class' => 'form-actions',
						)
					));
				?>	
		</div> <!-- /span4 -->
	   </div> <!-- /row-fluid -->
	</section>