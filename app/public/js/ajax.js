function ajax(){

    this.get = function(form){
        jQuery(document).on("submit", form, function(e){
            e.preventDefault();
            jQuery.ajax({
                url : url,
                data : jQuery(this).serialize(),
                type: "GET",
                success : function(result){
                    
                }
            });
        });
    };

    this.post = function(){
        jQuery(document).on("submit", form, function(e){
            e.preventDefault();
            jQuery.ajax({
                url : url,
                data : jQuery(this).serialize(),
                type: "POST",
                beforeSend : function(){
                    LoginForm.js_load.fadeIn('slow');
                },
                success : function(result){
                    
                }
            });
        });
    };

    this.delete = function(){
        jQuery(document).on("submit", form, function(e){
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
        });
    };

    this.put = function(){
        jQuery(document).on("submit", form, function(e){
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
        });
    };
    
}