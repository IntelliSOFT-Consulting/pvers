<?php
    $this->assign('SADR', 'active');        
    echo $this->Session->flash();
?>


      <!-- SADR
    ================================================== -->
<section id="sadrsview">
    <ul class="nav nav-tabs">
        <li><a href="#formview" data-toggle="tab">Original</a></li>
        <li class="active"><a href="#formedit" data-toggle="tab"><?php echo (!empty($sadr['Sadr']['reference_no'])) ? $sadr['Sadr']['reference_no'] : $sadr['Sadr']['id'] ; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($sadr['ExternalComment']); ?>)</a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane" id="formview">
        <div class="row-fluid">     
          <div class="span10">
              <?php echo $this->element('sadr/sadr_view');?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'sadrs','action'=>'view', 'ext'=> 'pdf', $sadr['Sadr']['id']),
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
              <?php echo $this->element('sadr/sadr_edit');?>
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
                    echo $this->element('comments/list', ['comments' => $sadr['ExternalComment']]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php  
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $sadr['Sadr']['id'], 'foreign_key' => $sadr['Sadr']['id'],   
                                             'model' => 'Sadr', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>