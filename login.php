<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>
        SD BANK OF INDIA
    </title>
	<link rel="stylesheet" href="loginstyle.css">
</head>
<body>
<?php
        // Your message code
        if(isset($_SESSION['message']))
        {
            echo '<h4 class="alert alert-warning">'.$_SESSION['message'].'</h4>';
            unset($_SESSION['message']);
        } // Your message code
    ?>
	<form name="form1" method="post" action="login.php">
	<div class="box">
    <div class="container1">
        <div class="top">
            <span>Have an account?</span>
            <header>Login</header>
        </div>
        <div class="input-field">
            <input type="text" name="text1" class="input" placeholder="User Id" id="">
            <i class='bx bx-user' ></i>
        </div><br>
        <div class="input-field">
            <input type="Password" name="text2" class="input" placeholder="Password" id="">
            <i class='bx bx-lock-alt'></i>
        </div><br>
        <div class="input-field">
            <input type="submit" name="login" class="submit" value="Login" id="">
        </div>
        <div class="two-col">
            <div class="one">
               <input type="checkbox" name="" id="check">
               <label for="check"> Remember Me</label>
            </div>
            <div class="two">
                <label><a href="#">Forgot password?</a></label>
            </div>
        </div>
    </div>
    </div> 
</form>
<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bankingdata";

// creating a connection
$con = mysqli_connect($host, $username, $password, $dbname);
session_start();
$_SESSION['acno']=00;
if($_SERVER['REQUEST_METHOD']=='POST')
{
	//echo("working");
	$v1=$_POST['text1'];
	$v2=$_POST['text2'];
	//echo $v1."  ".$v2;
	$sqlvar="select * from registration where AcNo='$v1' and Password='$v2'";
	$result=$con -> query($sqlvar);
	if($result -> num_rows > 0)
	{
		$_SESSION['acno']=$v1;
		echo($_SESSION['acno']);
		header('location: main.php');
		
	}
	else
	{
		
		echo('userid or password is not correct');
	}
	
	
}

?>
</body>
</html>