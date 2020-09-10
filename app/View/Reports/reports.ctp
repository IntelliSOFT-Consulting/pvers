<?php
  $this->assign('Reports', 'active');        
  echo $this->Session->flash();
  // $this->Html->css('comments', null, array('inline' => false));
  $this->Html->script('highcharts/highcharts', array('inline' => false));
  $this->Html->script('highcharts/modules/data', array('inline' => false));
  $this->Html->script('highcharts/modules/exporting', array('inline' => false));
  $this->Html->script('highcharts/modules/export-data', array('inline' => false));
?>


<div class="row-fluid">
	<div class="span2">
		<?php echo $this->element('menus/report_sidebar'); ?>
	</div>
	<div class="span10">
		<?php echo $this->fetch('report'); ?>
	</div>
</div>