var app = app || {};
app.dashboard = (function(){
    var mainDashboard = jQuery(".main-dashboard");

    function verify(){
        if(mainDashboard.height() < window.innerHeight){
            mainDashboard.css("height", "100vh");
        }   
        else{
            mainDashboard.css("height", "auto");
        }
    };

    return{
        verify : verify
    }
}());