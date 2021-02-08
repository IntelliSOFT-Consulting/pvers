<?php 
	$this->assign('Home', 'active');
	$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
	$this->Html->script('home', array('inline' => false));
	$this->Html->script('holder/holder', array('inline' => false));
	$this->Html->css('landing', false, array('inline' => false));
 ?>



    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="/img/home/home1.png" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>3rd annual PROFORMA</h1>
              <p class="lead">Consortium meeting held in Nairobi on 10th February 2020.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/img/home/home2.png" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>RCORE</h1>
              <p class="lead">Regional Centre for Regulatory Excellence in Pharmacovigilance</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/img/home/home4.png" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>PV</h1>
              <p class="lead">Training of healthcare workers on Pharmacovigilance.</p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row-fluid">
        <div class="span2">
        	<a href="/users/login"><img src="/img/home/login.jpg" alt="" style="width: 140px; height: 140px;"></a>          
        </div><!-- /.span2 -->
        <div class="span2">
          <a href="/padrs/add"><img src="/img/home/report.jpg" alt="" style="width: 140px; height: 140px;"></a> 
          <h5>Report</h5>
          <p>For non-health workers.</p>
        </div><!-- /.span2 -->
        <div class="span2">
          <img src="/img/home/rules.jpeg" alt="" style="width: 140px; height: 140px;">
        </div><!-- /.span2 -->
        <div class="span2">
          <img src="/img/home/faq.png" alt="" style="width: 140px; height: 140px;">
        </div><!-- /.span2 -->
        <div class="span2">
          <img class="img-circle" data-src="holder.js/140x140?theme=sky&text=Who can report?">
                    
        </div><!-- /.span2 -->
        <div class="span2">
          <img class="img-circle" data-src="holder.js/140x140?theme=lava&text=What can you report on?">
        </div><!-- /.span2 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      	<hr><br>
      	<div>
        <h2 style="text-align: center;">Who can report?</h2><br>
	      	<div class="row-fluid">
	      		<div class="span6">
	      			<h5><i class="fa fa-user-md" aria-hidden="true"></i> Health care workers and professionals</h5>
	                <p><img src="/img/health2.png" style="width: 140px; margin-right: 10px;" class="pull-left"> All health care workers are required to <a href="/users/register">register</a> first before they can submit reports. The registration details will be used for communication and follow up.</p>
			              <p><a class="btn btn-success " href="/users/register">Register &raquo;</a></p>
	      		</div>
	      		<div class="span6">
	      			<h5><i class="fa fa-users" aria-hidden="true"></i> Any member of the public or patient </h5>
			         <p><img src="/img/public2.png" style="width: 140px; margin-right: 10px;" class="pull-left"> Any member of the public is able to report any cases of adverse drug reactions or incidents involving medical devices. For minors, parents/gaurdians can report on their behalf.</p>
			              <p><a class="btn btn-primary " href="/padrs/add">Report &raquo;</a></p>
	      		</div>
	      	</div>
      	</div>
      
      <hr> <br>
      	<div>
	      	<div class="row-fluid">
	      		<div class="span4">
	      			<h4 style="text-align: left;">What can you report on?</h4>
	                <p style="text-align: left;"><b>Adverse reactions caused by Drugs</b></p>
	                <p style="text-align: left;"><b>Public Adverse reactions caused by Drugs</b></p>
	                <p style="text-align: left;"><b>Poor Quality Medical Products</b></p>
	                <p style="text-align: left;"><b>Medication Errors</b></p>
	                <p style="text-align: left;"><b>Reactions caused by Transfusion</b></p>
	                <p style="text-align: left;"><b>Medical Devices Incidences</b></p>
	                <p style="text-align: left;"><b>Adverse Reactions caused by Immunization</b></p>
	      		</div>
	      		<div class="span8">
	      			<h4>What happens when you report?</h4>
			         <p> All the information is received in confidence and will only be accessed by designated PPB
						staff. The Board will investigate the cases and where possible, provide feedback on the
						status/outcome of the review. The details of the reporter will always remain anonymous.
						The information collected will be used to improve patient safety. <br>
						 <b>NOTE:</b> Patient’s identity is held in strict confidence and the designated PPB staff shall not
						disclose the reporter’s identity in response to any public request. Information submitted by
						you will contribute to the improvement of drug safety and therapy in Kenya.</p>
	      		</div>
	      	</div>
      	</div>

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
      </footer>

    </div><!-- /.container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
