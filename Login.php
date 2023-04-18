<?php
    session_start();
    unset($_SESSION['arr']);
    if(!isset($_SESSION['logged']))
        $_SESSION['logged']='';
    unset($_SESSION['FID']);
    // echo "hi";
    // echo $_SESSION['logged'];
    if(isset($_POST['submit'])){
        $u=$_POST['username'];
        $p=$_POST['password'];
        $conn = new mysqli('localhost','root','','grocery');
        if($conn->connect_error){
            die("Connection error: " .$conn->connect_error);
        }
        else{
            $sql = "SELECT * FROM customerinfo where `UserName` = '".$u."' and `UserPassword` = '".$p."' ;";
            $result = mysqli_query($conn,$sql);
            $r = mysqli_num_rows($result);
            if($r>0){
                $_SESSION['logged'] = 'success';
                $_SESSION['u'] = $u;
                header("Location: Home.php");
                // exit();
            }
                
            else{    
                echo"<script>alert('Seems you are not registered please signup')
                window.location.href='http://localhost/Groceries/PhpFolder/Signup.php'
                </script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="CSS/Signup.css">
        <link rel="stylesheet" href="CSS/Cart.css">
        <link rel="stylesheet" href="CSS/Navigation.css">
        <script type="text/javascript" src="http://localhost/Groceries/PhpFolder/JS/Navigation.js"></script>
    </head>
    <body style="background-image: url(ASSETS/img.jpg); background-repeat: no-repeat; background-size: 100% 130%;">
        <!-- Navigation bar -->
        <div  id="main">
            <button  onclick="w3_open()" class="openbtn" name="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" >
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
            </button>
        </div>
            
              
        <div class="sidebar" id="mySidebar">
        <a class="closebtn" onclick="w3_close()">X</a>
        <a href="http://localhost/Groceries/PhpFolder/Food%20grains.php">Food grains</a><hr>
        <a href="http://localhost/Groceries/PhpFolder/Fruits.php">Fruit</a><hr>
        <a href="http://localhost/Groceries/PhpFolder/Spices.php">Spices</a><hr>
        <a href="http://localhost/Groceries/PhpFolder/Snacks.php">Snacks</a><hr>
        <a href="http://localhost/Groceries/PhpFolder/Vegetable.php">Vegetable</a><hr>
        </div>


        <!-- Logo -->
        <img src="ASSETS/Logo.jpg" width="22%" height="80px" style="margin-top: -20px; margin-bottom: 40px; margin-left: 60px; display: inline;" alt="logo" usemap="#homeLogo">
            <map name="homeLogo">
                <area shape ="rect" coords="0 0 300 200" href="Home.php">
            </map>

        <!-- delivery     -->
        <img src="ASSETS/Image.jpg" style="display:inline; margin-top: -85px;" height="180px" width="60%" alt="delivery">

        <center>
            <div>
                <form  class="fdecor" method="POST">
                    <fieldset>
                    <div  class="form-decor"style="margin-top:20px">
                        <label>Username: </label>
                        <input name="username" type="text" placeholder="Username">    
                    </div>
                    <div  class="form-decor">
                        <label>Password </label>
                        <input name="password" type="password" placeholder="Password">
                    </div>          
                    <div class="form-decor">
                        <input name="submit" type="submit">
                    </div>
                    </fieldset>
                </form>
                <h4 style="color:black">Not a member??</h4>
                <h4><bold><a href="http://localhost/Groceries/PhpFolder/Signup.php" style="color:black">Sign up here</a></bold></h4>
            </div>
        </center>
    </body>
</html>