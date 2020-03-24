<?php
$koneksi       = mysqli_connect("localhost", "root", "", "iot");
$ketinggianair = mysqli_query($koneksi, "SELECT * FROM `ketinggianAir`");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Garis</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 50%;
                margin: 20px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="linechart" width="200" height="200"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
            labels: ["00:00","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"],
            datasets: [
                  {
                    label: "Ketinggian Air",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#29B0D0",
                    borderColor: "#29B0D0",
                    pointHoverBackgroundColor: "#29B0D0",
                    pointHoverBorderColor: "#29B0D0",
                    data: [<?php while ($p = mysqli_fetch_array($ketinggianair)) { echo '"' . $p['00:00'] .'","' . $p['01:00'] . '","' . $p['02:00'] . '","' . $p['03:00'] . '","' . $p['04:00'] . '","' . $p['05:00'] . '","' . $p['06:00'] . '","' . $p['07:00'] . '","' . $p['08:00'] . '","' . $p['09:00'] . '","' . $p['10:00'] . '","' . $p['11:00'] . '","' . $p['12:00'] . '","' . $p['13:00'] .'","' . $p['14:00'] .'","' . $p['15:00'] .'","' . $p['16:00'] .'","' . $p['17:00'] .'","' . $p['18:00'] .'","' . $p['19:00'] .'","' . $p['20:00'] .'","' . $p['21:00'] .'","' . $p['22:00'] .'","' . $p['23:00'] .'",';}?>]
                  },
                  
                  ]
          };

  var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            legend: {
              display: true
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>