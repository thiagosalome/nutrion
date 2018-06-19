var app = app || {};

app.pacientes = (function(){
    var addPatient = jQuery(".js-form-addPatient");
    var deletePatient = jQuery(".js-form-deletePatient");
    var updatePatient = jQuery(".js-form-updatePatient");
    
    function init(){
        addPatient.on("submit", function(e){
            app.ajax.post(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location = app.loadModules.getHomeUri() + "/paciente/consultar"
                }
            });
        });
    
        deletePatient.on("submit", function(e){
            app.ajax.delete(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location = app.loadModules.getHomeUri() + "/paciente/consultar"
                }
            });
        });
    
        updatePatient.on("submit", function(e){
            app.ajax.put(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });
    
        /*if(location.href.indexOf("paciente/consultar") != -1){
            var idNutricionista = app.nutricionista.getId();
            var urlPaciente = app.loadModules.getHomeUri() + "API/paciente/?id_nutricionista=" + idNutricionista;
            app.ajax.get(urlPaciente, function(response){
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
                // app.screen.verify();
            });
        }*/
    }

    return {
        init : init
    }
}());