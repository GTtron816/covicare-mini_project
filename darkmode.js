
   function darkmode()
   {    
  
    var themestate;
     document.getElementById("toggle").classList.toggle('fa-sun');
     var x = document.getElementById("txt");
    
   if (x.innerHTML === " Dark-mode") {
     x.innerHTML = " Light-Mode";
     themestate="drkon";
     localStorage.setItem("theme",themestate);
   } else {
     x.innerHTML = " Dark-mode";
     themestate="drkoff";
     localStorage.setItem("theme",themestate);
   } 

 
   var element = document.body;
   element.classList.toggle('dark-mode');
    }

    window.onload = function(){ 
     var chk=localStorage.getItem("theme");
     if(chk=="drkon")
     {
         document.getElementById("toggle").classList.toggle('fa-sun');
         var x = document.getElementById("txt");
         x.innerHTML = " Light-Mode";
        
         var element = document.body;
      element.classList.toggle("dark-mode");
     }
    
  
    }
 