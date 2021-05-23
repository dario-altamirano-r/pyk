<!--Use template generated-->
<?php include('template/template.php'); ?>

<html>
    <head>
        <title>Graphic</title>
    </head>

    <body>
        <?php
            echo '<h1 class = "text-center" style="color:#FFF;">Graphic</h1><br>' 
        ?>

        <?php
            /*Connection to DB*/
            include 'db_connection.php';
            $conn = openConnection();

            /*Query*/
            $sql = "SELECT Pclass, COUNT(*) AS Amount FROM datos WHERE Sex = 'female' GROUP BY Pclass";
            $result = $conn->query($sql);

            closeConnection($conn);

            /*Creation of array for watch data in graphic*/
            $dataPoints = array();
            /*Insert data in graphic*/
            while($dato = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
                array_push($dataPoints, array("label"=> $dato['Pclass'], "y"=> $dato['Amount']));
            }
        ?>

        <script>
            /*Load interface of graphic*/
            window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "dark1",
                title:{
                    text: "Number of women per Class"
                },
                axisY:{
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",   
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            }
        </script>

        <!--Show table generated-->
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

    </body>
</html>
