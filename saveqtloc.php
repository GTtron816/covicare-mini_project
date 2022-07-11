

<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html>
    <head></head>
<body>
    <?php

$place=$_POST['place'];




if(empty($place)){
    $plerr="This field cannot be empty.";
    include("qtaddloc.php");
    die();
}
else{
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $place))
    {
        $plerr="Enter valid place name.";
        include("qtaddloc.php");
        die();
    }

    $query =mysqli_query( $conn,"SELECT loc FROM qtloc where loc='".$place."' ");
    $result=$query;
    if(!mysqli_num_rows($result)==0)
{
    $plerr="Location Already Exist.";
    include("qtaddloc.php");
    die();
}




}





mysqli_query($conn,"INSERT INTO qtloc(loc) VALUES('".$place."')");
$insucc="Place Added.";
include("qtaddloc.php");
die();




?>
</body>
</html>