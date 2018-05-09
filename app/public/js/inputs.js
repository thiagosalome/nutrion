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

    return {
        init : execute,
        inputs : js_input
    }
}());