var mainForm = {
    //Attributes
    'js_message' : jQuery(".js-message"),

    //Functions
    'onSubmit' : function(form, url){
        jQuery(document).on("submit", form, function(e){
            debugger;
            e.preventDefault();
            jQuery.ajax({
                url : url,
                data : jQuery(this).serialize(),
                type: "POST",
                success : function(result){
                    mainForm.showMessage(messages[result]);
                    if(result == "success_signup"){
                        mainSlider.js_btn_slider_block.click();
                    }
                }
            });
        });
    },
    'showMessage' : function(msg){
        this.js_message.text(msg).fadeIn(300, function(){
            setTimeout(function(){mainForm.js_message.fadeOut(300)}, 2000);
        });
    }
}

var mainInputs = {
    //Attributes
    'js_input' : jQuery(".js-input-field"),

    //Functions
    'onChange' : function(){
        this.js_input.on("change", function(){
            if(jQuery(this).val()){
                jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
            }
        });
    },
    'onFocus' : function(){
        this.js_input.on("focus", function(){
            jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
        });
    },
    'onBlur' : function(){
        this.js_input.on("blur", function(){
            if(!jQuery(this).val()){
                jQuery(this).removeClass("focus").closest(".form-field").removeClass("focus");
            }
        });
    },
    'eachInput' : function(){
        this.js_input.each(function(){
            if(jQuery(this).val()){
                jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
            }
        });
    }
}

var mainSlider = {
    //Attributes
    'js_btn_slider_block' : jQuery(".js-btn-slide-block"),
    'js_block_description' : jQuery(".js-block-description"),
    'js_form_cad' : jQuery(".js-form-cad"),
    'js_form_log' : jQuery(".js-form-log"),

    //Functions
    'onClickSlider' : function(speed){
        if(window.innerWidth > 767){
            this.js_btn_slider_block.on("click", function(){
                
                if(mainSlider.js_block_description.data('position') == 'left'){
                    jQuery(this).text("Logar");
                    mainSlider.js_block_description.data("position", "right");
                    
                    mainSlider.js_block_description.animate({
                        right : '0',
                    }, speed, function(){
                        mainSlider.js_form_cad.css("flex", "0 0 45%").children(".form-content, .form-title").fadeIn(speed);
                        mainSlider.js_form_log.css("flex", "0 0 55%").children(".form-content, .form-title, .form-forgot").fadeOut(speed);
                        mainInputs.js_input.val("").blur();;
                    });
            
                    mainSlider.js_block_description.removeAttr("style");
                }
                else{
                    jQuery(this).text("Cadastrar");
                    mainSlider.js_block_description.data("position", "left");
                    
                    mainSlider.js_block_description.animate({
                        left : '0',
                    }, speed, function(){
                        mainSlider.js_form_cad.css("flex", "0 0 55%").children(".form-content, .form-title").fadeOut(speed);
                        mainSlider.js_form_log.css("flex", "0 0 45%").children(".form-content, .form-title, .form-forgot").fadeIn(speed);
                        mainInputs.js_input.val("").blur();
                    });
            
                   mainSlider.js_block_description.removeAttr("style");
                }
            });
        }
        else{
            this.js_btn_slider_block.on("click", function(){
                if(mainSlider.js_block_description.data('position') == 'left'){
                    jQuery(this).text("Logar");
                    mainSlider.js_block_description.data("position", "right");

                    mainSlider.js_form_log.fadeOut('slow', function(){
                        mainSlider.js_form_cad.fadeIn('slow');
                        mainInputs.js_input.val("").blur();
                    });
                }
                else{
                    jQuery(this).text("Cadastrar");
                    mainSlider.js_block_description.data("position", "left");

                    mainSlider.js_form_cad.fadeOut('slow', function(){
                        mainSlider.js_form_log.fadeIn('slow');
                        mainInputs.js_input.val("").blur();
                    });
                }
                
            });
        }
    }
}