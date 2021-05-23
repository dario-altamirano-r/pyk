<!--Use template generated-->
<?php include('template/template.php'); ?>

<html>
    <head>
        <title>Data</title>
    </head>

    <body>
      <?php
          echo '<h1 class = "text-center" style="color:#FFF;">Data</h1><br>' 
      ?>
    </body>
</html>

<?php
    /*Connection to DB*/
    include 'db_connection.php';
    $conn = openConnection();

    /*Query*/
    $sql = "SELECT PassengerId,
                    Survived,
                    Pclass,
                    Name,
                    Sex,
                    Age,
                    SibSp,
                    Parch,
                    Ticket,
                    Fare,
                    Cabin,
                    Embarked
            FROM datos";
    $result = $conn->query($sql);
    closeConnection($conn);
  ?>
<!--Generate responsive table-->
<table class="table table-bordered table-responsive table-sm table-dark">
  <thead>
    <tr>
      <th>PassengerId</th>
      <th>Survived</th>
      <th>Pclass</th>
      <th>Name</th>
      <th>Sex</th>
      <th>Age</th>
      <th>SibSp</th>
      <th>Parch</th>
      <th>Ticket</th>
      <th>Fare</th>
      <th>Cabin</th>
      <th>Embarked</th>													
    </tr>
  </thead>
  <tbody>
    <!--Insert and generate data fixed in the table-->
    <?php while( $dato = mysqli_fetch_assoc($result) ) { ?>
        <tr id="<?php echo $dato ['PassengerId']; ?>">
        <td><?php echo $dato ['PassengerId']; ?></td>
        <td><?php if($dato ['Survived'] == '1'){
                    echo 'Yes';
                } else {
                    echo 'No';
                }
            ?>
        </td>
        <td><?php if($dato ['Pclass'] == '1'){
                    echo '1st Class';
                  } else if($dato ['Pclass'] == '2'){
                    echo '2nd Class';  
                  } else if($dato ['Pclass'] == '3'){
                    echo '3rd Class';  
                  } else {
                    echo 'Undefined';  
                  }
              ?></td>
        <td><?php echo $dato ['Name']; ?></td>  	
        <td><?php echo ucfirst($dato ['Sex']); ?></td>
        <td><?php echo round(floatval($dato ['Age'])); ?></td>
        <td><?php echo $dato ['SibSp']; ?></td>
        <td><?php echo $dato ['Parch']; ?></td>
        <td><?php echo $dato ['Ticket']; ?></td>
        <td><?php echo round($dato ['Fare'],2); ?></td>
        <td><?php if($dato ['Cabin'] !== ""){
                    echo $dato ['Cabin'];
                } else {
                    echo 'Undefined';
                }
              ?></td>
        <td><?php if($dato ['Embarked'] == 'C'){
                    echo 'Cherbourg';
                  } else if($dato ['Embarked'] == 'Q') {
                    echo 'Queenston'; 
                  } else if($dato ['Embarked'] == 'S'){
                    echo 'Southampton';
                  } else {
                    echo 'Undefined';
                  } 
              ?></td>			   				   				  
        </tr>
      <?php } ?>
  </tbody>
</table>