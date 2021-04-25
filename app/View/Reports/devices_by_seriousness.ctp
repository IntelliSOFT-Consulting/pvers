<?php
  $this->extend('/Reports/reports');
  $this->assign('devices-by-seriousness', 'active');
?>

<?php $this->start('report'); ?>
<div id="devices-by-seriousness"></div>

<hr>
<h4>Medical Devices by Seriousness</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Seriousness</th>
            <th>ADRs</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['Device']['serious']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('devices-by-seriousness', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Medical Devices by Seriousness'
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
