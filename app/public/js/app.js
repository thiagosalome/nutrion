// Definindo o objeto global da aplicação
var app = app || {};
app.loadModules = (function(jQuery){
    "use strict";

    function load(){
        if(jQuery(".js-input-field").length > 0){
            require("utilities/ajax");
            require("utilities/message");
            require("elements/inputs");
            require("elements/slider");
            require("entities/nutricionista");

            app.inputs.init();
            app.slider.execute();
            app.nutricionista.init();
        }
        if(jQuery(".main-dashboard").length > 0){
            require("utilities/ajax");
            require("utilities/message");
            require("elements/menu");
            require("elements/tooltip");
            require("elements/screen");
            require("entities/nutricionista");

            app.menu.init();
            app.tooltip.toggle();
            app.nutricionista.init();
            app.screen.verify();
            
            if(location.href.indexOf("paciente") != -1){
                require("elements/tab");
                require("entities/pacientes");
                app.tab.execute();
                app.pacientes.init();
            }
            else if(location.href.indexOf("alimento") != -1){
                require("entities/alimentos");
                app.alimentos.init();
            }
        }
    };

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