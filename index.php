<?php
    include_once 'includes/dbh.inc.php'; 
?>
<style>
<?php include 'includes/main.css'; 
?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Summary Bets Tracker</title>
   
    <style>
     * {
    box-sizing: border-box;
        }   
    </style>
    <script type="text/javascript" src="includes/app.js"></script>
    
        
</head>
<body>

    
    <form action="includes/betsentry.inc.php" method="post">

    <h1>DAILY PROFIT TRACKER</h1>

          <table border="2">
          <tr>
          <th>Date</th>
          <th>Bookie</th>
          <th>No of wins</th>
          <th>No of losses</th>
          <th>Total Return</th>
          </tr>
        </td> <td>
          <input type="date" name="betdate" placeholder="Betdate">
          </td> <td>
                <select name="bookie" id="bookie">
                <option value="">--select--</option>
                <option value="sunbet">sunbet</option>
                <option value="gbets">gbets</option>
                <option value="betway 1">betway 1</option>
                <option value="sportingbet 1">sportingbet 1</option>
                <option value="betway 2">betway 2</option>
                <option value="sportingbet 2">sportingbet 2</option>
                <option value="1xbet">1xbet</option>
              </select>
            

              <script type="text/javascript">
                const bookieelement = document.getElementById("bookie");
              
                bookieelement.addEventListener("change", (j) => {
                    const bookievalue = j.target.value;
                    const bookietext = bookieelement.options[bookieelement.selectedIndex].text;
               
                  });
                  </script>
         </td> <td>
          <input type="text" id="wpicks" name="wpicks" maxlength="8" size="4">
          </td> <td>
          <input type="text" id="lpicks" name="lpicks" maxlength="8" size="4">
          </td> <td>
          <input type="text" id="return" name="return" value='0.00' maxlength="8" size="8" class="form-control"> 
          </td> <td>
        </div>
        </td> <td>
                <button type="submit" name="submit">Add Results</button>
            </div>
        </form>
        </tr>
        </table>    

        <label for="SEPARATOR">=================================================================</label>
        <table border="2">
          <tr>
           <th>Number of Picks</th>
           <th>Wins</th>
           <th>Lose</th>
           <th>Profit/Loss </th>
           <th>Total withdrawals </th>
         </tr>
    
         <?php
             
              $sql = "SELECT sum(losepicks+winpicks) as totalpicks FROM `dailysummary`";
              $result = mysqli_query($conn,$sql);
             
              print "</td> <td>";
            while($r = mysqli_fetch_array($result))
            {
                echo  $r['totalpicks']; 
                print "</td> <td>";
            }
            

            $sql1 = "SELECT sum(winpicks) as totalwinpicks FROM `dailysummary`";
            $result1 = mysqli_query($conn,$sql1);
           
          while($r = mysqli_fetch_array($result1))
          {
              echo  $r['totalwinpicks'];
              print "</td> <td>";
          }

          $sql2 = "SELECT sum(losepicks) as totallosewinpicks FROM `dailysummary`";
          $result2 = mysqli_query($conn,$sql2);
         
        while($r = mysqli_fetch_array($result2))
        {
            echo  $r['totallosewinpicks'];
            print "</td> <td>";
        }

   


      $sql5 = "SELECT ROUND(SUM(pnl), 2) as Total_Profit FROM `dailysummary`";
      $result5 = mysqli_query($conn,$sql5);
     
    while($r = mysqli_fetch_array($result5))
    {
        echo  $r['Total_Profit'];
        print "</td> <td>";
      
    }

 
  $sql7 = "SELECT SUM(amount) as totalwithdrawals from withdrawals";
               $result = mysqli_query($conn,$sql7);
             
             
              while($r = mysqli_fetch_array($result))
             {
                echo  $r['totalwithdrawals']; 
                
             }

    ?>
    </table>
 
     
    <label for="SEPARATOR">Yesterday</label>
    <table border="2">
          <tr>
           <th>Number of Picks</th>
           <th>Wins</th>
           <th>Lose</th>
           <th>Profit/Loss</th>
         </tr>

         <?php
             
             $sql = "SELECT sum(losepicks+winpicks) as ytotalpicks FROM `dailysummary` 
             WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)";
             $result = mysqli_query($conn,$sql);
            
             print "</td> <td>";
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['ytotalpicks']; 
               print "</td> <td>";
           }

           $sql = "SELECT sum(winpicks) as ytotalwinpicks FROM `dailysummary` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['ytotalwinpicks']; 
             print "</td> <td>";
         }

         $sql = "SELECT sum(losepicks) as losepicks FROM `dailysummary` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['losepicks']; 
             print "</td> <td>";
         }
        
        $sql = "SELECT ROUND(SUM(pnl), 2) as yTotal_Profit FROM `dailysummary` WHERE date(date)= DATE(NOW() - INTERVAL 1 DAY)
        ";
         $result = mysqli_query($conn,$sql);
        
        
       while($r = mysqli_fetch_array($result))
       {
           echo  $r['yTotal_Profit']; 
          
       }

      ?>
      </table>

      <label for="SEPARATOR">Last 7 Days</label>
      <table border="2">
          <tr>
          <th>Number of Picks</th>
           <th>Wins</th>
           <th>Lose</th>
           <th>Profit/Loss</th>
         </tr>
       
         <?php
             
             $sql = "SELECT sum(losepicks+winpicks) as weektotalpicks FROM `dailysummary`
             WHERE date > now() - INTERVAL 7 day";
             $result = mysqli_query($conn,$sql);
            
             print "</td> <td>";
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['weektotalpicks']; 
               print "</td> <td>";
           }

           $sql = "SELECT sum(winpicks) as weektotalwinpicks FROM `dailysummary` WHERE date > now() - INTERVAL 7 day
           ";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['weektotalwinpicks']; 
             print "</td> <td>";
         }

         $sql = "SELECT sum(losepicks) as weeklosepicks FROM `dailysummary` WHERE date > now() - INTERVAL 7 day
           ";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['weeklosepicks']; 
             print "</td> <td>";
         }
         
        $sql = "SELECT sum(pnl)  as weekpnl FROM `dailysummary` WHERE date > now() - INTERVAL 7 day";
        $result = mysqli_query($conn,$sql);
       
       
      while($r = mysqli_fetch_array($result))
      {
          echo  $r['weekpnl']; 
         
      }

        

       ?>
       </table>

      <label for="SEPARATOR">Last 30 Days</label>

      <table border="2">
          <tr>
          <th>Number of Picks</th>
           <th>Wins</th>
           <th>Lose</th>
           <th>Profit/Loss</th>
         </tr>
         <?php
             
             $sql = "SELECT sum(losepicks+winpicks) as monthtotalpicks FROM `dailysummary`
             WHERE date > now() - INTERVAL 30 day";
             $result = mysqli_query($conn,$sql);
            
             print "</td> <td>";
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['monthtotalpicks']; 
               print "</td> <td>";
           }

           $sql = "SELECT sum(winpicks) as monthtotalwinpicks FROM `dailysummary` WHERE date > now() - INTERVAL 30 day
           ";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['monthtotalwinpicks']; 
             print "</td> <td>";
         }

         $sql = "SELECT sum(losepicks) as monthlosepicks FROM `dailysummary` WHERE date > now() - INTERVAL 30 day
           ";
           $result = mysqli_query($conn,$sql);
          
          
         while($r = mysqli_fetch_array($result))
         {
             echo  $r['monthlosepicks']; 
             print "</td> <td>";
         }
         
        $sql = "SELECT sum(pnl)  as monthpnl FROM `dailysummary` WHERE date > now() - INTERVAL 30 day";
        $result = mysqli_query($conn,$sql);
       
       
      while($r = mysqli_fetch_array($result))
      {
          echo  $r['monthpnl']; 
         
      }

      
       ?>
        </table>

          
      <table align='right' border="2">
      <col width="90">
      <col width="50">
      <col width="50">
      <col width="110">
      <col width="120">
      <col width="150">
          <tr>
           <th>MAY Picks</th>
           <th>Wins</th>
           <th>Win%</th>
           <th>Total Deposits</th>
           <th>Total Profit/Loss</th>
           <th>Total withdrawals </th>
         </tr>
         <?php
                  $sql = "SELECT count(*) as maytotal  FROM `bettingtracker` 
                  WHERE MONTH(date) = 05 AND YEAR(date) = 2021";
                  $result = mysqli_query($conn,$sql);
                 
                  print "</td> <td>";
                while($r = mysqli_fetch_array($result))
                {
                    echo  $r['maytotal']; 
                    print "</td> <td>";
                }
                $sql = "SELECT count(*) as maywinstotal FROM `bettingtracker` WHERE MONTH(date) = 05 AND YEAR(date) = 2021
                and outcome='Win'";
               $result = mysqli_query($conn,$sql);
              
              
               while($r = mysqli_fetch_array($result))
               {
                  echo  $r['maywinstotal']; 
                 print "</td> <td>";
               }
    
               $sql = "SELECT COUNT(*) AS win_cnt, 100.0 * COUNT(*) / (SELECT COUNT(*) FROM bettingtracker WHERE MONTH(date) = 05 AND YEAR(date) = 2021)
               AS mayywin_percentage FROM `bettingtracker` WHERE MONTH(date) = 05 AND YEAR(date) = 2021
                and outcome='Win'";
                $result = mysqli_query($conn,$sql);
              
              
               while($r = mysqli_fetch_array($result))
              {
                 echo  $r['mayywin_percentage']; 
                 print "</td> <td>";
              }
              $sql = "SELECT SUM(amount) as maydeposit from deposits WHERE MONTH(date) = 05 AND YEAR(date) = 2021";
               $result = mysqli_query($conn,$sql);
             
             
              while($r = mysqli_fetch_array($result))
             {
                echo  $r['maydeposit']; 
                print "</td> <td>";
             }
             $sql = "SELECT sum(pnl)  as maypnl FROM `bettingtracker` WHERE MONTH(date) = 05 AND YEAR(date) = 2021";
             $result = mysqli_query($conn,$sql);
            
            
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['maypnl'];
               print "</td> <td>";
              
           }
           $sql = "SELECT SUM(amount) as maytotalwithdrawals from withdrawals WHERE MONTH(date) = 05";
               $result = mysqli_query($conn,$sql);
             
             
              while($r = mysqli_fetch_array($result))
             {
                echo  $r['maytotalwithdrawals']; 
                
             }

        ?>
        </table>

        <label for="SEPARATOR">===========================================================================</label>
      
      <table align='right' border="2">
      <col width="90">
      <col width="50">
      <col width="50">
      <col width="110">
      <col width="120">
      <col width="150">
          <tr>
           <th>JUNE Picks</th>
           <th>Wins</th>
           <th>Win%</th>
           <th>Total Deposits</th>
           <th>Total Profit/Loss</th>
           <th>Total withdrawals </th>
         </tr>
         <?php
                  $sql = "SELECT count(*) as junetotal  FROM `bettingtracker` 
                  WHERE MONTH(date) = 06 AND YEAR(date) = 2021";
                  $result = mysqli_query($conn,$sql);
                 
                  print "</td> <td>";
                while($r = mysqli_fetch_array($result))
                {
                    echo  $r['junetotal']; 
                    print "</td> <td>";
                }
                $sql = "SELECT count(*) as junewinstotal FROM `bettingtracker` WHERE MONTH(date) = 06 AND YEAR(date) = 2021
                and outcome='Win'";
               $result = mysqli_query($conn,$sql);
              
              
               while($r = mysqli_fetch_array($result))
               {
                  echo  $r['junewinstotal']; 
                 print "</td> <td>";
               }
    
               $sql = "SELECT COUNT(*) AS win_cnt, 100.0 * COUNT(*) / (SELECT COUNT(*) FROM bettingtracker WHERE MONTH(date) = 06 AND YEAR(date) = 2021)
               AS juneywin_percentage FROM `bettingtracker` WHERE MONTH(date) = 06 AND YEAR(date) = 2021
                and outcome='Win'";
                $result = mysqli_query($conn,$sql);
              
              
               while($r = mysqli_fetch_array($result))
              {
                 echo  $r['juneywin_percentage']; 
                 print "</td> <td>";
              }
              $sql = "SELECT SUM(amount) as junedeposit from deposits WHERE MONTH(date) = 06 AND YEAR(date) = 2021";
               $result = mysqli_query($conn,$sql);
             
             
              while($r = mysqli_fetch_array($result))
             {
                echo  $r['junedeposit']; 
                print "</td> <td>";
             }
             $sql = "SELECT sum(pnl)  as junepnl FROM `bettingtracker` WHERE MONTH(date) = 06 ";
             $result = mysqli_query($conn,$sql);
            
            
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['junepnl']; 
               print "</td> <td>";
              
           }
           $sql = "SELECT SUM(amount) as junetotalwithdrawals from withdrawals WHERE MONTH(date) = 06 ";
           $result = mysqli_query($conn,$sql);
         
         
          while($r = mysqli_fetch_array($result))
         {
            echo  $r['junetotalwithdrawals']; 
            
         }

        ?>
        </table>

    <label for="SEPARATOR">============================================================================</label>
  
      <table align='right' border="2">
      <col width="90">
      <col width="50">
      <col width="50">
      <col width="110">
      <col width="120">
      <col width="150">
          <tr>
           <th>JULY Picks</th>
           <th>Wins</th>
           <th>Win%</th>
           <th>Total Deposits</th>
           <th>Total Profit/Loss</th>
           <th>Total withdrawals </th>
         </tr>
         <?php
                  $sql = "SELECT count(*) as julytotal  FROM `bettingtracker` 
                  WHERE MONTH(date) = 07 AND YEAR(date) = 2021";
                  $result = mysqli_query($conn,$sql);
                 
                  print "</td> <td>";
                while($r = mysqli_fetch_array($result))
                {
                    echo  $r['julytotal']; 
                    print "</td> <td>";
                }
                $sql = "SELECT count(*) as julywinstotal FROM `bettingtracker` WHERE MONTH(date) = 07 AND YEAR(date) = 2021
                and outcome='Win'";
               $result = mysqli_query($conn,$sql);
              
              
               while($r = mysqli_fetch_array($result))
               {
                  echo  $r['julywinstotal']; 
                 print "</td> <td>";
               }
    
               $sql = "SELECT COUNT(*) AS win_cnt, 100.0 * COUNT(*) / (SELECT COUNT(*) FROM bettingtracker WHERE MONTH(date) = 07 AND YEAR(date) = 2021)
               AS julywin_percentage FROM `bettingtracker` WHERE MONTH(date) = 07 AND YEAR(date) = 2021
                and outcome='Win'";
                $result = mysqli_query($conn,$sql);
              
              
               while($r = mysqli_fetch_array($result))
              {
                 echo  $r['julywin_percentage']; 
                 print "</td> <td>";
              }
              $sql = "SELECT SUM(amount) as julydeposit from deposits WHERE MONTH(date) = 07 AND YEAR(date) = 2021";
               $result = mysqli_query($conn,$sql);
             
             
              while($r = mysqli_fetch_array($result))
             {
                echo  $r['julydeposit']; 
                print "</td> <td>";
             }
             $sql = "SELECT sum(pnl)  as julypnl FROM `bettingtracker` WHERE MONTH(date) = 07 ";
             $result = mysqli_query($conn,$sql);
            
            
           while($r = mysqli_fetch_array($result))
           {
               echo  $r['julypnl']; 
               print "</td> <td>";
              
           }
           $sql = "SELECT SUM(amount) as julytotalwithdrawals from withdrawals WHERE MONTH(date) = 07 ";
           $result = mysqli_query($conn,$sql);
         
         
          while($r = mysqli_fetch_array($result))
         {
            echo  $r['julytotalwithdrawals']; 
            
         }

        ?>
        </table>


</body>
</html>
