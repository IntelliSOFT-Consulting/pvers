<?php
$this->assign('SADR', 'active');
?>

<!-- SADR
    ================================================== -->
<section id="sadrsview">
  <ul class="nav nav-tabs">
    <?php if (isset($sadr['SadrOriginal']['id']) && !empty($sadr['SadrOriginal']['id'])) { ?> <li><a href="#formoriginal" data-toggle="tab">Original</a></li> <?php } ?>
    <li class="active"><a href="#formview" data-toggle="tab"><?php echo (!empty($sadr['Sadr']['reference_no'])) ? $sadr['Sadr']['reference_no'] : $sadr['Sadr']['id']; ?></a></li>
    <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count((isset($sadr['SadrOriginal']['id']) && !empty($sadr['SadrOriginal']['id'])) ? $sadr['SadrOriginal']['ExternalComment'] : $sadr['ExternalComment']); ?>)</a></li>
    <li><a href="#assign_manager" data-toggle="tab">Assign Manager </a></li>
  </ul>

  <div class="tab-content">
    <?php if (isset($sadr['SadrOriginal']['id']) && !empty($sadr['SadrOriginal']['id'])) { ?>
      <div class="tab-pane" id="formoriginal">
        <div class="row-fluid">
          <div class="span10">
            <?php
            $osadr = [];
            foreach ($sadr['SadrOriginal'] as $key => $value) {
              if (is_array($value)) {
                $osadr[$key] = $value;
              } else {
                $osadr['Sadr'][$key] = $value;
              }
            }
            echo $this->element('sadr/sadr_view', ['sadr' => $osadr]);
            ?>
          </div>
          <div class="span2">
            <?php
            echo $this->Html->link(
              'Download PDF',
              array('controller' => 'sadrs', 'action' => 'view', 'ext' => 'pdf', $sadr['SadrOriginal']['id']),
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
          <?php echo $this->element('sadr/sadr_view'); ?>
        </div>
        <div class="span2">
          <?php
          echo $this->Html->link(
            'Download PDF',
            array('controller' => 'sadrs', 'action' => 'view', 'ext' => 'pdf', $sadr['Sadr']['id']),
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
            echo $this->element('comments/list', ['comments' => ((isset($sadr['SadrOriginal']['id']) && !empty($sadr['SadrOriginal']['id'])) ? $sadr['SadrOriginal']['ExternalComment'] : $sadr['ExternalComment'])]);
            ?>
          </div>
          <div class="span4 lefty">
            <?php
            $oid = ((isset($sadr['SadrOriginal']['id']) && !empty($sadr['SadrOriginal']['id'])) ? $sadr['SadrOriginal']['id'] : $sadr['Sadr']['id']);
            echo $this->element('comments/add', [
              'model' => [
                'model_id' => $oid, 'foreign_key' => $oid,
                'model' => 'Sadr', 'category' => 'external', 'url' => 'report_feedback'
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

        if (!empty($sadr['Sadr']['assigned_to'])) { ?>
          <h5 class="text-info"><u>Report Assigned to</u></h5>
          <div class="row-fluid">
            <div class="span4 center">
              <h6>1. <?= $managers[$sadr['Sadr']['assigned_to']]; ?> </h6>
              <span><?php
                    echo $this->Html->link(
                      'Unassign Report',
                      array('controller' => 'sadrs', 'action' => 'unassign', $sadr['Sadr']['id']),
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
                echo $this->Form->create('Sadr', array(
                  'url' => array(
                    'controller' => 'sadrs',
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
                echo $this->Form->input('report_id', ['type' => 'hidden', 'value' => $sadr['Sadr']['id']]);
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