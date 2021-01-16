<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<center><img src="<?= base_url();?>/assets/images/logo.png" alt="Smiley face" width="800"></center>

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $jmlMampu?></h3>

              <p>Jumlah Siswa Layak</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $jmlTidakMampu?></h3>

              <p>Jumlah Siswa Kurang Layak</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $totalSiswa?></h3>

              <p>Total Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $jmlBea?></h3>

              <p>Jumlah Penerima Beasiswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div id="chartdiv"></div>
      <script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

/**
 * Define data for each year
 */


// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);
var data = <?= $json ?>
// Add data
chart.data = [
  { "sector": "Siswa Layak", "size": data.jmlMampu },
  { "sector": "Siswa Kurang Layak", "size": data.jmlTidakMampu }
];

// Add label
chart.innerRadius = 100;
var label = chart.seriesContainer.createChild(am4core.Label);
label.text = "Chart";
label.horizontalCenter = "middle";
label.verticalCenter = "middle";
label.fontSize = 50;

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "size";
pieSeries.dataFields.category = "sector";

// Animate chart data
// var currentYear = 1995;
// function getCurrentData() {
//   label.text = currentYear;
//   var data = chartData[currentYear];
//   currentYear++;
//   if (currentYear > 2014)
//     currentYear = 1995;
//   return data;
// }

function loop() {
  //chart.allLabels[0].text = currentYear;
  var data = getCurrentData();
  for(var i = 0; i < data.length; i++) {
    chart.data[i].size = data[i].size;
  }
  chart.invalidateRawData();
  chart.setTimeout( loop, 4000 );
}

loop();

}); // end am4core.ready()
</script>
<!-- HTML -->

