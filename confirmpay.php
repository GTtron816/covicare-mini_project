<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html>

<head>
<style> 
<?php include 'darkmode.css'; ?>


.h1{
    text-align: center;
  }

.t1{
    font-size: 25px;
    font-weight: normal;
  }


  .t2{
    font-size: 20px;
    font-weight: normal;
  }

  /* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
    position: absolute;
    left: 0px;
    top: 230px;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
    color:black;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}


  body{   
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
             margin: 0;
            padding: 0; }

</style>

<script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>

</head>
<body>

<?php include 'banner.php'?>

    
    
    <script src="darkmode.js"></script>




<?php

session_start();
$rmno = $_POST['roomn'];
$day=$_POST['day'];
$nor= $_SESSION['page_load'];

if($nor==0) 
{

    if(empty($day))
    {
        echo "<t1 class=t1>NUMBER OF DAYS NOT SELECTED</h1>";
    }

else{



    $query =mysqli_query( $conn,"SELECT no,qtname,addr,foodsrv,bookstatus,price FROM qtlist where no='".$rmno."'AND bookstatus='NO'  ");
$result=$query;

if(mysqli_num_rows($result)==0)
{
    echo " INVALID CENTER NUMBER OR ROOM UNAVAILABLE PLEASE TRY AGAIN WITH AVAILABLE CENTER NUMBER";
}


else{
$data = mysqli_fetch_assoc($query);
$no=$data["no"];
$qtname=$data["qtname"];
$addr=$data["addr"];
$fsrv=$data["foodsrv"];
$st=$data["bookstatus"];
$rent=$data["price"];
$bookdate=date('Y-m-d');





if($st=='NO')
{


    /*BOOKING ID GENERATOR*/
    $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
    srand((double)microtime()*1000000);
    $i = 0; 

    $id= '' ;

    while ($i <8) { 
    $num = rand() % 36; 
    $tmp = substr($char, $num, 1); 
    $id = $id . $tmp;  
    $i++; 
} 
echo "<br>";


echo "<h1 class=h1>PAYMENT SUCCESSFUL</h1>";
echo"<br>";
echo "<t1 class=t1>YOUR BOOKING ID IS: </t1>";
echo "<t1 class=t1>$id</t1>";
echo ' 
<div class="table-wrapper">
<table class="fl-table">
<thead>
<tr>
    
<th>CENTER NAME</th>
<th>ADDRESS</th>
<th>SERVES FOOD</th>

</tr>
</thead>
<tbody>
 

<tr>

<td>'.$qtname.'</td>
<td>'.$addr.'</td>
<td>'.$fsrv.'</td>
</tr>

</tbody>
 </table>
</div>

';
$totpay=$rent*$day;
echo"<br>";
echo"<br>";
echo "<t2 class=t2>TOTAL PAYED: Rs ".$totpay."/-</t2>" ;
echo"<br>";
echo"<br>";
echo "<t2 class=t2>BOOKING DATE: ".$bookdate."</t2>" ;
echo"<br>";
echo"<br>";
echo "<t2 class=t2>YOU HAVE BOOKED THE CENTER FOR: ".$day." DAYS</t2>" ;
echo"<br>";
echo"<br>";
echo "<t2 class=t2>* Bookings not checked-in under 7-days from booking date will be lost</t2>" ;
echo"<br>";
echo"<br>";
echo "<t2 class=t2>* Do not refresh or close the page without noting your booking id it will be lost</t2>" ;

mysqli_query($conn,"INSERT INTO qtbooked(no,name,addr,foodsrv,bookingid,bookdate,noday) VALUES('".$no."','".$qtname."','".$addr."','".$fsrv."','".$id."','".$bookdate."','".$day."')");


mysqli_query($conn,"UPDATE qtlist SET bookstatus='YES' where no='".$rmno."' ");




}


}

/*STOPS USER FROM GETTING ID BY RELOADING PAGE*/
$nor++;
$_SESSION['page_load']=$nor;
}
}
else {
   echo 'CONNECTION TIMED OUT';
}


?>
 <button onclick=darkmode() hidden  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
<?php $conn->close();
?>
</body>

</html>
