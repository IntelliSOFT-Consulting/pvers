<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<?php
$this->assign('Summaries', 'active');
$this->Html->script('home', array('inline' => false));
$this->Html->script('holder/holder', array('inline' => false));
$this->Html->css('landing', false, array('inline' => false));
$this->Html->css('upgrade', false, array('inline' => false));
$this->Html->css('summary', null, array('inline' => false));
$this->Html->script('highcharts/highcharts', array('inline' => false));
$this->Html->script('highcharts/modules/data', array('inline' => false));


?>

<div class="container marketing" id="landing">
  <h5 style="margin-left: 20px;"><b>Note:</b> Result is presented for an active ingredient </h5>
  <div class="inner_section_drugs">
    <div class="launch">
      <?php
      echo $this->Form->create('Report', array('url' => array('controller' => 'reports', 'action' => 'landing')));
      ?>
      <table class="table table-condensed" style="margin-bottom: 2px;">
        <tbody>
          <tr>
            <div class="card">
              <div class="card-body">
                <td style="width: 70%;">

                  <?php
                  echo $this->Form->input(
                    'vaccine_name',
                    array(
                      'div' => false, 'type' => 'text', 'class' => 'input-large vaccine_name', 'after' => '',
                      'label' => array('class' => 'required', 'text' => ''), 'placeHolder' => 'Enter the name of the drug',
                      'after' => '<a style="font-weight:normal" onclick="$(\'.vaccine_name\').val(\'\');" ><em class="accordion-toggle">clear!</em></a>',

                    )
                  );
                  ?>
                </td>

                <td>
                  <?php
                  echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                    'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
                    // disable the submit button
                    'disabled' => true, 'id' => 'submit',
                    'style' => array('margin-bottom: 5px')
                  ));
                  ?>

                </td>
              </div>
            </div>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- check id session has results -->
  <?php if ($this->Session->check('results')) : ?>
    <?php
    $results = $this->Session->read('results');
    if ($results) { ?>
      <div class="inner_section_drugs">
        <div class="launch">
          <table class="table table-condensed" style="margin-bottom: 2px;">
            <tbody>
              <tr>
                <td style="width: 70%;">
                  <?php echo  'There are ' . $count . ' reports with this active ingedient <b>' . $vaccine . ' </b>' ?>

                </td>
              </tr>
              <tr>
                <td>
                  <h3>Reported Potential side effects</h3>
                </td>
              </tr>
              <!-- check if data is not empty  -->
              <?php if (!empty($data)) : ?>

                <?php foreach ($data as $key => $dt) : ?>
                  <tr>
                    <td>

                      <p style="text-align: left;"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><?php echo $key . ' (' . $dt . ' ADR(s) )' ?> </p>
                    </td>
                  <tr>

                  <?php endforeach; ?>
                  <!-- add esle statemet -->
                <?php else : ?>
                  <tr>
                    <td>
                      <div class="alert alert-info">
                        <p style="text-align: left;"> <strong>Info!</strong> No data found</p>
                      </div>
                    </td>
                  </tr>

                <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <?php if (!empty($data)) : ?>
        <div class="row-fluid">

          <div class="span6">
            <div class="inner_section_drugs">
              <div class="launch">
                <h4>Geographical Distribution</h4>
                <div class="tabs">
                  <ul style="background-color: transparent;">
                    <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-chart"><i class="fa fa-pie-chart"></i>Chart</a></li>
                    <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-table"><i class="fa fa-table"></i>Table</a></li>
                  </ul>
                  <div id="tabs-chart">
                    <div id="sadrs-by-county"></div>
                  </div>
                  <div id="tabs-table">
                    <table class="table table-condensed table-bordered" id="datatable8">
                      <thead>
                        <tr>
                          <th>County</th>
                          <th>ADRs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($county as $key => $value) {
                          echo "<tr>";
                          echo "<th>" . $value['County']['county_name'] . "</th>";
                          echo "<td>" . $value[0]['cnt'] . "</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>

                </div>


              </div>
            </div>
          </div>
          <div class="span6">
            <div class="inner_section_drugs">
              <div class="launch">
                <h4>Patient Sex Distribution</h4>
                <div class="tabs">
                  <ul style="background-color: transparent;">
                      <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-chart"><i class="fa fa-pie-chart"></i>Chart</a></li>
                      <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-table"><i class="fa fa-table"></i>Table</a></li>
                  </ul>
                  <div id="tabs-chart">
                    <div id="sadrs-by-gender"></div>
                  </div>
                  <div id="tabs-table">

                    <table class="table table-condensed table-bordered" id="sex">
                      <thead>
                        <tr>
                          <th>Sex</th>
                          <th>ADRs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($sex as $key => $value) {
                          echo "<tr>";
                          echo "<th>" . $value['Sadr']['gender'] . "</th>";
                          echo "<td>" . $value[0]['cnt'] . "</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span6">
            <div class="inner_section_drugs">
              <div class="launch">
                <h4>Age Distribution</h4>
                <div class="tabs">
                  <ul style="background-color: transparent;">
                      <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-chart"><i class="fa fa-pie-chart"></i>Chart</a></li>
                      <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-table"><i class="fa fa-table"></i>Table</a></li>
                  </ul>
                  <div id="tabs-chart">
                    <div id="sadrs-by-age"></div>
                  </div>
                  <div id="tabs-table">
                    <table class="table table-condensed table-bordered" id="age">
                      <thead>
                        <tr>
                          <th>Age group</th>
                          <th>ADRs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($age as $key => $value) {
                          echo "<tr>";
                          echo "<th>" . $value[0]['ager'] . "</th>";
                          echo "<td>" . $value[0]['cnt'] . "</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="span6">
            <div class="inner_section_drugs">
              <div class="launch">
                <h4>ADRs Per Year</h4>
                <div class="tabs">
                  <ul style="background-color: transparent;">
                      <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-chart"><i class="fa fa-pie-chart"></i>Chart</a></li>
                      <li style="background-color: #d3d3d3;  border: none;"><a href="#tabs-table"><i class="fa fa-table"></i>Table</a></li>
                  </ul>
                  <div id="tabs-chart">
                    <div id="sadrs-by-year"></div>

                  </div>
                  <div id="tabs-table">

                    <table class="table table-condensed table-bordered" id="year">
                      <thead>
                        <tr>
                          <th>Year</th>
                          <th>ADRs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($year as $key => $value) {
                          echo "<tr>";
                          echo "<th>" . $value[0]['year'] . "</th>";
                          echo "<td>" . $value[0]['cnt'] . "</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php else : ?>
        <div style="min-height: 360px;"></div>

      <?php endif; ?>

    <?php } else { ?>
      <!-- show div with min height 360px -->
      <div style="min-height: 420px;"></div>

    <?php } ?>

  <?php endif; ?>

</div>

<!-- add script to autocomplete the vaccine name -->
<script type="text/javascript">
  $(document).ready(function() {

    // check is vaccine_name is empty
    if ($('.vaccine_name').val() == '') {
      // disable the submit button
      $('#submit').prop('disabled', true);
    } else {
      // enable the submit button
      $('#submit').prop('disabled', false);
    }

    $(".vaccine_name").autocomplete({
      source: "<?php echo $this->webroot; ?>drug_dictionaries/autocomplete",
      minLength: 2,
      select: function(event, ui) {
        //show a spinner or something via css
        $(this).addClass('loading');

        // set the value of the input to the selected value
        $(this).val(ui.item.value);

      }
    });

    //  when vaccine_name text box is changed
    $('.vaccine_name').change(function() {
      // check if the value is not empty
      if ($(this).val() != '') {
        // enable the submit button
        $('#submit').prop('disabled', false);
      } else {
        // disable the submit button
        $('#submit').prop('disabled', true);
      }
    });

  });
</script>

<script type="text/javascript">
  $(function() {
    $(".tabs").tabs();
  });

  Highcharts.chart('sadrs-by-county', {
    data: {
      table: 'datatable8'
    },
    chart: {
      type: 'bar'
    },
    title: {
      text: ''
    },
    yAxis: {
      allowDecimals: false,
      title: {
        text: 'Units'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '</b><br/>' +
          this.point.y + ' ' + this.point.name.toLowerCase();
      }
    }
  });

  Highcharts.chart('sadrs-by-year', {
    colors: ['#66CDAA', '#00FA9A', '#00FF7F', '#3CB371', '#2E8B57', '#F5FFFA', '#00FF00', '#32CD32', '#98FB98', '#90EE90', '#8FBC8F', '#00FF7F', '#3CB371', '#2E8B57', '#228B22', '#008000', '#556B2F', '#66CDAA', '#8FBC8F', '#20B2AA', '#2E8B57', '#008080', '#008B8B', '#00CED1', '#7FFFD4', '#B0E0E6', '#5F9EA0', '#4682B4', '#B0C4DE', '#778899', '#48D1CC', '#20B2AA', '#40E0D0', '#7FFFD4', '#006400', '#9ACD32', '#6B8E23', '#808000', '#556B2F', '#6B8E23', '#808000', ],
    data: {
      table: 'year'
    },
    chart: {
      type: 'column'
    },
    title: {
      text: ''
    },
    yAxis: {
      allowDecimals: false,
      title: {
        text: 'Units'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '</b><br/>' +
          this.point.y + ' ' + this.point.name.toLowerCase();
      }
    }
  });
  Highcharts.chart('sadrs-by-gender', {
    colors: ['#556B2F', '#66CDAA', '#8FBC8F', '#20B2AA', '#2E8B57', '#008080', '#008B8B', '#00CED1', '#7FFFD4', '#B0E0E6', '#5F9EA0', '#4682B4', '#B0C4DE', '#778899', '#48D1CC', '#20B2AA', '#40E0D0', '#7FFFD4', '#66CDAA', '#00FA9A', '#00FF7F', '#3CB371', '#2E8B57', '#F5FFFA', '#00FF00', '#32CD32', '#98FB98', '#90EE90', '#8FBC8F', '#00FF7F', '#3CB371', '#2E8B57', '#228B22', '#008000', '#006400', '#9ACD32', '#6B8E23', '#808000', '#556B2F', '#6B8E23', '#808000', ],
    data: {
      table: 'sex'
    },
    chart: {
      type: 'pie'
    },
    title: {
      text: ''
    },
    yAxis: {
      allowDecimals: false,
      title: {
        text: 'Units'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '</b><br/>' +
          this.point.y + ' ' + this.point.name.toLowerCase();
      }
    }
  });
  Highcharts.chart('sadrs-by-age', {
    // change the display color of the chart from a list of dim gray to light purple
    colors: ['#48D1CC', '#20B2AA', '#40E0D0', '#7FFFD4', '#66CDAA', '#00FA9A', '#00FF7F', '#3CB371', '#2E8B57', '#F5FFFA', '#00FF00', '#32CD32', '#98FB98', '#90EE90', '#8FBC8F', '#00FF7F', '#3CB371', '#2E8B57', '#228B22', '#008000', '#006400', '#9ACD32', '#6B8E23', '#808000', '#556B2F', '#6B8E23', '#808000', '#556B2F', '#66CDAA', '#8FBC8F', '#20B2AA', '#2E8B57', '#008080', '#008B8B', '#00CED1', '#7FFFD4', '#B0E0E6', '#5F9EA0', '#4682B4', '#B0C4DE', '#778899'],

    data: {
      table: 'age'
    },
    chart: {
      type: 'column'
    },
    title: {
      text: ''
    },
    yAxis: {
      allowDecimals: false,
      title: {
        text: 'Units'
      }
    },
    tooltip: {
      formatter: function() {
        return '<b>' + this.series.name + '</b><br/>' +
          this.point.y + ' ' + this.point.name.toLowerCase();
      }
    }
  });
</script>