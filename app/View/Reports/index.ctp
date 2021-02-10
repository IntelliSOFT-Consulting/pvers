<?php
  $this->extend('/Reports/reports');
  $this->assign('reports-home', 'active');
	$this->assign('Summaries', 'active');
?>

<?php $this->start('report'); ?>

<div class="row-fluid">
  <div class="span12">
    <h3 class="text-success">Reports</h3>
    <p>Select a report on the left hand side to get started</p>
  </div>
</div>

<?php $this->end(); ?>
