var config = {
    'require' : function(namefile){
        var src = "/nutrion/app/public/js/" + namefile;
        jQuery("main").after("<script type='text/javascript' src='" + src + ".js'></script>");
    }
}