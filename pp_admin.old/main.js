$(document).ready(function()
{       
        $('.toggle_user').show();
        $('.toggle_article').hide();        
        $('.toggle_comment').hide();
        $('.toggle_comment').hide();
        $('#toggle_all_comment').hide();
        $('#toggle_report_comment').hide();
        $('.toggle_theme').hide();
        $('.toggle_menu_article').hide();
        $('.toggle_menu_comment').hide();
        $('.toggle_menu_theme').hide();
    
  
        //$(".menu-box").next().css({"color": "red", "border": "2px solid red"})
   
    $('a#toggler_article').click(function() {

        $(this).addClass('active');
        $("a#toggler_user").removeClass('active');
        $("a#toggler_comment").removeClass('active');
        $("a#toggler_theme").removeClass('active');

        $('.menu-box').css("border-left","5px solid rgb(241, 90, 36)");

        $('.toggle_article').show();
        $('.toggle_user').hide();
        $('.toggle_theme').hide();
        $('.toggle_comment').hide();
        $('#toggle_report_comment').hide();
        $('#toggle_all_comment').hide();

        $('.toggle_menu_article').slideToggle("slow")();
        return false;
    });

     $('a#toggler_user').click(function() {

        $(this).addClass('active');
        $("a#toggler_article").removeClass('active');
        $("a#toggler_comment").removeClass('active');
        $("a#toggler_theme").removeClass('active'); 

        $('.toggle_user').show();
        $('.toggle_article').hide();       
        $('.toggle_all_comment').hide();
        $('.toggle_report_comment').hide();
        $('.toggle_theme').hide();
        $('#toggle_report_comment').hide();
        $('#toggle_all_comment').hide();  

         $('.toggle_menu_user').slideToggle("slow")();  
        return false;
    });

    $('a#toggler_comment').click(function() {

        $(this).addClass('active');

        $("a#toggler_article").removeClass('active');
        $("a#toggler_comment").removeClass('active');
        $("a#toggler_theme").removeClass('active');

        $('.toggle_user').hide();
        $('.toggle_article').hide();       
        $('#toggle_all_comment').show();
        $('.toggle_comment').show();
        $('#toggle_report_comment').hide();
        $('.toggle_theme').hide();

        $('.toggle_menu_comment').slideToggle("slow")(); 

        return false;
    });


 $('a#toggler_all_comment').click(function() {

        $(this).addClass('active');
        $("a#toggler_report_comment").removeClass('active');
        $('#toggle_report_comment').hide();
        $('#toggle_all_comment').show();      

        return false;
    });

 $('a#toggler_report_comment').click(function() {

        $(this).addClass('active');
        $("a#toggler_all_comment").removeClass('active');
        $('#toggle_report_comment').show();
        $('#toggle_all_comment').hide();      
          
        return false;
    });

 $('a#toggler_theme').click(function() {
        $(this).addClass('active');
        $("a#toggler_user").removeClass('active');
        $("a#toggler_article").removeClass('active');
        $("a#toggler_comment").removeClass('active');

        $('.toggle_article').hide();
        $('.toggle_theme').show();
        $('#toggle_all_comment').hide();
        $('#toggle_report_comment').hide();      
        $('.toggle_user').hide(); 
        $('.toggle_comment').hide();

        $('.toggle_menu_theme').slideToggle("slow")(); 

       return false;
    });

});