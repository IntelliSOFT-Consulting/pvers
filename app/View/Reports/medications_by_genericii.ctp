<?php
  $this->extend('/Reports/reports');
  $this->assign('medications-by-genericii', 'active');
?>

<?php $this->start('report'); ?>
<div id="medications-by-genericii"></div>

<hr>
<h4>Generic (error)</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Generic (error)</th>
            <th>ADRs</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['MedicationProduct']['generic_name_ii']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('medications-by-genericii', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Generic (error)'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'ADRs'
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
