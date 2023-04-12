<?php
    $this->assign('MED', 'active');
    $this->Html->script('jquery/combobox', array('inline' => false));
    $this->Html->script('medication', array('inline' => false));
 ?>

      <!-- MEDICATION
    ================================================== -->
<section id="medicationsview">
    <ul class="nav nav-tabs">
        <li><a href="#formview" data-toggle="tab">Original</a></li>
        <li class="active"><a href="#formedit" data-toggle="tab"><?php echo $medication['Medication']['reference_no']; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($medication['ExternalComment']); ?>)</a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane" id="formview">
        <div class="row-fluid">     
          <div class="span10">
              <?php echo $this->element('medication/medication_view');?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'medications','action'=>'view', 'ext'=> 'pdf', $medication['Medication']['id']),
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
              <?php echo $this->element('medication/medication_edit');?>
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
                    echo $this->element('comments/list', ['comments' => $medication['ExternalComment']]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php  
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $medication['Medication']['id'], 'foreign_key' => $medication['Medication']['id'],   
                                             'model' => 'Medication', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>