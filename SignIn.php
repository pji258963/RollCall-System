<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php
 
$account = $_GET["account"];
$password = $_GET["password"];



$serverName = "pindserver.database.windows.net";

$connectionInfo = array( "Database"=>"pingClassRegisterDB", "UID"=>"ping", "PWD"=>"Qaz098wsx098","CharacterSet" =>"UTF-8");

$conn = sqlsrv_connect($serverName, $connectionInfo);
if($conn){
echo"connection establish.<br/>";
}
else{
echo"connectionfailure.<br/>"	;
die(print_r(sqlsrv_errors(),true));
}

//" INSERT INTO [rollcall] 
 //(account, password )
 //values 
 //('$account','$password')";
 $query =  "INSERT INTO [dbo].[rollcall] ([account],[password]) VALUES   
('$account','$password');";
$result = sqlsrv_query($query,$conn);

if($result==TRUE){
echo 0;
}
else
{
echo 1; 
}

sqlsrv_close($conn);

 
 ?>
<a href="3.php">3</a></body>
</html>