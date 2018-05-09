var app = app || {};

app.slider = (function(){
    var js_btn_slider = jQuery(".js-btn-slider");
    var js_description = jQuery(".js-description");
    var js_form_cad = jQuery(".js-form-cad");
    var js_form_log = jQuery(".js-form-log");

    //Functions
    init = function(speed){
        if(window.innerWidth > 767){
            js_btn_slider.on("click", function(){
                if(js_description.data('position') == 'left'){
                    jQuery(this).text("Logar");
                    js_description.data("position", "right");
                    
                    js_description.animate({
                        right : '0',
                    }, speed, function(){
                        js_form_cad.css("flex", "0 0 45%").children(".form-content, .form-title").fadeIn(speed);
                        js_form_log.css("flex", "0 0 55%").children(".form-content, .form-title, .form-forgot").fadeOut(speed);
                        // LoginInputs.js_input.val("").blur();
                        app.inputs.val("").blur();
                    });
            
                    js_description.removeAttr("style");
                }
                else{
                    jQuery(this).text("Cadastrar");
                    js_description.data("position", "left");
                    
                    js_description.animate({
                        left : '0',
                    }, speed, function(){
                        js_form_cad.css("flex", "0 0 55%").children(".form-content, .form-title").fadeOut(speed);
                        js_form_log.css("flex", "0 0 45%").children(".form-content, .form-title, .form-forgot").fadeIn(speed);
                        app.inputs.val("").blur();
                    });
            
                   js_description.removeAttr("style");
                }
            });
        }
        else{
            js_btn_slider.on("click", function(){
                if(js_description.data('position') == 'left'){
                    jQuery(this).text("Logar");
                    js_description.data("position", "right");

                    js_form_log.fadeOut('slow', function(){
                        js_form_cad.fadeIn('slow');
                        // LoginInputs.js_input.val("").blur();
                        app.inputs.val("").blur();
                    });
                }
                else{
                    jQuery(this).text("Cadastrar");
                    js_description.data("position", "left");

                    js_form_cad.fadeOut('slow', function(){
                        js_form_log.fadeIn('slow');
                        // LoginInputs.js_input.val("").blur();
                        app.inputs.val("").blur();
                    });
                }
                
            });
        }
    };

    function slider(textButtom, direction, speed){
        jQuery(this).text(textButtom);
        js_description.data("position", direction);
        
        js_description.animate({
            direction : '0',
        }, speed, function(){
            js_form_cad.css("flex", "0 0 45%").children(".form-content, .form-title").fadeIn(speed);
            js_form_log.css("flex", "0 0 55%").children(".form-content, .form-title, .form-forgot").fadeOut(speed);
            // LoginInputs.js_input.val("").blur();
            app.inputs.val("").blur();
        });

        js_description.removeAttr("style");
    }

    return {
        execute : init
    }
}());