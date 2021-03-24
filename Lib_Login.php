<?php
    include "../includes/Main_Connnection.php";
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <title>Login Page</title>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div  class="box">
    <h2>login</h2>
    <form name="login" action="" method="post">

            <div class="inputBox">
            <input type="text" name="username"required="">
            <label>Username</label>
            </div>
            <div class ="inputBox">
            <input type="password" name="password"required="">
            <label>password</label>
            </div>
            <div>
            <input type="submit" name="submit" value="login">
            </div>
            <Div id="Forgot">
            <a id="Forgotpassword"href="ChangePassword.php" style="text-decoration:none">Forgot password</a>
            <Div id="newaccount">
            <a id="Signup" href="../SignUp.html" style="text-decoration:none">Creat a New Account</a>
            </Div>
            </Div>
    </form>

    </div>
</body>
            <?php

            if (isset($_POST['submit']))
            {
                //count of how many row matched are username and password
                $count=0;
                $result=mysqli_query($conn,"SELECT * FROM `Professor` WHERE username='$_POST[username]' && password='$_POST[password]' ;");
                $count=mysqli_num_rows($result);

                if ($count==0)
                {
                ?>
                    <script type="text/javascript">
                        alert("The username and password doesn't match.");
                        window.location="Lib_Login.php"
                    </script>
                <?php
                }
                else
                {
                    $_SESSION['login_user']=$_POST['username'];
                    ?>
                    <script type="text/javascript" >
                        alert("Login Successfully.");
                        window.location="Library.php"
                    </script>
                <?php
                    
                }

            }
            ?>



<!---------------Styling of the Login----------------------->
<style>
body{
margin:0;
padding:0;
font-family:sans-serif;
background-image:url(lib_img.jpg);
background-size:cover;
}
.box{
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
width:4oopx;
padding:40px;
padding-bottom:140px;
background:rgba(0,0,0,.8);
box-sizing:border-box;
box-shadow:0 15px 25px rgba(0,0,0,.5);
border-radius:10px;
}
.box h2{
margin:0 0 30px;
padding:0;
color:#fff;
text-align:center;
}
.box .inputBox{
position:relative;
}
.box .inputBox input{
width:100%;
padding:10px 0;
font-size:16px;
color:#fff;
letter-spacing:1px;
margin-bottom:30px;
border:none;
border-bottom:1px solid #fff;
outline:none;
background:transparent;
}
.box .inputBox label{
position:absolute;
top:0;
left:0;
padding:10px 0;
font-size:16px;
color:#fff;
pointer-events:none;
transition:.5s;
}
.box .inputBox input:focus ~ label,
.box .inputBox input:valid ~ label{
top:-18px;
left:0;
color:#03a9fa;
font-size:12px;
}
.box input[type="submit"]
{
background:transparent;
border:none;
outline:none;
color:#fff;
background:#03a9fa;
padding:10px 20px;
cursor:pointer;
border-radius:5px;
}
.E{
color:white;
}
#Forgot{
position: absolute;
margin-top: 34px;
}
#newaccount{
margin-top: 30px;
}
#Forgotpassword{
color:#a963ff;
}
#Signup{
    color:#2ae8cf;
}
</style>


</html>