<?php
  $this->extend('/Reports/reports');
  $this->assign('aefis-by-vaccine', 'active');
?>

<?php $this->start('report'); ?>
<div id="aefis-by-vaccine"></div>

<hr>
<h4>Raw Data</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Vaccine</th>
            <th>ADRs</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['AefiListOfVaccine']['vaccine_name']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('aefis-by-vaccine', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'AEFIs by Vaccine'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'AEFIs by Vaccine'
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
