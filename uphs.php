<!DOCTYPE html>
<?php include 'hspconn.php'?>
<html>
    <head></head>
<body>
    <?php
$no=$_POST['no'];




 


if(empty($_POST['name'])){
    $query =mysqli_query( $conn,"SELECT hspname  FROM hospitals where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $name=$data["hspname"];
}

else{
    $name=$_POST['name'];

    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $name)) {  

        $hnaerr="Enter a valid name.";
        include("updatehs.php");
         die();
       }
}


if(empty($_POST['addr'])){

    $query =mysqli_query( $conn,"SELECT addrs  FROM hospitals where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $addr=$data["addrs"];

}

else{
    $addr=$_POST['addr'];

    if(!preg_match('/^(\w*\s*[\#\-\,\/\.\(\)\&]*)+/', $addr))
    {
        $haderr="Enter a valid address.";
        include("updatehs.php");
        die();
    }
}


if($_POST['bed']==''){
    $query =mysqli_query( $conn,"SELECT bed FROM hospitals where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $bed=$data["bed"];
}
else{
    $bed=$_POST['bed'];
    if(!preg_match('/^[0-9]*$/', $bed))
    {
        $hberr="Only numeric values!!";
        include("updatehs.php");;
        die();
    }
}



if($_POST['oxy']==''){
    $query =mysqli_query( $conn,"SELECT oxycl FROM hospitals where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $oxy=$data["oxycl"];
}
else{
    $oxy=$_POST['oxy'];

    if(!preg_match('/^[0-9]*$/', $oxy))
    {
        $hoerr="Only numeric values!!";
        include("updatehs.php");;
        die();
    }
}








if(empty($_POST['lat']))
{
    $query =mysqli_query( $conn,"SELECT lat  FROM hospitals where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lat=$data["lat"];
}
else{
    $lat=$_POST['lat'];
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("updatehs.php");
       die();
}
}


if(empty($_POST['lon']))
{
    $query =mysqli_query( $conn,"SELECT lon  FROM hospitals where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lon=$data["lon"];
}

else{
    $lon=$_POST['lon'];
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("updatehs.php");
        die();
    }

 
}







mysqli_query($conn,"UPDATE hospitals SET hspname='".$name."',addrs='".$addr."',bed='".$bed."',oxycl='".$oxy."',lat='".$lat."',lon='".$lon."' where no='".$no."' "); 

$insucc="Hospital Updated.";
include("updatehs.php");
die();




?>
</body>
</html>