<?php
$this->assign('Faqs', 'active');
$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
$this->Html->script('about', array('inline' => false));
$this->Html->css('home', false, array('inline' => false));
$this->Html->css('pvers', false, array('inline' => false));
?>
<!-- <br><br><br> -->

<div class="row-fluid">

	<div class="span12">
		<?php echo $content['Site']['content']; ?>
	</div>
</div>
<div class="row-fluid">
	<div class="blank_faq"></div>
</div>