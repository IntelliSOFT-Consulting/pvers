<?php
    $this->assign('DEV', 'active');        
    echo $this->Session->flash();
?>

<?php 
  // echo $this->element('device/device_edit'); 
?>

      <!-- DEVICE
    ================================================== -->
<section id="devicesview">
    <ul class="nav nav-tabs">
        <li><a href="#formview" data-toggle="tab">Original</a></li>
        <li class="active"><a href="#formedit" data-toggle="tab"><?php echo $device['Device']['reference_no']; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($device['ExternalComment']); ?>)</a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane" id="formview">
        <div class="row-fluid">     
          <div class="span10">
              <?php echo $this->element('device/device_view');?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'devices','action'=>'view', 'ext'=> 'pdf', $device['Device']['id']),
                                              array('class' => 'btn btn-primary btn-block mapop', 'title'=>'Download PDF',
                                              'data-content' => 'Download the pdf version of the report',));
              ?>
              <hr>

          </div>
        </div>
      </div>
      <div class="tab-pane active" id="formedit">
        <div class="row-fluid">     
          <div class="span12">
              <?php echo $this->element('device/device_edit');?>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="external_report_comments">
        <!-- 12600 Letters debat -->
        <div class="amend-form">
            <h5 class="text-info"><u>FEEDBACK</u></h5>
            <div class="row-fluid">
              <div class="span8">    
                  <?php                       
                    echo $this->element('comments/list', ['comments' => $device['ExternalComment']]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php  
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $device['Device']['id'], 'foreign_key' => $device['Device']['id'],   
                                             'model' => 'Device', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>