<!DOCTYPE html>
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
    .pr{

    margin: 20px;
    }

    .adv{
           position: absolute;
           left: 500px;
            top:900px;
         
            
           
           }
    
            .banner{ 
            color: aqua;
            background-color: rgb(53, 53, 53);
            height: 90px;
            width: 100%;
           
        }

        


        
            .btn {
                border: none;
                outline: none;
                border-radius: 12px;
                transition: transform 80ms ease-in;
                box-shadow: rgba(0, 9, 61, 0.2) 0px 4px 8px 0px;
                background-color: rgb(0, 60, 255);
                color: gold;
                font-size: 16px;
              cursor: pointer;
              position: absolute;
              left: 1500px;
              top: 20px;
              height: 36px;
              width: 130px; 
            }
            
            .btn:active {
            transform: scale(0.95);
        }
  
  

            .btn:hover {
               background-color: rgb(0, 34, 134);
            }
          
            <?php include 'dark-mode.css'; ?>

             
        </style>

    

     <meta charset="UTF-8">
     <meta name="viewport";
     content="width=device-width,initial-scale=1">
    
    <!--Icons-Kit-->
     <script src="https://kit.fontawesome.com/55d6cb6e44.js" crossorigin="anonymous"></script>
    
    </head>


<body>
    <div class="banner" id="hed" ><img src="hplogo.png" width="280" height="85"
        alt="logo">

    </div>
    <button onclick=darkmode()  class="btdr"><i id="toggle" class="fas fa-moon" ></i><span id="txt"> Dark-mode</span></button>
    
        <button onclick="location.href = 'login.php'" id="login/signup" class="btn"><i class="fas fa-id-card"></i> Login/Sign-up</button>
        
    
    <script src="darkmode.js"></script>

 
    <!--SlideShow-->
    <?php include 'hpgslideshow.php';?>



     <h1> <center> <u> COVICARE  </u> </center> </h1> <br>


     

     <p class="pr" >
        The coronavirus or SARScov2 started its spread in Wuhan, China in late 2019 which would go forward to become one of the biggest pandemic experienced by humankind. 
         The first coronavirus infection in India was reported in Thrissur, Kerala in January of 2020. 
         Now India has become one of the worst-hit country by the virus. The virus has affected our very life and lifestyle, what we need during this time is peace of mind and the strength to coping with the current situations.
<br><br>

         This site provides simplified navigation through daily and total cases of covid-19 in specific locations and info about containment zones, hospital availability, vaccine distribution center locator and quarantine booking service. 
         The site is aimed at helping people at a local level by providing details nearest to the by easily selecting their location from the options. 
        </p> 


    


       <h1> <U> <center>Coronavirus disease (COVID-19)</center> </U></h1>

      

 <br><h2 style="margin: 20px"><u> <b>Advice for the public : </b> </u></h2> </<br>

 <div class="adv">

<img src="cdav.png" width="900" height="900" > 

</div>







</body>   
</html>