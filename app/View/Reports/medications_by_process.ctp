<?php
  $this->extend('/Reports/reports');
  $this->assign('medications-by-process', 'active');
?>

<?php $this->start('report'); ?>
<div id="medications-by-process"></div>

<hr>
<h4>In which process did error occur?</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Process</th>
            <th>Medication Errors</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['Medication']['process_occur']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('medications-by-process', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'In which process did error occur?'
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
