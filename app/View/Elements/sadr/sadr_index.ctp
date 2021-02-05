<?php
    $this->assign('SADR', 'active');
?>

   
  <?php
    echo $this->Session->flash();
    // debug($this->request->query);
  ?>
  <div class="row-fluid">
    <div class="span12">
    <?php
      if ($redir == 'reporter') {
        echo $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> New SADR',
                 array('controller' => 'sadrs', 'action' => 'add'),
                 array('escape' => false, 'class' => 'btn btn-success'));
      }
    ?>
    <h3>Suspected ADRs:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>  <hr class="soften" style="margin: 7px 0px;">
    </div>
  </div>

<div class="row-fluid">
  <div class="span12">
    <?php
        echo $this->Form->create('Sadr', array(
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
                      'placeholder' => 'sadr/2020',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Reference No.'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('report_title',
                    array(
                      'div' => false,
                      'placeholder' => 'rash',
                      'class' => 'unauthorized_index span10', 'label' => array('class' => 'required', 'text' => 'Report Title'))
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
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Institution'))
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
                  echo $this->Form->input('drug_name',
                      array('div' => false, 'placeholder' => 'drug name',
                        'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Drug Name')));
              ?>
              </td>
              <td>
              <?php
                  echo $this->Form->input('medicine_name',
                      array('div' => false, 'placeholder' => 'drug name', 'class' => 'input-small unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Medicine Name')));
              ?>
              </td>
              <td colspan="2">
                <h5>Report on:</h5>
                <?php
                    echo $this->Form->input('report_sadr', array('label' => 'SADR', 'hiddenField' => false));
                    echo $this->Form->input('report_therapeutic', array('label' => 'Therapeutic Ineffectiveness', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <h5>Product</h5>
                <?php
                    echo $this->Form->input('medicinal_product', array('label' => 'Medicinal', 'hiddenField' => false));
                    echo $this->Form->input('blood_products', array('label' => 'Blood product', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <h5>category</h5>
                <?php
                    echo $this->Form->input('herbal_product', array('label' => 'Herbal product', 'hiddenField' => false));
                    echo $this->Form->input('cosmeceuticals', array('label' => 'Cosmeceuticals', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('product_other', array('label' => 'Other', 'hiddenField' => false));
                    echo $this->Form->input('product_specify', array('label' => false, 'class' => 'input-small', 'placeholder' => '(specify)'));
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
                echo $this->Form->input('serious_reason', array('type' => 'select',
                  'empty' => true, 'class' => 'span12',
                  'options' => array('Hospitalization/ Prolonged Hospitalization' => 'Hospitalization',
                    'Disability' => 'Disability', 
                    'Congenital anomality' => 'Congenital anomality',
                    'Life threatening' => 'Life threatening',
                    'Death' => 'Death'),
                  'label' => array('class' => 'required', 'text' => 'Seriousness Criteria')
                  ));
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('outcome', array('type' => 'select',
                  'empty' => true, 'class' => 'input-small',
                  'options' => array('recovered/resolved' => 'Recovered/resolved',
                    'recovering/resolving' => 'Recovering/resolving', 
                    'recovered/resolved with sequelae' => 'Recovered/resolved with sequelae',
                    'not recovered/not resolved' => 'Not recovered/not resolved',
                    'fatal - unrelated to reaction' => 'Fatal - unrelated to reaction',
                    'fatal - reaction may be contributory' => 'Fatal - reaction may be contributory',
                    'fatal - due to reaction' => 'Fatal - due to reaction',
                    'Unknown' => 'Unknown'),
                  'label' => array('class' => 'required', 'text' => 'Outcome')
                  ));
              ?>
            </td>
            <td>
              <?php
                  echo $this->Form->input('reporter',
                      array('div' => false, 'class' => 'input-small unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Reporter'), 'placeholder' => 'Name/Email'));
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
              <td><label for="SadrPages" class="required">Pages</label></td>
              <td>                
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Sadr']['limit'],
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
                showing <span class="badge">{:current}</span> SADRs out of
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
        <th><?php echo $this->Paginator->sort('patient_name'); ?></th>
        <?php if($redir == 'manager') { ?><th><?php echo $this->Paginator->sort('vigiflow_ref'); ?></th> <?php } ?>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
       </thead>
      <tbody>
    <?php
    foreach ($sadrs as $sadr): ?>
    <tr class="">
        <td><?php echo h($sadr['Sadr']['id']); ?>&nbsp;</td>
        <td>
          <?php 
            // echo h($sadr['Sadr']['reference_no']);             
            if($sadr['Sadr']['submitted'] > 1) {
              echo $this->Html->link($sadr['Sadr']['reference_no'], array('action' => 'view', $sadr['Sadr']['id']), array('escape'=>false, 'class' => 'text-'.((isset($sadr['Sadr']['serious']) && $sadr['Sadr']['serious'] == 'Yes') ? 'error' : 'success')));
            } else {
              echo $this->Html->link($sadr['Sadr']['reference_no'], array('action' => (($redir == 'reporter') ? 'edit' : 'view'), $sadr['Sadr']['id']), array('escape'=>false, 'class' => 'text-'.((isset($sadr['Sadr']['serious']) && $sadr['Sadr']['serious'] == 'Yes') ? 'error' : 'success')));
            }
        ?>&nbsp;</td>
        <td><?php 
              echo $this->Text->truncate($sadr['Sadr']['report_title'], 42); 
                if($sadr['Sadr']['report_type'] == 'Followup') {
                  echo "<br> Initial: ";
                  echo $this->Html->link(
                    '<label class="label label-info">'.substr($sadr['Sadr']['reference_no'], 0, strpos($sadr['Sadr']['reference_no'], '_')).'</label>', 
                    array('action' => 'view', $sadr['Sadr']['sadr_id']), array('escape' => false));
                }
              ?>&nbsp;
        </td>
        <td><?php echo h($sadr['Sadr']['patient_name']); ?>&nbsp;</td>
        <?php if($redir == 'manager') { ?><td><?php echo h($sadr['Sadr']['vigiflow_ref']); echo "\n".$sadr['Sadr']['vigiflow_date']; ?></td> <?php } ?>
        <td><?php echo h($sadr['Sadr']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php 
              if($sadr['Sadr']['submitted'] > 1) {
                echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                  array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'reporter') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> Followup </span>', array('controller' => 'sadrs' , 'action' => 'followup', $sadr['Sadr']['id']), array('escape' => false), __('Add a followup report?'));
                echo "&nbsp;";
                if($redir == 'manager') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Download E2B file"> <i class="fa fa-etsy" aria-hidden="true"></i> 2 <i class="fa fa-bold" aria-hidden="true"></i> </span>', array('controller' => 'sadrs' , 'action' => 'download', $sadr['Sadr']['id'], 'ext' => 'xml', 'manager' => false), array('escape' => false), __('Download E2B?'));
                echo "&nbsp;";
                if($redir == 'manager' && empty($sadr['Sadr']['vigiflow_ref']) && $sadr['Sadr']['copied'] == 2) echo $this->Html->link('<span class="label label-warning tooltipper" title="Send to vigiflow"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Vigiflow </span>' ,
                  array('controller' => 'sadrs', 'action' => 'vigiflow', $sadr['Sadr']['id'], 'manager' => false),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $sadr['Sadr']['copied'] == 2) echo $this->Html->link('<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'sadrs', 'action' => 'edit', $sadr['Sadr']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $sadr['Sadr']['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'sadrs' , 'action' => 'copy', $sadr['Sadr']['id']), array('escape' => false), __('Create a clean copy to edit?'));
              } else {
                if($redir == 'reporter') echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'sadrs', 'action' => 'edit', $sadr['Sadr']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager') echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                    array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id']),
                    array('escape' => false));
              }
              echo "&nbsp;";
              echo $this->Html->link('<span class="label label-default tooltipper" title="View"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </span>',
                  array('controller' => 'sadrs', 'action' => 'view', 'ext'=> 'pdf', $sadr['Sadr']['id']),
                  array('escape' => false));
               
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
  var adates = $('#SadrStartDate, #SadrEndDate').datepicker({
          minDate:"-100Y",
          maxDate:"-0D",
          dateFormat:'dd-mm-yy',
          format: 'dd-mm-yy',
          endDate: '-0d',
          showButtonPanel:true,
          changeMonth:true,
          changeYear:true,
          showAnim:'show',
          onSelect: function( selectedDate ) {
            var option = this.id == "SadrStartDate" ? "minDate" : "maxDate",
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