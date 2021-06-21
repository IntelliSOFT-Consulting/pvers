<?php
    $this->assign('PQMP', 'active');
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
      if($this->Session->read('Auth.User.user_type') != 'Public Health Program') echo $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> New PQMP',
               array('controller' => 'pqmps', 'action' => 'add'),
               array('escape' => false, 'class' => 'btn btn-success'));
    ?>
    </div>
  </div>
    <hr>
    <?php } ?>

    <div class="marketing">
      <div class="row-fluid">
            <div class="span12">
              <h3>PQMP:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>
              <hr class="soften" style="margin: 7px 0px;">
            </div>
        </div>
    </div>

    <?php
        echo $this->Form->create('Pqmp', array(
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
                      'placeholder' => 'pqmp/2020',
                      'class' => 'input', 'label' => array('class' => 'required', 'text' => 'Reference No.'))
                );
              ?>
            </td>
            <td>
              <?php
                echo $this->Form->input('brand_name',
                    array(
                      'div' => false,
                      'placeholder' => 'rash',
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
                echo $this->Form->input('facility_name',
                    array(
                      'div' => false, 'placeholder' => 'facility',
                      'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Faciliy'))
                );
              ?>
            </td>
            <td>
                <?php
                  echo $this->Form->input('supplier_name',
                      array(
                        'div' => false,
                        'placeholder' => 'rash',
                        'class' => 'unauthorized_index span10', 'label' => array('class' => 'required', 'text' => 'Supplier name'))
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
                  echo $this->Form->input('generic_name',
                      array('div' => false, 'placeholder' => 'Generic name',
                        'class' => 'input', 'label' => array('class' => 'required', 'text' => 'Generic Name')));
              ?>
              </td>
              <td>
              <?php
                  echo $this->Form->input('name_of_manufacturer',
                      array('div' => false, 'placeholder' => 'Manufacturer', 'class' => 'input-small unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Manufacturer')));
              ?>
              </td>
              <td colspan="2">
                <h5>Product</h5>
                <?php
                    echo $this->Form->input('medicinal_product', array('label' => 'Medicinal', 'hiddenField' => false));
                    echo $this->Form->input('blood_products', array('label' => 'Blood product', 'hiddenField' => false));
                    echo $this->Form->input('product_vaccine', array('label' => 'Vaccine', 'hiddenField' => false));
                ?>
              </td>
              <td>                
                <h5>Category</h5>
                <?php
                    echo $this->Form->input('herbal_product', array('label' => 'Herbal product', 'hiddenField' => false));
                    echo $this->Form->input('medical_device', array('label' => 'Medical device', 'hiddenField' => false));
                    echo $this->Form->input('cosmeceuticals', array('label' => 'Cosmeceuticals', 'hiddenField' => false));
                ?>
              </td>
              <td>
                <?php
                    echo $this->Form->input('product_other', array('label' => 'Other', 'hiddenField' => false));
                    echo $this->Form->input('product_specify', array('label' => false, 'class' => 'input-small', 'placeholder' => '(specify)'));
                ?>
              </td>
              <td>                
                <?php
                  echo $this->Form->input('country_id',
                      array(
                        'div' => false, 'empty' => true,
                        'class' => 'input-small', 'label' => array('class' => 'required', 'text' => 'Country'))
                  );
                ?>
              </td>              
          </tr>
          <tr>
            <td>                   
              <?php
                  echo $this->Form->input('product_formulation', array('type' => 'select',
                    'empty' => true, 'class' => 'input',
                    'options' => array('Oral tablets / capsules' => 'Oral tablets / capsules',
                      'Oral suspension / syrup' => 'Oral suspension / syrup', 
                      'Injection' => 'Injection',
                      'Diluent' => 'Diluent',
                      'Powder for Reconstitution of Suspension' => 'Powder for Reconstitution of Suspension',
                      'Powder for Reconstitution of Injection' => 'Powder for Reconstitution of Injection',
                      'Eye drops' => 'Eye drops',
                      'Ear drops' => 'Ear drops',
                      'Nebuliser solution' => 'Nebuliser solution',
                      'Cream / Ointment / Liniment / Paste' => 'Cream / Ointment / Liniment / Paste',
                      'Other' => 'Other'),
                    'label' => array('class' => 'required', 'text' => 'Product formulation')
                  ));
              ?>          
            </td>
            <td>
              <h5>Complaint</h5> 
               <?php
                  echo $this->Form->input('colour_change', array('label' => 'Colour change', 'hiddenField' => false));
                  echo $this->Form->input('separating', array('label' => 'Separating', 'hiddenField' => false));
                  echo $this->Form->input('powdering', array('label' => 'Powdering / crumbling', 'hiddenField' => false));
                  echo $this->Form->input('caking', array('label' => 'Caking', 'hiddenField' => false));
                  echo $this->Form->input('moulding', array('label' => 'Moulding', 'hiddenField' => false));
                ?>
            </td>
            <td>
              <?php
                  echo $this->Form->input('odour_change', array('label' => 'Change of odour', 'hiddenField' => false));
                  echo $this->Form->input('mislabeling', array('label' => 'Mislabeling', 'hiddenField' => false));
                  echo $this->Form->input('incomplete_pack', array('label' => 'Incomplete pack', 'hiddenField' => false));
                  echo $this->Form->input('therapeutic_ineffectiveness', array('label' => 'Therapeutic ineffectiveness', 'hiddenField' => false));
                  echo $this->Form->input('particulate_matter', array('label' => 'Particulate matter', 'hiddenField' => false));
                  echo $this->Form->input('complaint_other', array('label' => 'Other', 'hiddenField' => false));
              ?>
            </td>
            <td>
              <h5>Medical Device</h5>
                <?php
                  echo $this->Form->input('packaging', array('label' => 'Packaging', 'hiddenField' => false));
                  echo $this->Form->input('labelling', array('label' => 'Labelling', 'hiddenField' => false));
                  echo $this->Form->input('sampling', array('label' => 'Sampling', 'hiddenField' => false));
                  echo $this->Form->input('mechanism', array('label' => 'Mechanism', 'hiddenField' => false));
                  echo $this->Form->input('electrical', array('label' => 'Electrical', 'hiddenField' => false));
                ?>
            </td>
            <td>
              <?php
                  echo $this->Form->input('device_data', array('label' => 'Data', 'hiddenField' => false));
                  echo $this->Form->input('software', array('label' => 'Software', 'hiddenField' => false));
                  echo $this->Form->input('environmental', array('label' => 'Environmental', 'hiddenField' => false));
                  echo $this->Form->input('results', array('label' => 'Results', 'hiddenField' => false));
                  echo $this->Form->input('readings', array('label' => 'Readings', 'hiddenField' => false));
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
          </tr>
          <tr>
              <td><label for="PqmpPages" class="required">Pages</label></td>
              <td>                
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Pqmp']['limit'],
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
                showing <span class="badge">{:current}</span> PQMPs out of
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
        <th><?php echo $this->Paginator->sort('brand_name'); ?></th>
        <th><?php echo $this->Paginator->sort('reporter_date', 'Date reported'); ?></th>
        <th><?php echo $this->Paginator->sort('modified', 'Date modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
          </tr>
       </thead>
      <tbody>
    <?php
    foreach ($pqmps as $pqmp): ?>
    <tr class="">
        <td><?php echo h($pqmp['Pqmp']['id']); ?>&nbsp;</td>
        <td>
          <?php 
            // echo h($pqmp['Pqmp']['reference_no']); 
            if($pqmp['Pqmp']['submitted'] > 1) {
              // echo $this->Html->link($pqmp['Pqmp']['reference_no'], array('action' => 'view', $pqmp['Pqmp']['id']), array('escape'=>false));
              echo $this->Html->link($pqmp['Pqmp']['reference_no'], array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id']),
                              array('escape' => false, 'class' => 'text-'.((in_array($pqmp['Pqmp']['product_formulation'], ['Injection', 'Powder for Reconstitution of Injection', 'Eye drops', 'Nebuliser solution']) 
                                || $pqmp['Pqmp']['therapeutic_ineffectiveness'] || $pqmp['Pqmp']['particulate_matter']) ? 'error' : 'success'))); 
            } else {
              echo $this->Html->link($pqmp['Pqmp']['reference_no'], array('action' => (($redir == 'reporter') ? 'edit' : 'view'), $pqmp['Pqmp']['id']), array('escape'=>false));
            }
        ?>&nbsp;</td>
        <td><?php echo h($pqmp['Pqmp']['brand_name']); 
              ?>&nbsp;
        </td>
        <td><?php echo h($pqmp['Pqmp']['reporter_date']); ?>&nbsp;</td>
        <td><?php echo h($pqmp['Pqmp']['modified']); ?>&nbsp;</td>
        <td class="actions">
          <?php 
              if($pqmp['Pqmp']['submitted'] > 1) {
                echo $this->Html->link('<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                  array('controller' => 'pqmps', 'action' => 'view', $pqmp['Pqmp']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $pqmp['Pqmp']['copied'] == 2) echo $this->Html->link('<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'pqmps', 'action' => 'edit', $pqmp['Pqmp']['id']),
                  array('escape' => false));
                echo "&nbsp;";
                if($redir == 'manager' && $pqmp['Pqmp']['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'pqmps' , 'action' => 'copy', $pqmp['Pqmp']['id']), array('escape' => false), __('Create a clean copy to edit?'));
              } else {
                if($redir == 'reporter' and $this->Session->read('Auth.User.user_type') != 'Public Health Program') echo $this->Html->link('<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>' ,
                  array('controller' => 'pqmps', 'action' => 'edit', $pqmp['Pqmp']['id']),
                  array('escape' => false));
              }
              echo "&nbsp;";
              echo $this->Html->link('<span class="label label-default tooltipper" title="View"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </span>',
                  array('action' => 'view', 'ext'=> 'pdf', $pqmp['Pqmp']['id']),
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
  var adates = $('#PqmpStartDate, #PqmpEndDate').datepicker({
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
            var option = this.id == "PqmpStartDate" ? "minDate" : "maxDate",
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