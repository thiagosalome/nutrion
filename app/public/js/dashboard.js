var menu = {
    'js_menu' : jQuery(".js-menu"),
    'js_aside' : jQuery(".js-aside"),
    
    "onClick": function(){
        this.js_menu.on("click", function(){
            menu.js_aside.toggleClass("active");
        });
    }
}