function message(){
    var js_message = jQuery(".js-message");

    this.show = function(msg){
        js_message.text(msg).fadeIn(300, function(){
            setTimeout(function(){LoginForm.js_message.fadeOut(300)}, 2000);
        });
    }
}