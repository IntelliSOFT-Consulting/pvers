<?php
    $this->assign('ContactUs', 'active');
?>

   <!-- Your Feedback
================================================== -->
<section id="loginform">
	<div class="row-fluid">
	 <div class="span12">


		<div class="whmcscontainer">
			<div class="contentpadded">
				<div class="halfwidthcontainer">

					<div class="page-header">
						<div class="styled_title"><h1>Submit Feedback</h1></div>
					</div>

					<?php
						echo $this->Session->flash();
						echo $this->Form->create('Feedback', array(	'class' => 'form-stacked'));
					?>
					<div class="logincontainer">
						<fieldset>
						<?php
							echo $this->Form->input('email', array('label' => 'Email / Phone No.', 'class' => 'span12'));
							echo $this->Form->input('feedback', array('label' => 'Message', 'class' => 'span12'));

							echo $this->Form->input('bot_stop', array(
										'div' => array('style' => 'display:none')
									));
						?>
						</fieldset>
						<?php echo $this->Form->end(__('Submit'));?>
					</div>

					<?php
						echo $this->Form->end();
					?>
				</div>
			</div>
		</div>
	  </div>
	</div>
</section>
