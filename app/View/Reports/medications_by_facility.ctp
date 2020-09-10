<?php
  $this->extend('/Reports/reports');
  $this->assign('medications-by-facility', 'active');
?>

<?php $this->start('report'); ?>
<div id="medications-by-facility"></div>

<hr>
<h4>Raw Data</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Facility</th>
            <th>Medication Errors</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['Medication']['name_of_institution']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('medications-by-facility', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Facility'
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
