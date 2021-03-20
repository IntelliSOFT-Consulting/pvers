<?php
	$this->assign('MEDICATION', 'active');
	$this->Html->script('jqprint.0.3', array('inline' => false));
 ?>

      <!-- MEDICATION
    ================================================== -->
<section id="medicationsview">
	<div class="row-fluid">
		<div class="span12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $medication['Medication']['id']; ?></a></li>
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
							echo $this->Html->link('Download PDF', array('controller'=>'medications','action'=>'view', 'ext'=> 'pdf', $medication['Medication']['id']),
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
								if($medication['Medication']['submitted'] > 1) {
									echo $this->Html->link('Edit Report', '#', array(
										'name' => 'continueEditing',
										'class' => 'btn mapop disabled',
										'id' => 'MedicationContinueReport', 'title'=>'Submitted Report!',
										'data-content' => 'This report has been submitted to PPB and cannot be edited',
										'div' => false,
									));
								} else {
									echo $this->Html->link('Edit Report', array('action' => 'edit', $medication['Medication']['id']), array(
										'name' => 'continueEditing',
										'class' => 'btn mapop',
										'id' => 'MedicationContinueReport', 'title'=>'Edit Report',
										'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
										'div' => false,
									));
								}
						?>
					</div>
				</div>
			</div>

			<?php echo $this->element('medication/medication_view');?>
			
		</div>
		</div>
		</div>
	</div>
</section>
