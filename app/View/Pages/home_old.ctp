<?php 
	echo $this->Html->css('homepage');
	$this->start('banner');
		echo $this->element('home/banner');
	$this->end(); 
	$this->assign('Home', 'active');
 ?>


	<div class="row-fluid">
		<div class="span6 feature-block">
			<h2><span class="slash">//</span> Report a Suspected Adverse Drug Reaction</h2>
				
			<p>
				An Adverse Drug Reaction (ADR) is defined as a response to a drug which is noxious and unintended, and which occurs at 
				doses normally used in humans for the prophylaxis, diagnosis or therapy of disease, or for the modification of physiological function.

				If you suspect any untoward effect of your medicine, you are encouraged to report using the Suspected Adverse Drug Reaction Notification Form. 
				This form has two sides- front and back- to which you are requested to refer.

				Report even if:
				You are not certain if the drug caused the reaction
				You do not have all the details
				<p class="landing-actions">
					<?php echo $this->Html->link(__('Report!'), array('controller' => 'sadrs', 'action' => 'add'), array('class' => 'btn btn-large btn-inverse'));?>
				</p>
			</p>
		</div> <!-- /span6 -->

		<div class="span6 feature-block">
			<h2><span class="slash">//</span> Report a Poor Quality Medicinal Product</h2>
			<p>
					If you have received any medicine and are not happy with its QUALITY, you are encouraged to report the same using the Form 
					for Reporting Poor Quality Medicinal Products .

					Common quality problems include:
					Change in colour or smell
					Crumbling
					Moulding
					Mislabelling
					Incomplete pack
				<p class="landing-actions">
					<?php echo $this->Html->link(__('Report!'), array('controller' => 'pqmps', 'action' => 'add'), array('class' => 'btn btn-large btn'));?>
				</p>

			</p>
		</div> <!-- /span6 -->
</div> <!-- /span6 -->


