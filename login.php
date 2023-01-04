
<?php
session_start();
include_once('dbcon.php');
if(isset($_POST['submit']))
{$username=$_POST['username'];
$password=$_POST['password'];
$sql1="select count(*) from user where name='$username' and password='$password';";
$retval1=mysqli_query($con,$sql1);
$user=mysqli_fetch_row($retval1);

if($user[0]==1)
{
    $_SESSION['Login']=1;
    $sql1="select id from user where name='$username' and password='$password';";
$retval1=mysqli_query($con,$sql1); 
$user=mysqli_fetch_row($retval1);
    $_SESSION['Loginid']=$user[0];
	echo "<script>alert('WELCOME..');window.location='file1.html';</script>"; }
else
{
	echo "<script>alert('Username or Password is not correct');window.location='file5.php';</script>"; }
}

?>

