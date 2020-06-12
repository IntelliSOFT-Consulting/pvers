<?php
// $this->assign('NOT', 'active');

	foreach ($notifications as $notification) {
      echo '<div class="alert alert-'.$messages[$notification['Notification']['type']].'" id="'.$notification['Notification']['id'].'">';
      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      
        // pr($notification);
        echo "<p>".$notification['Notification']['title']."</p>";
        echo "<p>".$notification['Notification']['system_message']."</p>";
        echo "<p><i class='icon-comment-alt'></i> ".$notification['Notification']['user_message']."</p>";

        echo '<div style="text-align: right;"><small class="muted">'.$notification['Notification']['created'].'</small></div>';
      echo '</div>';
  }

echo $this->Html->link('All notifications >>', array('controller' => 'notifications', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-info'));

?>