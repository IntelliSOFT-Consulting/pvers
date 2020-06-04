<?php 
	$this->assign('LOGIN', 'active');
    $this->Html->css('compatibility_hacks', null, array('inline' => false));
 ?>

   <!-- FORGOT PASSWORD
================================================== -->
<section id="loginform"> 
	<div class="row-fluid">
	 <div class="span12">
		
		<ul class="nav nav-tabs">
			<li><?php 	echo $this->Html->link('Login Area', array('controller' => 'users', 'action' => 'login')); ?></li>
			<li class="active"><a href="#">Forgot Password?</a></li>
			<?php if ($this->Session->read('Auth.User')) { ?>
				<li><?php 	echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'changePassword')); ?></li>
			<?php } ?>
		</ul>
		
		<div class="whmcscontainer">
			<div class="contentpadded">
				<div class="halfwidthcontainer">

					<div class="page-header">
						<div class="styled_title"><h1>Lost Password Reset</h1></div>
					</div>

					<?php 
					echo $this->Session->flash();
					echo $this->Form->create('User', array(
						'class' => 'form-stacked',		
					));
					?>
						<p>If you have forgotten your password, you can reset it here. 
							Fill in your registered email address and submit. You will be sent instructions on how to reset your password.</p>
						<div class="logincontainer">
							<div style="display:none;"><input type="hidden" value="POST" name="_method"></div>
							<fieldset>
								<div class="clearfix">
									<label for="email">Email Address</label>
									<div class="input">
										<input type="text" id="UserEmail" maxlength="255" class="span10" name="data[User][email]">
									</div>
								</div>


								<div align="center">
								  <div class="loginbtn"><input class="btn btn-primary" value="Submit" type="submit"></div>
								  <br>
								  <br>
								</div>

							</fieldset>

						</div>
					<?php
						echo $this->Form->end();
					?>
				</div>
			</div>
		</div>
	  </div>
	</div>
</section>
