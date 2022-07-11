<!DOCTYPE html>
<?php include 'vaconn.php'?>
<html>
    <head></head>
<body>
    <?php



$id=$_POST['id'];


if(empty($_POST['place'])){
    $query =mysqli_query( $conn,"SELECT place FROM vacciloc where no='".$id."' ");
    $data = mysqli_fetch_assoc($query);
    $place=$data["loc"];
}
else{

    $place=$_POST['place'];
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $place))
    {
        $plerr="Enter valid place name.";
        include("vacuploc.php");
        die();
    }




}
if(empty($_POST['lat']))
{
    $query =mysqli_query( $conn,"SELECT lat  FROM vacciloc where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lat=$data["lat"];
}
else{
    $lat=$_POST['lat'];
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("vacuploc.php");
       die();
}
}



if(empty($_POST['lon']))
{
    $query =mysqli_query( $conn,"SELECT lon  FROM vacciloc where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lon=$data["lon"];
}

else{
    $lon=$_POST['lon'];
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("vacuploc.php");
        die();
    }

} 




mysqli_query($conn,"UPDATE vacciloc SET place='".$place."',lat='".$lat."',lon='".$lon."' where no='".$id."'"); 



$insucc="Place Updated.";
include("vacuploc.php");
die();




?>
</body>
</html>