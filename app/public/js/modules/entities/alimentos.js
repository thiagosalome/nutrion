var app = app || {};

app.alimentos = (function(){
    var addAliment = jQuery(".js-form-addAliment");
    var deleteAliment = jQuery(".js-form-deleteAliment");
    var updateAliment = jQuery(".js-form-updateAliment");

    function init(){
        addAliment.on("submit", function(e){
            app.ajax.post(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location = app.loadModules.getHomeUri() + "/alimento/consultar"
                }
            });
        });
    
        deleteAliment.on("submit", function(e){
            app.ajax.delete(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });
    
        updateAliment.on("submit", function(e){
            app.ajax.put(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });
    
        if(location.href.indexOf("alimento/consultar") != -1){
            var idNutricionista = app.nutricionista.getId();
            var urlAlimento = app.loadModules.getHomeUri() + "API/alimento/?id_nutricionista=" + idNutricionista;
            app.ajax.get(urlAlimento, function(response){
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
                // app.screen.verify();
            });
        }
        
        jQuery(document).on("click", ".js-aliment-click-update", function(e){
            // setDataTableForm(e);
            setDataForm(e);
        });
        
        jQuery(document).on("click", ".js-aliment-click-delete", function(e){
            // setIdTableInput(e);
            setDataForm(e);
        });
    }


    function setDataForm(e){
        if(e.currentTarget.className.indexOf("update") != -1){
            var tr = jQuery(e.currentTarget).closest("tr");
            var param = "";
            var value = "";
            tr.children().each(function(index){
                param = jQuery(this).data("item");
                
                // value = param == "id_alimento" ? jQuery(this).children("a").data("id") : jQuery(this).text();
                if(param == "id_alimento"){
                    value = jQuery(this).children("a").data("id");
                    updateAliment.attr("action", app.loadModules.getHomeUri() + "API/alimento/" + value);
                }
                else{
                    value = jQuery(this).text();
                    updateAliment.find("input[name='" + param + "'], select[name='" + param + "']").val(value);
                }
            });
        }
        else if(e.currentTarget.className.indexOf("delete") != -1){
            var value = jQuery(e.currentTarget).data("id");
            var param = jQuery(e.currentTarget).closest("td").data("item");
            deleteAliment.attr("action", app.loadModules.getHomeUri() + "API/alimento/" + value);
        }
    }

    return {
        init : init
    }
}());