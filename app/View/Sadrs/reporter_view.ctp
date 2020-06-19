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
			<hr>
			<?php
					if($sadr['Sadr']['submitted'] > 1) {
						echo $this->Html->link('Edit Report', '#', array(
							'name' => 'continueEditing',
							'class' => 'btn  btn-block mapop disabled',
							'id' => 'SadrContinueReport', 'title'=>'Submitted Report!',
							'data-content' => 'This report has been submitted to PPB and cannot be edited',
							'div' => false,
						));
					} else {
						echo $this->Html->link('Edit Report', array('action' => 'edit', $sadr['Sadr']['id']), array(
							'name' => 'continueEditing',
							'class' => 'btn  btn-block mapop',
							'id' => 'SadrContinueReport', 'title'=>'Edit Report',
							'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
							'div' => false,
						));
					}
			?>
		</div>
	</div>
</section>
