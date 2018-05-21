var app = app || {};

app.message = (function(){
    var js_message = jQuery(".js-message");
    var js_load = jQuery(".js-load");

    show = function(msg){
        js_message.text(msg).fadeIn(300, function(){
            setTimeout(function(){js_message.fadeOut(300)}, 2000);
        });
    }

    return {
        show : show,
        load : js_load
    }
}());