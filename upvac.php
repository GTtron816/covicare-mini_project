<!DOCTYPE html>
<?php include 'vaconn.php'?>
<html>
    <head></head>
<body>
    <?php
$no=$_POST['no'];





if(empty($_POST['name'])){
    $query =mysqli_query( $conn,"SELECT cntrnm  FROM vaccicenters where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $vcname=$data["cntrnm"];
}

else{
    $vcname=$_POST['name'];
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $vcname)) {  

        $naerr="Enter a valid name.";
        include("updatevac.php");
         die();
       }
}





if(empty($_POST['addrs'])){

    $query =mysqli_query( $conn,"SELECT addrs  FROM vaccicenters where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $addrs=$data["addrs"];

}

else{
    $addrs=$_POST['addrs'];

    if(!preg_match('/^(\w*\s*[\#\-\,\/\.\(\)\&]*)+/', $addrs))
    {
        $qtaderr="Enter a valid address.";
        include("updatevac.php");
        die();
    }
}






if($_POST['dose']=='')
{
    $query =mysqli_query( $conn,"SELECT avldose  FROM vaccicenters where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $dose=$data["avldose"];
}

else{
    $dose=$_POST['dose'];
    if(!preg_match('/^\d+(\.\d{1})?$/', $dose))
    {
        $doseerr="Invalid  format.";
        include("updatevac.php");
        die();
    }
}



if(empty($_POST['lat']))
{
    $query =mysqli_query( $conn,"SELECT lat  FROM vaccicenters where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lat=$data["lat"];
}
else{
    $lat=$_POST['lat'];
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("updatevac.php");
       die();
}
}



if(empty($_POST['lon']))
{
    $query =mysqli_query( $conn,"SELECT lon  FROM vaccicenters where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lon=$data["lon"];
}

else{
    $lon=$_POST['lon'];
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("updatevac.php");
        die();
    }

} 










mysqli_query($conn,"UPDATE vaccicenters SET cntrnm='".$vcname."',addrs='".$addrs."', avldose='".$dose."',lat='".$lat."',lon='".$lon."' where no='".$no."' "); 

$insucc="Center Updated.";
include("updatevac.php");
die();




?>
</body>
</html>