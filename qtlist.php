<!DOCTYPE html>
<?php include 'qtconn.php'?>
<?php include 'lgout.php'?>
<html>

<head>
   
<style>
*{ 
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}

body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
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
    top: 200px;
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




 

.btde {
    background-color: rgb(0, 60, 255);
    border-radius: 12px;
    color: gold;
    font-size: 12px;
    cursor: pointer;
    height: 25px;
    width: 120px;
    border: none;
    outline: none;
    padding: 0px;
    margin: 0px;
   
  }
  
  .btde:hover {
    background-color: rgb(0, 34, 134);
  } 
  
 
  .frm{

position: fixed;
top: 450px ;
left: 450px ;

}
<?php include 'flatnav.css'; ?>

</style>
<!--Icons-Kit-->
<script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
<style>
<?php include 'darkmode.css'; ?>
</style>

</head>


<body>

<?php include 'banner.php'?>
<div class="topnav" >

<a  href="homepageusrlogin.php">Home</a>
<a  href="selecmaploc(GoogleAPI).php">Containment Zones</a>
<a   href="selechosp.php">Hospital Tracking</a>
<a  href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a  class=active href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>


</div>
  

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    


    <script src="darkmode.js"></script>






<h1 style="text-align: center;">QUARANTINE CENTER BOOKING PORTAL</h1>
<?php

$qtplace=$_GET['qtplace'];
$food=$_GET['foodsr'];

if($food=="Yes")
{
$query =mysqli_query( $conn,"SELECT no,qtname,addr,qtplace,foodsrv,price FROM qtlist where bookstatus='NO' AND foodsrv='Yes'  AND qtplace='".$qtplace."' ");
$result=$query;
}
else
{
    $query =mysqli_query( $conn,"SELECT no,qtname,addr,qtplace,foodsrv,price FROM qtlist where bookstatus='NO' and foodsrv='No'and qtplace='".$qtplace."'");
    $result=$query;
}



if(mysqli_num_rows($result)==0)
{
    echo " CENTERS UNAVAILABLE TRY AGAIN LATER";
}
else{
echo ' 
<div class="table-wrapper">
<table class="fl-table">
<thead>
<tr>
    <th>CENTER NAME</th>
    <th>ADDRESS</th>
    <th>SERVES FOOD</th>
    <th>RENT(PER DAY)</th>
    <th>PAY HERE</th>
    <th>SHOW LOCATION</th>
  
</tr>
</thead>
<tbody>
     ';
while ($data = mysqli_fetch_assoc($query))
{ $rno=$data["no"];
  $qtname=$data["qtname"];
  $addr=$data["addr"];
  $fsrv=$data["foodsrv"];
  $rent=$data["price"];
 
 echo '
 
 

 
            <tr>
            <td>'.$qtname.'</td>
            <td>'.$addr.'</td>
            <td>'.$fsrv.'</td>
            <td>Rs '.$rent.'</td>
            <td><button class="btde" onclick=getroom('.$rno.')><i class="fas fa-check-circle"></i> CLICK TO PAY</button></td>
            <td><button class="btde" onclick=getloc('.$rno.')><i class="fas fa-map-marker-alt"></i> SHOW LOCATION</button></td>
            </tr>
 
 
 
 ';}
    





echo '        
    
  
</tbody>
 </table>
</div>';}

?>




     <form method="post" action="redipay.php" id="myform">
     <input type="hidden" name="roomno" id="subval" value=>
     </form>

<script>
function getroom(rno)
{   
document.getElementById("subval").value=rno;
document.getElementById("myform").submit();
}



function getloc(rn)
{
    window.location.href="qtloc.php?w1=" +rn;
} 
</script>



<?php $conn->close(); ?>

</body>

</html>