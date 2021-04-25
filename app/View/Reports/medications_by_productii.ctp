<?php
  $this->extend('/Reports/reports');
  $this->assign('medications-by-productii', 'active');
?>

<?php $this->start('report'); ?>
<div id="medications-by-productii"></div>

<hr>
<h4>Product (error)</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Product (error)</th>
            <th>ADRs</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['MedicationProduct']['product_name_ii']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>

<script type="text/javascript">
Highcharts.chart('medications-by-productii', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Product (error)'
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
