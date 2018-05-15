// Definindo o objeto global da aplicação
var app = app || {};
app.loadModules = (function(jQuery){
    "use strict";

    function load(){
        if(jQuery(".js-input-field").length > 0){
            require("general/ajax");
            require("general/message");
            require("initial/inputs");
            require("initial/slider");

            app.inputs.init();
            app.slider.execute();

            jQuery(document).on("submit", ".js-form-signup", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-signin", function(e){app.ajax.post(e)});
        }
        if(jQuery(".main-dashboard").length > 0){
            require("general/ajax");
            require("general/message");
            require("internal/menu");
            require("internal/tab");
            require("internal/tooltip");
            require("internal/dashboard");

            app.menu.init();
            app.tab.execute();
            app.tooltip.toggle();
            app.dashboard.verify();

            jQuery(document).on("submit", ".js-form-deleteNutritionist", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-updateNutritionist", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-addPatient", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-deletePatient", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-updatePatient", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-addAliment", function(e){app.ajax.post(e)});
        }
        
    }

    function require(module){
        if(module != null){
            var home_uri = getHomeUri();
            var src = home_uri + "app/public/js/modules/" + module;
            jQuery("main").after("<script type='text/javascript' src='" + src + ".js'></script>");
        }
    }

    function getHomeUri(){
        var src = jQuery("script[src*='app.js']").attr("src"); //Pega o src do script que contem a expressão app.js
        var uri = src.indexOf("azurewebsites") != -1 ? src.substring(0, 34) : uri = src.substring(0, 9);
        return uri;
    }

    return {
        init : load,
        getHomeUri : getHomeUri
    }
}(jQuery));

app.loadModules.init();
