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
                        echo "<li>";
                          echo $this->Html->link($sadr['Sadr']['report_title'].' <small class="muted">('.$sadr['Sadr']['reference_no'].')</small>', array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id']),
                            array('escape' => false, 'class' => 'text-'.((isset($sadr['Sadr']['serious']) && $sadr['Sadr']['serious'] == 'Yes') ? 'error' : 'success')));
                          echo "&nbsp;";
                          echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> </span>', array('controller' => 'sadrs' , 'action' => 'followup', $sadr['Sadr']['id']), array('escape' => false), __('Add a followup report?'));
                        echo "</li>";
                      } else {
                        echo "<li>";
                          echo $this->Html->link($sadr['Sadr']['reference_no'].' <small class="muted">(unsubmitted)</small>', array('controller' => 'sadrs', 'action' => 'edit', $sadr['Sadr']['id']),
                            array('escape' => false)); 
                        echo "</li>";
                      }
                    }
                    echo '</ol>';
                    echo $this->Html->link('All SADRs >>', array('controller' => 'sadrs', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link'));
                    echo $this->Form->postLink('Report SADR', array('controller' => 'sadrs' , 'action' => 'add'), array('class' => 'btn btn-success pull-right btn-mini pull-right'), __('Report New ADR?'));

                    
                  ?>
                </div>
                <div class="span4 formbacka" style="padding: 4px;">   
                  <h5>AEFI</h5>                 
                    <?php
                      echo '<ol>';
                      foreach ($aefis as $aefi) {
                        if($aefi['Aefi']['submitted'] > 1) {
                            echo "<li>";
                              echo $this->Html->link($aefi['AefiListOfVaccine'][0]['vaccine_name'].' <small class="muted">('.$aefi['Aefi']['reference_no'].')</small>', array('controller' => 'aefis', 'action' => 'view', $aefi['Aefi']['id']),
                                array('escape' => false, 'class' => 'text-'.((isset($aefi['Aefi']['serious']) && $aefi['Aefi']['serious'] == 'Yes') ? 'error' : 'success')));
                              echo "&nbsp;";
                              echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> </span>', array('controller' => 'aefis' , 'action' => 'followup', $aefi['Aefi']['id']), array('escape' => false), __('Add a followup report?'));
                            echo "</li>";
                        } else {
                            echo "<li>";
                              echo $this->Html->link($aefi['Aefi']['created'].' <small class="muted">(unsubmitted)</small>', array('controller' => 'aefis', 'action' => 'edit', $aefi['Aefi']['id']),
                                array('escape' => false)); 
                            echo "</li>";
                        }
                      }
                      echo '</ol>';
                    echo $this->Html->link('All AEFIs >>', array('controller' => 'aefis', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link'));
                      echo $this->Form->postLink('Report AEFI', array('controller' => 'aefis' , 'action' => 'add'), array('class' => 'btn btn-success pull-right btn-mini'), __('Report New AEFI?'));
                    ?>
                </div>
                <div class="span4 formbackp" style="padding: 4px;">
                  <h5>PQMP</h5>
                    <?php
                      echo '<ol>';
                      foreach ($pqmps as $pqmp) {
                        if($pqmp['Pqmp']['submitted'] > 1) {
                          echo "<li>";
                            echo $this->Html->link($pqmp['Pqmp']['brand_name'].' <small class="muted">('.$pqmp['Pqmp']['reference_no'].')</small>', array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id']),
                              array('escape' => false, 'class' => 'text-success')); 
                          echo "</li>";
                        } else {
                          echo "<li>";
                            echo $this->Html->link($pqmp['Pqmp']['reference_no'].' <small class="muted">(unsubmitted)</small>', array('controller' => 'pqmps', 'action' => 'edit', $pqmp['Pqmp']['id']),
                              array('escape' => false)); 
                          echo "</li>";
                        }
                      }
                      echo '</ol>';
                    echo $this->Html->link('All PQMPs >>', array('controller' => 'pqmps', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link'));
                      echo $this->Form->postLink('Report PQMP', array('controller' => 'pqmps' , 'action' => 'add'), array('class' => 'btn btn-success pull-right btn-mini'), __('Report New PQMP?'));
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
                      if($device['Device']['submitted'] > 1) {
                          echo "<li>";
                            echo $this->Html->link($device['Device']['report_title'].' <small class="muted">('.$device['Device']['reference_no'].')</small>', array('controller' => 'devices', 'action' => 'view', $device['Device']['id']),
                              array('escape' => false, 'class' => 'text-'.((isset($device['Device']['serious']) && in_array($device['Device']['serious'], ['Fatal', 'Serious'])) ? 'error' : 'success')));
                            echo "&nbsp;";
                            echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> </span>', array('controller' => 'devices' , 'action' => 'followup', $device['Device']['id']), array('escape' => false), __('Add a followup report?'));
                          echo "</li>";
                      } else {
                        echo "<li>";
                          echo $this->Html->link($device['Device']['reference_no'].' <small class="muted">(unsubmitted)</small>', array('controller' => 'devices', 'action' => 'edit', $device['Device']['id']),
                            array('escape' => false)); 
                        echo "</li>";
                      }
                    }
                    echo '</ol>';      
                    echo $this->Html->link('All Incidents >>', array('controller' => 'devices', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link'));              
                    echo $this->Form->postLink('Report Medical Device', array('controller' => 'devices' , 'action' => 'add'), array('class' => 'btn btn-success pull-right btn-mini'), __('Report New Medical Device?'));
                  ?>
                </div>
                <div class="span4 formbackm" style="padding: 4px;">  
                  <h5>Medication Errors</h5>                  
                    <?php
                      echo '<ol>';
                      foreach ($medications as $medication) {
                        if($medication['Medication']['submitted'] > 1) {
                          echo "<li>";
                            echo $this->Html->link($medication['MedicationProduct'][0]['generic_name_i'].' <small class="muted">('.$medication['Medication']['reference_no'].')</small>', array('controller' => 'medications', 'action' => 'view', $medication['Medication']['id']),
                              array('escape' => false, 'class' => 'text-success'));  
                          echo "</li>";
                        } else {
                          echo "<li>";
                            echo $this->Html->link($medication['Medication']['reference_no'].' <small class="muted">(unsubmitted)</small>', array('controller' => 'medications', 'action' => 'edit', $medication['Medication']['id']),
                              array('escape' => false)); 
                          echo "</li>";
                        }
                      }
                      echo '</ol>';
                    echo $this->Html->link('All Errors >>', array('controller' => 'medications', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link'));
                      echo $this->Form->postLink('Report Medication Error', array('controller' => 'medications' , 'action' => 'add'), array('class' => 'btn btn-success pull-right btn-mini'), __('Report New Medication Error?'));
                    ?>
                </div>
                <div class="span4 formbackt" style="padding: 4px;">
                  <h5>Transfusions Reactions</h5>
                    <?php
                      echo '<ol>';
                      foreach ($transfusions as $transfusion) {
                        if($transfusion['Transfusion']['submitted'] > 1) {
                          echo "<li>";
                            echo $this->Html->link($transfusion['Transfusion']['diagnosis'].' <small class="muted">('.$transfusion['Transfusion']['reference_no'].')</small>', array('controller' => 'transfusions', 'action' => 'view', $transfusion['Transfusion']['id']),
                              array('escape' => false, 'class' => 'text-success')); 
                          echo "</li>";
                        } else {
                          echo "<li>";
                            echo $this->Html->link($transfusion['Transfusion']['reference_no'].' <small class="muted">(unsubmitted)</small>', array('controller' => 'transfusions', 'action' => 'edit', $transfusion['Transfusion']['id']),
                              array('escape' => false)); 
                          echo "</li>";
                        }
                      }
                      echo '</ol>';
                    echo $this->Html->link('All BT >>', array('controller' => 'transfusions', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link'));
                      echo $this->Form->postLink('Report Transfusion', array('controller' => 'transfusions' , 'action' => 'add'), array('class' => 'btn btn-success pull-right btn-mini'), __('Report New Transfusion Reaction?'));
                    ?>
                    <!-- <ul id="reviewer_tab" class="nav nav-tabs">
                        <li class="active"><a href="#formview" data-toggle="tab">Aha</a></li>
                        <li><a href="#internal_report_comments" data-toggle="tab">Feedback ()</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="formview">bakoloa</div>
                      <div class="tab-pane" id="internal_report_comments">12600 Letters debat</div>
                    </div> -->
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
