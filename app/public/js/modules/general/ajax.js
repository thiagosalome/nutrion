var app = app || {};
app.ajax = (function(){

    function GET(url, callback){
        jQuery.ajax({
            url : url,
            type: "GET",
            success : function(response){
                callback(response);
            }
        });
    };

    function POST(e, callback){
        e.preventDefault();
        jQuery.ajax({
            url : e.currentTarget.action,
            data : jQuery(e.currentTarget).serialize(),
            type: "POST",
            beforeSend : function(){
                app.message.load.fadeIn("slow");
            },
            success : function(response){
                app.message.load.fadeOut('slow', function(){
                    callback(response);
                });
            }
        });
    };

    function DELETE(e, callback){
        e.preventDefault();
        jQuery.ajax({
            url : e.currentTarget.action,
            data : jQuery(e.currentTarget).serialize(),
            type: "DELETE",
            beforeSend : function(){
                app.message.load.fadeIn("slow");
            },
            success : function(response){
                app.message.load.fadeOut('slow', function(){
                    callback(response);
                });
            }
        });
    };

    function PUT(e, callback){
        e.preventDefault();
        jQuery.ajax({
            url : e.currentTarget.action,
            data : jQuery(e.currentTarget).serialize(),
            type: "PUT",
            beforeSend : function(){
                app.message.load.fadeIn("slow");
            },
            success : function(response){
                app.message.load.fadeOut('slow', function(){
                    callback(response);
                });
            }
        });
    };

    return{
        get : GET,
        post : POST,
        delete : DELETE,
        put : PUT
    }
}());