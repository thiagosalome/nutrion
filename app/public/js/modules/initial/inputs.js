var app = app || {};
app.inputs = (function(){
    "use strict";
    var js_input = jQuery(".js-input-field");

    function execute(){
        js_input.on("change", function(){
            if(jQuery(this).val()){
                jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
            }
        });
    
        js_input.on("focus", function(){
            jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
        });
    
        js_input.on("blur", function(){
            if(!jQuery(this).val()){
                jQuery(this).removeClass("focus").closest(".form-field").removeClass("focus");
            }
        });
        
        js_input.each(function(){
            if(jQuery(this).val()){
                jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
            }
        });
    }

    function getInputs(){
        return js_input;
    }

    return {
        init : execute,
        getInputs : getInputs
    }
}());