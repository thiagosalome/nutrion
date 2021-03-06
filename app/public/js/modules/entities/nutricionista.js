var app = app || {};

app.nutricionista = (function(){
    var loginNutricionist = jQuery(".js-form-signin");
    var addNutricionist = jQuery(".js-form-signup");
    var updateNutricionist = jQuery(".js-form-updateNutritionist");
    var deleteNutricionist = jQuery(".js-form-deleteNutritionist");
    var idNutricionist = jQuery(".js-idnutricionista").text();
    var keyNutricionist = jQuery(".js-form-keyNutritionist");

    function init(){
        loginNutricionist.on("submit", function(e){
            app.ajax.post(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location = app.loadModules.getHomeUri() + "paciente/consultar"
                }
            });
        });
    
        addNutricionist.on("submit", function(e){
            app.ajax.post(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    var btn = app.slider.getBtnSlider();
                    btn.click();
                }
            });
        });
    
        deleteNutricionist.on("submit", function(e){
            app.ajax.delete(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });
    
        updateNutricionist.on("submit", function(e){
            app.ajax.put(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });

        keyNutricionist.on("submit", function(e){
            app.ajax.post(e, function(response){
                app.message.show(response.message);
                if(response.message.indexOf("sucesso") != -1){
                    location.reload();
                }
            });
        });
    }

    function getId(){
        return idNutricionist;
    }

    return {
        init : init,
        getId : getId
    }
}());