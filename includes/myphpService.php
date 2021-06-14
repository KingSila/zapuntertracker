<?php
        include_once 'dbh.inc.php';

        
  /* Declare an array containing our data points */
      $data_points = array();

   /* Usual SQL Queries */
      $query = "SELECT sport,sum(pnl) as pnl FROM `bettingtracker` 
      group by sport";
      $result = mysqli_query($conn, $query);
 
    
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $row['sport'];
        $jsonArrayItem['value'] = $row['pnl'];
        //append the above created object into the main array.
        array_push($jsonArray, $jsonArrayItem);
      }
    }
    
    //set the response content type as JSON
    header('Content-type: application/json');
    //output the return value of json encode using the echo function.
    echo json_encode($jsonArray);
   
    ?>

 