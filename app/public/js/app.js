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
            // require("elements/screen");
            require("entities/nutricionista");

            app.menu.init();
            app.tooltip.toggle();
            app.nutricionista.init();
            
            if(location.href.indexOf("paciente") != -1){
                require("elements/tab");
                require("entities/pacientes");
                require("entities/infofisicas");
                app.tab.execute();
                app.pacientes.init();
                app.infoFisicas.init();
            }
            else if(location.href.indexOf("alimento") != -1){
                require("entities/alimentos");
                app.alimentos.init();
            }
            else if(location.href.indexOf("dieta") != -1){
                require("elements/tab");
                require("entities/dietas");
                require("entities/refeicoes");
                app.tab.execute();
                app.dietas.init();
                app.refeicoes.init();
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