<?php
	$this->assign('DEVICE', 'active');
 ?>

      <!-- DEVICE
    ================================================== -->
<section id="devicesview">
	<div class="row-fluid">
		<div class="span12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $device['Device']['reference_no']; ?></a></li>
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
							echo $this->Html->link('Download PDF', array('controller'=>'devices','action'=>'view', 'ext'=> 'pdf', $device['Device']['id']),
														array('class' => 'btn btn-primary mapop', 'title'=>'Download PDF',
														'data-content' => 'Download the pdf version of the report',));
						?>
					</div>
					<div class="span4">
						<?php
								
						?>
					</div>
					<div class="span4">
						<?php
								if($device['Device']['submitted'] > 1) {
									echo $this->Html->link('Edit Report', '#', array(
										'name' => 'continueEditing',
										'class' => 'btn mapop disabled',
										'id' => 'DeviceContinueReport', 'title'=>'Submitted Report!',
										'data-content' => 'This report has been submitted to PPB and cannot be edited',
										'div' => false,
									));
								} else {
									echo $this->Html->link('Edit Report', array('action' => 'edit', $device['Device']['id']), array(
										'name' => 'continueEditing',
										'class' => 'btn mapop',
										'id' => 'DeviceContinueReport', 'title'=>'Edit Report',
										'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
										'div' => false,
									));
								}
						?>
					</div>
				</div>
			</div>

			<?php echo $this->element('device/device_view');?>
			
		</div>
		</div>
		</div>
	</div>
</section>
