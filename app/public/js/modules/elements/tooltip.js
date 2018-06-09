var app = app || {};
app.tooltip = (function(){
    var js_header_perfil = jQuery(".js-header-perfil");
    var js_header_options = jQuery(".js-header-options");

    function toggle(){
        js_header_perfil.on("click", function(){
            js_header_options.fadeToggle(200);
        });
    }

    return {
        toggle : toggle
    }
}());