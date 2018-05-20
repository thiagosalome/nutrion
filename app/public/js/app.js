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

            /*jQuery(document).on("submit", ".js-form-deleteNutritionist", function(e){
                app.ajax.delete(e, function(response){

                });
            });*/

            jQuery(".js-form-deleteNutritionist").on("submit", app.ajax.delete(e, function(response){
                debugger;
                var a = "teste";
                var b = response;
            }));
            
            jQuery(document).on("submit", ".js-form-updateNutritionist", function(e){app.ajax.put(e)});
            jQuery(document).on("submit", ".js-form-addPatient", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-deletePatient", function(e){app.ajax.delete(e)});
            jQuery(document).on("submit", ".js-form-updatePatient", function(e){app.ajax.put(e)});
            jQuery(document).on("submit", ".js-form-addAliment", function(e){app.ajax.post(e)});
            jQuery(document).on("submit", ".js-form-updateAliment", function(e){app.ajax.put(e)});
            jQuery(document).on("submit", ".js-form-deleteAliment", function(e){app.ajax.delete(e)});

            jQuery(document).on("click", ".js-aliment-click-update", function(e){
                setDataTableForm(e);
            });
            
            jQuery(document).on("click", ".js-aliment-click-delete", function(e){
                setIdTableInput(e);
            });
        }
    }

    function setIdTableInput(e){
        var value = jQuery(e.currentTarget).data("id");
        var data = jQuery(e.currentTarget).closest("td").data("item");

        jQuery(".js-form-deleteAliment").find("input[name='" + data + "']").val(value);
    }

    function setDataTableForm(e){
        var js_parent = jQuery(e.currentTarget).closest("tr");
        js_parent.children().each(function(index){
            var data = jQuery(this).data("item");

            if(data == "id_alimento"){
                var value = jQuery(this).children("a").data("id");
                jQuery(".js-form-updateAliment").find("input[name='" + data + "']").val(value);
            }
            else{
                var value = jQuery(this).text();
                jQuery(".js-form-updateAliment").find("input[name='" + data + "'], select[name='" + data + "']").val(value);
            }
        });
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
