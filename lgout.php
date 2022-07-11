<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['valid']))
{
    header('Location: login.php');
} 

?> 
<style>
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
</style>
<body>
<button onclick="location.href = 'logout2.php'" id="Log-Out" class="btn"><i class="fas fa-sign-out-alt"></i> Log-Out</button>

</body>
</html>