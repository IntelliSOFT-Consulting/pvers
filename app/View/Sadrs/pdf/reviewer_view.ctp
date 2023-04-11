<?php
	$this->assign('SADR', 'active');
 ?>

      <!-- SADR
    ================================================== -->
<section id="sadrsview">
	<div class="row-fluid">
		<div class="span12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $sadr['Sadr']['reference_no']; ?></a></li>
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
							echo $this->Html->link('Download PDF', array('controller'=>'sadrs','action'=>'view', 'ext'=> 'pdf', $sadr['Sadr']['id']),
														array('class' => 'btn btn-primary mapop', 'title'=>'Download PDF',
														'data-content' => 'Download the pdf version of the report',));
						?>
					</div>
					<div class="span4">
						
					</div>
					<div class="span4">
						<?php
							
						?>
					</div>
				</div>
			</div>

			<?php echo $this->element('sadr/sadr_view');?>
			
		</div>
		</div>
		</div>
	</div>
</section>
