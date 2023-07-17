<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>
        SD BANK OF INDIA
    </title>
    <link rel="stylesheet" href="remstyle.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <nav>
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="acc.php">Account Details</a></li>
                    <li><a href="check.php">Check Balance</a></li>
                    <li><a href="money.php">Transfer Money</a></li>
                    <li><a href="history.php">Transaction History</a></li>
                    <li><a href="index.html">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <div class="main1">
            <div class="bank1">
                <h1>SD BANK OF INDIA</h1>
            </div>  
            <div class="history">
            <table align=center border=1 width=80% cellpadding=6 cellspacing=5>

                <tr><td colspan=6><h3 align:center> Customer Transaction List </h3> </td></tr>
                <tr><td> Tran No </td><td> Date </td><td> Acc No </td><td> Credit Amount</td><td> Debit Amount</td><td> Details</td></tr>
                <?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankingdata";

// creating a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
session_start();
$v1=$_SESSION['acno'];

	$sqlvar="select * from transtab where AcNo=$v1 ";
	$result=$conn -> query($sqlvar);
	if(!$result){
		echo('Error executing query');
		$conn->error;
		exit();
	}
	while($row=$result->fetch_row())
	{
		echo("<tr><td>".$row[0]."</td>
		<td>".$row[1]."</td>
		<td>".$row[3]."</td>
		<td>"."0"."</td>
		<td>".$row[4]."</td>
		<td>".$row[5]."</td></tr>");
		
	}
	$sqlvar="select * from transtab where To_AcNo = $v1 ";
	$result=$conn -> query($sqlvar);
	if(!$result){
		echo('Error executing query');
		$conn->error;
		exit();
	}
	while($row=$result->fetch_row())
	{
		echo("<tr><td>".$row[0]."</td>
		<td>".$row[1]."</td>
		<td>".$row[2]."</td>
		<td>".$row[4]."</td>
		<td>"."0"."</td>
		<td>".$row[5]."</td></tr>");
		
	}
	
?>

</table>
                <a href=main.php> Back </a> 
                <table width=100%>
                <tr height=200> <td></td> </tr>
                </table>
                </div>
        </div>
    </div>
</body>
</html>