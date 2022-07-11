<!DOCTYPE html>
<?php include 'vaconn.php'?>
<html>
    <head>
<body>
    <?php

$vcplace=$_POST['vcplace'];
$valat=$_POST['lat'];
$valon=$_POST['longi'];

if(empty($vcplace))
{
    $vcplerr="This field cannot be empty.";
    include("vacaddloc.php");
    die();
}
else{
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $vcplace))
    {
        $vcplerr="Enter a valid place name.";
        include("vacaddloc.php");
        die();
    }


    $query =mysqli_query( $conn,"SELECT place FROM vacciloc where place='".$vcplace."' ");
    $result=$query;
    if(!mysqli_num_rows($result)==0)
{
    $vcplerr="Location Already Exist.";
    include("vacaddloc.php");
    die();
}



}
if(empty($valat)){
    $valaterr="This field cannot be empty.";
    include("vacaddloc.php");
    die();
}
else{
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$valat))
    {
        $valaterr="Invalid Lattitude.";
       include("vacaddloc.php");
       die();
    }
}

if(empty($valon))
{
    $vclonerr="This field cannot be empty.";
    include("vacaddloc.php");
    die();
}
else {
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$valon)){
        $vclonerr="Invalid Longitude.";
        include("vacaddloc.php");
        die();
    }
}
mysqli_query($conn,"INSERT INTO vacciloc(place,lat,lon) VALUES('".$vcplace."','".$valat."','".$valon."')");

$insucc="Location Added.";
include("vacaddloc.php");
die();

?>
</body>
</html>
