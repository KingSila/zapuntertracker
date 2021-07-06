<?php
    
         include_once 'dbh.inc.php';

        $betdate = $_POST['betdate'];
        $bookievalue = $_POST['bookie'];
        $wpicks = $_POST['wpicks'];
        $lpicks = $_POST['lpicks'];
        $return = $_POST['return'];
      
        

        $sql = "INSERT INTO dailysummary(date,bookie,winpicks,losepicks,pnl)  
        VALUES ('$betdate','$bookievalue','$wpicks','$lpicks','$return');";
        mysqli_query($conn, $sql);

        header("Location: ../index.php?signup=success");