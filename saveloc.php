<!DOCTYPE html>
<?php include 'dbconloc.php'?>
<html>
    <head></head>
<body>
    <?php

$place=$_POST['place'];
$newinf=$_POST['newinf'];
$totinf=$_POST['totinf'];
$cured=$_POST['cured'];
$curinf=$_POST['curinf'];
$newcure=$_POST['newcure'];
$lat=$_POST['lat'];
$lon=$_POST['lon'];

if(!isset($_POST['cont']))
{
    $cont="No";
}
else{
    $cont=$_POST['cont'];
}

if(empty($place)){
    $plerr="This field cannot be empty.";
    include("medicaddcont.php");
    die();
}
else{
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $place))
    {
        $plerr="Enter valid place name.";
        include("medicaddcont.php");
        die();
    }

    $query = mysqli_query($conn,"SELECT place FROM infection where place='".$place."'");
      $result=$query;
    
      if(mysqli_num_rows($result)!=0)
      {
        $plerr="Place already exists, please use update option.";
        include("medicaddcont.php");
        die();
      } 

}

if($newinf==''){
    $nierr="This field cnnot be empty!!";
    include("medicaddcont.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $newinf))
    {
        $nierr="Only numeric values!!";
        include("medicaddcont.php");
        die();
    }
}



if($totinf==''){
    $tierr="This field cnnot be empty!!";
    include("medicaddcont.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $totinf))
    {
        $tierr="Only numeric values!!";
        include("medicaddcont.php");
        die();
    }
}




if($cured==''){
    $cureerr="This field cnnot be empty!!";
    include("medicaddcont.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $cured))
    {
        $cureerr="Only numeric values!!";
        include("medicaddcont.php");
        die();
    }
}




if($curinf==''){
    $cierr="This field cnnot be empty!!";
    include("medicaddcont.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $curinf))
    {
        $cierr="Only numeric values!!";
        include("medicaddcont.php");
        die();
    }
}

if($newcure==''){
    $ncerr="This field cnnot be empty!!";
    include("medicaddcont.php");
    die();
}
else{
    if(!preg_match('/^[0-9]*$/', $newcure))
    {
        $ncerr="Only numeric values!!";
        include("medicaddcont.php");
        die();
    }
}





if(empty($lat))
{
    $laterr="This field cannot be empty.";
    include("medicaddcont.php");
    die();
}
else{
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("medicaddcont.php");
       die();
}}
if(empty($lon))
{
    $lonerr="This field cannot be empty.";
    include("medicaddcont.php");
    die(); 
}
else {
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("medicaddcont.php");
        die();
    }
}



mysqli_query($conn,"INSERT INTO infection(place,newinfections,curinf,totalinfections,newcured,cured,containment,lat,lon) VALUES('".$place."','".$newinf."','".$curinf."','".$totinf."','".$newcure."','".$cured."','".$cont."','".$lat."','".$lon."')");
$insucc="Place Added.";
include("medicaddcont.php");
die();




?>

</body>
</html>