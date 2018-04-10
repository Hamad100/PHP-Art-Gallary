//Jquery functions
$(function(){
    //back to top button
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');
    
    //smooth scrolling
     $("a").on('click', function(event) {
        if (this.hash !== "") {
//          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
            window.location.hash = hash;
          });
        } 
      });
    
    //smooth body appear
    $("body").css("display", "none");
    $("body").fadeIn(800);
    
    //category titles animation
    $('.one div, .two div').css({ 
        bottom: "100%"
        });
    $('.t1').mouseover(function () {
         $(".d1").stop().animate({ bottom: "50%"}, 200);
        });
    $('.t1').mouseout(function () {
        $(".d1").stop().animate({ bottom: "100%"}, 200);
    });
    $('.t2').mouseover(function () {
         $(".d2").stop().animate({ bottom: "50%"}, 200);
        });
    $('.t2').mouseout(function () {
        $(".d2").stop().animate({ bottom: "100%"}, 200);
    });
    $('.t3').mouseover(function () {
         $(".d3").stop().animate({ bottom: "50%"}, 200);
        });
    $('.t3').mouseout(function () {
        $(".d3").stop().animate({ bottom: "100%"}, 200);
    });
    
    
    //image magnifier and fader
    
    $(".one img, .two img").css("position","relative");
    $('.one img').mouseover(function () {
         $(this).stop().animate({ width: "115%", height: "460px", left: -35, top: -35, opacity: 0.5}, 200);
        });
    $('.one img').mouseout(function () {
        $(this).stop().animate({ width: "100%", height: "400px", left: 0, top: 0, opacity: 1}, 200);
    });
    
    //navigation bar color control   
    $(window).scroll(function(){

        var topScroll = $(window).scrollTop();
        
        
        if (topScroll >= 50) {
            
            $(".navbar").removeClass("navbar-transparent").addClass("newColor");
            $(".navbar a, .fa-shopping-cart").css({
                color: "#000"
            });
            /*$(".dropdown-menu li a[href]").css({
                color: "#000"
            });*/
            $(".navbar-brand").css({
                color: "orangered"
            });
            $(".navbar").css({
                boxShadow: "0.5px 0.5px 2px grey",
            });
            
            
            $(".nav li a, .fa-shopping-cart, .dropdown-menu li a[href]").hover(function(){
                $(this).css("color", "orangered");
                }, function(){
                $(this).css("color", "#000");
            });

        } else if($(window).width()> 768 && topScroll < 50 && topScroll >= 0){
            $(".navbar").addClass("navbar-transparent").removeClass("newColor");
            $(".navbar a, .fa-shopping-cart").css({
                color: "#fff"
            });
            $(".dropdown-menu li a[href]").css({
                color: "#000"
            });
            $(".navbar-brand").css({
                color: "orangered"
            });
            $(".navbar").css({
                boxShadow: "none"
            });
            $(".nav li a, .fa-shopping-cart, .dropdown-menu li a[href]").hover(function(){
                $(this).css("color", "orangered");
                }, function(){
                $(this).css("color", "#fff");
            });
            $(".dropdown-menu li a[href]").hover(function(){
                $(this).css("color", "orangered");
                }, function(){
                $(this).css("color", "#000");
            });
        }
       
    });//end of navigation bar control  
   
            
});//end of jquery function


