<?php
	$this->assign('PQMP', 'active');
	$this->Html->script('jquery/jqprint.0.3', array('inline' => false));
 ?>

      <!-- PQMP
    ================================================== -->
<section id="pqmpsview">
	<div class="row-fluid">
		<div class="span12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $pqmp['Pqmp']['reference_no']; ?></a></li>
			<li></li>
		</ul>
		<?php
			echo $this->Session->flash();
		?>
		<div class="row-fluid">
			<div class="span10">
				<?php echo $this->element('pqmp/pqmp_view');?>
			</div>
			<div class="span2">
				<?php
					echo $this->Html->link('Download PDF', array('controller'=>'pqmps','action'=>'view', 'ext'=> 'pdf', $pqmp['Pqmp']['id']),
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
					if($pqmp['Pqmp']['submitted'] > 1) {
						echo $this->Html->link('Edit Report', '#', array(
							'name' => 'continueEditing',
							'class' => 'btn btn-block mapop disabled',
							'id' => 'PqmpContinueReport', 'title'=>'Submitted Report!',
							'data-content' => 'This report has been submitted to PPB and cannot be edited',
							'div' => false,
						));
					} else {
						echo $this->Html->link('Edit Report', array('action' => 'edit', $pqmp['Pqmp']['id']), array(
							'name' => 'continueEditing',
							'class' => 'btn btn-block mapop',
							'id' => 'PqmpContinueReport', 'title'=>'Edit Report',
							'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
							'div' => false,
						));
					}
				?>

			</div>
		</div>
		</div>
	</div>
</section>
