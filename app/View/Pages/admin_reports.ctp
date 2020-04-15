<?php
	$this->assign('SADR', 'active');
?>
<!-- Using Javascript w/ Bootstrap
      ================================================== -->
	<div class="page-header">
	  <h1>REPORTS <small>SADR and PQMP reports, Download in E2B, CSV or PDF</small></h1>
	</div>
      <div class="row-fluid">
        <div class="span4">
			<h3>
				<?php echo $this->Html->link('SADR', array('controller' => 'sadrs', 'action' => 'index', 'admin' => true )); ?>  <small>(initial)</small>
			</h3>
			<p>Download ...</p>
			
		</div>
        <div class="span4">
			<h3>
				<?php echo $this->Html->link('SADR', array('controller' => 'sadr_followups', 'action' => 'index', 'admin' => true )); ?>  <small>(follow up)</small>
			</h3>
			<p>Download ...</p>
			
		</div>
        <div class="span4">
			<h3>
				<?php echo $this->Html->link('PQMP', array('controller' => 'pqmps', 'action' => 'index', 'admin' => true )); ?> 
			</h3>
			<p>Download ...</p>
			
		</div>
      </div> <!-- /row -->
      <hr>
    </section>