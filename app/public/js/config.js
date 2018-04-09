var config = {
    'require' : function(namefile){
        var src = "https://nutrion.azurewebsites.net/app/public/js/" + namefile;
        jQuery("main").after("<script type='text/javascript' src='" + src + ".js'></script>");
    }
}