<?php
	$this->assign('AEFI', 'active');
	$this->Html->script('jqprint.0.3', array('inline' => false));
 ?>

      <!-- AEFI
    ================================================== -->
<section id="aefisview">
	<div class="row-fluid">
		<div class="span12">
		<?php echo $this->Html->link('<< List AEFIS', array('controller'=>'aefis', 'action'=>'index'), array('class' => 'btn-link')); ?>
		<br>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $aefi['Aefi']['id']; ?></a></li>
			<li></li>
		</ul>
		<?php
			echo $this->Session->flash();
		?>
		<div class="row-fluid" id="abonokode">
		<div class="span12">
			<div class="form-actions">
				<div class="row-fluid">
					<div class="span4">
						<?php
							echo $this->Html->link('Download PDF', array('controller'=>'aefis','action'=>'view', 'ext'=> 'pdf', $aefi['Aefi']['id']),
														array('class' => 'btn btn-primary mapop', 'title'=>'Download PDF',
														'data-content' => 'Download the pdf version of the report',));
						?>
					</div>
					<div class="span4">
						<?php
								echo $this->Form->button('Print Report', array('type' => 'button', 'class'=>'btn btn-inverse btnPrint' ,
														'onclick' => '$(\'#printAreade\').jqprint(); '
														));
						?>
					</div>
					<div class="span4">
						<?php
								if($aefi['Aefi']['submitted'] > 1) {
									echo $this->Html->link('Edit Report', '#', array(
										'name' => 'continueEditing',
										'class' => 'btn mapop disabled',
										'id' => 'AefiContinueReport', 'title'=>'Submitted Report!',
										'data-content' => 'This report has been submitted to PPB and cannot be edited',
										'div' => false,
									));
								} else {
									echo $this->Html->link('Edit Report', array('action' => 'edit', $aefi['Aefi']['id']), array(
										'name' => 'continueEditing',
										'class' => 'btn mapop',
										'id' => 'AefiContinueReport', 'title'=>'Edit Report',
										'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
										'div' => false,
									));
								}
						?>
					</div>
				</div>
			</div>

			<?php echo $this->element('aefi/aefi_view');?>
			
		</div>
		</div>
		</div>
	</div>
</section>
