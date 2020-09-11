<?php
    $this->assign('TRN', 'active');
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
      echo $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> New Blood Transfusion Reaction',
               array('controller' => 'transfusions', 'action' => 'add'),
               array('escape' => false, 'class' => 'btn btn-success'));
    ?>
    </div>
  </div>
    <hr>
    <?php } ?>

    <div class="marketing">
      <div class="row-fluid">
            <div class="span12">
              <h3>TRANSFUSION:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>
              <hr class="soften" style="margin: 7px 0px;">
            </div>
        </div>
    </div>

    <?php
        echo $this->Form->create('Transfusion', array(
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
                      'placeholder' => 'trn/2020',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Reference No.'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('diagnosis',
                    array(
                      'div' => false,
                      'placeholder' => 'diagnosis',
                      'class' => 'unauthorized_index span10', 'label' => array('class' => 'required', 'text' => 'Diagnosis'))
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
              <h5>Previous transfusion</h5>
              <?php
                echo $this->Form->input('previous_transfusion', array(
                      'options' => array('Yes' => 'Yes', 'No' => 'No'), 'legend' => false,
                      'type' => 'radio'
                  ));
              ?>
            </td>
            <td>
                <h5>Previous reactions?</h5>
                <?php
                  echo $this->Form->input('previous_reactions', array(
                      'options' => array('Yes' => 'Yes', 'No' => 'No'), 'legend' => false,
                      'type' => 'radio'
                  ));
                ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('ward',
                    array(
                      'div' => false,
                      'placeholder' => 'ward',
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Ward'))
                );
              ?>
            </td>
          </tr>
          <tr>
              <td>
              <?php
                  echo $this->Form->input('reaction_general', array('type' => 'select',
                    'empty' => true, 'class' => 'span12',
                    'options' => array('Fever' => 'Fever',
                      'Chills/Rigors' => 'Chills/Rigors', 
                      'Flushing' => 'Flushing',
                      'Nausea/ Vomiting' => 'Nausea/ Vomiting'),
                    'label' => array('class' => 'required', 'text' => 'General')
                  ));
              ?>
              </td>
              <td>
              <?php
                  echo $this->Form->input('reaction_dermatological', array('type' => 'select',
                    'empty' => true, 'class' => 'input-small',
                    'options' => array('Urticaria' => 'Urticaria',
                      'Other skin rash' => 'Other skin rash'
                      ),
                    'label' => array('class' => 'required', 'text' => 'Dermatological')
                  ));
              ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('reaction_cardiac', array('type' => 'select',
                      'empty' => true, 'class' => 'input-small',
                      'options' => array('Chest pain' => 'Chest pain',
                        'Dyspnoea' => 'Dyspnoea',
                        'Hypotension' => 'Hypotension',
                        'Tachycardia' => 'Tachycardia'
                      ),
                      'label' => array('class' => 'required', 'text' => 'Cardiac/Respiratory')
                    ));
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('reaction_renal', array('type' => 'select',
                      'empty' => true, 'class' => 'input-small',
                      'options' => array('Haemoglobinuria- Dark urine' => 'Haemoglobinuria- Dark urine',
                        'Oliguria' => 'Oliguria',
                        'Anuria' => 'Anuria'
                      ),
                      'label' => array('class' => 'required', 'text' => 'Renal')
                    ));
                ?>
              </td>
              <td>
                <h5>Task and technology</h5>
                <?php
                    echo $this->Form->input('reaction_haematological', array('type' => 'select',
                        'empty' => true, 'class' => 'input-small',
                        'options' => array('Unexplained bleeding' => 'Unexplained bleeding'
                      ),
                      'label' => array('class' => 'required', 'text' => 'Renal')
                    ));
                ?>
              </td>
              <td>
                <?php
                  echo $this->Form->input('lab_hemolysis', array('type' => 'select',
                        'empty' => true, 'class' => 'input-small',
                        'options' => array('Present' => 'Present',
                          'Absent' => 'Absent',
                          'Equivocal' => 'Equivocal'
                      ),
                      'label' => array('class' => 'required', 'text' => 'Hemolysis')
                    ));
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('lab_hemolysis_present', array('type' => 'select',
                        'empty' => true, 'class' => 'input-small',
                        'options' => array('Mild' => 'Mild',
                          'Moderate' => 'Moderate',
                          'Marked' => 'Marked'
                      ),
                      'label' => array('class' => 'required', 'text' => 'Supernatant: if present')
                    ));
                ?>
              </td>              
          </tr>
          <tr>
            <td>                   
            <?php
                echo $this->Form->input('recipient_blood', array('type' => 'select',
                        'empty' => true, 'class' => 'input',
                        'options' => array('Present' => 'Present',
                          'Absent' => 'Absent'
                      ),
                      'label' => array('class' => 'required', 'text' => 'Recipient: Agglutination')
                    ));
            ?>          
            </td>
            <td>
              <?php
                echo $this->Form->input('donor_hemolysis', array('type' => 'select',
                        'empty' => true, 'class' => 'input-small',
                        'options' => array('Present' => 'Present',
                          'Absent' => 'Absent'
                      ),
                      'label' => array('class' => 'required', 'text' => 'Donor: Agglutination')
                  ));
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('component',
                    array(
                      'div' => false,
                      'placeholder' => 'component',
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Component'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('patient_name',
                      array('div' => false, 'placeholder' => 'Patient name',
                        'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Patient Name')));
             
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
                      'options' => array('Male' => 'Male', 'Female' => 'Female'), 'legend' => false,
                      'type' => 'radio'
                  ));
                ?>
            </td>
          </tr>
          <tr>
              <td><label for="TransfusionPages" class="required">Pages</label></td>
              <td>                
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Transfusion']['limit'],
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
                showing <span class="badge">{:current}</span> TRANSFUSIONs out of
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
    foreach ($transfusions as $transfusion): ?>
    <tr class="">
        <td><?php echo h($transfusion['Transfusion']['id']); ?>&nbsp;</td>
        <td>
          <?php 
            if($transfusion['Transfusion']['submitted'] > 1) {
              echo $this->Html->link($transfusion['Transfusion']['reference_no'], array('action' => 'view', $transfusion['Transfusion']['id']), array('escape'=>false));
            } else {
              echo $this->Html->link($transfusion['Transfusion']['reference_no'], array('action' => 'edit', $transfusion['Transfusion']['id']), array('escape'=>false));
            }
        ?>&nbsp;
        </td>
        <td><?php echo h($transfusion['Transfusion']['patient_name']); ?>&nbsp;</td>
        <td><?php echo h($transfusion['Transfusion']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php 
              if($transfusion['Transfusion']['submitted'] > 1) {
                echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                  array('controller' => 'transfusions', 'action' => 'view', $transfusion['Transfusion']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $transfusion['Transfusion']['copied'] == 2) echo $this->Html->link('<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'transfusions', 'action' => 'edit', $transfusion['Transfusion']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $transfusion['Transfusion']['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'transfusions' , 'action' => 'copy', $transfusion['Transfusion']['id']), array('escape' => false), __('Create a clean copy to edit?'));
              } else {
                if($redir == 'reporter') echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'transfusions', 'action' => 'edit', $transfusion['Transfusion']['id']),
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
  var adates = $('#TransfusionStartDate, #TransfusionEndDate').datepicker({
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
            var option = this.id == "TransfusionStartDate" ? "minDate" : "maxDate",
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