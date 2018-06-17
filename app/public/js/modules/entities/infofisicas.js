var app = app || {};

app.infoFisicas = (function(){
    var addInfoFisicas = jQuery(".js-form-addInfoFisicas");
    var deleteInfoFisicas = jQuery(".js-form-deleteInfoFisicas");
    var updateInfoFisicas = jQuery(".js-form-updateInfoFisicas");

    var altura = jQuery(".js-altura");
    var peso = jQuery(".js-peso");
    var cintura = jQuery(".js-cintura");
    var quadril = jQuery(".js-quadril");
    var imc = jQuery(".js-imc");
    var icq = jQuery(".js-icq");

    function init(){
        addInfoFisicas.on("submit", function(e){
            app.ajax.post(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });
    
        /*
        deleteInfoFisicas.on("submit", function(e){
            app.ajax.delete(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });
    
        updateInfoFisicas.on("submit", function(e){
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
        }*/
        
        peso.on("blur", function(){
            var valAltura = altura.val();
            var valPeso = peso.val();
            var result = calculaIMC(valAltura, valPeso);
            imc.val(result); //falta verificar se vai aparecer
        });
        
        quadril.on("blur", function(){
            var valCintura = cintura.val();
            var valQuadril = quadril.val();
            var result = calculaICQ(valCintura, valQuadril);
            icq.val(result); //falta verificar se vai aparecer
        });

    }

    function calculaIMC(altura, peso){
        return (peso / (altura * altura));        
    }

    function calculaICQ(cintura, quadril){
        return (cintura / quadril);
    }

    return {
        init : init
    }
}());