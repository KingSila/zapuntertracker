
<?php
<meta charset="UTF-8">
//Block 1
$user = "root"; //Enter the user name
$password = "matodi21"; //Enter the password
$host = "localhost"; //Enter the host
$dbase = "punterdatabase"; //Enter the database
$table = "testresults"; //Enter the table name

//Block 2
$day= $_POST['day_entered'];
$month= $_POST['month_entered'];
$year= $_POST['year_entered'];

//Block 3
$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db($database, $connection);


//Block 4
$username_table= mysql_query( "SELECT username FROM $table WHERE username= '$username'" ) 
or die("SELECT Error: ".mysql_error()); 


//Block 5
mysql_query("INSERT INTO $table (dayselected, monthselected, yearselected)
VALUES ($day, $month, $year)");

//Block 6

echo 'You have been added.';

//Block 7
mysql_close($connection);

