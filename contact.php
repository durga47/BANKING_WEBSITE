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
        <div class="main">
        <?php
            // Your message code
            if(isset($_SESSION['message']))
            {
                echo '<h4 class="alert alert-warning">'.$_SESSION['message'].'</h4>';
                unset($_SESSION['message']);
            } // Your message code
        ?>
            <div class="contactform">
                <h1>Contact us for any Work/Queries</h1>
                <form id = "cont" name="form1"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="mb-3">
                        <label for="clientemail" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control" id="clientemail" aria-describedby="emailHelp">
                      </div>
                    <div class="mb-3">
                      <label for="clientemail" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="clientemail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="clientphone" class="form-label">Phone</label>
                      <input type="phone" name="phone" class="form-control" id="clientphone">
                    </div>
                    <div class="mb-3">
                        <label for="clientemail" class="form-label">Enquiry</label>
                        <input type="name" name="enquiry" class="form-control" id="clientemail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email & phone with anyone else.</div>
                      </div>
                    <div class="mb-3" id="form-check">
                      <input type="checkbox" class="form-check-input" id="isclient">
                      <label class="form-check-label" for="isclient">Iam willing to share details.</label>
                    </div>
                    <div class="btn">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <script language=javascript>
    function validate(){
    var x =document.form1.name.value;
	if(x.length < 3 )
	{
		alert("Please Enter  Correct Account Holder Name");
		return false;
	}
    var x =document.form1.email.value;
	var atpos1 = x.indexOf("@");
	var atpos2 = x.indexOf(".");
	//alert(atpos1+ " " + atpos2);
	if(x.length < 8||atpos1 < 2|| atpos2 < 5)
	{
		alert("Please Enter valid Email ID");
		return false;
	}
    x=document.form1.phone.value;
	if(isNaN(x)||x.length!=10)
	{
		alert("Please Enter  10 Digit Mobile Number");
		return false;
	}
    x=document.form1.enquiry.value;
	if(islength < 5)
	{
		alert("Please Enter  Something");
		return false;
	}
        }
        </script>

        <?php
session_start();
$rs = "";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $v1 = $_POST['name'];
        $v2 = $_POST['email'];
        $v3 = $_POST['phone'];
        $v4 = $_POST['enquiry'];

        //echo("working");
        $errors = [];

        if (empty($v1)) {
            $errors[] = "Name is required";
        }
        
        // database details
        if (count($errors) === 0) {
            $host = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "bankingdata";
        
            // creating a connection
            $con = mysqli_connect($host, $username, $password, $dbname);
        
            // to ensure that the connection is made
            if ($con -> connect_error)
            {
                die("Connection failed!" . $con->connect_error);
            }
        
            // using sql to create a data entry query
            $sql = "INSERT INTO contact VALUES ('$v1', '$v2', '$v3', '$v4')";
          
            // send query to the database to add values and confirm if successful
            $rs = $con -> query($sql);
            if($rs === true)
            {
                echo "Response recorded!";
            }
            else{
                
                echo "Error" .$sql . "<br>" .$con->error;
            }
            
          
            // close connection
            $con->close();
        }
        else{
            // Display validation errors
            foreach ($errors as $error) {
                echo $error . "<br>";
        }
        }
        }
        
        ?>
</body>
</html>