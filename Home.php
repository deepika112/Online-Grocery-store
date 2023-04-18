<?php 
    session_start();
    // echo $_SESSION['logged'];
    // else{
    //     echo "ERRR";
    // }
    if(!isset($_SESSION['logged']))
        $_SESSION['logged']='';
    $conn = new mysqli('localhost','root','','grocery');
    if($conn->connect_error)
        die("Error in connection: " .$conn->connect_error);
    else{
        if(isset($_POST['FGsubmit'])){
            $_SESSION['FID'] = 'yes';
            // echo $_SESSION['FID'];
            $_SESSION['ID'] = $_GET['code'];
            $_SESSION['qty'] = $_POST['quantity'];
        }
        if(isset($_POST['submit'])){
            $_SESSION['FrID'] = 'yes';
            // echo $_SESSION['FrID'];
            $_SESSION['ID'] = $_GET['code'];
            $_SESSION['qty'] = $_POST['quantity'];
        }
        if(isset($_POST['Snackssubmit'])){
            $_SESSION['SID'] = 'yes';
            // echo $_SESSION['FID'];
            $_SESSION['ID'] = $_GET['code'];
            $_SESSION['qty'] = $_POST['quantity'];
        }
        if(isset($_POST['Spsubmit'])){
            $_SESSION['SpID'] = 'yes';
            // echo $_SESSION['FID'];
            $_SESSION['ID'] = $_GET['code'];
            $_SESSION['qty'] = $_POST['quantity'];
        }
        if(isset($_POST['Vsubmit'])){
            $_SESSION['VID'] = 'yes';
            // echo $_SESSION['FID'];
            $_SESSION['ID'] = $_GET['code'];
            $_SESSION['qty'] = $_POST['quantity'];
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" href="CSS/Home.css">
        <link rel="stylesheet" href="CSS/Fruit.css">
        <link rel="stylesheet" href="CSS/Navigation.css">
        <!-- <link rel="stylesheet" href="CSS/Signup.css"> -->
        <script type="text/javascript" src="http://localhost/Groceries/PhpFolder/JS/Cart.js"></script>
        <script type="text/javascript" src="http://localhost/Groceries/PhpFolder/JS/Navigation.js"></script>
    </head>
    <body>
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
            <!-- <h6 style="margin-left:95%;">Login</h6> -->
            <?php if($_SESSION['logged']==''){?>
            <h4 style="margin-top:-38px; margin-left:45%;">
            <a href="http://localhost/Groceries/PhpFolder/Signup.php"><svg style="margin-left:90%;" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg></a>
            </h4>
            <!-- style="margin-left:95%;"
            style=" margin-left:95%;" -->
            <?php }?>
            <img src="ASSETS/Logo.jpg" width="22%" height="80px" style=" margin-top: -20px; margin-bottom: 40px; margin-left: 60px; display: inline;" alt="logo" usemap="#homeLogo">
            <map name="homeLogo">
                <area shape ="rect" coords="0 0 300 200" href="Home.php">
            </map>
            <!-- <div style="text-align:right">
                
            </div> -->
            <img src="ASSETS/Image.jpg" style="display:inline; margin-top: -85px;" height="180px" width="60%" alt="delivery">


            <?php if($_SESSION['logged']=='success') { ?>
                <ul style="display:inline; list-style-type: none; ">
                    <li><h4 style="margin-left:90%; margin-top:-150px;">
                        <?php echo 'WELCOME<br>';
                        echo $_SESSION['u'];?></h4></li>
                    <li style="margin-left:90%;"><a href="http://localhost/Groceries/PhpFolder/Cart.php"><svg xmlns="http://www.w3.org/2000/svg"  width="30px" height="30px" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg></a></li>
                    <li style="margin-left:90%;"><a href="http://localhost/Groceries/PhpFolder/Logout.php"><svg  xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg></a></li>
                </ul>
            <?php }?>



            <img src="ASSETS/Offer.jpg" width="100%" height="39%">
            <br><br><h1>Categories</h1><hr id="bold"><br><br>
            <div><h2>Food Grains</h2><br><br></div>
            <?php 
                    $prod=[];
                    $sql = "SELECT * FROM foodgrains where FID = '1' OR FID = '2' OR FID = '3';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        while($row = $result->fetch_object()){
                            $prod[] = $row;
                        }
                    }
                    else{
                        echo 'Error in fetching data';
                    }
                    foreach($prod as $p){
                ?>    
                <div>
                    <div class="box" style="float: left">
                        <img src="<?php echo $p->Image;?>" alt="">
                        <div class="text">
                            <p><?php echo $p->Foodgrains;?></p>
                            <p><?php echo $p->Price; ?></p>
                            <p><?php echo $p->Quantity; ?></p>
                        </div> 
                    <form method="post" action="Home.php?code=<?php echo $p->FID; ?>">
                        <input style="margin-left:20px" type="text" name="quantity" value="1" size="2">
                        <input name="FGsubmit" type="submit" value="ADD TO CART" class="submit-button">
                    </form>
                </div>
                </div>
                <?php } ?>
            </div>
                <a href="http://localhost/Groceries/PhpFolder/Food%20grains.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16" style="margin-top:140px; margin-left:30px ;">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                </svg></a>
            </div><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><h2>Fruits</h2>
            <div>
                <?php 
                    $prod=[];
                    $sql = "SELECT * from Fruits where FrID = '1' OR FrID = '2' OR FrID = '3';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        while($row = $result->fetch_object()){
                            $prod[] = $row;
                        }
                    }
                    else{
                        echo 'Error in fetching data';
                    }
                    foreach($prod as $p){
                ?>    
                <div>
                    <div class="box" style="float: left">
                        <img src="<?php echo $p->Image;?>" alt="">
                        <div class="text">
                            <p><?php echo $p->FruitName;?></p>
                            <p><?php echo $p->Price; ?></p>
                            <p><?php echo $p->Quantity; ?></p>
                        </div>
                    <form method="post" action="Home.php?code=<?php echo $p->FrID; ?>">
                        <input style="margin-left:20px" type="text" name="quantity" value="1" size="2">
                        <input name="submit" type="submit" value="ADD TO CART"  class="submit-button">
                    </form>
                    </div>
                </div>
                <?php } ?>
            </div>
                <a href="http://localhost/Groceries/PhpFolder/Fruits.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16" style="margin-top:140px; margin-left:30px ;">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                </svg></a>
            </div><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><h2>Spices</h2>
            <?php 
                    $prod=[];
                    $sql = "SELECT * from spices where SpID = '1' OR SpID = '2' OR SpID = '3';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        while($row = $result->fetch_object()){
                            $prod[] = $row;
                        }
                    }
                    else{
                        echo 'Error in fetching data';
                    }
                    foreach($prod as $p){
                ?>    
                <div>
                    <div class="box" style="float: left">
                        <img src="<?php echo $p->Image;?>" alt="">
                        <div class="text">
                            <p><?php echo $p->SpicesName;?></p>
                            <p><?php echo $p->Price; ?></p>
                            <p><?php echo $p->Quantity; ?></p>
                        </div>
                <form method="post" action="Home.php?code=<?php echo $p->SpID; ?>">
                    <input style="margin-left:20px" type="text" name="quantity" value="1" size="2">
                    <input name="Spsubmit" type="submit" value="ADD TO CART" class="submit-button">
                </form>
                    </div>
                </div>
                <?php } ?>
            </div>
                <a href="http://localhost/Groceries/PhpFolder/Spices.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16" style="margin-top:140px; margin-left:30px ;">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                </svg></a>
            </div><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><h2>Snacks</h2>
            <?php 
                    $prod=[];
                    $sql = "SELECT * from snacks where `SID` = '1' OR `SID` = '2' OR `SID` = '3';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        while($row = $result->fetch_object()){
                            $prod[] = $row;
                        }
                    }
                    else{
                        echo 'Error in fetching data';
                    }
                    foreach($prod as $p){
                ?>    
                <div>
                    <div class="box" style="float: left">
                        <img src="<?php echo $p->Image;?>" alt="">
                        <div class="text">
                            <p><?php echo $p->SnackName;?></p>
                            <p><?php echo $p->Price; ?></p>
                            <p><?php echo $p->Quantity; ?></p>
                        </div>
                <form method="post" action="Home.php?code=<?php echo $p->SID; ?>">
                    <input style="margin-left:20px" type="text" name="quantity" value="1" size="2">
                    <input name="Snackssubmit" type="submit" value="ADD TO CART" class="submit-button">
                </form>
                    </div>
                </div>
                <?php } ?>
            </div>
                <a href="http://localhost/Groceries/PhpFolder/Snacks.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16" style="margin-top:140px; margin-left:30px ;">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                </svg></a>
            </div><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><h2>Vegetable</h2>
            <?php 
                    $prod=[];
                    $sql = "SELECT * from vegetable where VID = '1' OR VID = '2' OR VID = '3';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        while($row = $result->fetch_object()){
                            $prod[] = $row;
                        }
                    }
                    else{
                        echo 'Error in fetching data';
                    }
                    foreach($prod as $p){
                ?>    
                <div>
                    <div class="box" style="float: left">
                        <img src="<?php echo $p->Image;?>" alt="">
                        <div class="text">
                            <p><?php echo $p->VegetableName;?></p>
                            <p><?php echo $p->Price; ?></p>
                            <p><?php echo $p->Quantity; ?></p>
                        </div>
                <form method="post" action="Home.php?code=<?php echo $p->VID; ?>">
                    <input style="margin-left:20px" type="text" name="quantity" value="1" size="2">
                    <input name="Vsubmit" type="submit" value="ADD TO CART" class="submit-button">
                </form>
                    </div>
                </div>
                <?php } ?>
            </div>
                <a href="http://localhost/Groceries/PhpFolder/Vegetable.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16" style="margin-top:140px; margin-left:30px ;">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                </svg></a>
            </div><br><br>
    </body>
</html>