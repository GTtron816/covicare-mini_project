<!DOCTYPE html>
<?php include 'hspconn.php'?>
<html>
    <head></head>
<body>
    <?php



$id=$_POST['id'];


if(empty($_POST['place'])){
    $query =mysqli_query( $conn,"SELECT loc FROM hosploc where id_loc='".$id."' ");
    $data = mysqli_fetch_assoc($query);
    $place=$data["loc"];
}
else{

    $place=$_POST['place'];
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $place))
    {
        $plerr="Enter valid place name.";
        include("hspuploc.php");
        die();
    }




}
if(empty($_POST['lat']))
{
    $query =mysqli_query( $conn,"SELECT lat  FROM hosploc where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lat=$data["lat"];
}
else{
    $lat=$_POST['lat'];
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("hspuploc.php");
       die();
}
}



if(empty($_POST['lon']))
{
    $query =mysqli_query( $conn,"SELECT lon  FROM hosploc where no='".$no."'");
    $data = mysqli_fetch_assoc($query);
    $lon=$data["lon"];
}

else{
    $lon=$_POST['lon'];
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("hspuploc.php");
        die();
    }

} 




mysqli_query($conn,"UPDATE hosploc SET loc='".$place."',lat='".$lat."',lon='".$lon."' where no='".$id."'"); 



$insucc="Place Updated.";
include("hspuploc.php");
die();




?>
</body>
</html>