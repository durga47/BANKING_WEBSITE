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
                    <li><a href="money.php">Transfer Money</a></li>
                    <li><a href="check.php">Check Balance</a></li>
                    <li><a href="history.php">Transaction History</a></li>
                    <li><a href="index.html">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <div class="main1">
            <div class="bank1">
                <h1>SD BANK OF INDIA</h1>
            </div>
        <div class="customer" style="margin: 23px 414px 23px 279px;">
            <h1>CUSTOMER DETAILS</h2>
        </div>
        <div class="check">
        <table align=center border=1 width=80% cellpadding=5 cellspacing=5 height: 153px>
            <tr> <td colspan=2> <h1> DETAILS </h1> </tr>
        <?php
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "bankingdata";

        // creating a connection
        $conn = mysqli_connect($host, $username, $password, $dbname);
        if($conn->connect_errno){
            echo('Failed to connect to MySQL');
            $conn->connect_error;
            exit();
        }
        session_start();
        $v1=$_SESSION['acno'];

            $sqlvar="select * from registration where AcNo='$v1'";
            $result=$conn -> query($sqlvar);
            if(!$result){
                echo('Error executing query');
                $conn->error;
                exit();
            }
            while($row=$result->fetch_row())
            {
                echo("<tr><td> Name </td><td>".$row[0]." </td></tr><tr><td> Account Number </td><td>".$row[1]."</td></tr><tr><td> Occupation </td><td>".$row[3]."</td></tr> <tr><td> Address </td><td>".$row[4]."</td></tr> <tr><td> Email Id</td><td>".$row[5]."</td></tr> <tr><td> Mobile Number</td><td>".$row[6]."</td></tr> ");
                
            }
            $conn->close();
            
        ?>

        </table>
        <a href=main.php> Back </a> 
        </div>
    </div>
</div>
</body>
</html>
