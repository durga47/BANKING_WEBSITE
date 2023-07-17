<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-registration form</title>
    <link rel="stylesheet" href = "registerstyle.css">
</head>
<body>
<script language=javascript>
function validate()
{
		//alert("testing");

    var x =document.form1.text1.value;
	if(x.length < 3 )
	{
		alert("Please Enter  Correct Account Holder Name");
		return false;
	}

    x=document.form1.text2.value;
	if(isNaN(x)||x.length!=10)
	{
		alert("Please Enter  10 Digit Number for Acoount Number");
		return false;
	}

    x =document.form1.text3.value;
	if(x.length < 3 )
	{
		alert("Please Enter  correct Bank Name");
		return false;
	}

    x =document.form1.text4.value;
	if(x.length < 3)
	{
		alert("Please Enter Valid Occupation Name");
		return false;
	}
		
    x =document.form1.text5.value;
	if(x.length < 3)
	{
		alert("Please Enter Valid Address");
		return false;
	}

    x =document.form1.text6.value;
	var atpos1 = x.indexOf("@");
	var atpos2 = x.indexOf(".");
	//alert(atpos1+ " " + atpos2);
	if(x.length < 8||atpos1 < 2|| atpos2 < 5)
	{
		alert("Please Enter valid Email ID");
		return false;
	}

    x=document.form1.text7.value;
	if(isNaN(x)||x.length!=10)
	{
		alert("Please Enter  10 Digit Mobile Number");
		return false;
	}
}
</script>



    <?php
    session_start();
    include('connfile.php');
        $res="";
        $name_error = $email_error = $acc_error = $num_error = $check_error = "";
        $passwordErr = $cpasswordErr = "";  
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //echo("working");
        $v1=$_POST['text1'];
        $v2=$_POST['text2'];
        $v3=$_POST['text3'];
        $v4=$_POST['text4'];
        $v5=$_POST['text5'];
        $v6=$_POST['text6'];
        $v7=$_POST['text7'];
        $v8=$_POST['text8'];
        $v9=$_POST['text9'];


        if(isset($_POST['submit']))
        {
           
            //Validates password & confirm passwords.
            if(!empty($_POST["text8"]) && ($_POST["text8"] == $_POST["text9"])) 
            {
                if (strlen($_POST["text8"]) <= '8') {
                    $passwordErr = "Your Password Must Contain At Least 8 Characters!";
                }
                elseif(!preg_match("#[0-9]+#",$v8)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Number!";
                }
                elseif(!preg_match("#[A-Z]+#",$v8)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                }
                elseif(!preg_match("#[a-z]+#",$v8)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
                elseif(!preg_match("#[^\w]+#",$v8)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Special Case Character!";
                } 
                else {
                    $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
                }
                // Check Email
                $checkemail = "SELECT Email FROM registration WHERE Email='$v6' LIMIT 1";
                $checkemail_run = mysqli_query($conn, $checkemail);
                $checkemail_run =$conn -> query($checkemail);                
                if(mysqli_num_rows($checkemail_run) > 0)
                {
                    // Already Email Exists
                    $_SESSION['message'] = "Already Email Exists!";
                    header("Location: register.php");
                    exit(0);
                }
                else
                {
                    $sqlvar="insert into registration values('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8')";
                    $result=$conn -> query($sqlvar);
                    if($result)
                    {
                        $_SESSION['message'] = "Registered Successfully!";
                        header("Location: register.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['message'] = "Something Went Wrong!";
                        header("Location: register.php");
                        exit(0);
                    }
                }
            }
            else
            {
                $_SESSION['message'] = "Password and Confirm Password does not Match.";
                header("Location: register.php");
                exit(0);
            }
        }
    }
    ?>
    <?php
        // Your message code
        if(isset($_SESSION['message']))
        {
            echo '<h4 class="alert alert-warning">'.$_SESSION['message'].'</h4>';
            unset($_SESSION['message']);
        } // Your message code
    ?>
    <div class = "big">
    <div class = 'form-box'>
        <h1>REGISTRATION</h1>
        <form id = "register" name="form1" class="input-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type ="text" class="input-field" name="text1" placeholder="Account Holder Full Name">
            <input type ="text" class="input-field" name="text2" placeholder="Account Number(10-digit)">
            <input type ="text" class="input-field" name="text3" placeholder="Bank Name">
            <input type ="text" class="input-field" name="text4" placeholder="Occupation">
			<input type ="text" class="input-field" name="text5" placeholder="Address">
			<input type ="email" class="input-field" name="text6" placeholder="Email Id">
			<input type ="text" class="input-field" name="text7" placeholder="Mobile No">
	        <input type ="password" class="input-field" name="text8" placeholder="Password">
	        <input type ="password" class="input-field" name="text9" placeholder="Retype Password">
            <br>
            <input type ="checkbox" class = "check-box"><p> I agree to terms & conditions</p>
            <input type="submit" class="submit" value="submit" name="submit" id="submit" onclick="return validate()">
        </form>
        
    </div>
    <p class="para"> 
	<a href=index.html> Back </a> Already have an account? <a href="login.php">Login here</a>
	</p>
    </div>
</body>
</html>
