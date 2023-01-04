<?php
session_start();
$productname="";
$productimgname="";
$productqty="";
$productprice="";
if(isset($_POST['submit']))
{

    

    if($_SESSION['cart']){
        $pid_array=array_column($_SESSION['cart'],'pid');
        if(!in_array($_GET['id'],$pid_array))
        {
                $index=count($_SESSION['cart']);
                $item=array(
                  
                    'pname'=>$_POST['productname'],
                    'pprice'=>$_POST['productprice'],
                    'pimg'=>$_POST['productimgname'],
                    'qty'=>$_POST['qty']
    
                );
                $_SESSION['cart'][$index]=$item;
                echo "<script>alert('product  added');</script>";
                header("location:fileview.php");
        }
        else{
            echo "<script>alert('Already Added');</script>";
        }
    }
    else{
        $item=array(
            
            'pname'=>$_POST['productname'],
            'pprice'=>$_POST['productprice'],
            'pimg'=>$_POST['productimgname'],
            'qty'=>$_POST['qty']

        );

        $_SESSION['cart'][0]=$item;
        echo "<script>alert('product  added');</script>";
        header("location:fileview.php");
    }



}

if(isset($_GET['del'])){
    foreach($_SESSION["cart"] as $keys=>$values){
        if($values['pname']==$_GET["del"]){
            unset($_SESSION["cart"][$keys]);
        }
    }
}


$i=0;

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> All Products - FarMart</title>
        <link rel="stylesheet" href="file1s.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <div class="header"></div>
        <div class="container">
               <div class="navbar">
            <div class="logo">
                <img src="main%20logo.jpeg"  widht="50px" height="50px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="file1.html">Home</a></li>
                    <li><a href="file2.html">Products</a></li>
                    <li><a href="fileabout.html">About</a></li>
                    <li><a href="filecontact.html">Contact</a></li>
                     <li><a href="fileprofile.php">Account</a></li>
                </ul>
            </nav>
                   <img src="cart.jpeg" width="30px" height="30px">
                   <img src="menu-rounded%20(1).png" class="menu-icon" 
                        onclick="menutoggle()">
        </div>
            </div>
<!-----cart items details---->

        <div class="small-container cart-page">
        <table>
            <tr>
            <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
              
            </tr>
            <?php
            $total=0;
            if(isset($_SESSION['cart'])){
 foreach($_SESSION['cart'] as $keys => $values){
    $amt=(int)$values["pprice"]* (int)$values["qty"];
                    $total+=$amt;
   
    ?>
            <tr>
                <td>
                    <div class="cart-info">
                    <img src=<?php echo  $values['pimg'];?> >
                        <div>
                        <p><?php echo $values['pname'];?></p>
                            <small>Price: Rs.<?php echo $values['pprice'];?></small>
                            <br>
                            <a href=<?php echo "fileview.php?del={$values['pname']}";?>>Remove</a>
                        </div>
                    </div>
                </td>
            <td>
            <?php echo $values['qty'];?></td>
                <td>Rs.<?php echo $values['qty']*$values['pprice'];?></td>
            </tr>
            <?php
 } }?> 
             <tr>
                 <td>
                 
                 </td>
                 <td>
                 Total
                 </td>
                <td>
                 <?php echo $total;?>  
                 </td>
            </table>
            <div class="total-price">
            <table>
                
                                <tr>
               
                
                </table>
                <?php
                if(count($_SESSION['cart'])>0){
                    echo'
                <a href="success.html">
                    
                 <input type="submit" value="Checkout" name="submit" class="btn">
                
                </a> ';
                }
                ?>
                
            </div>
        </div>
        
        <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Buy our Products</h3>
                    <p>Bringing the purest products to your hands.</p>
                </div>
                <div class="footer-col-2">
                    <img src="main%20logo.jpeg">
                    <p>Brought from the hands of GOD!</p>
                </div>
            </div>
            <p  class="copyrights">Copyrights 2022 @ Team Trio</p>
            </div>
        </div>
        <script>
            var MenuItems=document.getElementById("MenuItems");
            MenuItems.style.maxHeight="0px";
            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px"){
                    MenuItems.style.maxHeight="200px";
                }
                else{
                    MenuItems.style.maxHeight="0px";
                }
            }
            
        </script>

    </body>

</html>