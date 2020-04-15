<?php
	$this->assign('FEEDBACK', 'active');
	$this->Html->script('jqprint.0.3', array('inline' => false));
 ?>

  <!-- FOLLOW UPS EDIT
================================================== -->
<section id="feedbacksedit">
	<div class="row-fluid">
		<div class="span2 columns">
			<div class="row-fluid">
				<div class="span12">
					<div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						<li class="nav-header"><i class="icon-glass"></i>  Filter Options </li>
						<li class="divider"></li>
						<li class="active">
							<?php echo $this->Html->link('<i class="icon-book"></i> FEEDBACK',
									array('controller' => 'feedbacks', 'action' => 'index', 'admin' => true),
									array('escape' => false)); ?>
						</li>
						<li class="divider"></li>
						</ul>
				    </div> <!-- /well -->
				</div><!--/span-->
			</div><!--/row-->
		</div> <!-- /span5 -->
		<div class="span10">
		<?php
			echo $this->Session->flash(); ?>
			<div class="form-actions">
				<div class="row-fluid">
					<div class="span4">

					</div>
					<div class="span4">
						<?php
								echo $this->Form->button('Print Feedback', array('type' => 'button', 'class'=>'btn btn-inverse btnPrint' ,
														'onclick' => '$(\'#printAreade\').jqprint(); '
														));
						?>
					</div>
					<div class="span4">

					</div>
				</div>
			</div>
			<div id="printAreade">
				<div class="row-fluid">
					<div class="span4">
						<h4>Email / Phone No.:</h4>
					</div>
					<div class="span8">
						<p><?php echo $feedback['Feedback']['email'] ?></p>
					</div>
				</div><!--/row-->
				<hr>

				<div class="row-fluid">
					<div class="span4">
						<h4>Message:</h4>
					</div>
					<div class="span8">
						<p><?php echo $feedback['Feedback']['feedback'] ?></p>
					</div>
				</div><!--/row-->
				<hr>

				<div class="row-fluid">
					<div class="span6">
						<div class="control-group">
							<label class="control-label required" for="SadrDescriptionOfReaction"><strong>SADR ID:</strong></label>
							<div class="control-label">
								<?php  echo $this->Html->link($feedback['Feedback']['sadr_id'] ,
									array('controller' => 'sadrs', 'action' => 'view', $feedback['Feedback']['sadr_id']),
											array('escape' => false, 'target' => '_blank')); ?>
							</div>
						</div>
					</div>

					<div class="span6">
						<div class="control-group">
							<label class="control-label required" for="SadrDescriptionOfReaction"><strong>PQMP ID:</strong></label>
							<div class="control-label">
								<?php  echo $this->Html->link($feedback['Feedback']['pqmp_id'] ,
									array('controller' => 'pqmps', 'action' => 'view', $feedback['Feedback']['pqmp_id']),
											array('escape' => false, 'target' => '_blank')); ?>
							</div>
						</div>
					</div>

				</div><!--/row-->
				<hr>
			</div>
		  </div>
	</div>
</section>
