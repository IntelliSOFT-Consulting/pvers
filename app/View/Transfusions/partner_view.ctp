<?php
  $this->assign('TRN', 'active');
 ?>

      <!-- TRANSFUSION
    ================================================== -->
<section id="transfusionsview">
  <ul id="reviewer_tab" class="nav nav-tabs">
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo $transfusion['Transfusion']['reference_no']; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($transfusion['ExternalComment']); ?>)</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="formview">
        <div class="row-fluid">   
          <div class="span10">
            <?php echo $this->element('transfusion/transfusion_view');?>
          </div>
          <div class="span2">
            <?php
                echo $this->Html->link('Download PDF', array('controller'=>'transfusions','action'=>'view', 'ext'=> 'pdf', $transfusion['Transfusion']['id']),
                            array('class' => 'btn btn-primary btn-block mapop', 'title'=>'Download PDF',
                            'data-content' => 'Download the pdf version of the report',));
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
                    echo $this->element('comments/list', ['comments' => $transfusion['ExternalComment']]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php  
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $transfusion['Transfusion']['id'], 'foreign_key' => $transfusion['Transfusion']['id'],   
                                             'model' => 'Transfusion', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>

  
</section>
