<?php

    if(isset($_POST['submit'])){
        $u=$_POST['username'];
        $e=$_POST['email'];
        $p=$_POST['phoneNumber'];
        $pwd=$_POST['password'];
        $cpwd=$_POST['ConfirmP'];
        $conn = new mysqli('localhost','root','','grocery');
        if($conn->connect_error){
            die('Connection failed: ' .$conn->connect_error);
        }
        else{
            $check = "SELECT * from customerinfo WHERE `UserName` = '".$u."' or `Email` = '".$e."' or `Mobile` = '".$p."'" ;
            $result = mysqli_query($conn,$check);
            $r = mysqli_num_rows($result);
            if($r>0){
                $row=mysqli_fetch_assoc($result);
                if($row["UserName"]==$u)
                    echo '<script>alert("User name already exist")</script>';
                else if($row["Email"]==$e)
                    echo '<script>alert("Email already exist")</script>';
                else
                    echo '<script>alert("Phone number already exist")</script>';

            }
            else if(!filter_var($e,FILTER_VALIDATE_EMAIL)){
                echo '<script>alert("Invalid Email")</script>';
            }
            else if(strlen($p)!=10){
                echo '<script>alert("Invalid Mobile number")</script>';
            }
            else if($pwd!=$cpwd){
                echo '<script>alert("Confirm password and password does not match")</script>';
            }
            else{
                $sql = "INSERT INTO customerinfo(UserName,Email,UserPassword,Mobile) VALUES ('".$u."','".$e."','".$pwd."','".$p."'); ";
                $result = mysqli_query($conn,$sql);
                if($result)
                    header("Location: Login.php");
                else
                    echo"Failed To SignUp try again later";
            }
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Signup Page</title>
        <link rel="stylesheet" href="CSS/Signup.css">
        <link rel="stylesheet" href="CSS/Cart.css">
        <link rel="stylesheet" href="CSS/Navigation.css">
        <script type="text/javascript" src="http://localhost/Groceries/PhpFolder/JS/Navigation.js"></script>
    </head>
    <body style="background-image: url(ASSETS/img.jpg); background-repeat: no-repeat; background-size: 100% 100%;">
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
                <form  method="POST" class="fdecor" style="margin-top:30px">
                    <fieldset>
                    <div  class="form-decor"style="margin-top:20px">
                        <label>Username: </label>
                        <input name="username" type="text" placeholder="Username" id="uname" required>    
                    </div>
                    <div  class="form-decor">
                        <label>Email: </label>
                        <input name="email" type="text" placeholder="Email" required>
                    </div>
                    <div  class="form-decor">
                        <label>Phone number:</label>
                        <input name="phoneNumber" maxlength="10" type="text" placeholder="Phone number" required> 
                    </div>
                    <div  class="form-decor">
                        <label>Password:</label>
                        <input name="password" type="password" placeholder="Password" required> 
                    </div>
                    <div  class="form-decor">
                        <label>Confirm Password:</label>
                        <input name="ConfirmP" type="password" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-decor">
                        <input name="submit" type="submit">
                    </div>
                </fieldset>
                </form>
                <h4 style="color:white">Already a member??</h4>
                <h4><bold><a href="http://localhost/Groceries/PhpFolder/Login.php" style="color:white">Sign in here</a></bold></h4>
            </div>
        </center>
    </body>
</html>