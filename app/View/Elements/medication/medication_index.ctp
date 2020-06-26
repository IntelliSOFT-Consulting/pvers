<?php
    $this->assign('MED', 'active');
?>

<div class="row-fluid">
  <div class="span12">
    
  <?php
    echo $this->Session->flash();
    if ($redir == 'reporter') {
  ?>
  <div class="row-fluid">
    <div class="span12">
    <?php
      echo $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> New Medication Error',
               array('controller' => 'medications', 'action' => 'add'),
               array('escape' => false, 'class' => 'btn btn-success'));
    ?>
    </div>
  </div>
    <hr>
    <?php } ?>

    <div class="marketing">
      <div class="row-fluid">
            <div class="span12">
              <h3>MEDICATION:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>
              <hr class="soften" style="margin: 7px 0px;">
            </div>
        </div>
    </div>

    <?php
        echo $this->Form->create('Medication', array(
          'url' => array_merge(array('action' => 'index'), $this->params['pass']),
          'class' => 'ctr-groups', 'style'=>array('padding:9px;', 'background-color: #F5F5F5'),
        ));
      ?>
      <table class="table table-condensed" style="margin-bottom: 2px;">
        <tbody>
          <tr>
            <td>
              <?php
                echo $this->Form->input('reference_no',
                    array(
                      'div' => false,
                      'placeholder' => 'me/2020',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Reference No.'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('generic_name_i',
                    array(
                      'div' => false,
                      'placeholder' => 'intended product',
                      'class' => 'unauthorized_index span10', 'label' => array('class' => 'required', 'text' => 'Generic name'))
                );
              ?>
            </td>
            <td colspan="2">
                <?php
                  echo $this->Form->input('start_date',
                    array('div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index', 'after' => '-to-',
                        'label' => array('class' => 'required', 'text' => 'Report Dates'), 'placeHolder' => 'Start Date'));
                  echo $this->Form->input('end_date',
                    array('div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index',
                         'after' => '<a style="font-weight:normal" onclick="$(\'.unauthorized_index\').val(\'\');" >
                              <em class="accordion-toggle">clear!</em></a>',
                        'label' => false, 'placeHolder' => 'End Date'));
                ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('name_of_institution',
                    array(
                      'div' => false, 'placeholder' => 'institution',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Institution'))
                );
              ?>
            </td>
            <td>
                <h5>Error reach patient?</h5>
                <?php
                  echo $this->Form->input('reach_patient', array(
                      'options' => array('Yes' => 'Yes', 'No' => 'No'), 'legend' => false,
                      'type' => 'radio'
                  ));
                ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('county_id',
                    array(
                      'div' => false, 'empty' => true,
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'County'))
                );
              ?>
            </td>
          </tr>
          <tr>
              <td>
              <?php
                  echo $this->Form->input('process_occur', array('type' => 'select',
                    'empty' => true, 'class' => 'span12',
                    'options' => array('Prescribing' => 'Prescribing',
                      'Dispensing (includes filling)' => 'Dispensing (includes filling)', 
                      'Administration' => 'Administration',
                      'Others' => 'Others'),
                    'label' => array('class' => 'required', 'text' => 'In which process did the error occur?')
                  ));
              ?>
              </td>
              <td>
              <?php
                  echo $this->Form->input('outcome', array('type' => 'select',
                    'empty' => true, 'class' => 'input',
                    'options' => array('Treatment /intervention required-caused temporary harm' => 'Treatment /intervention required-caused temporary harm',
                      'Initial/prolonged hospitalization-caused temporary harm' => 'Initial/prolonged hospitalization-caused temporary harm', 
                      'Caused permanent harm' => 'Caused permanent harm',
                      'Actual error-did not reach patient' => 'Actual error-did not reach patient',
                      'Actual error-caused no harm' => 'Actual error-caused no harm',
                      'Additional monitoring required-caused no harm' => 'Additional monitoring required-caused no harm',
                      'Death' => 'Death',
                      ),
                    'label' => array('class' => 'required', 'text' => 'Error Outcome')
                  ));
              ?>
              </td>
              <td colspan="2">
                <h5>Error Cause</h5>
                <?php
                    echo $this->Form->input('error_cause_inexperience', array('label' => 'Inexperienced personnel', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_knowledge', array('label' => 'Inadequate knowledge', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_distraction', array('label' => 'Distraction', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_sound', array('label' => 'Sound alike medication', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_medication', array('label' => 'Look alike packaging', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_workload', array('label' => 'Heavy workload', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_peak', array('label' => 'Peak hour', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_stock', array('label' => 'Stock arrangements/storage problem', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <h5>Task and technology</h5>
                <?php
                    echo $this->Form->input('error_cause_procedure', array('label' => 'Failure to adhere to work procedure', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_abbreviations', array('label' => 'Use of abbreviations', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_illegible', array('label' => 'Illegible prescriptions', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_inaccurate', array('label' => 'Patient information', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_labelling', array('label' => 'Wrong labelling', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_computer', array('label' => 'Incorrect computer entry', 'hiddenField' => false));
                    echo $this->Form->input('error_cause_other', array('label' => 'Others', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <?php

                ?>
              </td>
              <td>
                <?php
                      echo $this->Form->input('generic_name_ii',
                      array('div' => false, 'placeholder' => '(Error product)',
                        'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Generic name')));
                ?>
              </td>              
          </tr>
          <tr>
            <td>                   
              <?php
                  echo $this->Form->input('patient_name',
                      array('div' => false, 'placeholder' => 'Patient name',
                        'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Patient Name')));
              ?>          
            </td>
            <td>
              
            </td>
            <td>
              <?php
                
              ?>
            </td>
            <td>
              <?php
                
              ?>
            </td>
            <td>
              <?php
                  echo $this->Form->input('reporter',
                      array('div' => false, 'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Reporter'), 'placeholder' => 'Name/Email'));
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('designation_id',
                    array(
                      'div' => false, 'empty' => true,
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Designation'))
                );
              ?>
            </td>
            <td>
              <h5>Gender</h5>
                <?php
                  echo $this->Form->input('gender', array(
                      'options' => array('Male' => 'Male', 'Female' => 'Female', 'Unknown' => 'Unknown'), 'legend' => false,
                      'type' => 'radio'
                  ));
                ?>
            </td>
          </tr>
          <tr>
              <td><label for="MedicationPages" class="required">Pages</label></td>
              <td>                
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Medication']['limit'],
                    'empty' => true,
                    'options' => $page_options,
                    'label' => false,
                  ));
                ?>
              </td>
              <td>
                <?php
                  // echo $this->Form->checkbox('submitted', array('hiddenField' => false, 'label' => 'Submitted'));
                  echo $this->Form->input('submit', array('type' => 'checkbox', 'hiddenField' => false, 
                      'label' => array('class' => '', 'text' => 'Include Unsubmitted?')));
                ?>                
              </td>
              <td></td>
              <td>
                <?php
                  echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                      'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
                      'formnovalidate' => 'formnovalidate',
                      'style' => array('margin-bottom: 5px')
                  ));
                ?>
              </td>
              <td>
                <?php
                  echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'index'), array('class' => 'btn', 'escape' => false, 'style' => array('margin-bottom: 5px')));
                ?>
              </td>
              <td>
                <?php
                  echo $this->Html->link('<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel', array('action' => 'index', 'ext' => 'csv', '?' => $this->request->query), array('class' => 'btn btn-success', 'escape' => false));
                ?>
              </td>
          </tr>
        </tbody>
      </table>
    <p>
      <?php
        echo $this->Paginator->counter(array(
        'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
                showing <span class="badge">{:current}</span> MEDICATIONs out of
                <span class="badge badge-inverse">{:count}</span> total, starting on record <span class="badge">{:start}</span>,
                ending on <span class="badge">{:end}</span>')
        ));
      ?>
    </p>
    <?php echo $this->Form->end(); ?>

    <div class="pagination">
      <ul>
      <?php
        echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'currentTag' => 'a', 'escape' => false));
        echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); 
        echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
      ?>
      </ul>
    </div>

    <table  class="table  table-bordered table-striped">
     <thead>
            <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('reference_no'); ?></th>
        <th><?php echo $this->Paginator->sort('patient_name'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
       </thead>
      <tbody>
    <?php
    foreach ($medications as $medication): ?>
    <tr class="">
        <td><?php echo h($medication['Medication']['id']); ?>&nbsp;</td>
        <td>
          <?php 
            if($medication['Medication']['submitted'] > 1) {
              echo $this->Html->link($medication['Medication']['reference_no'], array('action' => 'view', $medication['Medication']['id']), array('escape'=>false));
            } else {
              echo $this->Html->link($medication['Medication']['reference_no'], array('action' => 'edit', $medication['Medication']['id']), array('escape'=>false));
            }
        ?>&nbsp;
        </td>
        <td><?php echo h($medication['Medication']['patient_name']); ?>&nbsp;</td>
        <td><?php echo h($medication['Medication']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php 
              if($medication['Medication']['submitted'] > 1) {
                echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                  array('controller' => 'medications', 'action' => 'view', $medication['Medication']['id']),
                  array('escape' => false));
              } else {
                echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'medications', 'action' => 'edit', $medication['Medication']['id']),
                  array('escape' => false));
              }
            ?>            
        </td>
    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
$(function() {
  var adates = $('#MedicationStartDate, #MedicationEndDate').datepicker({
          minDate:"-100Y",
          maxDate:"-0D",
          dateFormat:'dd-mm-yy',
          format: 'dd-mm-yyyy',
          endDate: '-0d',
          showButtonPanel:true,
          changeMonth:true,
          changeYear:true,
          showAnim:'show',
          onSelect: function( selectedDate ) {
            var option = this.id == "MedicationStartDate" ? "minDate" : "maxDate",
              instance = $( this ).data( "datepicker" ),
              date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
            adates.not( this ).datepicker( "option", option, date );
          }
        });

});
</script>