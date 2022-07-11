<!DOCTYPE html>
<?php include 'vaconn.php'?>
<html>
    <head></head>
<body>
    <?php
$vcname=$_POST['vcname'];
$vcaddr=$_POST['vcaddr'];
@$vcplace=$_POST['vcplace']; 
$vcdose=$_POST['vcdose'];
$valat=$_POST['lat'];
$valon=$_POST['longi'];

if(empty($vcname)){
    $vcnaerr="This field cannot be empty.";
    include("medicalad.php");
    die();
}
else{
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $vcname)) {  

        $vcnaerr="Enter a valid name.";
        include("medicalad.php");
         die();
       }

    }
if(empty($vcaddr)){
    $vcaderr="This field cannot be empty.";
    include("medicalad.php");
    die();
}
else{
    if(!preg_match('/^(\w*\s*[\#\-\,\/\.\(\)\&]*)+/', $vcaddr))
    {
        $vcaderr="Enter valid address.";
        include("medicalad.php");
        die();
    }
}       
if(empty($vcplace)){
    $vcplerr="This field cannot be empty.";
    include("medicalad.php");
    die();
}

if($vcdose==''){
    $vcdoerr="This field cannot be empty.(If free enter 0)";
    include("medicalad.php");
    die();
}
else{
    if(!preg_match('/^\d+(\.\d{1})?$/', $vcdose))
    {
        $vcdoerr="Invalid number  format.(If free enter 0)";
        include("medicalad.php");
        die();
    }
}
if(empty($valat))
{
    $valaterr="This field cannot be empty.";
    include("medicalad.php");
    die();
}
else{
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$valat))
    {
        $valaterr="Invalid Lattitude.";
       include("medicalad.php");
       die();
}}
if(empty($valon))
{
    $valonerr="This field cannot be empty.";
    include("medicalad.php");
    die();
}
else {
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$valon)){
        $valonerr="Invalid Longitude.";
        include("medicalad.php");
        die();
    }
}


mysqli_query($conn,"INSERT INTO vaccicenters(cntrnm,place,addrs,avldose,lat,lon) VALUES('".$vcname."','".$vcplace."','".$vcaddr."','".$vcdose."','".$valat."','".$valon."')");

$insucc="Center Added.";
include("medicalad.php");
die();




?>
   
</body>
</html>