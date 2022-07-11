<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html>
    <head></head>
<body>
    <?php
$qtname=$_POST['qtname'];
@$qtplace=$_POST['qtplace'];
$qtaddr=$_POST['qtaddr'];
$price=$_POST['price'];
$lat=$_POST['lat'];
$lon=$_POST['lon'];

if(!isset($_POST['fsrv']))
{
    $fsrv="No";
}
else{
    $fsrv=$_POST['fsrv'];
}
if(empty($qtname)){
    $qtnaerr="This field cannot be empty.";
    include("adminaddqt.php");
    die();
}
else{
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $qtname)) {  

        $qtnaerr="Enter a valid name.";
        include("adminaddqt.php");
         die();
       }

    }
if(empty($qtplace)){
    $qtplerr="Select an option.";
    include("adminaddqt.php");
    die();
}


if(empty($qtaddr)){
    $qtaderr="This field cannot be empty.";
    include("adminaddqt.php");
    die();
}
else{
    if(!preg_match('/^(\w*\s*[\#\-\,\/\.\(\)\&]*)+/', $qtaddr))
    {
        $qtaderr="Enter a valid address.";
        include("adminaddqt.php");
        die();
    }
}
if($price==''){
    $qtprerr="This field cannot be empty.(If free enter 0)";
    include("adminaddqt.php");
    die();
}
else{
    if(!preg_match('/^\d+(\.\d{1})?$/', $price))
    {
        $qtprerr="Invalid money format.(If free enter 0)";
        include("adminaddqt.php");
        die();
    }
}
if(empty($lat))
{
    $laterr="This field cannot be empty.";
    include("adminaddqt.php");
    die();
}
else{
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
       include("adminaddqt.php");
       die();
}}
if(empty($lon))
{
    $lonerr="This field cannot be empty.";
    include("adminaddqt.php");
    die();
}
else {
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("adminaddqt.php");
        die();
    }
}



mysqli_query($conn,"INSERT INTO qtlist(qtname,qtplace,addr,foodsrv,price,bookstatus,lat,lon) VALUES('".$qtname."','".$qtplace."','".$qtaddr."','".$fsrv."','".$price."','NO','".$lat."','".$lon."')");
$insucc="Center Added.";
include("adminaddqt.php");
die();




?>
</body>
</html>