
      <!-- Login
    ================================================== -->
	<div class="row-fluid" style="margin-bottom: 9px;">	
			<div class="span12 columns">			
			<div class="row-fluid"> 	
				<div class="span12"> 					
				
					<div class="whmcscontainer">
						<div class="contentpadded">
							<div class="halfwidthcontainer">

								<div class="page-header">
									<div class="styled_title"><h1>Login</h1></div>
								</div>

								<?php 
								echo $this->Session->flash();
								echo $this->Form->create('User', array(
									'url' => array('action' => 'login', 'admin' => true ),
									//'action' => 'login',
									'class' => 'form-stacked',		
								));
								?>
									<div class="logincontainer">
										<div style="display:none;"><input type="hidden" value="POST" name="_method"></div>
										<fieldset>
											<div class="clearfix">
												<label for="username">Username</label>
												<div class="input">
													<input type="text" id="UserUsername" maxlength="255" class="xlarge" name="data[User][username]">
												</div>
											</div>

											<div class="clearfix">
												<label for="password">Password:</label>
												<div class="input">
													<input type="password" id="UserPassword" class="xlarge" name="data[User][password]">
												</div>
											</div>

											<div align="center">
											  <div class="loginbtn"><input class="btn primary" value="Login" type="submit"></div>
											  <div class="rememberme">
													<input name="rememberme" type="checkbox"> Remember Me
											  </div>
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
		</div> <!-- /row-fluid -->
				
	</div> <!-- /span6 -->		
</div> <!-- /row-fluid -->
