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
                    <li><a href="index,html">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <div class="main1">
            <div class="bank1">
                <h1>SD BANK OF INDIA</h1>
            </div>
<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankingdata";

// creating a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
session_start();



if($_SERVER['REQUEST_METHOD']=='POST')
{
	//echo("working");
	$v1=$_SESSION['acno'];
	$v2=$_POST['text1'];
	$v3=$_POST['text2'];
	$v4=$_POST['text3'];


	//echo $v1."  ".$v2;
	$nvar=1001;
	$sqlvar="select max(TranNo) + 1 from  transtab";
	$result=$conn -> query($sqlvar);
	if(!$result){
		echo("Error in excuting query");
		$conn->error;
		exit;
	}
	while($row=$result->fetch_row())
	{
		$nvar=$row[0];
	}
	if($nvar===null){$nvar=1001;}
	//echo($nvar);
	$d1=date('Y/m/d');
	$sqlvar2="insert into transtab values('$nvar','$d1','$v1','$v2','$v3','$v4')";
	$result2=$conn -> query($sqlvar2);
	if($result2)
	{
        $_SESSION['mess'] = "Transaction successful!";
        header("Location: money.php");
        exit(0);
	}
	else
	{
		
        $_SESSION['mess'] = "Transaction Failed!";
        header("Location: money.php");
        exit(0);
	}
	
	
}
?>
<?php
        // Your message code
        if(isset($_SESSION['mess']))
        {
            echo '<h4 class="alert alert-warning">'.$_SESSION['mess'].'</h4>';
            unset($_SESSION['mess']);
        } // Your message code
    ?>
<div class="transfer">
    <h1>TRANSFER MONEY</h1>
</div>
<div class="form">
<form name=form1 method="post"  action="money.php">

<table width=80% border=1 cellspacing=5 cellpadding=5 align=center>
<tr> <td colspan=2> Transfer Money </td> </tr>
<tr> <td >To AcNo </td> <td> <input type="text" name="text1"> </td> </tr>
<tr> <td > Amount</td> <td> <input type="text" name="text2"> </td> </tr>
<tr> <td > Transfer Details  </td> <td> <input type="text" name="text3"> </td> </tr>

<tr> <td > <a href=main.php> Back </a> </td> <td> <input type="submit" name="Login"  style="height: 45px; width: 150px"> </td> </tr>
</table>

</form>
</div>
<table width=100%>
<tr height=200> <td></td> </tr>
</table>
        </div>
    </div>
</body>
</html>