<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php

//generate submit time to Database
date_default_timezone_set("Asia/Taipei");
$submit_time = date("Y-m-d H:i:s");


$lastname = $_POST["lastname"];
$firstname = $_POST["firstname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$company = $_POST["company"];


$job = $_POST["job"];
$addr = $_POST["addr"];


//Q1
$related = $_POST["related"];
$jobOption = $_POST["jobOption"];

//Q2
$radioA2 = $_POST["radioA2"];


//Q3
$A3_1 = $_POST["A3_1"];
$A3_2 = $_POST["A3_2"];
$A3_3 = $_POST["A3_3"];
$A3_4 = $_POST["A3_4"];

//Q4
$radioA4 = $_POST["radioA4"];

//Q3
$A4_1 = $_POST["A4_1"];
$A4_2 = $_POST["A4_2"];
$A4_3 = $_POST["A4_3"];
$A4_4 = $_POST["A4_4"];

//A5
$A5_1 = $_POST["A5_1"];
$A5_2 = $_POST["A5_2"];
$A5_3 = $_POST["A5_3"];
$A5_4 = $_POST["A5_4"];
$A5_5 = $_POST["A5_5"];
$A5_6 = $_POST["A5_6"];


//A6
$A6 = $_POST["A6"];

//A7
$radioA7 = $_POST["radioA7"];


//A8
$radioA8 = $_POST["radioA8"];

//A9
$A9 = $_POST["A9"];

//A10
$A10 = $_POST["A10"];

$radioA11 = $_POST['radioA11'];


echo $lastname.$firstname.$phone.$email ; 


//phpinfo();
$serverName = "pindserver.database.windows.net,1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"pingazuresurvey", "UID"=>"ping", "PWD"=>"Qaz098wsx098","CharacterSet" =>"UTF-8");

$conn = sqlsrv_connect($serverName, $connectionInfo);


//$query = " SET NOCOUNT ON; INSERT INTO [dbo].[survey] ([firstname],[lastname],[email],[phone],[company],[submit_time],[job],[addr],[related]) VALUES ('$firstname','$lastname','$email','$phone','$company','$submit_time','$job','$addr',N'$related');";

$query = " SET NOCOUNT ON;

INSERT INTO [dbo].[survey] 
([firstname],[lastname],[email],[phone],[company],[submit_time],[job],[addr],

[related],[jobOption],

[radioA2],

[A3_1],[A3_2],[A3_3],[A3_4],

[A4_1],[A4_2],[A4_3],[A4_4],

[radioA4],

[A5_1],[A5_2],[A5_3],[A5_4],[A5_5],[A5_6],

[A6],

[radioA7],

[radioA8],

[A9],[A10],

[radioA11]) 

VALUES (N'$firstname',N'$lastname','$email','$phone',N'$company','$submit_time',N'$job',N'$addr'

,N'$related',N'$jobOption',

'$radioA2',

N'$A3_1',N'$A3_2',N'$A3_3',N'$A3_4',

N'$A4_1',N'$A4_2',N'$A4_3',N'$A4_4',

'$radioA4',

N'$A5_1',N'$A5_2',N'$A5_3',N'$A5_4',N'$A5_5',N'$A5_6',

N'$A6',

'$radioA7',

'$radioA8',

N'$A9',N'$A10'

,'$radioA11');";


//$query = " SET NOCOUNT ON; INSERT INTO [dbo].[survey] ([firstname]) VALUES ('$firstname');";


$params = array(   
                             array($_POST["IdCompagnie"], SQLSRV_PARAM_IN),
                             array($v_code, SQLSRV_PARAM_IN),
                             array($v_nom, SQLSRV_PARAM_IN), 
                             array($v_desc, SQLSRV_PARAM_IN)  
                           );


//echo 'result :'.'"$result"'.'\n';


$stmt = sqlsrv_query( $conn, $query,$params);



if( $stmt === false )
{
     echo "Error in statement preparation/execution.\n";
     die( print_r( sqlsrv_errors(), true));
}else{
	echo 'statement ok';
}




while($row = sqlsrv_fetch($stmt)){
              //echo $row->name;
			   $row->name;
        }
		
		
		
	// fetch the SQL database 	
if(sqlsrv_fetch( $stmt ) === false )
{
     echo "Error in retrieving row.\n";
    // die( print_r( sqlsrv_errors(), true));
}else{
echo 'retrieveing ok   ';	
	
}

sqlsrv_close($conn);

header('Location: thankyou.html');
exit;

?>
</body>
</html>