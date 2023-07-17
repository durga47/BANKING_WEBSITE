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
            <div class="balance">
                <h1>CHECK BALANCE</h1>
            </div>
        <div class="check">
        <table align=center border=1 width=80% cellpadding=5 cellspacing=5 height: 153px>
            <tr> <td colspan=2> <h1> Balance Amount </h1> </tr>
            <?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankingdata";

// creating a connection
$conn = mysqli_connect($host, $username, $password, $dbname);
session_start();
$v1=$_SESSION['acno'];

    $sqlvar="select sum(Amount) from transtab where To_AcNo ='$v1'";
    $result=$conn -> query($sqlvar);
    while($row=$result->fetch_row())
    {
        $credited = $row[0];
        
    }
    $sqlvar2="select sum(Amount) from transtab where AcNo='$v1'";
    $result2=$conn -> query($sqlvar2);
    while($row2=$result2->fetch_row())
    {
        $debited = $row2[0];
        
    }
    $balance = 3000 + $credited - $debited;

    if(!$balance){
        echo('Error executing query');
        $conn->error;
        exit();
    }
    else{ 
        echo("<tr><td> Balance Amount </td><td>".$balance." </td></tr>");
        
    }
    
?>

            </table>
            <a href="main.php"> Back </a> 
            <table width=100%>
            <tr height=200> <td></td> </tr>
            </table>
    </div>
            </div>    
</body>
</html>