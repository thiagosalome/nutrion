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

            /* Nutricionista */
            jQuery(document).on("submit", ".js-form-signup", function(e){
                app.ajax.post(e, function(response){
                    app.message.show(response.message);
                    if(response.message.indexOf("sucesso") != -1){
                        var btn = app.slider.getBtnSlider();
                        btn.click();
                    }
                });
            });
            
            jQuery(document).on("submit", ".js-form-signin", function(e){
                app.ajax.post(e, function(response){
                    app.message.show(response.message);
                    if(response.message.indexOf("sucesso") != -1){
                        location = app.loadModules.getHomeUri() + "/paciente/consultar"
                    }
                });
            });

            // jQuery(document).on("submit", ".js-form-signin", function(e){app.ajax.post(e)});
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
            
            jQuery(document).on("submit", ".js-form-deleteNutritionist", function(e){
                app.ajax.delete(e, function(response){
                    app.message.show(response.message);
                });
            });

            jQuery(document).on("submit", ".js-form-updateNutritionist", function(e){
                app.ajax.put(e, function(response){
                    app.message.show(response.message);
                });
            });
            
            /* Pacientes */
            jQuery(document).on("submit", ".js-form-addPatient", function(e){
                app.ajax.post(e, function(response){
                    app.message.show(response.message);
                    if(response.message.indexOf("sucesso") != -1){
                        location = app.loadModules.getHomeUri() + "/paciente/consultar"
                    }
                });
            });

            jQuery(document).on("submit", ".js-form-deletePatient", function(e){
                app.ajax.delete(e, function(response){
                    app.message.show(response.message);
                    if(response.message.indexOf("sucesso") != -1){
                        location = app.loadModules.getHomeUri() + "/paciente/consultar"
                    }
                });
            });

            jQuery(document).on("submit", ".js-form-updatePatient", function(e){
                app.ajax.put(e, function(response){
                    app.message.show(response.message);
                });
            });

            var id_nutricionista = jQuery(".js-idnutricionista").text();
            var url_paciente = app.loadModules.getHomeUri() + "API/paciente/?id_nutricionista=" + id_nutricionista;
            app.ajax.get(url_paciente, function(response){
                var js_table_patient = jQuery(".js-table-patient tbody");
                for (var i = 0; i < response.result.length; i++) {
                    var row = "<tr>" +
                                "<td>" + response.result[i].nome + "</td>" + 
                                "<td>" + response.result[i].email + "</td>" + 
                                "<td>" + response.result[i].telefone + "</td>" + 
                                "<td>" + response.result[i].cpf + "</td>" + 
                                "<td>" +
                                    "<a href='" + app.loadModules.getHomeUri() + "paciente/interna/" + response.result[i].id + "' class='view'><i class='material-icons' data-toggle='tooltip' title='Visualizar'>visibility</i></a>"
                                "</td>" +
                            "</tr>";
                    js_table_patient.append(row);
                }
                app.dashboard.verify();
            });
            
            
            /* Alimentos */
            jQuery(document).on("submit", ".js-form-addAliment", function(e){
                app.ajax.post(e, function(response){
                    app.message.show(response.message);
                    if(response.message.indexOf("sucesso") != -1){
                        location = app.loadModules.getHomeUri() + "/alimento/consultar"
                    }
                });
            });

            jQuery(document).on("submit", ".js-form-deleteAliment", function(e){
                app.ajax.delete(e, function(response){
                    app.message.show(response.message);
                    if(response.message.indexOf("sucesso") != -1){
                        location.reload();
                    }
                });
            });

            jQuery(document).on("submit", ".js-form-updateAliment", function(e){
                app.ajax.put(e, function(response){
                    app.message.show(response.message);
                    if(response.message.indexOf("sucesso") != -1){
                        location.reload();
                    }
                });
            });

            var url_alimento = app.loadModules.getHomeUri() + "API/alimento/";
            app.ajax.get(url_alimento, function(response){
                var js_table_aliment = jQuery(".js-table-aliment tbody");
                for (var i = 0; i < response.result.length; i++) {
                    var row = "<tr>" +
                                "<td data-item='nome'>" + response.result[i].nome + "</td>" +
                                "<td data-item='medida'>" + response.result[i].medida + "</td>" + 
                                "<td data-item='tipo_proteina'>" + response.result[i].tipoproteina + "</td>" +
                                "<td data-item='proteina'>" + response.result[i].proteina + "</td>" +
                                "<td data-item='carboidrato'>" + response.result[i].carboidrato + "</td>" +
                                "<td data-item='gordura'>" + response.result[i].gordura + "</td>" +
                                "<td data-item='caloria'>" + response.result[i].caloria + "</td>" +
                                "<td data-item='id_alimento'>" +
                                    "<a href='' data-id='" + response.result[i].id + "' class='js-aliment-click-update' data-toggle='modal' data-target='#modal-update-aliment'><i class='material-icons' data-toggle='tooltip' title='Editar'>mode_edit</i></a>" +
                                    "<a href='' data-id='" + response.result[i].id + "' class='js-aliment-click-delete' data-toggle='modal' data-target='#modal-delete-aliment'><i class='material-icons' data-toggle='tooltip' title='Apagar'>delete</i></a>" +
                                "</td>" +
                            "</tr>";
                    js_table_aliment.append(row);
                }
                app.dashboard.verify();
            });
            
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
