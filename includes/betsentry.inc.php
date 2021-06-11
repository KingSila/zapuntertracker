<?php
    
         include_once 'dbh.inc.php';

        $betdate = $_POST['betdate'];
        $sports = $_POST['sports'];
        $puntervalue = $_POST['punter'];
        $bookievalue = $_POST['bookie'];
        $odds = $_POST['odds'];
        $stake = $_POST['stake'];
        $resultvalue = $_POST['result'];
        $pnl = $_POST['pnl'];
        

        $sql = "INSERT INTO bettingtracker(date,sport,punter,bookie,odds,stake,outcome,pnl) 
        VALUES ('$betdate','$sports','$puntervalue','$bookievalue','$odds','$stake','$resultvalue','$pnl');";
        mysqli_query($conn, $sql);

        header("Location: ../index.php?signup=success");