<!DOCTYPE html>
<?php include 'dbconloc.php'?>
<html>
    <head></head>
<body>
    <?php
$id=$_POST['id'];
$newinf=$_POST['newinf'];
$newcure=$_POST['newcure'];





if(empty($_POST['place'])){
    $query =mysqli_query( $conn,"SELECT place  FROM infection where id='".$id."'");
    $data = mysqli_fetch_assoc($query);
    $place=$data["place"];
}
else{
    $place=$_POST['place'];
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $place))
    {
        $plerr="Enter valid place name.";
        include("medicupcont.php");
        die();
    }

}

if($newinf==''){
    $nierr="This field cnnot be empty!!";
    include("medicupcont.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $newinf))
    {
        $nierr="Only numeric values!!";
        include("medicupcont.php");
        die();
    }
}






if($newcure==''){
    $ncerr="This field cnnot be empty!!";
    include("medicupcont.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $newcure))
    {
        $ncerr="Only numeric values!!";
        include("medicupcont.php");
        die();
    }
}











if(empty($_POST['lat']))
{
    $query =mysqli_query( $conn,"SELECT lat FROM infection where id='".$id."'");
    $data = mysqli_fetch_assoc($query);
    $lat=$data["lat"];
}
else{
    $lat=$_POST['lat'];
 
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("medicupcont.php");
       die();
}}


if(empty($_POST['lon']))
{
    $query =mysqli_query( $conn,"SELECT lon FROM infection where id='".$id."'");
    $data = mysqli_fetch_assoc($query);
    $lon=$data["lon"];
}
else {
    $lon=$_POST['lon'];
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("medicupcont.php");
        die();
    }
}






if(!isset($_POST['cont']))
{
    $cont="No";
}
else{
    $cont=$_POST['cont'];
}

$query = mysqli_query($conn,"SELECT totalinfections,curinf,cured FROM infection where id= '".$id."'");
$data = mysqli_fetch_assoc($query);


$totinf=$data["totalinfections"];
$curinf=$data["curinf"];
$cured=$data["cured"];

$totinf=$totinf+$newinf;
$curinf=($curinf-$newcure)+$newinf;
$cured=$cured+$newcure;







mysqli_query($conn,"UPDATE infection SET place='".$place."',newinfections='".$newinf."',curinf='".$curinf."',totalinfections='".$totinf."',cured='".$cured."',newcured='".$newcure."',containment='".$cont."',lat='".$lat."',lon='".$lon."' where id='".$id."' "); 








$insucc="Location Updated.";
include("medicupcont.php");
die();




?>

</body>
</html>