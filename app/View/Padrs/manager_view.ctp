<?php
$this->assign('PADR', 'active');
// $this->Html->script('jquery/jqprint.0.3', array('inline' => false));
?>

<!-- PADR
    ================================================== -->
<section id="padrsview">
	<?php
	echo $this->Session->flash();
	?>
	<div class="row-fluid">
		<div class="span10">
			<?php echo $this->element('padr/padr_view'); ?>
		</div>
		<div class="span2">
			<div>
				<?php
				echo $this->Html->link(
					'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF',
					array('controller' => 'padrs', 'action' => 'view', 'ext' => 'pdf', $padr['Padr']['id']),
					array(
						'class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',
						'escape' => false,
						'data-content' => 'Download the pdf version of the report',
					)
				);
				?>
			</div>

			<div class="amend-form">
				<?php

				if (!empty($padr['Padr']['assigned_to'])) { ?>
					<h5 class="text-info"><u>Report Assigned to</u></h5>
					<div class="row-fluid">
						<div class="span4 center">
							<h6>1. <?= $managers[$padr['Padr']['assigned_to']]; ?> </h6>
							<span><?php
									echo $this->Html->link(
										'Unassign Report',
										array('controller' => 'padrs', 'action' => 'unassign', $padr['Padr']['id']),
										array(
											'class' => 'btn btn-primary mapop', 'title' => 'Unassign Report',
											'data-content' => 'Download the pdf version of the report',
										)
									) ?></span>
						</div>
					<?php
				} else {
					?>
						<h5 class="text-info"><u>Assign Report</u></h5>
						<div class="row-fluid">
							<div class="span4 center">
								<?php
								echo $this->Form->create('Padr', array(
									'url' => array(
										'controller' => 'padrs',
										'action' => 'assign',

									),
									'type' => 'file',
									'class' => false,
									'inputDefaults' => array(
										'div' => array('class' => 'control-group'),
										'label' => array('class' => 'control-label'),
										'between' => '<div class="controls">',
										'after' => '</div>',
										'class' => '',
										'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
										'error' => array('attributes' => array('class' => 'controls help-block')),
									),
								));
								?>
								<?php
								echo $this->Form->input('assigned_by', ['type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')]);
								echo $this->Form->input('report_id', ['type' => 'hidden', 'value' => $padr['Padr']['id']]);
								echo $this->Form->input('assigned_to', ['label' => array('class' => 'required'), 'options' => $managers]);
								echo $this->Form->input('content', ['label' => array('class' => 'required', 'text' => 'Reminder Note'), 'type' => 'textarea']);
								?>
								<div class="form-group">
									<div class="span12">
										<button type="submit" class="btn btn-success active"><i class="fa fa-save" aria-hidden="true"></i> Assign</button>
									</div>
								</div>
								<?php echo $this->Form->end() ?>

							</div>
						</div>
					<?php
				}
					?>
					</div>
			</div>
			<hr>
		</div>
	</div>
</section>