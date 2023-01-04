<?php

include_once('dbcon.php');

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phn = $_POST['phone'];
$pass = $_POST['password'];
$addr = $_POST['address'];





$sql="select count(*) from user where name='$name';";
$retval=mysqli_query($con,$sql);
$n=mysqli_fetch_row($retval);

$sql1="select count(*) from user where email='$email';";
$retval1=mysqli_query($con,$sql1);
$e=mysqli_fetch_row($retval1);
    

if (!preg_match("/^[a-zA-Z ]*$/",$name) ) {
    echo "<script>alert('only letters and white space allowed in Name');window.location='file5.php';</script>";
    }
    elseif ($n[0]>0) {
    echo "<script>alert('Username already exist');window.location='file5.php';</script>";
    }
    elseif ($e[0]>0) {
    echo "<script>alert('Email already exist');window.location='file5.php';</script>";
    }
    elseif(!preg_match('/^\d{10}$/', $phn))
    {
    echo "<script>alert('Invalid Mobile Number!');window.location='file5.php';</script>";
    }

    else{
        

   

         $query = "INSERT INTO user (name,email,phone,password,address)VALUES('$name','$email','$phn','$pass','$addr')";
    $retval = mysqli_query($con, $query);
       
    echo "<script>alert('Registration successful!!! Please Login');window.location='file5.php'</script>"; }
    
    mysqli_close($con);

}
?>
