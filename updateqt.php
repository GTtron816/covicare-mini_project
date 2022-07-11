<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html>
    <head></head>
<body>
    <?php
$rno=$_POST['roomno'];






if(empty($_POST['qtname'])){
    $query =mysqli_query( $conn,"SELECT qtname  FROM qtlist where no='".$rno."'");
    $data = mysqli_fetch_assoc($query);
    $qtname=$data["qtname"];
}

else{
    $qtname=$_POST['qtname'];
    if(!preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $qtname)) {  

        $qtnaerr="Enter a valid name.";
        include("adminupqt.php");
         die();
       }
}


if(empty($_POST['qtaddr'])){

    $query =mysqli_query( $conn,"SELECT addr  FROM qtlist where no='".$rno."'");
    $data = mysqli_fetch_assoc($query);
    $qtaddr=$data["addr"];

}

else{
    $qtaddr=$_POST['qtaddr'];

    if(!preg_match('/^(\w*\s*[\#\-\,\/\.\(\)\&]*)+/', $qtaddr))
    {
        $qtaderr="Enter a valid address.";
        include("adminupqt.php");
        die();
    }
}

if($_POST['price']=='')
{
    $query =mysqli_query( $conn,"SELECT price  FROM qtlist where no='".$rno."'");
    $data = mysqli_fetch_assoc($query);
    $price=$data["price"];
}

else{
    $price=$_POST['price'];
    if(!preg_match('/^\d+(\.\d{2})?$/', $price))
    {
        $qtprerr="Invalid money format.(If free enter 0)";
        include("adminupqt.php");
        die();
    }
}





if(empty($_POST['lat']))
{
    $query =mysqli_query( $conn,"SELECT lat  FROM qtlist where no='".$rno."'");
    $data = mysqli_fetch_assoc($query);
    $lat=$data["lat"];
}
else{
    $lat=$_POST['lat'];
    if(!preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',$lat))
    {
        $laterr="Invalid Lattitude.";
        include("adminupqt.php");
       die();
}
}



if(empty($_POST['lon']))
{
    $query =mysqli_query( $conn,"SELECT lon  FROM qtlist where no='".$rno."'");
    $data = mysqli_fetch_assoc($query);
    $lon=$data["lon"];
}

else{
    $lon=$_POST['lon'];
    if(!preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',$lon)){
        $lonerr="Invalid Longitude.";
        include("adminupqt.php");
        die();
    }

} 


if(!isset($_POST['fsrv']))
{
    $fsrv="No";
}
else{
    $fsrv=$_POST['fsrv'];
}








mysqli_query($conn,"UPDATE qtlist SET qtname='".$qtname."',addr='".$qtaddr."',foodsrv='".$fsrv."',price='".$price."',lat='".$lat."',lon='".$lon."' where no='".$rno."' "); 

$insucc="Center Updated.";
include("adminupqt.php");
die();




?>
</body>
</html>