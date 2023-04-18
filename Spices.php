<?php
    session_start();
    if(!isset($_SESSION['SpID']))
        $_SESSION['SpID']='';
    $prod = [];
    $conn = new mysqli('localhost','root','','grocery');
    if($conn->connect_error)
        die("Connection error" .$conn->connect_error);
    else{
        $sql = "SELECT * FROM spices;";
        $result = mysqli_query($conn,$sql);
        while($row=$result->fetch_object()){
            $prod[] = $row;
        }
        if(isset($_POST['Spsubmit'])){
            $_SESSION['SpID'] = 'yes';
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
            Spices
        </title>
        <link rel="stylesheet" href="CSS/Fruit.css">
        <link rel="stylesheet" href="CSS/Navigation.css">
        <script type="text/javascript" src="http://localhost/Groceries/PhpFolder/JS/Cart.js"></script>
        <script type="text/javascript" src="http://localhost/Groceries/PhpFolder/JS/Navigation.js"></script>
    </head>
    <body>

        
    <body>
        <!-- Navigation bar -->
        <div  id="main">
            <button  onclick="w3_open()" class="openbtn">
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
        <img src="ASSETS/Logo.jpg" width="22%" height="80px" style=" margin-top: -20px; margin-bottom: 40px; margin-left: 60px; display: inline;" alt="logo" usemap="#homeLogo">
        <map name="homeLogo">
            <area shape ="rect" coords="0 0 300 200" href="Home.php">
        </map>

            <!-- Food grain logo -->
        <img src="ASSETS/Food grains/Logo.jpg" style="display:inline; margin-top: -75px;" height="180px" width="60%">
        
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

        <br><br><br><br><br>
        <?php
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
                <form method="post" action="Spices.php?code=<?php echo $p->SpID; ?>">
                    <input type="text" name="quantity" value="1" size="2" style="margin-left:20px">
                    <input name="Spsubmit" type="submit" value="ADD TO CART" class="submit-button">
                </form>
            </div>
        </div> 
        <?php
            }
        ?>
    </body>
</html>