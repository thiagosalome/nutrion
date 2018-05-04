function slider(){
    var js_btn_slider_block = jQuery(".js-btn-slide-block");
    var js_block_description = jQuery(".js-block-description");
    var js_form_cad = jQuery(".js-form-cad");
    var js_form_log = jQuery(".js-form-log");

    //Functions
    this.onClickSlider = function(speed){
        if(window.innerWidth > 767){
            this.js_btn_slider_block.on("click", function(){
                
                if(LoginSlider.js_block_description.data('position') == 'left'){
                    jQuery(this).text("Logar");
                    LoginSlider.js_block_description.data("position", "right");
                    
                    LoginSlider.js_block_description.animate({
                        right : '0',
                    }, speed, function(){
                        LoginSlider.js_form_cad.css("flex", "0 0 45%").children(".form-content, .form-title").fadeIn(speed);
                        LoginSlider.js_form_log.css("flex", "0 0 55%").children(".form-content, .form-title, .form-forgot").fadeOut(speed);
                        LoginInputs.js_input.val("").blur();;
                    });
            
                    LoginSlider.js_block_description.removeAttr("style");
                }
                else{
                    jQuery(this).text("Cadastrar");
                    LoginSlider.js_block_description.data("position", "left");
                    
                    LoginSlider.js_block_description.animate({
                        left : '0',
                    }, speed, function(){
                        LoginSlider.js_form_cad.css("flex", "0 0 55%").children(".form-content, .form-title").fadeOut(speed);
                        LoginSlider.js_form_log.css("flex", "0 0 45%").children(".form-content, .form-title, .form-forgot").fadeIn(speed);
                        LoginInputs.js_input.val("").blur();
                    });
            
                   LoginSlider.js_block_description.removeAttr("style");
                }
            });
        }
        else{
            this.js_btn_slider_block.on("click", function(){
                if(LoginSlider.js_block_description.data('position') == 'left'){
                    jQuery(this).text("Logar");
                    LoginSlider.js_block_description.data("position", "right");

                    LoginSlider.js_form_log.fadeOut('slow', function(){
                        LoginSlider.js_form_cad.fadeIn('slow');
                        LoginInputs.js_input.val("").blur();
                    });
                }
                else{
                    jQuery(this).text("Cadastrar");
                    LoginSlider.js_block_description.data("position", "left");

                    LoginSlider.js_form_cad.fadeOut('slow', function(){
                        LoginSlider.js_form_log.fadeIn('slow');
                        LoginInputs.js_input.val("").blur();
                    });
                }
                
            });
        }
    }
}