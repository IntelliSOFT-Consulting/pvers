<?php
  $this->extend('/Reports/reports');
  $this->assign('devices-by-age', 'active');
?>

<?php $this->start('report'); ?>
<div id="devices-by-age"></div>

<hr>
<h4>DEVICES by Age group</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Age group</th>
            <th>DEVICES</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value[0]['ager']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('devices-by-age', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'DEVICES by Age group'
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
