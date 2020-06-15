<?php 
	$this->assign('Home', 'active');
	$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
	$this->Html->script('home', array('inline' => false));
	$this->Html->css('home', false, array('inline' => false));
 ?>

 	<h3 class="text-success text-center">Pharmacy and Poisons Board: <span class="text-info">Pharmacovigilance reporting system</span> <small class="muted">(PvERS)</small> </h3>
 	<hr class="soften">
	<div class="row-fluid">
        
        <div class="span9">
			

          <div class="row-fluid">
            <div class="span12">
              
              
              <p>You can report any cases of:
              	  <br>&nbsp;1. <strong>adverse drug reactions</strong> (side effects)
              	  <br>&nbsp;2. Poor quality medicines or devices 
              	  <br>&nbsp;3. Incidents and errors during medication, vaccination or blood transfusion.</p>
              <p>The Board will investigate the cases and where possible, provide feedback on the status/outcome of the review.</p>
              <p><span class="label label-important"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> NOTE:</span> Patient's identity is held in strict confidence and programme staff is not expected to and will not disclose the reporter's identity in response to any public request. Information submitted by you will contribute to the improvement of drug safety and therapy in Kenya. 
                <a class="btn btn-link" href="/pages/about">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->

          <div class="row-fluid">
          	<div class="span8">          		
		          <h3 class="text-success text-center" style="text-decoration: underline;">Who can report?</h3>
		          <div class="row-fluid">
		            <div class="span6">
		              <h5><i class="fa fa-user-md" aria-hidden="true"></i> Health care workers and professionals</h5>
		           		
		              <p><img src="/img/health2.png" style="width: 140px; margin-right: 10px;" class="pull-left"> All health care workers are required to <a href="/users/register">register</a> first before they can submit reports. The registration details will be used for communication and follow up.</p>
		              <p><a class="btn btn-success " href="/users/register">Register &raquo;</a></p>
		            </div><!--/span-->
		            <div class="span6">
		              <h5><i class="fa fa-users" aria-hidden="true"></i> Any member of the public or patient </h5>
		           		
		              <p><img src="/img/public2.png" style="width: 140px; margin-right: 10px;" class="pull-left"> Any member of the public is able to report any cases of adverse drug reactions or incidents involving medical devices. For minors, parents/gaurdians can report on their behalf.</p>
		              <p><a class="btn btn-primary " href="/padrs/add">Report &raquo;</a></p>
		            </div><!--/span-->
		          </div><!--/row-->
	        </div><!--/span-->
          	<div class="span4">
          		<h4 class="text-warning">What happens when you report..</h4>
          		<p>The information collected will be used to improve patient safety. All the information is received <span class="text-danger">in confidence</span> and will only be accesssed by PPB staff. The details of the reporter will always remain <strong>anonymous</strong>.</p>
          	</div>
          </div>

    	</div><!--/row-->

        <?php if($this->Session->read('Auth.User')) { ?>
	        <div class="span3">  
	        	<ul class="nav nav-tabs nav-stacked">
	              <li class="active"><a href="#">Home</a></li>
	              <li><a href="#">Profile</a></li>
	              <li><a href="#">Messages</a></li>
            	</ul>
            </div>
        <?php } else { ?>
        <div class="span3 well">        	
            <legend style="text-align: center;" class="text-success"> <i class="fa fa-key"></i> Sign in</legend>
			<form method="POST" action="/users/login" accept-charset="UTF-8">
				<div class="input-prepend">
				  <span class="add-on"><i class="fa fa-user"></i> </span>
				  <input  name="data[User][username]" id="prependedInput" type="text" placeholder="Username/Email">
				</div>
				<div class="input-prepend">
				  <span class="add-on"><i class="fa fa-lock"></i> </span>
				  <input name="data[User][password]" id="prependedInput" type="password" placeholder="Password">
				</div>
	            <button type="submit" name="submit" class="btn btn-info btn-block">Sign in!</button><br/>
	            <label class="checkbox">
	                <input type="checkbox" name="remember" value="1"> Remember me
	            </label><br/>
	            <small><a href="/users/register">Sign up!</a>
	            <a href="/users/forgotPassword" class="pull-right">Forgot password?</a></small>
			</form> 
		</div>
		<?php } ?>
    </div><!--/row-->