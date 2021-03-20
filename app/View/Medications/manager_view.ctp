<?php
    $this->assign('MED', 'active');
 ?>

      <!-- MEDICATION
    ================================================== -->
<section id="medicationsview">
    <ul class="nav nav-tabs">
        <?php if(isset($medication['MedicationOriginal']['id']) && !empty($medication['MedicationOriginal']['id'])) { ?> <li><a href="#formoriginal" data-toggle="tab">Original</a></li> <?php } ?>
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo (!empty($medication['Medication']['reference_no'])) ? $medication['Medication']['reference_no'] : $medication['Medication']['id'] ; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count((isset($medication['MedicationOriginal']['id']) && !empty($medication['MedicationOriginal']['id'])) ? $medication['MedicationOriginal']['ExternalComment'] : $medication['ExternalComment']); ?>)</a></li>
    </ul>
    
    <div class="tab-content">
    <?php if(isset($medication['MedicationOriginal']['id']) && !empty($medication['MedicationOriginal']['id'])) { ?>
      <div class="tab-pane" id="formoriginal">
        <div class="row-fluid">     
          <div class="span10">
              <?php 
                $omedication = [];
                foreach ($medication['MedicationOriginal'] as $key => $value) {
                  if (is_array($value)) {
                    $omedication[$key] = $value;
                  } else {
                    $omedication['Medication'][$key] = $value;
                  }
                }
                echo $this->element('medication/medication_view', ['medication' => $omedication]);
              ?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'medications','action'=>'view', 'ext'=> 'pdf', $medication['MedicationOriginal']['id']),
                                              array('class' => 'btn btn-primary btn-block mapop', 'title'=>'Download PDF',
                                              'data-content' => 'Download the pdf version of the report',));
              ?>
              <hr>

          </div>
        </div>
      </div>
    <?php } ?>
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
                    echo $this->element('comments/list', ['comments' => ((isset($medication['MedicationOriginal']['id']) && !empty($medication['MedicationOriginal']['id'])) ? $medication['MedicationOriginal']['ExternalComment'] : $medication['ExternalComment'])]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php 
                    $oid = ((isset($medication['MedicationOriginal']['id']) && !empty($medication['MedicationOriginal']['id'])) ? $medication['MedicationOriginal']['id'] : $medication['Medication']['id']);
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $oid, 'foreign_key' => $oid,   
                                             'model' => 'Medication', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
