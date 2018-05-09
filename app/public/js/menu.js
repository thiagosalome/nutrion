var app = app || {};
app.menu = (function(){
    "use strict";
    var js_menu = jQuery(".js-menu");
    var js_item_menu = jQuery(".js-item-menu");
    var js_aside = jQuery(".js-aside");
    var js_nav_item = jQuery(".js-nav-item");

    function execute(){
        js_menu.on("click", function(){
            js_aside.toggleClass("active");
        });

        js_nav_item.on("click", function(e){
            jQuery(this).closest(".nav-dropdown").toggleClass("active");
        });

        js_item_menu.each(function(){
            // this.getAttribute("data-type"));
            var dataType = jQuery(this).data("type");
    
            if(window.location.href.indexOf(dataType) != -1){
                jQuery(this).addClass("active");
            } 
        });
    }

    return {
        init : execute
    }
}());