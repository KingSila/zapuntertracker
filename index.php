<?php
    include_once 'includes/dbh.inc.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KingSila Bets Tracker</title>
    <link rel="stylesheet" href="includes/main.css">
    <style>
     * {
       box-sizing: border-box;
        }   
    </style>
    <script type="text/javascript" src="includes/app.js"></script>
    
        
</head>
<body>

    
    <form action="includes/betsentry.inc.php" method="post">

    <h1>Sports Betting Tracker</h1>

          <table border="2">
          <tr>
          <th>Date</th>
           <th>Sport</th>
           <th>Punter</th>
           <th>Bookie</th>
           <th>Odds </th>
           <th>Rands Staked </th>
           <th>Result </th>
           <th>Profit/Loss</th>
          </tr>
          </td> <td>
         <input type="date" name="betdate" placeholder="Betdate">
         </td> <td>
        <select name="sports" id="sports">
        <option value="">--select--</option>
        <option value="Football">soccer</option>
        <option value="Basketball">basketball</option>
        <option value="Darts">darts</option>
        <option value="Baseball">baseball</option>
        <option value="Tennis">tennis</option>
        <option value="Rugby">rugby</option>
        <option value="Horse Racing">horseracing</option>
         </select>
     
      
            <script type="text/javascript">
           const element = document.getElementById("sports");
       
             element.addEventListener("change", (e) => {
            const value = e.target.value;
            const text = element.options[element.selectedIndex].text;
           
          
          });
          </script>

   
            </td> <td>
            <select name="punter" id="punter">
            <option value="">--select--</option>
            <option value="Pyscho">Pyscho</option>
            <option value="Odds Mafia">Odds Mafia</option>
            <option value="el Professor Wiz">el Professor Wiz</option>
            <option value="Pusha Punters">Pusha Punters</option>
            <option value="Getrichquick2021">Getrichquick2021</option>
            <option value="Green Hoodie">Green Hoodie</option>
            <option value="Boom Squad">Boom Squad</option>
            <option value="SQ Mweza">SQ Mweza</option>
            <option value="Twitter feed">Twitter feed</option>
            <option value="Facebook feed">Facebook feed</option>
            <option value="Whatsapp feed">Whatsapp feed</option>
          </select>
        
          
    <script type="text/javascript">
        const punterelement = document.getElementById("punter");
       
             punterelement.addEventListener("change", (i) => {
            const puntervalue = i.target.value;
            const puntertext = punterelement.options[punterelement.selectedIndex].text;
        
          });
          </script>
        
                </td> <td>
                <select name="bookie" id="bookie">
                <option value="">--select--</option>
                <option value="betway">betway</option>
                <option value="sportingbet 1">sportingbet 1</option>
                <option value="sportingbet 2">sportingbet 2</option>
                <option value="1xbet">1xbet</option>
                <option value="gbets">gbets</option>
              </select>
             

              <script type="text/javascript">
                const bookieelement = document.getElementById("bookie");
               
                bookieelement.addEventListener("change", (j) => {
                    const bookievalue = j.target.value;
                    const bookietext = bookieelement.options[bookieelement.selectedIndex].text;
               
                  });
                  </script>
         
           
                  </td> <td>
                  <input type="text" id="odds" name="odds" maxlength="8" size="4">
                  </td> <td>
                  <input type="text" id="stake" name="stake" maxlength="4" size="4" class="form-control"> 
                  </td> <td>
                  <select name="result" id="result">
                  <option value="">--select--</option>
                  <option value="Win">Win</option>
                  <option value="Lose">Lose</option>
                  <option value="Cashout stake">Cashout stake</option>
                  <option value="Cashout half Stake">Cashout half Stake</option>
                  <option value="Cashout 2X stake">Cashout 2X stake</option>
                  <option value="Cashout 80% Return">Cashout 80% Return</option>
                  </select>
                  
                  
                 <script type="text/javascript">
                const resultelement = document.getElementById("result");
               
                 resultelement.addEventListener("change", (k) => {
                    const resultvalue = k.target.value;
                    const resulttext = resultelement.options[resultelement.selectedIndex].text;
                   
                    if (resultvalue) {
                      getInputValue();
      
                  } else {
                      document.getElementById("pnl").value = 0.00;
                      
                    }
                  });
                  </script>
                </div>
            
           
                </td> <td>
                <input type="text" name='pnl' value='0.00' id="pnl" size="6">
                </td> <td>
                <button type="submit" name="submit">Add bet</button>
            </div>
           
        </form>
        </tr>
        </table>    

        <label for="SEPARATOR">===========================================================================================================</label>
         
        <table border="2">
          <tr>
           <th>Number of Picks</th>
           <th>Wins</th>
           <th>Win%</th>
           <th>Average Odds </th>
           <th>Rands Staked </th>
           <th>Total Profit </th>
           <th>Average Stake </th>
         </tr>
    
         <?php
             
              $sql = "SELECT COUNT(*) as betstotal from bettingtracker";
              $result = mysqli_query($conn,$sql);
             
              print "</td> <td>";
            while($r = mysqli_fetch_array($result))
            {
                echo  $r['betstotal']; 
                print "</td> <td>";
            }
            

            $sql1 = "SELECT COUNT(*) as wins from bettingtracker where outcome='Win'";
            $result1 = mysqli_query($conn,$sql1);
           
          while($r = mysqli_fetch_array($result1))
          {
              echo  $r['wins'];
              print "</td> <td>";
          }

          $sql2 = "SELECT COUNT(*) AS win_cnt, 100.0 * COUNT(*) / (SELECT COUNT(*) FROM bettingtracker)
          AS win_percentage FROM bettingtracker where outcome='Win'";
          $result2 = mysqli_query($conn,$sql2);
         
        while($r = mysqli_fetch_array($result2))
        {
            echo  $r['win_percentage'];
            print "</td> <td>";
        }

        $sql3 = "SELECT ROUND(sum(odds)/count(*),2) as average_odds FROM `bettingtracker`";
          $result3 = mysqli_query($conn,$sql3);
         
        while($r = mysqli_fetch_array($result3))
        {
            echo  $r['average_odds'];
            print "</td> <td>";
        }

        $sql4 = "SELECT SUM(stake) as rands_staked FROM `bettingtracker`";
        $result4 = mysqli_query($conn,$sql4);
       
      while($r = mysqli_fetch_array($result4))
      {
          echo  $r['rands_staked'];
          print "</td> <td>";
      }

      $sql5 = "SELECT ROUND(SUM(pnl), 2) as Total_Profit FROM `bettingtracker`";
      $result5 = mysqli_query($conn,$sql5);
     
    while($r = mysqli_fetch_array($result5))
    {
        echo  $r['Total_Profit'];
        print "</td> <td>";
       
    }

    $sql6 = "SELECT ROUND(SUM(STAKE) / (SELECT COUNT(*) FROM bettingtracker),2) AS averagestake FROM bettingtracker";
    $result6 = mysqli_query($conn,$sql6);
   
  while($r = mysqli_fetch_array($result6))
  {
      echo  $r['averagestake'];
     
    
  }

    ?>
    </table>
 
     
    <label for="SEPARATOR">===========================================================================================================</label><br>
    <label for="SEPARATOR">Yesterday</label>
    <table border="2">
          <tr>
           <th>Number of Picks</th>
           <th>Wins</th>
           <th>Win%</th>
           <th>Average Odds </th>
           <th>Rands Staked </th>
           <th>Total Profit </th>
         </tr>

         <?php
             
             $sql = "SELECT count(*) as yesterdaybetstotal FROM `bettingtracker` 
             WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)";
             $result = mysqli_query($conn,$sql);
            
             print "</td> <td>";
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['yesterdaybetstotal']; 
               print "</td> <td>";
           }

           $sql = "SELECT count(*) as winstotal FROM `bettingtracker` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)
            and outcome='Win'";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['winstotal']; 
             print "</td> <td>";
         }

         $sql = "SELECT COUNT(*) AS win_cnt, 100.0 * COUNT(*) / (SELECT COUNT(*) FROM bettingtracker WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY))
         AS ywin_percentage FROM `bettingtracker` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)
            and outcome='Win'";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['ywin_percentage']; 
             print "</td> <td>";
         }
         $sql = "SELECT ROUND(sum(odds)/count(*),2) as yaverage_odds FROM `bettingtracker` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)
          ";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['yaverage_odds']; 
             print "</td> <td>";
         }
         $sql = "SELECT sum(stake)  as yrandsstaked FROM `bettingtracker` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)
         ";
          $result = mysqli_query($conn,$sql);
         
         
        while($r = mysqli_fetch_array($result))
        {
            echo  $r['yrandsstaked']; 
            print "</td> <td>";
        }
        $sql = "SELECT sum(pnl) as ypnl FROM `bettingtracker` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)
        ";
         $result = mysqli_query($conn,$sql);
        
        
       while($r = mysqli_fetch_array($result))
       {
           echo  $r['ypnl']; 
          
       }

      ?>
      </table>

      <label for="SEPARATOR">===========================================================================================================</label><br>
      <label for="SEPARATOR">Last 7 Days</label>
      <table border="2">
          <tr>
           <th>Number of Picks</th>
           <th>Wins</th>
           <th>Win%</th>
           <th>Average Odds </th>
           <th>Rands Staked </th>
           <th>Total Profit </th>
         </tr>
       
         <?php
             
             $sql = "SELECT count(*) as yesterdaybetstotal FROM `bettingtracker` 
             WHERE date > now() - INTERVAL 7 day";
             $result = mysqli_query($conn,$sql);
            
             print "</td> <td>";
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['yesterdaybetstotal']; 
               print "</td> <td>";
           }

           $sql = "SELECT count(*) as winstotal FROM `bettingtracker` WHERE date > now() - INTERVAL 7 day
            and outcome='Win'";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['winstotal']; 
             print "</td> <td>";
         }

         $sql = "SELECT COUNT(*) AS win_cnt, 100.0 * COUNT(*) / (SELECT COUNT(*) FROM bettingtracker WHERE date > now() - INTERVAL 7 day)
         AS ywin_percentage FROM `bettingtracker` WHERE date > now() - INTERVAL 7 day
            and outcome='Win'";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['ywin_percentage']; 
             print "</td> <td>";
         }
         $sql = "SELECT ROUND(sum(odds)/count(*),2) as yaverage_odds FROM `bettingtracker` WHERE date > now() - INTERVAL 7 day";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['yaverage_odds']; 
             print "</td> <td>";
         }
         $sql = "SELECT sum(stake)  as yrandsstaked FROM `bettingtracker` WHERE date > now() - INTERVAL 7 day";
          $result = mysqli_query($conn,$sql);
         
         
        while($r = mysqli_fetch_array($result))
        {
            echo  $r['yrandsstaked']; 
            print "</td> <td>";
        }
        $sql = "SELECT sum(pnl)  as weekpnl FROM `bettingtracker` WHERE date > now() - INTERVAL 7 day";
        $result = mysqli_query($conn,$sql);
       
       
      while($r = mysqli_fetch_array($result))
      {
          echo  $r['weekpnl']; 
         
      }

        

       ?>
       </table>

       <label for="SEPARATOR">===========================================================================================================</label><br>
      <label for="SEPARATOR">Last 30 Days</label>

      <table border="2">
          <tr>
           <th>Number of Picks</th>
           <th>Wins</th>
           <th>Win%</th>
           <th>Average Odds </th>
           <th>Rands Staked </th>
           <th>Total Profit </th>
         </tr>
       
         <?php
                  $sql = "SELECT count(*) as monthbetstotal FROM `bettingtracker` 
                  WHERE date > now() - INTERVAL 30 day";
                  $result = mysqli_query($conn,$sql);
                 
                  print "</td> <td>";
                while($r = mysqli_fetch_array($result))
                {
                    echo  $r['monthbetstotal']; 
                    print "</td> <td>";
                }
                $sql = "SELECT count(*) as winstotal FROM `bettingtracker` WHERE date > now() - INTERVAL 30 day
                and outcome='Win'";
               $result = mysqli_query($conn,$sql);
              
              
             while($r = mysqli_fetch_array($result))
             {
                 echo  $r['winstotal']; 
                 print "</td> <td>";
             }
    
             $sql = "SELECT COUNT(*) AS win_cnt, 100.0 * COUNT(*) / (SELECT COUNT(*) FROM bettingtracker WHERE date > now() - INTERVAL 30 day)
             AS ywin_percentage FROM `bettingtracker` WHERE date > now() - INTERVAL 30 day
                and outcome='Win'";
               $result = mysqli_query($conn,$sql);
              
              
             while($r = mysqli_fetch_array($result))
             {
                 echo  $r['ywin_percentage']; 
                 print "</td> <td>";
             }
             $sql = "SELECT ROUND(sum(odds)/count(*),2) as yaverage_odds FROM `bettingtracker` WHERE date > now() - INTERVAL 30 day";
               $result = mysqli_query($conn,$sql);
              
              
             while($r = mysqli_fetch_array($result))
             {
                 echo  $r['yaverage_odds']; 
                 print "</td> <td>";
             }
             $sql = "SELECT sum(stake)  as yrandsstaked FROM `bettingtracker` WHERE date > now() - INTERVAL 30 day";
              $result = mysqli_query($conn,$sql);
             
             
            while($r = mysqli_fetch_array($result))
            {
                echo  $r['yrandsstaked']; 
                print "</td> <td>";
            }
            $sql = "SELECT sum(pnl)  as weekpnl FROM `bettingtracker` WHERE date > now() - INTERVAL 30 day";
            $result = mysqli_query($conn,$sql);
           
           
          while($r = mysqli_fetch_array($result))
          {
              echo  $r['weekpnl']; 
             
          }
   
       ?>
     


</body>
</html>
