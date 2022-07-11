<!DOCTYPE html>
<?php include 'hspconn.php'?>
<html>
    <head></head>
<body>
    <?php

$place=$_POST['place'];

$lat=$_POST['lat'];
$lon=$_POST['lon'];


if(empty($place)){
    $hplerr="This field cannot be empty.";
    include("addhsploc.php");
    die();
}
else{
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $place))
    {
        $hplerr="Enter valid place name.";
        include("addhsploc.php");
        die();
    }

    $query =mysqli_query( $conn,"SELECT loc FROM hosploc where loc='".$place."' ");
    $result=$query;
    if(!mysqli_num_rows($result)==0)
{
    $hplerr="Location Already Exist.";
    include("addhsploc.php");
    die();
}




}

















if(empty($lat))
{
    $laterr="This field cannot be empty.";
    include("addhsploc.php");
    die();
}
else{
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("addhsploc.php");
       die();
}}
if(empty($lon))
{
    $lonerr="This field cannot be empty.";
    include("addhsploc.php");
    die();
}
else {
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("addhsploc.php");
        die();
    }
}



mysqli_query($conn,"INSERT INTO hosploc(loc,lat,lon) VALUES('".$place."','".$lat."','".$lon."')");
$insucc="Place Added.";
include("addhsploc.php");
die();




?>
</body>
</html>