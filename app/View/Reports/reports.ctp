<?php
  $this->assign('Reports', 'active');        
  echo $this->Session->flash();
  // $this->Html->css('comments', null, array('inline' => false));
  $this->Html->script('highcharts/highcharts', array('inline' => false));
  $this->Html->script('highcharts/modules/data', array('inline' => false));
  $this->Html->script('highcharts/modules/exporting', array('inline' => false));
  $this->Html->script('highcharts/modules/export-data', array('inline' => false));
?>


<div class="row-fluid">
    <div class="span2">
        <?php echo $this->element('menus/report_sidebar'); ?>
    </div>
    <div class="span10">
        <?php
            echo $this->Form->create('Report', array(
              // 'url' => array_merge(array('action' => 'index'), $this->params['pass']),
              'class' => 'ctr-groups', 'style'=>array('padding:9px;', 'background-color: #F5F5F5'),
            ));
          ?>
        <table class="table table-condensed" style="margin-bottom: 2px;">
            <tbody>
              <tr>
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
                      echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                          'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
                          'formnovalidate' => 'formnovalidate',
                          'style' => array('margin-bottom: 5px')
                      ));
                    ?>
                </td>
              </tr>
            </tbody>
        </table>
        <?php echo $this->Form->end(); ?>
        <hr>
        
        <?php echo $this->fetch('report'); ?>
    </div>
</div>

<script type="text/javascript">
$(function() {
  var adates = $('#ReportStartDate, #ReportEndDate').datepicker({
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
            var option = this.id == "ReportStartDate" ? "minDate" : "maxDate",
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