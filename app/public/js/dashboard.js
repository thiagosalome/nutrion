var DashboardMenu = {
    'js_menu' : jQuery(".js-menu"),
    'js_aside' : jQuery(".js-aside"),
    'js_nav_item' : jQuery(".js-nav-item"),
    
    "onClick" : function(){
        this.js_menu.on("click", function(){
            DashboardMenu.js_aside.toggleClass("active");
        });
    },

    "dropDown" : function(){
        this.js_nav_item.on("click", function(e){
            jQuery(this).closest(".nav-dropdown").toggleClass("active");
        });
    },
    
    "verifyDropDown" : function(){
        var url = window.location;
        var navDropdown = jQuery(".nav-dropdown"); 
        var dataType;

        navDropdown.each(function(){
            // this.getAttribute("data-type"));
            dataType = jQuery(this).data("type");

            if(url.href.indexOf(dataType) != -1){
                jQuery(this).addClass("active");
            } 
        });
    }
}