<?php 
	$this->assign('About', 'active');
	$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
	$this->Html->script('about', array('inline' => false));
	$this->Html->css('home', false, array('inline' => false));
 ?>

	<?php echo $content['Site']['content']; ?>