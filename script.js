
    var navLinks = document.getElementById("nav-links");
    function showMenu() {
      navLinks.style.right = "0";
    }
    function hideMenu() {
      navLinks.style.right = "-200px";
    }
  

    $(document).ready(function(){
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if (scroll > 300) {
              $(".nav-bar").css("background" , "blue");
            }
      
            else{
                $(".nav-bar").css("background" , "#333");  	
            }
        })
      })