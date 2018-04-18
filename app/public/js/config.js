function require(namefile){
    var home_uri = getHomeUri();
    var src = home_uri + "app/public/js/" + namefile;
    jQuery("main").after("<script type='text/javascript' src='" + src + ".js'></script>");
}

function getHomeUri(){
    var src = jQuery("script[src*='app.js']").attr("src"); //Pega o src do script que contem a expressão app.js
    var uri;

    // Se no src tiver azurewebsites
    if(src.indexOf("azurewebsites") != -1){
        uri = src.substring(0, 34);
    }
    else{
        uri = src.substring(0, 9);
    }
    return uri;
}