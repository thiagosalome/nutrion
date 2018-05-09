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
                    move("right", speed);
                }
                else{
                    jQuery(this).text("Cadastrar");
                    move("left", speed);
                }
            });
        }
        else{
            js_btn_slider.on("click", function(){
                if(js_description.data('position') == 'left'){
                    jQuery(this).text("Logar");
                    moveMobile("right", js_form_log, js_form_cad);
                }
                else{
                    jQuery(this).text("Cadastrar");
                    moveMobile("right", js_form_cad, js_form_log);
                }
            });
        }
    };

    function move(direction, speed){
        js_description.data("position", direction);
        var style = direction == "right" ? {right : "0"} : {left : "0"};

        js_description.animate(style, speed, function(){
            if(direction == "right"){
                js_form_cad.toggleClass("flex-bigger flex-smaller").children(".form-content, .form-title").fadeIn(speed);
                js_form_log.toggleClass("flex-bigger flex-smaller").children(".form-content, .form-title, .form-forgot").fadeOut(speed);
            }
            else{
                js_form_cad.toggleClass("flex-bigger flex-smaller").children(".form-content, .form-title").fadeOut(speed);
                js_form_log.toggleClass("flex-bigger flex-smaller").children(".form-content, .form-title, .form-forgot").fadeIn(speed);
            }

            app.inputs.getInputs().val("").blur();
        });

        js_description.removeAttr("style");
    };

    function moveMobile(direction, selectorOut, selectorIn){
        js_description.data("position", direction);

        selectorOut.fadeOut('slow', function(){
            selectorIn.fadeIn('slow');
            app.inputs.getInputs().val("").blur();
        });
    };

    function getBtnSlider(){
        return js_btn_slider;
    }

    return {
        execute : init,
        getBtnSlider : getBtnSlider
    }
}());