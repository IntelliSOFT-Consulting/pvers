<?php
    $this->assign('Dashboard', 'active');
    $this->Html->script('dashboard', array('inline' => false));
?>

<section>
    <div class="row-fluid">
        <div class="span8">
            <h4 class="text-success">Reports</h4>
            <div class="row-fluid">
                <div class="span4 formback" style="padding: 4px;">
                  <h5>SADRS</h5>
                  <?php
                    echo '<ol>';
                    foreach ($sadrs as $sadr) {
                      if($sadr['Sadr']['submitted'] > 1) {
                          echo $this->Html->link('<li>'.$sadr['Sadr']['report_title'].'</li>', array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id']),
                            array('escape' => false, 'class' => 'text-success'));  
                      } else {
                          echo $this->Html->link('<li>'.$sadr['Sadr']['reference_no'].' <small class="muted">(unsubmitted)</small></li>', array('controller' => 'sadrs', 'action' => 'edit', $sadr['Sadr']['id']),
                            array('escape' => false)); 
                      }
                    }
                    echo '</ol>';
                    echo $this->Form->postLink('Report SADR', array('controller' => 'sadrs' , 'action' => 'add'), array('class' => 'btn btn-primary btn-mini'), __('Report New ADR?'));

                    // echo $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Add Follow-up', array('controller' => 'sadrs', 'action' => 'index'),
                    //           array('escape' => false, 'class' => 'btn btn-inverse btn-mini pull-right'));
                  ?>
                </div>
                <div class="span4 formbacka" style="padding: 4px;">   
                  <h5>AEFI</h5>                 
                    <?php
                      echo '<ol>';
                      foreach ($aefis as $aefi) {
                        if($aefi['Aefi']['submitted'] < 1) {
                            echo $this->Html->link('<li>'.$aefi['Aefi']['created'].' <small class="muted">(unsubmitted)</small></li>', array('controller' => 'aefis', 'action' => 'edit', $aefi['Aefi']['id']),
                              array('escape' => false));   
                        } else {
                            echo $this->Html->link('<li>'.$aefi['Aefi']['reference_no'].'</li>', array('controller' => 'aefis', 'action' => 'view', $aefi['Aefi']['id']),
                              array('escape' => false, 'class' => 'text-success'));   
                        }
                      }
                      echo '</ol>';
                      echo $this->Form->postLink('Report AEFI', array('controller' => 'aefis' , 'action' => 'add'), array('class' => 'btn btn-primary btn-mini'), __('Report New AEFI?'));
                    ?>
                </div>
                <div class="span4 formbackp" style="padding: 4px;">
                  <h5>PQMP</h5>
                    <?php
                      echo '<ol>';
                      foreach ($pqmps as $pqmp) {
                        if($pqmp['Pqmp']['submitted'] < 1) {
                            echo $this->Html->link('<li>'.$pqmp['Pqmp']['created'].' <small class="muted">(unsubmitted)</small></li>', array('controller' => 'pqmps', 'action' => 'edit', $pqmp['Pqmp']['id']),
                              array('escape' => false));   
                        } else {
                            echo $this->Html->link('<li>'.$pqmp['Pqmp']['reference_no'].'</li>', array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id']),
                              array('escape' => false, 'class' => 'text-success'));   
                        }
                      }
                      echo '</ol>';
                      echo $this->Form->postLink('Report PQMP', array('controller' => 'pqmps' , 'action' => 'add'), array('class' => 'btn btn-primary btn-mini'), __('Report New PQMP?'));
                    ?>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span4 formbackd" style="padding: 4px;">
                  <h5>Medical Devices</h5>
                  <?php
                    echo '<ol>';
                    foreach ($devices as $device) {
                      if($device['Device']['submitted'] < 1) {
                          echo $this->Html->link('<li>'.$device['Device']['report_title'].' <small class="muted">(unsubmitted)</small></li>', array('controller' => 'devices', 'action' => 'edit', $device['Device']['id']),
                            array('escape' => false));   
                      } else {
                          echo $this->Html->link('<li>'.$device['Device']['reference_no'].'</li>', array('controller' => 'devices', 'action' => 'view', $device['Device']['id']),
                            array('escape' => false, 'class' => 'text-success'));   
                      }
                    }
                    echo '</ol>';                    
                    echo $this->Form->postLink('Report Medical Device', array('controller' => 'devices' , 'action' => 'add'), array('class' => 'btn btn-primary btn-mini'), __('Report New Medical Device?'));
                  ?>
                </div>
                <div class="span4 formbackm" style="padding: 4px;">  
                  <h5>Medication Errors</h5>                  
                    <?php
                      echo '<ol>';
                      foreach ($medications as $medication) {
                        if($medication['Medication']['submitted'] < 1) {
                            echo $this->Html->link('<li>'.$medication['Medication']['created'].' <small class="muted">(unsubmitted)</small></li>', array('controller' => 'medications', 'action' => 'edit', $medication['Medication']['id']),
                              array('escape' => false));   
                        } else {
                            echo $this->Html->link('<li>'.$medication['Medication']['reference_no'].'</li>', array('controller' => 'medications', 'action' => 'view', $medication['Medication']['id']),
                              array('escape' => false, 'class' => 'text-success'));   
                        }
                      }
                      echo '</ol>';
                      echo $this->Form->postLink('Report Medication Error', array('controller' => 'medications' , 'action' => 'add'), array('class' => 'btn btn-primary btn-mini'), __('Report New Medication Error?'));
                    ?>
                </div>
                <div class="span4 formbackt" style="padding: 4px;">
                  <h5>Transfusions Reactions</h5>
                    <?php
                      echo '<ol>';
                      foreach ($transfusions as $transfusion) {
                        if($transfusion['Transfusion']['submitted'] < 1) {
                            echo $this->Html->link('<li>'.$transfusion['Transfusion']['created'].' <small class="muted">(unsubmitted)</small></li>', array('controller' => 'transfusions', 'action' => 'edit', $transfusion['Transfusion']['id']),
                              array('escape' => false));   
                        } else {
                            echo $this->Html->link('<li>'.$transfusion['Transfusion']['reference_no'].'</li>', array('controller' => 'transfusions', 'action' => 'view', $transfusion['Transfusion']['id']),
                              array('escape' => false, 'class' => 'text-success'));   
                        }
                      }
                      echo '</ol>';
                      echo $this->Form->postLink('Report Transfusion', array('controller' => 'transfusions' , 'action' => 'add'), array('class' => 'btn btn-primary btn-mini'), __('Report New Transfusion Reaction?'));
                    ?>
                </div>
            </div>
        </div>

        <div class="span4"><!-- Notifications -->          
          <h4 class="text-warning">Notifications!</h4>
          <div class="thumbnail">
            <img alt="" src="/img/preferences_desktop_notification.png">
            <div class="caption">
              <h4><?php echo $this->Html->link('Notifications', array('controller' => 'notifications', 'action' => 'index'),
            array('escape' => false, 'class' => 'text-success'));?> <small>Actions that require your attention.</small></h4>
              <?php
                echo $this->element('alerts/notifications', ['notifications' => $notifications]);
              ?>
            </div>
          </div>
        </div>
    </div>
</section>
