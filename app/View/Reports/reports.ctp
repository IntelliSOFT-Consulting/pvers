<?php
$this->assign('Reports', 'active');
echo $this->Session->flash();
// $this->Html->css('comments', null, array('inline' => false));
$this->Html->script('highcharts/highcharts', array('inline' => false));
$this->Html->script('highcharts/modules/data', array('inline' => false));
if ($this->Session->read('Auth.User.group_id') === '2') $this->Html->script('highcharts/modules/exporting', array('inline' => false));
if ($this->Session->read('Auth.User.group_id') === '2') $this->Html->script('highcharts/modules/export-data', array('inline' => false));
?>


<div class="row-fluid">
  <?php if (!$is_mobile) { ?>
    <div class="span2">
      <?php

      if ($this->Session->read('Auth.User.user_type') == 'County Pharmacist') {
        echo $this->element('menus/report_county_sidebar');
      } elseif ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
        echo $this->element('menus/report_program_sidebar');
      } elseif ($this->Session->read('Auth.User.group_id') == 3) {
        echo $this->element('menus/report_public_sidebar');
      } elseif (!$this->Session->read('Auth.User')) {
        echo $this->element('menus/report_public_sidebar');
      } else {
        echo $this->element('menus/report_sidebar');
      }

      ?>
    </div>
  <?php } ?>

  <div class="span10">
    <?php
    echo $this->Form->create('Report', array(
      // 'url' => array_merge(array('action' => 'index'), $this->params['pass']),
      'class' => 'ctr-groups', 'style' => array('padding:9px;', 'background-color: #F5F5F5'),
    ));
    ?>
    <table class="table table-condensed" style="margin-bottom: 2px;">
      <tbody>

        <!-- OLD FORMAT -->
        <tr>
          <td>
            <?php
            echo $this->Form->input(
              'start_date',
              array(
                'div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index', 'after' => '-to-',
                'label' => array('class' => 'required', 'text' => 'Report Dates'), 'placeHolder' => 'Start Date'
              )
            );
            echo $this->Form->input(
              'end_date',
              array(
                'div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index',
                'after' => '<a style="font-weight:normal" onclick="$(\'.unauthorized_index\').val(\'\');" >
                                  <em class="accordion-toggle">clear!</em></a>',
                'label' => false, 'placeHolder' => 'End Date'
              )
            );

            ?>
          </td>

          <td>
            <?php
            echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
              'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
              'formnovalidate' => 'formnovalidate',
              'style' => array('margin-bottom: 5px')
            ));
            ?>
          </td>
        </tr>
        <!-- END OF OLD FORMAT -->
        <tr>
          <!-- Report by Title -->
          <td>
            <?php
            echo $this->Form->input(
              'report_title',
              array(
                'div' => false, 'type' => 'text', 'class' => 'span4 unauthorized_index',
                'label' => array('class' => 'required', 'text' => 'Report Title'), 'placeHolder' => 'Report Title'
                // add clear button to clear the input field

              )
            );
            // county dropdown 
            echo $this->Form->input(
              'county_id',
              //select by simple click
              array(
                'div' => false, 'type' => 'select', 'class' => 'span4 unauthorized_index',
                // add a id to the select element
                'id' => 'county_id', 
                // 'multiple' => 'multiple',
                'label' => array('class' => 'required', 'text' => 'County'), 'empty' => true,
                'options' => $counties, 'default' => $this->Session->read('Auth.User.county_id')
              
              // array(
              //   'div' => true,
              //   'type' => 'select', 
              //   'multiple' => 'multiple',
              //   'class' => 'span4 unauthorized_index',
              //   'label' => array('class' => 'required', 'text' => 'County'), 'options' => $counties 
              //   //popup to select multiple counties


              )
            );


            ?>
          </td>
        </tr>
      </tbody>
    </table>
    <?php echo $this->Form->end(); ?>
    <hr>

    <?php echo $this->fetch('report'); ?>
  </div>


  <?php if ($is_mobile) { ?>
    <div class="span2">
      <?php

      if ($this->Session->read('Auth.User.user_type') == 'County Pharmacist') {
        echo $this->element('menus/report_county_sidebar');
      } elseif ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
        echo $this->element('menus/report_program_sidebar');
      } elseif ($this->Session->read('Auth.User.group_id') == 3) {
        echo $this->element('menus/report_public_sidebar');
      } elseif (!$this->Session->read('Auth.User')) {
        echo $this->element('menus/report_public_sidebar');
      } else {
        echo $this->element('menus/report_sidebar');
      }

      ?>
    </div>
  <?php } ?>
</div> 
  
<!-- JavaScript Bundle with Popper --> 
<script type="text/javascript">
  
  $(function() {
    var adates = $('#ReportStartDate, #ReportEndDate').datepicker({
      minDate: "-100Y",
      maxDate: "-0D",
      dateFormat: 'dd-mm-yy',
      format: 'dd-mm-yyyy',
      endDate: '-0d',
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,
      showAnim: 'show',
      onSelect: function(selectedDate) {
        var option = this.id == "ReportStartDate" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(
            instance.settings.dateFormat ||
            $.datepicker._defaults.dateFormat,
            selectedDate, instance.settings);
        adates.not(this).datepicker("option", option, date);
      }
    });

  });
</script>