<!DOCTYPE html>
<?php include 'accconn.php' ?>
<html>

<head>
<style>


</style>
</head>
<body>
<?php
$code=$_POST['code'];
$pass=$_POST['pw'];

if(empty($pass))
{
    $pwer="Password cannot be empty";
    include("checkpwcode.php");
    die();
}
else{
    
  if (strlen($pass) < 8){
          $pwer = "Your password must contain atleast 8 characters!";
          include("checkpwcode.php");
          die();
      
      }


      elseif (preg_match("/\\s/", $pass))
      {
          $pwer = "Remove spaces in password!!";
          include("checkpwcode.php");
          die();
      
      }
  }
$query =mysqli_query( $conn,"SELECT username FROM forgotpass where code='".$code."' ");
$data = mysqli_fetch_assoc($query);
$username=$data["username"];
mysqli_query($conn,"UPDATE accs SET password='".$pass."' where username='".$username."' ");  
mysqli_query($conn,"DELETE FROM forgotpass WHERE code='".$code."'");
  $passsuc="Password reset successful";
include("login.php");
die();





?>
</body>
</html>