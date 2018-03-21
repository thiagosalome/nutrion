var js_input = jQuery(".js-input-field");
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