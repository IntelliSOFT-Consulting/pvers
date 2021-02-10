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
          <img src="/img/home/sadr3.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>SADR</h1>
              <p class="lead">Suspected Adverse Drug Reaction Reporting Form.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/img/home/aefi5.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>AEFI</h1>
              <p class="lead">Adverse Event Following Immunization.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/img/home/devices1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>MEDICAL DEVICES</h1>
              <p class="lead">Medical Devices Incident Reporting Form.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/img/home/medication2.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>MEDICAL ERROR</h1>
              <p class="lead">Medication Error Reporting Form.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/img/home/pqmp.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>PQMP</h1>
              <p class="lead">Poor-Quality Medical Products and Health Technologies.</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/img/home/transfusion2.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>TRANSFUSION REACTION</h1>
              <p class="lead">Adverse Transfusion Reaction Form.</p>
            </div>
          </div>
        </div>
        <div class="item">
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

      <div class="row-fluid">
        <div class="span2">
        	<a href="/users/login"><img src="/img/home/login6.jpg" alt="" style="width: 140px; height: 140px;"></a>          
        </div><!-- /.span2 -->
        <div class="span10">
          <div class="row-fluid">
            <div class="span2"><a href="/padrs/add"><img src="/img/home/report5.png" alt="" style="width: 140px; height: 140px;"></a></div>
            <div class="span2"><a href="https://www.pharmacyboardkenya.org/downloads" target="_blank"><img class="img-circle" data-src="holder.js/130x130?theme=social&text=Guidelines on safety reporting"></a></div>
            <div class="span2"><a href="/pages/faqs"><img src="/img/home/faq2.jpg" alt="" style="width: 140px; height: 140px;"></a></div>
            <div class="span2"><a href="https://www.pharmacyboardkenya.org/pharmacovigilance" target="_blank"><img class="img-circle" data-src="holder.js/130x130?theme=industrial&text=Safety alerts"></a></div>
            <div class="span2"><a href="#whocanreport"><img class="img-circle" data-src="holder.js/130x130?theme=sky&text=Who can report?"></a></div>
            <div class="span2"><a href="#whatyoureport"><img class="img-circle" data-src="holder.js/130x130?theme=lava&text=What can you report on?"></a></div>
          </div>
        </div>
        <!-- <div class="span2">
          <a href="https://www.pharmacyboardkenya.org/downloads" target="_blank"><img src="/img/home/rules3.jpg" alt="" style="width: 140px; height: 140px;"></a>
          <a href="https://www.pharmacyboardkenya.org/downloads" target="_blank"><img class="img-circle" data-src="holder.js/130x130?theme=social&text=Guidelines on safety reporting"></a>
        </div>
        <div class="span2">
          <a href="/pages/faqs"><img src="/img/home/faq2.jpg" alt="" style="width: 140px; height: 140px;"></a>
        </div>
        <div class="span2">
          <a href="#whocanreport"><img class="img-circle" data-src="holder.js/130x130?theme=sky&text=Who can report?"></a>                    
        </div>
        <div class="span2">
          <a href="#whatyoureport"><img class="img-circle" data-src="holder.js/130x130?theme=lava&text=What can you report on?"></a>
        </div> -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      	<hr><br>
      	<div id="whocanreport">
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
      	<div id="whatyoureport">
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
