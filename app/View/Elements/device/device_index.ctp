<?php
    $this->assign('DEV', 'active');
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
      echo $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> New Medical Device Incident',
               array('controller' => 'devices', 'action' => 'add'),
               array('escape' => false, 'class' => 'btn btn-success'));
    ?>
    </div>
  </div>
    <hr>
    <?php } ?>

    <div class="marketing">
      <div class="row-fluid">
            <div class="span12">
              <h3>DEVICE:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>
              <hr class="soften" style="margin: 7px 0px;">
            </div>
        </div>
    </div>

    <?php
        echo $this->Form->create('Device', array(
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
                      'placeholder' => 'device/2020',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Reference No.'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('brand_name',
                    array(
                      'div' => false,
                      'placeholder' => 'brand name',
                      'class' => 'unauthorized_index span10', 'label' => array('class' => 'required', 'text' => 'Brand name'))
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
                <?php
                  echo $this->Form->input('report_title',
                    array(
                      'div' => false,
                      'placeholder' => 'Report title',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Report Title'))
                  );
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
                  echo $this->Form->input('serious', array('type' => 'select',
                  'empty' => true, 'class' => 'input',
                  'options' => array('Fatal' => 'Fatal',
                    'Serious' => 'Serious', 
                    'Moderate' => 'Moderate',
                    'Mild' => 'Mild',
                    'Unknown' => 'Unknown'),
                  'label' => array('class' => 'required', 'text' => 'Event classification')
                  ));
              ?>
              </td>
              <td>
              <?php
                  echo $this->Form->input('serious_yes', array('type' => 'select',
                  'empty' => true, 'class' => 'input',
                  'options' => array('Death' => 'Death',
                    'Life-threatening' => 'Life-threatening', 
                    'Hospitalization or prolongation of existing hospitalization' => 'Hospitalization or prolongation of existing hospitalization',
                    'Results in persistent or significant disability' => 'Results in persistent or significant disability',
                    'Congenital anomaly or birth defect' => 'Congenital anomaly or birth defect'),
                  'label' => array('class' => 'required', 'text' => 'Reason for seriousness')
                  ));
              ?>
              </td>
              <td colspan="2">
                <?php
                    echo $this->Form->input('outcome', array('type' => 'select',
                      'empty' => true, 'class' => 'input',
                      'options' => array('Recovered' => 'Recovered',
                        'Recovering' => 'Recovering', 
                        'Recovered with sequalae' => 'Recovered with sequalae',
                        'Fatal' => 'Fatal',
                        'Unknown' => 'Unknown'),
                      'label' => array('class' => 'required', 'text' => 'Patient outcome')
                    ));
                ?>
              </td>
              <td>
                <?php
                  echo $this->Form->input('common_name',
                    array(
                      'div' => false,
                      'placeholder' => 'common name',
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Common name'))
                  );
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('manufacturer_name',
                      array(
                        'div' => false,
                        'placeholder' => 'manufacturer',
                        'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Manufacturer'))
                    );
                  ?>
              </td>
              <td>
                <h5>Problem noted prior?</h5>
                <?php
                    echo $this->Form->input('problem_noted', array(
                      'options' => array('Yes' => 'Yes', 'No' => 'No'), 'legend' => false,
                      'type' => 'radio'
                  ));
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
                echo $this->Form->input('operator', array('type' => 'select',
                      'empty' => true, 'class' => 'input-small',
                      'options' => array('Healthcare professional' => 'Healthcare professional',
                        'Patient' => 'Patient', 
                        'Caregiver' => 'Caregiver',
                        'Other' => 'Other'),
                      'label' => array('class' => 'required', 'text' => 'Operator')
                    ));
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('device_usage', array('type' => 'select',
                      'empty' => true, 'class' => 'input-small',
                      'options' => array('Single use' => 'Single use',
                        'Reuse of reusable' => 'Reuse of reusable', 
                        'Reuse of single-use' => 'Reuse of single-use',
                        'Reserviced/Refurbished' => 'Reserviced/Refurbished'),
                      'label' => array('class' => 'required', 'text' => 'Device usage')
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
              <td><label for="DevicePages" class="required">Pages</label></td>
              <td>                
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Device']['limit'],
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
                showing <span class="badge">{:current}</span> DEVICEs out of
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
        <th><?php echo $this->Paginator->sort('report_title'); ?></th>
        <th><?php echo $this->Paginator->sort('brand_name'); ?></th>
        <th><?php echo $this->Paginator->sort('patient_name'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
       </thead>
      <tbody>
    <?php
    foreach ($devices as $device): ?>
    <tr class="">
        <td><?php echo h($device['Device']['id']); ?>&nbsp;</td>
        <td>
          <?php 
            if($device['Device']['submitted'] > 1) {
              echo $this->Html->link($device['Device']['reference_no'], array('action' => 'view', $device['Device']['id']), array('escape'=>false, 'class' => 'text-'.((isset($device['Device']['serious']) && in_array($device['Device']['serious'], ['Fatal', 'Serious'])) ? 'error' : 'success')));
            } else {
              echo $this->Html->link($device['Device']['reference_no'], array('action' => (($redir == 'reporter') ? 'edit' : 'view'), $device['Device']['id']), array('escape'=>false, 'class' => 'text-'.((isset($device['Device']['serious']) && in_array($device['Device']['serious'], ['Fatal', 'Serious'])) ? 'error' : 'success')));
            }
        ?>&nbsp;</td>
        <td><?php echo h($device['Device']['report_title']); 
                  if($device['Device']['report_type'] == 'Followup') {
                    echo "<br> Initial: ";
                    echo $this->Html->link(
                      '<label class="label label-info">'.substr($device['Device']['reference_no'], 0, strpos($device['Device']['reference_no'], '_')).'</label>', 
                      array('action' => 'view', $device['Device']['device_id']), array('escape' => false));
                  }
              ?>&nbsp;
        </td>
        <td><?php echo h($device['Device']['brand_name']); ?>&nbsp;</td>
        <td><?php echo h($device['Device']['patient_name']); ?>&nbsp;</td>
        <td><?php echo h($device['Device']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php 
              if($device['Device']['submitted'] > 1) {
                echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                  array('controller' => 'devices', 'action' => 'view', $device['Device']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'reporter') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> Followup</span>', array('controller' => 'devices' , 'action' => 'followup', $device['Device']['id']), array('escape' => false), __('Add a followup report?'));           
                echo "&nbsp;";
                if($redir == 'manager' && $device['Device']['copied'] == 2) echo $this->Html->link('<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'devices', 'action' => 'edit', $device['Device']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $device['Device']['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'devices' , 'action' => 'copy', $device['Device']['id']), array('escape' => false), __('Create a clean copy to edit?'));
              } else {
                echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'devices', 'action' => 'edit', $device['Device']['id']),
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
  var adates = $('#DeviceStartDate, #DeviceEndDate').datepicker({
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
            var option = this.id == "DeviceStartDate" ? "minDate" : "maxDate",
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