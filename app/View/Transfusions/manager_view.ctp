<?php
    $this->assign('TRN', 'active');
 ?>

      <!-- TRANSFUSION
    ================================================== -->
<section id="transfusionsview">
    <ul class="nav nav-tabs">
        <?php if(isset($transfusion['TransfusionOriginal']['id']) && !empty($transfusion['TransfusionOriginal']['id'])) { ?> <li><a href="#formoriginal" data-toggle="tab">Original</a></li> <?php } ?>
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo (!empty($transfusion['Transfusion']['reference_no'])) ? $transfusion['Transfusion']['reference_no'] : $transfusion['Transfusion']['id'] ; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count((isset($transfusion['TransfusionOriginal']['id']) && !empty($transfusion['TransfusionOriginal']['id'])) ? $transfusion['TransfusionOriginal']['ExternalComment'] : $transfusion['ExternalComment']); ?>)</a></li>
    </ul>
    
    <div class="tab-content">
    <?php if(isset($transfusion['TransfusionOriginal']['id']) && !empty($transfusion['TransfusionOriginal']['id'])) { ?>
      <div class="tab-pane" id="formoriginal">
        <div class="row-fluid">     
          <div class="span10">
              <?php 
                $otransfusion = [];
                foreach ($transfusion['TransfusionOriginal'] as $key => $value) {
                  if (is_array($value)) {
                    $otransfusion[$key] = $value;
                  } else {
                    $otransfusion['Transfusion'][$key] = $value;
                  }
                }
                echo $this->element('transfusion/transfusion_view', ['transfusion' => $otransfusion]);
              ?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'transfusions','action'=>'view', 'ext'=> 'pdf', $transfusion['TransfusionOriginal']['id']),
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
              <?php echo $this->element('transfusion/transfusion_view');?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'transfusions','action'=>'view', 'ext'=> 'pdf', $transfusion['Transfusion']['id']),
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
                    echo $this->element('comments/list', ['comments' => ((isset($transfusion['TransfusionOriginal']['id']) && !empty($transfusion['TransfusionOriginal']['id'])) ? $transfusion['TransfusionOriginal']['ExternalComment'] : $transfusion['ExternalComment'])]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php 
                    $oid = ((isset($transfusion['TransfusionOriginal']['id']) && !empty($transfusion['TransfusionOriginal']['id'])) ? $transfusion['TransfusionOriginal']['id'] : $transfusion['Transfusion']['id']);
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $oid, 'foreign_key' => $oid,   
                                             'model' => 'Transfusion', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
