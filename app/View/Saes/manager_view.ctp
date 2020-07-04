<?php
	$this->assign('SAE', 'active');
 ?>

      <!-- SAE
    ================================================== -->
<section id="saesview">
	<div class="row-fluid">
		<div class="span12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">Initial Report ID: <?php 	echo $sae['Sae']['id']; ?></a></li>
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
							echo $this->Html->link('Download PDF', array('controller'=>'saes','action'=>'view', 'ext'=> 'pdf', $sae['Sae']['id']),
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
								
						?>
					</div>
				</div>
			</div>

			<?php echo $this->element('sae/sae_view');?>
			
		</div>
		</div>
		</div>
	</div>
</section>
