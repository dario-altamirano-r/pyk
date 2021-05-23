<!--Use template generated-->
<?php include('template/template.php'); ?>

<html>
  <head>
    <title>Test</title>
  </head>

  <body>
    <?php
      echo '<h1 class="text-center" style="color:#FFF;">Welcome!</h1>'; 
      
      /*Connection to DB*/
      include 'db_connection.php';
      $conn = openConnection();
      if($conn){
          echo'<script type="text/javascript">
          alert("Data loaded!");
          </script>';
      } else {
          echo'<script type="text/javascript">
          alert("Connection problems!");
          </script>';
      }
    ?>
  </body>

</html>