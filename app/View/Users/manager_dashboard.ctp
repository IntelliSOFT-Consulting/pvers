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
                        echo "</li>";
                      } 
                    }
                    echo '</ol>';
                    echo '<p>'.$this->Html->link('All SADRs >>', array('controller' => 'sadrs', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link')).'<>';
                    echo $this->Html->link('<p> >> All </p>', array('controller' => 'sadrs', 'action' => 'index'), array('escape' => false));                     
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
                                array('escape' => false, 'class' => 'text-success'));
                            echo "</li>";
                        }
                      }
                      echo '</ol>';
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
                        } 
                      }
                      echo '</ol>';
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
                          echo "</li>";
                      } 
                    }
                    echo '</ol>'; 
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
                        } 
                      }
                      echo '</ol>';
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
                        } 
                      }
                      echo '</ol>';
                    ?>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span4 pformback" style="padding: 4px;">
                  <h5>Public Reports</h5>
                  <?php
                    echo '<ol>';
                    foreach ($padrs as $padr) {
                        echo "<li>";
                          echo $this->Html->link($padr['Padr']['reporter_name'].' <small class="muted">('.$padr['Padr']['reference_no'].')</small>', array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['id']),
                            array('escape' => false));
                        echo "</li>";
                    }
                    echo '</ol>'; 
                  ?>
                </div>
                <div class="span4 formbacksa">                  
                  <?php
                    echo $this->Html->link('<h5> SAE </h5>' ,
                      array('controller' => 'saes', 'action' => 'index'),
                      array('escape' => false));
                    ?>
                  <?php
                    echo '<ol>';
                    foreach ($saes as $sae) {
                        echo "<li>";
                          echo $this->Html->link($sae['Sae']['reference_no'].' <small class="muted">('.$sae['Sae']['form_type'].')</small>', array('controller' => 'saes', 'action' => 'view', $sae['Sae']['id']),
                            array('escape' => false));
                        echo "</li>";
                    }
                    echo '</ol>'; 
                  ?>
                </div>
                <div class="span4"></div>
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
