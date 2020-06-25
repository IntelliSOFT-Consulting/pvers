<?php
	$this->assign('SADR', 'active');
	$this->Html->script('jquery/jqprint.0.3', array('inline' => false));
 ?>

      <!-- SADR
    ================================================== -->
<section id="sadrsview">
	<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php echo $sadr['Sadr']['reference_no']; ?></a></li>
			<li></li>
	</ul>
	<?php
		echo $this->Session->flash();
	?>
	<div class="row-fluid">		
		<div class="span10">
			<?php echo $this->element('sadr/sadr_view');?>
		</div>
		<div class="span2">
			<?php
					echo $this->Html->link('Download PDF', array('controller'=>'sadrs','action'=>'view', 'ext'=> 'pdf', $sadr['Sadr']['id']),
											array('class' => 'btn btn-primary btn-block mapop', 'title'=>'Download PDF',
											'data-content' => 'Download the pdf version of the report',));
			?>
			<hr>
			<?php
					echo $this->Form->button('Print Report', array('type' => 'button', 'class'=>'btn btn-inverse btn-block btnPrint' ,
											'onclick' => '$(\'#printAreade\').jqprint(); '
											));
			?>

		</div>
	</div>
</section>
