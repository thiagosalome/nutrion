function inputs(){
    var js_input = jQuery(".js-input-field");

    this.js_input.on("change", function(){
        if(jQuery(this).val()){
            jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
        }
    });

    this.js_input.on("focus", function(){
        jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
    });

    this.js_input.on("blur", function(){
        if(!jQuery(this).val()){
            jQuery(this).removeClass("focus").closest(".form-field").removeClass("focus");
        }
    });
    
    this.js_input.each(function(){
        if(jQuery(this).val()){
            jQuery(this).addClass("focus").closest(".form-field").addClass("focus");
        }
    });
};