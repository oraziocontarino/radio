$(document).ready(function(){

    $(".options a").click(function() {
        $(this).toggleClass("active");
    });

    $(".favorite").click(function() {
        if($(".options .favorite i").hasClass("fa-heart")) {
            $(".options .favorite i").removeClass("fa-heart").addClass("fa-heart-o");
        }
        else {
            $(".options .favorite i").removeClass("fa-heart-o").addClass("fa-heart");
        }
    });

    $(".side-menu-trigger").click(function(){
        $(".side-menu").animate({marginLeft: '0px'});
            $(".volume-slider").animate({marginTop: '0px'}, 500);
    }); 

    $(".side-menu li a, .side-menu .close").click(function(){
        $(".side-menu").animate({marginLeft: '-100%'});
    }); 

    initMenuEventController();

});

function initMenuEventController(){    
    $(".side-menu li").on("click", function(){
        if ($(".side-menu li.active a").attr("class") == $("a", $(this)).attr("class")) {
            console.log("nothing to change");
            return;
        }
        var oldComponentSelector = $(".side-menu li.active a").attr("component-selector");
        var newComponentSelector = $("a", $(this)).attr("component-selector");

        $(".side-menu li.active").removeClass("active");
        $(this).addClass("active");

        $(oldComponentSelector).addClass("hidden");
        $(newComponentSelector).removeClass("hidden");
    });

    $(".side-your-playlist").on("click", function(){
        console.log("show folder list")
    });
}