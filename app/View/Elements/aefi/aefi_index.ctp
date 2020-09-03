<?php
    $this->assign('AEFI', 'active');
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
      echo $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> New AEFI',
               array('controller' => 'aefis', 'action' => 'add'),
               array('escape' => false, 'class' => 'btn btn-success'));
    ?>
    </div>
  </div>
    <?php } ?>

    <div class="marketing">
      <div class="row-fluid">
            <div class="span12">
              <h3>AEFI:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>
              <hr class="soften" style="margin: 7px 0px;">
            </div>
        </div>
    </div>

    <?php
        echo $this->Form->create('Aefi', array(
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
                      'placeholder' => 'aefi/2020',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Reference No.'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('vaccine_name',
                    array(
                      'div' => false,
                      'placeholder' => 'bcg',
                      'class' => 'unauthorized_index span10', 'label' => array('class' => 'required', 'text' => 'Name of Vaccine'))
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
                <h5>Serious?</h5>
                <?php
                  echo $this->Form->input('serious', array(
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
                  echo $this->Form->input('bcg', array('label' => 'BCG Lymphadenitis', 'hiddenField' => false));
                  echo $this->Form->input('convulsion', array('label' => 'Convulsion', 'hiddenField' => false));
                  echo $this->Form->input('urticaria', array('label' => 'Generalized urticaria', 'hiddenField' => false));
              ?>
              </td>
              <td>
              <?php
                  echo $this->Form->input('high_fever', array('label' => 'High Fever', 'hiddenField' => false));
                  echo $this->Form->input('abscess', array('label' => 'Injection site abscess', 'hiddenField' => false));
              ?>
              </td>
              <td colspan="2">
                <?php
                    echo $this->Form->input('local_reaction', array('label' => 'Severe Local Reaction', 'hiddenField' => false));
                    echo $this->Form->input('anaphylaxis', array('label' => 'Anaphylaxis', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('meningitis', array('label' => 'Encephalopathy', 'hiddenField' => false));
                    echo $this->Form->input('paralysis', array('label' => 'Paralysis', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('toxic_shock', array('label' => 'Toxic shock', 'hiddenField' => false));
                    // echo $this->Form->input('cosmeceuticals', array('label' => 'Cosmeceuticals', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('complaint_other', array('label' => 'Other', 'hiddenField' => false));
                    echo $this->Form->input('complaint_other_specify', array('type' => 'text', 'label' => false, 'class' => 'input-small', 'placeholder' => '(specify)'));
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
              <h5>Report Type?</h5> 
               <?php
                  echo $this->Form->input('report_type', array(
                      'options' => array('Initial' => 'Initial', 'Followup' => 'Followup'), 'legend' => false,
                      'type' => 'radio'
                  ));
                ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('serious_yes', array('type' => 'select',
                  'empty' => true, 'class' => 'input',
                  'options' => array('Death' => 'Death',
                    'Life threatening' => 'Life threatening', 
                    'Persistent or significant disability' => 'Persistent or significant disability',
                    'Missing cost or prolonged hospitalization' => 'Missing cost or prolonged hospitalization',
                    'Congenital anomaly' => 'Congenital anomaly',
                    'Other important medical event' => 'Other important medical event'),
                  'label' => array('class' => 'required', 'text' => 'Seriousness Criteria')
                  ));
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('outcome', array('type' => 'select',
                  'empty' => true, 'class' => 'input-small',
                  'options' => array('Recovered/Resolved' => 'Recovered/Resolved',
                    'Recovering/Resolving' => 'Recovering/Resolving', 
                    'Not recovered/Not resolved/Ongoing' => 'Not recovered/Not resolved/Ongoing',
                    'Recovered/Resolved with sequelae' => 'Recovered/Resolved with sequelae',
                    'Fatal' => 'Fatal',
                    'Unknown' => 'Unknown'),
                  'label' => array('class' => 'required', 'text' => 'Outcome')
                  ));
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
              <td><label for="AefiPages" class="required">Pages</label></td>
              <td>                
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Aefi']['limit'],
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
                showing <span class="badge">{:current}</span> AEFIs out of
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
        <th><?php echo $this->Paginator->sort('report_type'); ?></th>
        <th><?php echo $this->Paginator->sort('patient_name'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
       </thead>
      <tbody>
    <?php
    foreach ($aefis as $aefi): ?>
    <tr class="">
        <td><?php echo h($aefi['Aefi']['id']); ?>&nbsp;</td>
        <td>
          <?php 
            if($aefi['Aefi']['submitted'] > 1) {
              echo $this->Html->link($aefi['Aefi']['reference_no'], array('action' => 'view', $aefi['Aefi']['id']), array('escape'=>false, 'class' => 'text-'.((isset($aefi['Aefi']['serious']) && $aefi['Aefi']['serious'] == 'Yes') ? 'error' : 'success')));
            } else {
              echo $this->Html->link($aefi['Aefi']['reference_no'], array('action' => 'edit', $aefi['Aefi']['id']), array('escape'=>false, 'class' => 'text-'.((isset($aefi['Aefi']['serious']) && $aefi['Aefi']['serious'] == 'Yes') ? 'error' : 'success')));
            }
        ?>&nbsp;</td>
        <td><?php echo h($aefi['Aefi']['report_type']); 
                  if($aefi['Aefi']['report_type'] == 'Followup') {
                    echo "<br> Initial: ";
                    echo $this->Html->link(
                      '<label class="label label-info">'.substr($aefi['Aefi']['reference_no'], 0, strpos($aefi['Aefi']['reference_no'], '_')).'</label>', 
                      array('action' => 'view', $aefi['Aefi']['aefi_id']), array('escape' => false));
                  }
              ?>&nbsp;
        </td>
        <td><?php echo h($aefi['Aefi']['patient_name']); ?>&nbsp;</td>
        <td><?php echo h($aefi['Aefi']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php 
              if($aefi['Aefi']['submitted'] > 1) {
                echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                  array('controller' => 'aefis', 'action' => 'view', $aefi['Aefi']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Download E2B file"> <i class="fa fa-etsy" aria-hidden="true"></i> 2 <i class="fa fa-bold" aria-hidden="true"></i> </span>', array('controller' => 'aefis' , 'action' => 'download', $aefi['Aefi']['id'], 'ext' => 'xml', 'manager' => false), array('escape' => false), __('Download E2B?'));
                echo "&nbsp;";
                if($redir == 'manager' && empty($aefi['Aefi']['vigiflow_ref'])) echo $this->Html->link('<span class="label label-warning tooltipper" title="Send to vigiflow"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Vigiflow </span>' ,
                  array('controller' => 'aefis', 'action' => 'vigiflow', $aefi['Aefi']['id'], 'manager' => false),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'reporter') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> Followup</span>', array('controller' => 'aefis' , 'action' => 'followup', $aefi['Aefi']['id']), array('escape' => false), __('Add a followup report?'));
                echo "&nbsp;";
                // if($redir == 'manager') echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                //   array('controller' => 'aefis', 'action' => 'edit', $aefi['Aefi']['id']),
                //   array('escape' => false));
                if($redir == 'manager' && $aefi['Aefi']['copied'] == 2) echo $this->Html->link('<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'aefis', 'action' => 'edit', $aefi['Aefi']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $aefi['Aefi']['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'aefis' , 'action' => 'copy', $aefi['Aefi']['id']), array('escape' => false), __('Create a clean copy to edit?'));
              } else {
                echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'aefis', 'action' => 'edit', $aefi['Aefi']['id']),
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
  var adates = $('#AefiStartDate, #AefiEndDate').datepicker({
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
            var option = this.id == "AefiStartDate" ? "minDate" : "maxDate",
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