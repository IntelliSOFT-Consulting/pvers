<?php
  $this->extend('/Reports/reports');
  $this->assign('sadrs-by-gender', 'active');
?>

<?php $this->start('report'); ?>
<div id="sadrs-by-gender"></div>

<hr>
<h4>SADRs by Sex</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Sex</th>
            <th>ADRs</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['Sadr']['gender']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('sadrs-by-gender', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'bar'
    },
    title: {
        text: 'SADRs by Sex'
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
