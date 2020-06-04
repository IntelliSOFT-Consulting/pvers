<?php
	$this->assign('Dashboard', 'active');
?>
<section>
<div class="row-fluid">
	<ul class="thumbnails">
	  <li class="span4">
		<div class="thumbnail">
		  <img alt="" src="/img/authenticated/text.png">
		  <div class="caption">
			<h4>New Protocol</h4>
			<?php
				echo $this->Form->create('Application');
				echo $this->Form->input('email_address', array('type' => 'email', 'value' => $this->Session->read('Auth.User.email')));
				echo $this->Form->end(array(
					'label' => 'Create',
					'value' => 'Create',
					'class' => 'btn btn-success',
					// 'div' => array(
						// 'class' => 'form-actions',
					// )
				));
				// echo $this->Form->end(__('Submit'), array('class' => 'btn btn-large btn-success'));
			?>
			<hr>
			<h4>Existing Protocol <small>A protocol with an existing protocol number</small></h4>
			<?php
				echo $this->Form->create('Application');
				echo $this->Form->input('protocol_no', array('label' => 'Protocol Number <span class="sterix">*</span>'));
				echo $this->Form->end(array(
					'label' => 'Create',
					'value' => 'Create',
					'class' => 'btn btn-primary',
					// 'div' => array(
						// 'class' => 'form-actions',
					// )
				));
				// echo $this->Form->end(__('Submit'), array('class' => 'btn btn-large btn-success'));
			?>
			<hr>
			<p><small><i class="icon-minus"></i> <span class="label label-info">NOTE!</span> Fields marked with <span class="sterix">*</span> are mandatory and your application will not be submitted to PPB without first completing them.</small></p>
			<p><small><i class="icon-minus"></i> Notifications will be sent to the email address entered above</small></p>

		  </div>
		</div>
	  </li>
	  <li class="span4">
		<div class="thumbnail">
		  <img alt="" src="/img/authenticated/preferences_composer.png">
		  <div class="caption">
			<h4>Recent Protocols</h4>
			<ol><?php
				 foreach($applications as $application) {
				 	$ndata = (!empty($application['Application']['protocol_no'])   ? $application['Application']['protocol_no'] : date('d-m-Y h:i a', strtotime($application['Application']['created'])) );
					if($application['Application']['submitted']) {
						// $ndata = $application['Application']['protocol_no'];
						echo $this->Html->link('<li>'.$ndata.'</li>', array('controller' => 'applications', 'action' => 'view', $application['Application']['id']),
							array('escape' => false));
					} else {
						// $ndata = (!empty($application['Application']['study_drug'])   ? $application['Application']['study_drug'] : date('d-m-Y h:i a', strtotime($application['Application']['created'])) );
						echo $this->Html->link('<li>'.$ndata.'</li>', array('controller' => 'applications', 'action' => 'edit', $application['Application']['id']),
							array('escape' => false));
					}
				 }
				 ?>
			</ol>
			<?php echo $this->Html->link('<i class="icon-link"></i> View All Applications', array('controller' => 'applications', 'action' => 'index'),
					array('escape' => false, 'class' => 'btn'));?>
		  </div>
		</div>
	  </li>
	  <li class="span4">
		<div class="thumbnail">
		  <img alt="" src="/img/authenticated/preferences_desktop_notification.png">
		  <div class="caption">
            <h4>Notifications <small>Actions that require your attention</small> </h4>
            <dl>
            <?php
                echo $this->element('alerts/notifications', ['notifications' => $notifications]);               
            ?>
            </dl>
          </div>
		</div>
	  </li>
	 <!--  <li class="span3">
		<div class="thumbnail">
		  <img alt="" src="/img/authenticated/beos_query.png">
		  <div class="caption">
			<h3>Queries</h3>
			<p>Respond to queries raised by reviewers below</p>
		  </div>
		</div>
	  </li> -->
	</ul>
  </div>
 </section>
