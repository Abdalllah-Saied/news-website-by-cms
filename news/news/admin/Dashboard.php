<?php
    
    include '../core/connection.php';


    
    $query = "select  Num_of_views , 	tag_name	from tags;";
    $result= mysqli_query($conn,$query);

    $query3 = "select Num_of_views, name from `category`;";
    $result3= mysqli_query($conn,$query3);

    $query2 = "select title ,Num_of_views from `article`;";

    $result2= mysqli_query($conn,$query2);
    while($columnChart=mysqli_fetch_array($result2)){
      $articalTitle[]=$columnChart['title'];
      $articalViews[]=$columnChart['Num_of_views'];
    }

  ?>

<!DOCTYPE html>
<html lang="en">


    <?php include '../core/head.php'?>
   
  
   

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tag', 'num of articles'],
          
          <?php
           while($row = mysqli_fetch_array($result))  
           {  
            echo "['".$row["tag_name"]."', ".$row["Num_of_views"]."],";   
           }  
          ?>
        ]);

        var options = {
          title: 'Trendy Tags'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <!-- ******************************************************************************************* -->
    <html>
  <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Example 5</title>

    <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["bar"]
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ["ArticalTitle", "ArticaleViews"],
     


           
        ]);

        var options = {
            width: 800,
            legend: {
                position: "none"
            },
            chart: {
                title: "Most visited articals",

            },
            axes: {
                x: {
                    0: {
                        side: "top",
                        label: "White to move"
                    }, // Top x-axis.
                },
            },
            bar: {
                groupWidth: "90%"
            },
        };

        var chart = new google.charts.Bar(document.getElementById("top_x_div"));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>

    <!-- *********************************************************** -->

    <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Category', 'Number of Visitors'],
          <?php
            while($row3 = mysqli_fetch_array($result3))  
            {  
                 echo "['".$row3["name"]."', ".$row3["Num_of_views"]."],";  
            }  
           ?>
        ]);

        var options = {
          title: 'Most Visit Category',
          pieHole: 0.6,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>

<!-- *********************************************************** -->




</head>


<body>
   
   <?php include '../core/sidebar.php'?>
    <br>

    <div>
        <h1 style="text-align:center">
            Welcome to DashBoard
        </h1>
    </div>

<div style="margin-left:21%"> 
    <div id="piechart"  style="width: 650px; height: 400px ; margin-left:-60px; margin-top:40px;"></div>
</div> 
   
    <div id="piechart2" style="width: 650px; height: 400px ; margin-left:50%; margin-top:-400px;"></div><br>
    <canvas id="myChart" style="width:80%;max-width:500px; margin-left:400px; margin-bottom: 9%;margin-top: 0%;"></canvas>
    
    <script type="text/javascript">
    // var xValues = ["First week", "Second week", "Third week", "Fourth week"];
    // var yValues = [55, 49, 44, 24];
    var barColors = ["red", "green", "blue", "orange"];
    new Chart("myChart", {
        type: "bar",
        data: {
            labels: <?php echo json_encode($articalTitle);?>,
            datasets: [{
                backgroundColor: barColors,
                data: <?php echo json_encode($articalViews);?>
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Most visited articale"
            },
            scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          // callback: function(value) {if (value % 1 === 0) {return value;}}
        }
      }]
    }
        }
    });
    </script>

   
    <!-- Footer -->


    <!-- <div class="container my-5"> -->
    <!-- Footer -->

    <!-- End of .container -->
    <!-- </div> -->
</body>

</html>