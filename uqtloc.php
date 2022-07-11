
<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html>
    <head></head>
<body>
    <?php



$id=$_POST['id'];


if(empty($_POST['place'])){
    $query =mysqli_query( $conn,"SELECT loc FROM qtloc where id_loc='".$id."' ");
    $data = mysqli_fetch_assoc($query);
    $place=$data["loc"];
}
else{

    $place=$_POST['place'];
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $place))
    {
        $plerr="Enter valid place name.";
        include("qtuploc.php");
        die();
    }




}




mysqli_query($conn,"UPDATE qtloc SET loc='".$place."' where id_loc='".$id."'"); 



$insucc="Place Updated.";
include("qtuploc.php");
die();




?>
</body>
</html>