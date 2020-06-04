<?php
	$this->assign('Dashboard', 'active');
	$this->Html->script('dashboard', array('inline' => false));
?>
<section>
<div class="row-fluid">
	<ul class="thumbnails">
	  <li class="span6">
		<div class="thumbnail">
		  <img alt="" src="/img/authenticated/preferences_composer.png">
		  <div class="caption">

		  	<div>
              	<h4>Pre-Submission Meetings</h4>
             	<?php                   
                    echo '<ol>';
                    foreach ($meetingDates as $meetingDate) {
                    	if (empty($meetingDate['MeetingDate']['final_decision'])) {                    		
							echo $this->Html->link('<li>'.$meetingDate['MeetingDate']['proposed_date1'].' - '.$meetingDate['MeetingDate']['email'].'</li>', array('controller' => 'meeting_dates', 'action' => 'view', $meetingDate['MeetingDate']['id']),
							array('escape' => false));   
                    	} else {                    		
							echo $this->Html->link('<li>'.$meetingDate['MeetingDate']['proposed_date1'].' - '.$meetingDate['MeetingDate']['email'].'</li>', array('controller' => 'meeting_dates', 'action' => 'view', $meetingDate['MeetingDate']['id']),
							array('escape' => false, 'class' => 'text-success'));   
                    	}
                    }
                    echo '</ol>';
                ?>
            </div>

			<h4>Submitted Protocols</h4>
			<ol><?php
				 foreach($applications as $application) {
					if(!empty($application['Application']['study_drug'])) {
						$ndata = $application['Application']['study_drug'].' ('.$application['Application']['protocol_no'].')';
					} else {
						$ndata = date('d-m-Y h:i a', strtotime($application['Application']['created']));
					}
					echo $this->Html->link('<li>'.$ndata.'</li>', array('controller' => 'applications', 'action' => 'view', $application['Application']['id']),
							array('escape' => false, 'class' => 'text-success'));
				 }
				 ?>
			</ol>
			<?php echo $this->Html->link('<i class="icon-link"></i> View All Protocols', array('controller' => 'applications', 'action' => 'index'),
					array('escape' => false, 'class' => 'btn'));?>
		  </div>
		</div>
	  </li>
	  <li class="span6">
		<div class="thumbnail">
		  <img alt="" src="/img/authenticated/preferences_desktop_notification.png">
		  <div class="caption">
            <h4><?php echo $this->Html->link('Notifications', array('controller' => 'notifications', 'action' => 'index'),
          array('escape' => false, 'class' => 'text-success'));?> <small>Actions that require your attention.</small></h4>
			<dl>
	  <?php
		echo $this->element('alerts/notifications', ['notifications' => $notifications]);
		
	  ?>
			</dl>
		  </div>
		</div>
	  </li>
	</ul>
  </div>
 </section>
