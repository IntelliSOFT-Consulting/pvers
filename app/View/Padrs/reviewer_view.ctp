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
 
			<hr>
		</div>
	</div>
</section>