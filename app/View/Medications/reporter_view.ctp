<?php
  $this->assign('MED', 'active');
 ?>

      <!-- MEDICATION
    ================================================== -->
<section id="medicationsview">
  <ul id="reviewer_tab" class="nav nav-tabs">
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo $medication['Medication']['reference_no']; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($medication['ExternalComment']); ?>)</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="formview">
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

            <hr>
            <?php
                if($medication['Medication']['submitted'] > 1) {
                  echo $this->Html->link('Edit Report', '#', array(
                    'name' => 'continueEditing',
                    'class' => 'btn  btn-block mapop disabled',
                    'id' => 'MedicationContinueReport', 'title'=>'Submitted Report!',
                    'data-content' => 'This report has been submitted to PPB and cannot be edited',
                    'div' => false,
                  ));
                } else {
                  echo $this->Html->link('Edit Report', array('action' => 'edit', $medication['Medication']['id']), array(
                    'name' => 'continueEditing',
                    'class' => 'btn  btn-block mapop',
                    'id' => 'MedicationContinueReport', 'title'=>'Edit Report',
                    'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
                    'div' => false,
                  ));
                }
            ?>
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
