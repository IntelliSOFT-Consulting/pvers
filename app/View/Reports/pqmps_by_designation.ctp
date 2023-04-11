<?php
  $this->extend('/Reports/reports');
  $this->assign('pqmps-by-designation', 'active');
?>


<?php $this->start('report'); ?>
<div id="pqmps-by-designation"></div>

<hr>
<h4>PQHPTs by Designation</h4>
<table class="table table-condensed table-bordered" id="datatable8">
    <thead>
        <tr>
            <th>Designation</th>
            <th>Poor Quality Medicinal Products</th>
        </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $key => $value) {
              echo "<tr>";
                echo "<th>".$value['Designation']['name']."</th>";
                echo "<td>".$value[0]['cnt']."</td>";
              echo "</tr>";
          }
      ?>        
    </tbody>
</table>


<script type="text/javascript">
Highcharts.chart('pqmps-by-designation', {
    data: {
        table: 'datatable8'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'PQHPTs by Designation'
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

