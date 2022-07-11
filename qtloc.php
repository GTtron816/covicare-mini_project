<!DOCTYPE html>
<?php include 'qtconn.php'?>
<?php include 'lgout.php'?>
<html>

<head>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>






    <style>

      
    


*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;}
   

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
    top: 650px;
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


.btdre {
  background-color: rgb(0, 60, 255);
  border-radius: 12px;
  color: gold;
  padding: 0px;
margin: 0px;
font-size: 16px;
cursor: pointer;
position: fixed;
left : 600px;
top: 530px;
height: 40px;
width: 180px;
border: none;
    outline: none;         }



.btdre:hover {
  background-color: rgb(0, 34, 134);
} 



<?php include 'flatnav.css'; ?>


#map {
    position: fixed;
    margin: auto;
    height: 40%;
    width: 50%;
    left: 0px;
    top: 60px;
}

html, body {
height: 100%;
margin: 0;
padding: 0;
}

<?php include 'darkmode.css'; ?>

 </style>
 <!--Icons-Kit-->
 <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>

</head>
<body>
<?php include 'banner.php'?>
<div class="topnav" >

<a  href="homepageusrlogin.php">Home</a>
<a  href="selecmaploc(GoogleAPI).php">Containment Zones</a>
<a href="selechosp.php">Hospital Tracking</a>
<a  href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a class=active   href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>


</div>

<?php


  
if (isset($_GET["w1"]))
{
   $chk=$_GET["w1"];
}



$query =mysqli_query( $conn,"SELECT lat,lon FROM qtlist where no='".$chk."'");
while ($data = mysqli_fetch_assoc($query))
{
   
    $lat = $data['lat'];
    $lon = $data['lon'];
    
                    
}



?>

 
   

  
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
      async
    ></script>







<script>
var lati =<?php echo "$lat"?>;
var longi=<?php echo "$lon"?>

function initMap() {
  const myLatLng = { lat: lati, lng: longi };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: myLatLng
  });


new google.maps.Marker({
    position: myLatLng,
    map,
    
  });




   



    





}

</script>


<?php

$query =mysqli_query( $conn,"SELECT qtname,addr,qtplace,foodsrv FROM qtlist where no='".$chk."'  ");


  $data = mysqli_fetch_assoc($query);
  
  $qtname=$data["qtname"];
  $place=$data["qtplace"];
  $addr=$data["addr"];
  $fsrv=$data["foodsrv"];
  echo' 
<div class="table-wrapper">
<table class="fl-table">
<thead>
<tr>

<th>CENTER NAME</th>
<th>ADDRESS</th>
<th>PLACE</th>
<th>SERVES FOOD</th>
  
</tr>
</thead>
<tbody>
 

<tr>
            <td>'.$qtname.'</td>
            <td>'.$addr.'</td>
            <td>'.$place.'</td>
            <td>'.$fsrv.'</td>
</tr>

</tbody>
 </table>
</div>

';
    

    ?>
<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    
    
    <script src="darkmode.js"></script>


  
    <?php $conn->close(); ?>

  </body>


</html>