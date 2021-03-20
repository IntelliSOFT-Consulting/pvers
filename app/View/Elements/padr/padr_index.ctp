<?php
    $this->assign('PADR', 'active');
?>

   
  <?php
    echo $this->Session->flash();
    // debug($this->request->query);
  ?>
  <div class="row-fluid">
    <div class="span12">
    <?php
      if ($redir == 'reporter') {
        echo $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> New PADR',
                 array('controller' => 'padrs', 'action' => 'add'),
                 array('escape' => false, 'class' => 'btn btn-success'));
      }
    ?>
    <h3>Public ADRs:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>  <hr class="soften" style="margin: 7px 0px;">
    </div>
  </div>

<div class="row-fluid">
  <div class="span12">
    <?php
        echo $this->Form->create('Padr', array(
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
                      'placeholder' => 'padr/2020',
                      'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Reference No.'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('drug_name',
                      array('div' => false, 'placeholder' => 'drug name',
                        'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Drug Name')));
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
                echo $this->Form->input('county_id',
                    array(
                      'div' => false, 'empty' => true,
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'County'))
                );
              ?>
            </td>
            <td>
                <?php
                  
                ?>
            </td>
            <td>
              <?php
                
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
                
              ?>
            </td>
            <td>
              <?php
                
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
              <td><label for="PadrPages" class="required">Pages</label></td>
              <td>                
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Padr']['limit'],
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
                showing <span class="badge">{:current}</span> PADRs out of
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
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
       </thead>
      <tbody>
    <?php
    foreach ($padrs as $padr): ?>
    <tr class="">
        <td><?php echo h($padr['Padr']['id']); ?>&nbsp;</td>
        <td>
          <?php 
            // echo h($padr['Padr']['reference_no']);             
              echo $this->Html->link($padr['Padr']['reference_no'], array('action' => 'view', $padr['Padr']['id']), array('escape'=>false));
        ?>&nbsp;</td>
        <td><?php 
              echo $this->Text->truncate($padr['Padr']['report_title'], 42); 
                if($padr['Padr']['report_type'] == 'Followup') {
                  echo "<br> Initial: ";
                  echo $this->Html->link(
                    '<label class="label label-info">'.substr($padr['Padr']['reference_no'], 0, strpos($padr['Padr']['reference_no'], '_')).'</label>', 
                    array('action' => 'view', $padr['Padr']['padr_id']), array('escape' => false));
                }
              ?>&nbsp;
        </td>
        <td><?php echo h($padr['Padr']['patient_name']); ?>&nbsp;</td>
        <td><?php echo h($padr['Padr']['created']); ?>&nbsp;</td>
        <td class="actions">
            <?php 
              if($padr['Padr']['submitted'] > 1) {
                echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                  array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'reporter') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> Followup </span>', array('controller' => 'padrs' , 'action' => 'followup', $padr['Padr']['id']), array('escape' => false), __('Add a followup report?'));
                echo "&nbsp;";
                if($redir == 'manager') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Download E2B file"> <i class="fa fa-etsy" aria-hidden="true"></i> 2 <i class="fa fa-bold" aria-hidden="true"></i> </span>', array('controller' => 'padrs' , 'action' => 'download', $padr['Padr']['id'], 'ext' => 'xml', 'manager' => false), array('escape' => false), __('Download E2B?'));
                echo "&nbsp;";
                if($redir == 'manager') echo $this->Html->link('<span class="label label-warning tooltipper" title="Send to vigiflow"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Vigiflow </span>' ,
                  array('controller' => 'padrs', 'action' => 'vigiflow', $padr['Padr']['id'], 'manager' => false),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager') echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'padrs', 'action' => 'edit', $padr['Padr']['id']),
                  array('escape' => false));
              } else {
                if($redir == 'reporter') echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'padrs', 'action' => 'edit', $padr['Padr']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager') echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                    array('controller' => 'padrs', 'action' => 'view', $padr['Padr']['id']),
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
  var adates = $('#PadrStartDate, #PadrEndDate').datepicker({
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
            var option = this.id == "PadrStartDate" ? "minDate" : "maxDate",
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