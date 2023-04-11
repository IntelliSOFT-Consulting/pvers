<?php
$this->assign('AEFI', 'active');
?>

<!-- AEFI
    ================================================== -->
<section id="aefisview">
  <ul class="nav nav-tabs">
    <?php if (isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) { ?> <li><a href="#formoriginal" data-toggle="tab">Original</a></li> <?php } ?>
    <li class="active"><a href="#formview" data-toggle="tab"><?php echo (!empty($aefi['Aefi']['reference_no'])) ? $aefi['Aefi']['reference_no'] : $aefi['Aefi']['id']; ?></a></li>
    <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count((isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) ? $aefi['AefiOriginal']['ExternalComment'] : $aefi['ExternalComment']); ?>)</a></li>
    <li><a href="#assign_manager" data-toggle="tab">Assign Manager </a></li>
  </ul>

  <div class="tab-content">
    <?php if (isset($aefi['AefiOriginal']['id']) && !empty($aefi['AefiOriginal']['id'])) { ?>
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
            echo $this->Html->link(
              'Download PDF',
              array('controller' => 'aefis', 'action' => 'view', 'ext' => 'pdf', $aefi['AefiOriginal']['id']),
              array(
                'class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',
                'data-content' => 'Download the pdf version of the report',
              )
            );
            ?>
            <hr>

          </div>
        </div>
      </div>
    <?php } ?>
    <div class="tab-pane active" id="formview">
      <div class="row-fluid">
        <div class="span10">
          <?php echo $this->element('aefi/aefi_view'); ?>
        </div>
        <div class="span2">
          <?php
          echo $this->Html->link(
            'Download PDF',
            array('controller' => 'aefis', 'action' => 'view', 'ext' => 'pdf', $aefi['Aefi']['id']),
            array(
              'class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',
              'data-content' => 'Download the pdf version of the report',
            )
          );
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
              'model' => [
                'model_id' => $oid, 'foreign_key' => $oid,
                'model' => 'Aefi', 'category' => 'external', 'url' => 'report_feedback'
              ]
            ])
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="assign_manager">

      <div class="amend-form">
        <?php

        if (!empty($aefi['Aefi']['assigned_to'])) { ?>
          <h5 class="text-info"><u>Report Assigned to</u></h5>
          <div class="row-fluid">
            <div class="span4 center">
              <h6>1. <?= $managers[$aefi['Aefi']['assigned_to']]; ?> </h6>
              <span><?php
                    echo $this->Html->link(
                      'Unassign Report',
                      array('controller' => 'aefis', 'action' => 'unassign', $aefi['Aefi']['id']),
                      array(
                        'class' => 'btn btn-primary mapop', 'title' => 'Unassign Report',
                        'data-content' => 'Download the pdf version of the report',
                      )
                    ) ?></span>
            </div>
          <?php
        } else {
          ?>
            <h5 class="text-info"><u>Assign Report</u></h5>
            <div class="row-fluid">
              <div class="span4 center">
                <?php
                echo $this->Form->create('Aefi', array(
                  'url' => array(
                    'controller' => 'aefis',
                    'action' => 'assign',

                  ),
                  'type' => 'file',
                  'class' => false,
                  'inputDefaults' => array(
                    'div' => array('class' => 'control-group'),
                    'label' => array('class' => 'control-label'),
                    'between' => '<div class="controls">',
                    'after' => '</div>',
                    'class' => '',
                    'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                    'error' => array('attributes' => array('class' => 'controls help-block')),
                  ),
                ));
                ?>
                <?php
                echo $this->Form->input('assigned_by', ['type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')]);
                echo $this->Form->input('report_id', ['type' => 'hidden', 'value' => $aefi['Aefi']['id']]);
                echo $this->Form->input('assigned_to', ['label' => array('class' => 'required'), 'options' => $managers]);
                echo $this->Form->input('content', ['label' => array('class' => 'required', 'text' => 'Reminder Note'), 'type' => 'textarea']);
                ?>
                <div class="form-group">
                  <div class="span12">
                    <button type="submit" class="btn btn-success active"><i class="fa fa-save" aria-hidden="true"></i> Assign</button>
                  </div>
                </div>
                <?php echo $this->Form->end() ?>

              </div>
            </div>
          <?php
        }
          ?>
          </div>
      </div>
      
    </div>
</section>