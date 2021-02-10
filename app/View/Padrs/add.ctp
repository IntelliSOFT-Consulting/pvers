<?php
    $this->assign('PADR', 'active');        
    echo $this->Session->flash();
?>

<div class="row-fluid">
	<div class="span12">
		<h6>This form is meant for members of the public and patients to report adverse drug reactions, adverse events following vaccination, incidents involving medical devices or poor quality medicinal products. <br>
		<span class="badge badge-important"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> </span> Health care professionals should <a href="/users/register">register</a> 
		and submit reports after successfull <a href="/users/login">authentication</a>.</h6>
	</div>
</div>
<hr>
<?php 
  echo $this->element('padr/padr_edit'); 
?>
