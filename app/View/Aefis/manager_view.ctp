<?php
    $this->assign('AEFI', 'active');
 ?>

      <!-- AEFI
    ================================================== -->
<section id="aefisview">
    <ul class="nav nav-tabs">
        <?php if(isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) { ?> <li><a href="#formoriginal" data-toggle="tab">Original</a></li> <?php } ?>
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo (!empty($aefi['Aefi']['reference_no'])) ? $aefi['Aefi']['reference_no'] : $aefi['Aefi']['id'] ; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count((isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) ? $aefi['AefiOriginal']['ExternalComment'] : $aefi['ExternalComment']); ?>)</a></li>
    </ul>
    
    <div class="tab-content">
    <?php if(isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) { ?>
      <div class="tab-pane" id="formoriginal">
        <div class="row-fluid">     
          <div class="span10">
              <?php 
                $oaefi = [];
                foreach ($aefi['AefiOriginal'] as $key => $value) {
                  if (is_array($value)) {
                    $oaefi[$key] = $value;
                  } else {
                    $oaefi['Aefi'][$key] = $value;
                  }
                }
                echo $this->element('aefi/aefi_view', ['aefi' => $oaefi]);
              ?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'aefis','action'=>'view', 'ext'=> 'pdf', $aefi['AefiOriginal']['id']),
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
              <?php echo $this->element('aefi/aefi_view');?>
          </div>
          <div class="span2">
              <?php
                      echo $this->Html->link('Download PDF', array('controller'=>'aefis','action'=>'view', 'ext'=> 'pdf', $aefi['Aefi']['id']),
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
                    echo $this->element('comments/list', ['comments' => ((isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) ? $aefi['AefiOriginal']['ExternalComment'] : $aefi['ExternalComment'])]);
                  ?> 
                </div>
                <div class="span4 lefty">
                <?php 
                    $oid = ((isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) ? $aefi['AefiOriginal']['id'] : $aefi['Aefi']['id']);
                    echo $this->element('comments/add', [
                                 'model' => ['model_id' => $oid, 'foreign_key' => $oid,   
                                             'model' => 'Aefi', 'category' => 'external', 'url' => 'report_feedback']]) 
                ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
