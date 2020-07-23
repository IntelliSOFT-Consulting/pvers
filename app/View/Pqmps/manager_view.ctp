<?php
    $this->assign('PQMP', 'active');
 ?>

      <!-- PQMP
    ================================================== -->
<section id="pqmpsview">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo $pqmp['Pqmp']['reference_no']; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($pqmp['ExternalComment']); ?>)</a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane active" id="formview">
        <div class="row-fluid">     
          <div class="span10">
              <?php echo $this->element('pqmp/pqmp_view');?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'pqmps','action'=>'view', 'ext'=> 'pdf', $pqmp['Pqmp']['id']),
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
                    echo $this->element('comments/list', ['comments' => $pqmp['ExternalComment']]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php  
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $pqmp['Pqmp']['id'], 'foreign_key' => $pqmp['Pqmp']['id'],   
                                             'model' => 'Pqmp', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
