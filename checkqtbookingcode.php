<!DOCTYPE html>
<?php include 'qtconn.php'?>
<html> 
    <head>
        <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}



body{
    font-family: 'Montserrat', sans-serif;
    -webkit-font-smoothing: antialiased;
	background-color: rgb(212, 212, 212);
	margin: 0;
	padding: 0;
	image-rendering: -webkit-optimize-contrast ;
}
     
    
h1{
    position: relative;
    top: 80px;
    text-align: center;
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
    background: #F8F8F8;}
      
    .topnav {
  overflow: hidden;
  background-color: rgb(53, 53, 53);
  font-family: Helvetica;
  -webkit-font-smoothing: antialiased;
  position: fixed;
  top: 60px;
  width: 100%;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: rgb(206, 206, 206);
  color: black;
}

 .topnav a.active{
  color: white;
  background-color: rgb(0, 60, 255);
}



    
   
       <?php include 'drkmode-frm.css'; ?>
        </style>
        <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include 'banneradminfixed.php';?>
  
   
    <div class="topnav" >
 
	<a  href="adminaddqt.php">Add Quarantine Center</a>
<a href="adminupdateqt.php">Edit Quarantine Center</a>
<a  class=active  href="admincheckqtbooking.php">Check Quarantine Booking</a>
<a   href="medicac.php">Create Medic Account</a>

</div>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
  
 

    
    <script src="drkmode-frm.js"></script><
    <?php
$code=$_POST['code'];
$check=$_POST['check'];
if($check=="check")
{
if(empty($code)){
    $codeerr="This field cannot be empty";
    include("admincheckqtbooking.php");
    die();
}
else{
    if(!preg_match('/^[A-Z0-9]{8,}$/', $code)) { 

        $codeerr="Invalid Code!!!";
        include("admincheckqtbooking.php");
        die();
       } 

 
}

$query=mysqli_query($conn,"SELECT name,addr,foodsrv,bookingid,bookdate,noday from qtbooked where bookingid='".$code."' ");
$result=$query;
if(mysqli_num_rows($result)==0)
{
    echo "NO BOOKING FOUND!!";
}
else{
    $data = mysqli_fetch_assoc($query);
   
    $qtname=$data["name"];
    $addr=$data["addr"];
    $fsrv=$data["foodsrv"];
    $st=$data["bookingid"];
    $bookdate=$data["bookdate"];
    $noday=$data["noday"];

    
    echo ' <h1 >BOOKING DETAILS</h1>
<div class="table-wrapper">
<table class="fl-table">
<thead>
<tr>
    
<th>CENTER NAME</th>
<th>ADDRESS</th>
<th>SERVES FOOD</th>
<th>BOOKING ID</th>
<th>BOOKED ON</th>
<th>NUMBER OF DAYS</th>
</tr>
</thead>
<tbody>
 

<tr>

<td>'.$qtname.'</td>
<td>'.$addr.'</td>
<td>'.$fsrv.'</td>
<td>'.$st.'</td>
<td>'.$bookdate.'</td>
<td>'.$noday.' Days</td>
</tr>

</tbody>
 </table>
</div>

';
}
}



elseif($check=="checkin")
{
    if(empty($code)){
        $codeerr="This field cannot be empty";
        include("admincheckqtbooking.php");
        die();
    }

    else{
        if(!preg_match('/^[A-Z0-9]{8,}$/', $code)) { 
    
            $codeerr="Invalid Code!!!";
            include("admincheckqtbooking.php");
            die();
           } 
    
     
    }

    $query =mysqli_query($conn,"SELECT chkin,noday from qtbooked where bookingid='".$code."'");
    $data = mysqli_fetch_assoc($query);
    $chk=$data["chkin"];
    $day=$data["noday"];
    if($chk=="IN")
    {
        $codeerr="Already Checked-in!!!";
            include("admincheckqtbooking.php");
            die();
    }
   elseif($chk=="OUT")
    {
        $codeerr="Already Checked-out!!!";
            include("admincheckqtbooking.php");
            die();
    }

    if(empty($chk))
   {   $date=date('Y-m-d');
       $bookedtill=date('Y-m-d', strtotime($date. ' + '.$day.' days'));
    mysqli_query($conn,"UPDATE qtbooked SET chkin='IN',bookedtill='".$bookedtill."' where bookingid='".$code."'");
    $chksucc="Check-in Successful, Booked Till: ".$bookedtill." ";
    include("admincheckqtbooking.php");
    die();}

}

elseif($check=="checkout")
{
    if(empty($code)){
        $codeerr="This field cannot be empty";
        include("admincheckqtbooking.php");
        die();
    }
    else{
        if(!preg_match('/^[A-Z0-9]{8,}$/', $code)) { 
    
            $codeerr="Invalid Code!!!";
            include("admincheckqtbooking.php");
            die();
           } 
    
      
    }

    $query =mysqli_query($conn,"SELECT chkin from qtbooked where bookingid='".$code."'");
$data = mysqli_fetch_assoc($query);
$chk=$data["chkin"];
    if(empty($chk))
    {
        $codeerr="Not Checked-in!!!";
            include("admincheckqtbooking.php");
            die();
    }
   elseif($chk=="OUT")
    {
        $codeerr="Already Checked-out!!!";
            include("admincheckqtbooking.php");
            die();
    }
    elseif($chk=="IN")
    {
    mysqli_query($conn,"UPDATE qtbooked SET chkin='OUT' where bookingid='".$code."'");
    $chksucc="Check-out Successful.";
    include("admincheckqtbooking.php");
    die();}
}


elseif($check=="remove")
{
  

    mysqli_query($conn,"DELETE FROM qtbooked where  datediff(now(),qtbooked.bookdate)>7 AND chkin=''");
    $chksucc="Removed Successfully.";
    include("admincheckqtbooking.php");
    die();
}

?>
</body>
</html>