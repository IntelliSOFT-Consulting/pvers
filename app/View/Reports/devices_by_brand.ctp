<?php
  $this->extend('/Reports/reports');
  $this->assign('devices-by-brand', 'active');
?>

<?php $this->start('report'); ?>
<div id="devices-by-brand"></div>

<hr>
<h4>Raw Data</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Device brand</th>
            <th>Medical devices</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['ListOfDevice']['brand_name']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('devices-by-brand', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Devices by Brand'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Devices by Brand'
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
