<!DOCTYPE html>
<?php include 'accconn.php' ?>
<html>

<head>
<style>


</style>
</head>
<body>
<?php
$username=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['pw'];

if(empty($username)){
    $usrer="This field cannot be empty";
    include("medicac.php");
    die();
}
else{
    if(!preg_match('/^\w{5,}$/', $username)) { 

        $usrer="Only letters,numbers and underscore allowed";
        include("medicac.php");
        die();
       } 

 
       $query =mysqli_query( $conn,"SELECT username FROM accs  ");     
       while($data = mysqli_fetch_assoc($query))
       {
       $usernm=$data["username"];
       if($username==$usernm)
       {
        $usrer="User name already taken.";
        include("medicac.php");
        die();
       }
    }
    }

    if(empty($email)){
        $emailerr="This field cannot be empty";
        include("medicac.php");
        die();
    }
    else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailerr="Invalid email address";
            include("medicac.php");
            die();


        }
        $query =mysqli_query( $conn,"SELECT email FROM accs  ");     
        while($data = mysqli_fetch_assoc($query))
        {
        $eml=$data["email"];
        if($email==$eml)
        {
         $emailerr="Account already exist.";
         include("medicac.php");;
         die();
        }
     }
    }  

    



    if(empty($pass))
    {
        $pwer="Password cannot be empty";
        include("medicac.php");
        die();
    }
    else{
    
        if (strlen($pass) < 8){
                $pwer = "Your password must contain atleast 8 characters!";
                include("medicac.php");
                die();
            
            }


            elseif (preg_match("/\\s/", $pass))
            {
                $pwer = "Remove spaces in password!!";
                include("medicac.php");
                die();
            
            }
        }


    mysqli_query($conn,"INSERT INTO accs(username,password,email,actype) VALUES('".$username."','".$pass."','".$email."','medic')");
    $accsuc="Account successfully created, Please signin";
    include("medicac.php");
    die();





?>
</body>
</html>