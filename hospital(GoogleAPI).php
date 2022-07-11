<!DOCTYPE html>
<?php include 'hspconn.php'?>
<html>
<?php
session_start();
if(!isset($_SESSION['valid']))
{
    header('Location: login.php');
} 

?> 
<head>
   
<style>
*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
            background-color: rgb(212, 212, 212);
            margin: 0;
            padding: 0; 
            image-rendering: -webkit-optimize-contrast ;
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
        }
        .btn {
                border: none;
                outline: none;
                border-radius: 12px;
    
                box-shadow: rgba(0, 9, 61, 0.2) 0px 4px 8px 0px;
                background-color: rgb(0, 60, 255);
                color: gold;
                font-size: 16px;
              cursor: pointer;
              position: absolute;
              left: 1700px;
              top: 20px;
              height: 36px;
              width: 133px; 
            }
            
            .btn:active {
            transform: scale(0.95);
        }
  
  

            .btn:hover {
               background-color: rgb(0, 34, 134);
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
    margin:auto;
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

  <?php include 'flatnav.css'; ?>
</style>



</style>
<style>

<?php include 'darkmode.css'; ?>
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
<a class=active href="selechosp.php">Hospital Tracking</a>
<a  href="vaccinetrack(GoogleAPI).php">Vaccine Tracking</a>
<a   href="selecqt(GoogleAPI).php">Quarantine Booking Portal</a>


</div>

<button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    
<button onclick="location.href = 'logout2.php'" id="Log-Out" class="btn"><i class="fas fa-sign-out-alt"></i> Log-Out</button>


    <script src="darkmode.js"></script>






<h1 style="text-align: center;">HOSPITAL DETAILS</h1>


<div id="map"></div> 
<?php

$place=$_GET["place"];




  




$query =mysqli_query( $conn," SELECT no,hspname,addrs,bed,oxycl FROM hospitals where place='".$place."'");

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
       
        <th>HOSPITAL NAME</th>
        <th>ADDRESS</th>
    
        <th>AVAILABLE BEDS</th>
        <th>AVAILABLE OXYGEN CYLINDERS</th>
        <th>SHOW LOCATION</th>
      
    </tr>
    </thead>
    <tbody>
         ';

while ($data = mysqli_fetch_assoc($query))  
{
  $no=$data["no"];
  $hspname=$data["hspname"];
  $addrs=$data["addrs"];
 
  $bed =$data["bed"];
  $oxycl =$data["oxycl"];
 
 echo '
 
 

 
            <tr>
        
            <td>'.$hspname.'</td>
            <td>'.$addrs.'</td>
          
            <td>'.$bed.'</td>
            <td>'.$oxycl.'</td>
          
            <td><button class="btde" onclick=getloc('.$no.')><i class="fas fa-map-marker-alt"></i> show location </button></td>
            </tr>
 
 
            ';}
    





            echo' 
              
            </tbody>
             </table>
            </div>'; 
}
            ?>
            
            <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
            <script
              src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
              async
            ></script>
            
            
            
            <script>
            
            <?php
            
            $query =mysqli_query( $conn," SELECT lat,lon FROM hosploc where no='".$place."'" );
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
            $query =mysqli_query( $conn," SELECT lat,lon FROM hospitals where place='".$place."'" );
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
              
                window.location.href="locatehsp(GoogleAPI).php?w1=" +value;
            
            }
            
            
            
            </script>
            
            
            <?php $conn->close(); ?>
            
            
            
            </body>
            
            
            
            </html>