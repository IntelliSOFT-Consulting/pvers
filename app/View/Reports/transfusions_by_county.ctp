<?php
  $this->extend('/Reports/reports');
  $this->assign('transfusions-by-county', 'active');
?>

<?php $this->start('report'); ?>
<div id="transfusions-by-county"></div>

<hr>
<h4>Raw Data</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>County</th>
            <th>Blood Transfusions</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['County']['county_name']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('transfusions-by-county', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'bar'
    },
    title: {
        text: 'County'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Units'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
</script>
<?php $this->end(); ?>
