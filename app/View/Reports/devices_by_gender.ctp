<?php
  $this->extend('/Reports/reports');
  $this->assign('devices-by-gender', 'active');
?>

<?php $this->start('report'); ?>
<div id="devices-by-gender"></div>

<hr>
<h4>Device by Sex</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Sex</th>
            <th>Medical Devices</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['Device']['gender']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('devices-by-gender', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Device by Sex'
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
