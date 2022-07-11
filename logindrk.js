
   function darkmode()
   { 
     document.getElementById("toggle").classList.toggle('fa-sun');
     var x = document.getElementById("txt");
     var themestate;
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
      element.classList.toggle("dark-mode");
    document.getElementById("frm").classList.toggle("drkform");
    document.getElementById("frm2").classList.toggle("drkform");
    document.getElementById("container").classList.toggle("drkcontainer");
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
      document.getElementById("frm").classList.toggle("drkform");
      document.getElementById("frm2").classList.toggle("drkform");

      document.getElementById("container").classList.toggle("drkcontainer");

     }
   var csiup=localStorage.getItem("siup");
   if(csiup=="yes")
   {
    localStorage.removeItem("siup");
    document.getElementById("signUp").click();
   }
  
    }
 