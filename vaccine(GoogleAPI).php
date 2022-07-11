<!DOCTYPE html>
<?php include 'vaconn.php'?>
<?php include 'lgout.php'?>
<html>

<head>
   
<style>

body{
            background-color: rgb(212, 212, 212);
            margin: 0;
            padding: 0; 
            image-rendering: -webkit-optimize-contrast ;
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
    top: 680px;
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
  

  #map {
    position: fixed;
    margin: auto;
    height: 40%;
    width: 50%;
    left: 0px;
    top: 10px;
}


html, body {
height: 100%;
margin: 0;
padding: 0;
}


  
</style>

<style>


<?php include 'darkmode.css'; ?>
<?php include 'flatnav.css'; ?>
</style>

<script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>  


    </head>
<body>
<?php include 'banner.php'?>
<div class="topnav" >

<a  href="homepageusrlogin.php">Home</a>
<a  href="selecmaploc(GoogleAPI).php">Containment Zones</a>
<a   href="selechosp.php">Hospital Tracking</a>
<a class=active  href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a  href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>
</div>


<h1 style="text-align: center;">VACCINE DETAILS</h1>

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>


    <script src="darkmode.js"></script>

    <div id="map"></div>
   


 


<?php



   $place=$_GET["place"];


$query =mysqli_query( $conn," SELECT no,cntrnm,addrs,avldose FROM vaccicenters where place='".$place."'" );
$result=$query;
if(mysqli_num_rows($result)==0)
{   echo"<br>";
    echo"<br>";
    echo "HOSPITALS UNAVAILABLE TRY AGAIN LATER";
}
else{
echo ' 
<div class="table-wrapper">
<table class="fl-table">
<thead>
<tr>
    
    <th>CENTRE NAME</th>
    <th>ADDRESS</th>
    <th>AVAILABLE DOSE</th>
    <th>SHOW LOCATION</th>
  
</tr>
</thead>
<tbody>
     ';



  
while ($data = mysqli_fetch_assoc($query))  
{
  $no=$data["no"];
  $cntrnm=$data["cntrnm"];
  $addrs=$data["addrs"];
  $avldos =$data["avldose"];
 
 
 echo '


 
            <tr>
            
            <td>'.$cntrnm.'</td>
            <td>'.$addrs.'</td>
            <td>'.$avldos.'</td>
            
          
            <td><button class="btde" onclick=getloc('.$no.')><i class="fas fa-map-marker-alt"></i> show location </button></td>
            </tr>
 
 
 
 ';}
    





echo' 
  
</tbody>
 </table>
</div>
'; }

?>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
  async
></script>
<script>

<?php

$query =mysqli_query( $conn," SELECT lat,lon FROM vacciloc where no='".$place."'" );
$dat= mysqli_fetch_assoc($query);
$la=$dat['lat'];
$lo=$dat['lon'];
?>

function initMap() {
  const LatLng = { lat:<?php echo $la ?>, lng: <?php echo $lo ?> };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: LatLng
  });






  <?php
$query =mysqli_query( $conn," SELECT lat,lon FROM vaccicenters where place='".$place."'" );
while ($data = mysqli_fetch_assoc($query))  
{
    $lat=$data["lat"];
    $lon=$data["lon"];
    echo'new google.maps.Marker({
        position: new google.maps.LatLng('.$lat.','.$lon.'),
        map,
        
        });';

}
?>








}







</script>

<script>
function getloc(value)
{
  
    window.location.href="locatevac(GoogleAPI).php?w1="+value;

}



</script>


<?php $conn->close(); ?>



</body>



</html>