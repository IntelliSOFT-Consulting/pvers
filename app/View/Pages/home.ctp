<?php 
	$this->assign('Home', 'active');
	$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
	$this->Html->script('home', array('inline' => false));
	$this->Html->css('home', false, array('inline' => false));
 ?>

	<div class="row-fluid">
        
        <div class="span9">
			<div id="myCarousel" class="carousel slide" style="margin: 0px auto;">
	            <ol class="carousel-indicators hidden-xs hidden-sm" style="padding-bottom: 42px;">
	                <li data-target="#carcousel-example-generic" data-slide-to="0" class="active"></li>
	                <li data-target="#carcousel-example-generic" data-slide-to="1"></li>
	                <li data-target="#carcousel-example-generic" data-slide-to="2"></li>
	            </ol>
	            <div class="carousel-inner">
	                <div class="active item" align="center"><a href="#"><img src="http://lorempixel.com/1200/450/nature/" class="img-rounded" alt="PS3 reparatie Haarlem"></a>
	                    <div class="carousel-caption">
	                        <h4 style="color: #b74b4b;"><i>You need not be certain... just be suspicious!</i></h4>
                      		<p>Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event.</p>
	                    </div>
	                </div>
	                <div class="item" align="center"><a href="#"><img src="http://lorempixel.com/1200/450/nature/" class="img-rounded" alt="Blu-ray Lens reparatie"></a>
	                    <div class="carousel-caption">
	                        <h4 style="color: #b74b4b;">You need not be certain... just be suspicious!</h4>
                      		<p>Patient’s identity is held in strict confidence and program staff is not is not expected to and will not disclose reporter’s identity in response to any public request.</p>
	                    </div>
	                </div>
	                <div class="item" align="center"><a href="#"><img src="http://lorempixel.com/1200/450/nature/" class="img-rounded" alt="Yellow Light of Death"></a>
	                    <div class="carousel-caption">
	                        <h4 style="color: #b74b4b;">Your support towards the National Pharmacovigilance system is appreciated</h4>
                     		 <p>Information supplied by you will contribute to the improvement of drug safety and therapy in Kenya.</p>
	                    </div>
	                </div>
	            </div>
	            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
	            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	        </div>

	        <hr>

          <div class="row-fluid">
            <div class="span4">
              <h4>SUSPECTED ADVERSE DRUG REACTION</h4>
              <p>An Adverse Drug Reaction (ADR) is defined as a reaction that is noxious and unintended, and occurs at doses normally used in man for prophylaxis, diagnosis or treatment of a disease, or for modification of physiological function.</p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h4>POOR QUALITY MEDICINAL PRODUCTS</h4>
              <p>All healthcare professionals (clinicians, dentists, nurses, pharmacists, physiotherapists, community health workers etc) are encouraged to report. Patients (or their next of kin) may also report. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h4>ADVERSE EVENT FOLLOWING IMMUNIZATION</h4>
              <p>An adverse event following immunization (AEFI) is defined as any unfavorable medical occurrence which follows immunization and which may or may not be caused by the usage of the vaccine. The adverse event may be any unfavorable or unintended sign, abnormal laboratory finding, symptom or disease.</p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h4>MEDICATION ERROR REPORTING FORM</h4>
              <p>Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event.
Patient’s identity is held in strict confidence and program staff is not is not expected to and will not disclose reporter’s identity in response to any public request. 
 </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h4>MEDICAL DEVICES INCIDENT REPORTING </h4>
              <p>The Pharmacy and Poisons Board investigates all incidents reported to us in order to identify any faults with medical devices and to prevent similar incidents happening again. The Board may contact the manufacturer of this medical device to request they carry out an investigation. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h4>ADVERSE TRANSFUSION REACTION</h4>
              <p>
Information supplied by you will contribute to the improvement of drug safety and therapy in Kenya.
 </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
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

    </div><!--/row-->