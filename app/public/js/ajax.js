var app = app || {};
app.ajax = (function(){

    function GET(e){
        e.preventDefault();
        jQuery.ajax({
            url : url,
            data : jQuery(this).serialize(),
            type: "GET",
            success : function(result){
                
            }
        });
    };

    function POST(e){
        e.preventDefault();
        jQuery.ajax({
            url : e.currentTarget.action,
            data : jQuery(this).serialize(),
            type: "POST",
            beforeSend : function(){
                app.message.load.fadeIn("slow");
            },
            success : function(result){
                app.message.load.fadeOut('slow', function(){
                    if(result.indexOf("exception") != -1){
                        console.log(result);
                    }
                    else if(result == "success_signin"){
                        var home_uri = getHomeUri();
                        location = home_uri + "nutricionista/paciente/consultar"
                    }
                    else if(result == "success_signup"){
                        app.message.show("Usuário cadastrado com sucesso.");
                        app.slider.getBtnSlider().click();
                    }
                    else{
                        app.message.show(result);
                    }
                });
            }
        });
    };

    function DELETE(e){
        e.preventDefault();
        jQuery.ajax({
            url : url,
            data : jQuery(this).serialize(),
            type: "DELETE",
            beforeSend : function(){
                LoginForm.js_load.fadeIn('slow');
            },
            success : function(result){
                
            }
        });
    };

    function PUT(e){
        e.preventDefault();
        jQuery.ajax({
            url : url,
            data : jQuery(this).serialize(),
            type: "PUT",
            beforeSend : function(){
                LoginForm.js_load.fadeIn('slow');
            },
            success : function(result){
                
            }
        });
    };

    return{
        get : GET,
        post : POST,
        delete : DELETE,
        put : PUT
    }
}());