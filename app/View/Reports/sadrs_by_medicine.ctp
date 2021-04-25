<?php
  $this->extend('/Reports/reports');
  $this->assign('sadrs-by-medicine', 'active');
?>

<?php $this->start('report'); ?>
<div id="sadrs-by-medicine"></div>

<hr>
<h4>SADRs by Suspected Medicines</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Medicine</th>
            <th>ADRs</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['SadrListOfDrug']['drug_name']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('sadrs-by-medicine', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'SADRs by Suspected Medicines'
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
