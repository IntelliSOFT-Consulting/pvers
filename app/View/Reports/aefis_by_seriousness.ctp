<?php
  $this->extend('/Reports/reports');
  $this->assign('aefis-by-seriousness', 'active');
?>

<?php $this->start('report'); ?>
<div id="aefis-by-seriousness"></div>

<hr>
<h4>AEFIs by Seriousness</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Seriousness</th>
            <th>AEFIs</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value[0]['serious']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('aefis-by-seriousness', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'pie'
    },
    title: {
        text: 'AEFIs by Seriousness'
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
