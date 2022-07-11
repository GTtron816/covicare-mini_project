<!DOCTYPE html>
<?php include 'hspconn.php'?>
<html>
    <head></head>
<body>
    <?php
$name=$_POST['name'];
@$place=$_POST['place'];
$addr=$_POST['addr'];
$bed=$_POST['bed'];
$oxy=$_POST['oxy'];
$lat=$_POST['lat'];
$lon=$_POST['lon'];


if(empty($name)){
    $hnaerr="This field cannot be empty.";
    include("medaddhosp.php");
    die();
}
else{
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $name)) {  

        $hnaerr="Enter a valid name.";
        include("medaddhosp.php");
         die();
       }

    }
if(empty($place)){
    $hplerr="This field cannot be empty.";
    include("medaddhosp.php");
    die();
}

if(empty($addr)){
    $haderr="This field cannot be empty.";
    include("medaddhosp.php");
    die();
}
else{
    if(!preg_match('/^(\w*\s*[\#\-\,\/\.\(\)\&]*)+/', $addr))
    {
        $haderr="Enter a valid address.";
        include("medaddhosp.php");
        die();
    }
}


if($bed==''){
    $hberr="This field cnnot be empty!!";
    include("medaddhosp.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $bed))
    {
        $hberr="Only numeric values!!";
        include("medaddhosp.php");
        die();
    }
}



if($oxy==''){
    $hoerr="This field cnnot be empty!!";
    include("medaddhosp.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $oxy))
    {
        $hoerr="Only numeric values!!";
        include("medaddhosp.php");
        die();
    }
}















if(empty($lat))
{
    $laterr="This field cannot be empty.";
    include("medaddhosp.php");
    die();
}
else{
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("medaddhosp.php");
       die();
}}
if(empty($lon))
{
    $lonerr="This field cannot be empty.";
    include("medaddhosp.php");
    die();
}
else {
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("medaddhosp.php");
        die();
    }
}



mysqli_query($conn,"INSERT INTO hospitals(hspname,place,addrs,bed,oxycl,lat,lon) VALUES('".$name."','".$place."','".$addr."','".$bed."','".$oxy."','".$lat."','".$lon."')");
$insucc="Hospital Added.";
include("medaddhosp.php");
die();




?>
</body>
</html>