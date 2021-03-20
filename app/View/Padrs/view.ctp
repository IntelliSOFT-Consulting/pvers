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
			<?php echo $this->element('padr/padr_view');?>
		</div>
		<div class="span2">
			<?php
				echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF', array('controller'=>'padrs','action'=>'view', 'ext'=> 'pdf', $padr['Padr']['token']),
								array('class' => 'btn btn-primary btn-block mapop', 'title'=>'Download PDF',
									'escape' => false,
											'data-content' => 'Download the pdf version of the report',));
			?>
			<hr>
			<?php
				// echo $this->Form->button('<i class="fa fa-print" aria-hidden="true"></i> Print Report', array('type' => 'button', 'class'=>'btn btn-inverse btn-block btnPrint', 'escape' => false,
				// 							'onclick' => '$(\'#printAreade\').jqprint(); '
				// 							));
			?>
			<p class="help-block">Do you have more information on the reaction?</p>
			<?php
					if($padr['Padr']['token']) {
						// echo $this->Html->link('Followup Report', array('action' => 'followup', $padr['Padr']['token']), array(
						// 	'name' => 'continueEditing',
						// 	'class' => 'btn  btn-block mapop',
						// 	'id' => 'PadrContinueReport', 'title'=>'Edit Report',
						// 	'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
						// 	'div' => false,
						// ));
						echo $this->Form->postLink(__('Followup Report'), array('action' => 'followup', $padr['Padr']['token']), array('escape' => false, 'class' => 'btn btn-block'), __('Are you sure you want to create a follow up report for %s?', $padr['Padr']['reference_no']));
					}
			?>
		</div>
	</div>
</section>
