<?php 
    session_start();
    if(!isset($_SESSION['FID']))
        $_SESSION['FID']='';
    if(!isset($_SESSION['FrID']))
        $_SESSION['FrID']='';
    if(!isset($_SESSION['SID']))
        $_SESSION['SID']='';
    if(!isset($_SESSION['SpID']))
        $_SESSION['SpID']='';
    if(!isset($_SESSION['VID']))
        $_SESSION['VID']='';
    if(!isset($_SESSION['arr']))
        $_SESSION['arr']=array();
    if($_SESSION['logged'] == 'success'){
        $conn = new mysqli('localhost','root','','grocery');
        if($conn->connect_error)
            die("Connection error" .$conn->connect_error);
        else{
            if($_SESSION['FrID'] == 'yes'){
                $id = $_SESSION['ID'];
                $qty = $_SESSION['qty'];
                $sql = "SELECT * FROM fruits Where `FrID` = $id;";
                $result = mysqli_query($conn,$sql);
                while($row=$result->fetch_object()){
                    $_SESSION['arr'][] = array('Name'=>$row->FruitName, 'Price' => $row->Price, 'Quantity' => $qty);
                }
                unset($_SESSION['FrID']);
            }
            
            else if($_SESSION['FID']=='yes'){
                // $qty = $_POST['quantity'];
                $id = $_SESSION['ID'];
                $qty = $_SESSION['qty'];
                $sql = "SELECT * FROM foodgrains Where `FID` = $id;";
                $result = mysqli_query($conn,$sql);
                while($row=$result->fetch_object()){
                    $_SESSION['arr'][] = array('Name'=>$row->Foodgrains, 'Price' => $row->Price, 'Quantity' => $qty);
                }
                unset($_SESSION['FID']);
            }
            else if($_SESSION['SID']=='yes'){
                $id = $_SESSION['ID'];
                $qty = $_SESSION['qty'];
                $sql = "SELECT * FROM snacks Where `SID` = $id;";
                $result = mysqli_query($conn,$sql);
                while($row=$result->fetch_object()){
                    $_SESSION['arr'][] = array('Name'=>$row->SnackName, 'Price' => $row->Price, 'Quantity' => $qty);
                }
                unset($_SESSION['SID']);
            }
            else if($_SESSION['SpID']=='yes'){
                $id = $_SESSION['ID'];
                $qty = $_SESSION['qty'];
                $sql = "SELECT * FROM spices Where `SpID` = $id;";
                $result = mysqli_query($conn,$sql);
                while($row=$result->fetch_object()){
                    $_SESSION['arr'][] = array('Name'=>$row->SpicesName, 'Price' => $row->Price, 'Quantity' => $qty);
                }
                unset($_SESSION['SpID']);
            }
            else if($_SESSION['VID']=='yes'){
                $id = $_SESSION['ID'];
                $qty = $_SESSION['qty'];
                $sql = "SELECT * FROM vegetable Where `VID` = $id;";
                $result = mysqli_query($conn,$sql);
                while($row=$result->fetch_object()){
                    $_SESSION['arr'][] = array('Name'=>$row->VegetableName, 'Price' => $row->Price, 'Quantity' => $qty);
                }
                unset($_SESSION['VID']);
            }
            else{}
        }
    }
    else{
        echo "<script>alert('Please Login/Signup')
        window.location.href='http://localhost/Groceries/PhpFolder/Signup.php'
        </script>";
    }
?>
<html>
    <head>
        <title>Cart</title>
        <link rel="stylesheet" href="CSS/Cart.css">
        <link rel="stylesheet" href="CSS/Navigation.css">
        <script type="text/javascript" src="http://localhost/Groceries/PhpFolder/JS/Navigation.js"></script>
        <script>
        function success(){
            alert('Order Placed');
            window.location.href='http://localhost/Groceries/PhpFolder/Home.php';
        }
        </script>
    </head>
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
        <img src="ASSETS/Image.jpg" style="display:inline; margin-top: -85px;" height="180px" width="60%" alt="delivery">
        <table  class="styled-table" id="myTable">
            <thread>
            <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thread>
            <tbody>
            <?php $i=1; $total=0; foreach($_SESSION['arr'] as $a){?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $a['Name']?></td>
                <td><?php echo $a['Quantity']?></td>
                <td class="item-total"><?php echo $a['Price']*$a['Quantity']?></td>
                <?php $total = $total + $a['Price']*$a['Quantity'];?>
            </tr>
            <?php $i=$i+1; }?>
            </tbody>
            <tr>
                <td>Total: </td><td><td></td>
                <td ><?php echo $total;?></td>
            </tr>
        </table>
        <button onclick="success()" style="margin: 20px -20px 0 1000px">Place Order</button>
    </body>
</html>