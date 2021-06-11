<?php
    
         include_once 'dbh.inc.php';

        $betdate = $_POST['betdate'];
        $sports = $_POST['value'];
        $puntervalue = $_POST['puntervalue'];
        $bookievalue = $_POST['bookievalue'];
        $odds = $_POST['odds'];
        $stake = $_POST['stake'];
        $resultvalue = $_POST['resultvalue'];
        $pnl = $_POST['pnl'];
        

        $sql = "INSERT INTO bettingtracker(date,sport,punter,bookie,odds,stake,outcome,pnl) 
        VALUES ('$betdate','$sports','$puntervalue','$bookievalue','$odds','$stake','$resultvalue','$pnl');";
        mysqli_query($conn, $sql);

        header("Location: ../index.php?signup=success");