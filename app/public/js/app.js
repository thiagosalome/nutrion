require('login'); // require main file
require('dashboard'); // require main file
var home_uri = getHomeUri();

    // Login
    LoginInputs.onChange();
    LoginInputs.onFocus();
    LoginInputs.onBlur();
    LoginInputs.eachInput();

    LoginForm.onSubmit('.js-form-signin', home_uri + 'nutricionista/signIn');
    LoginForm.onSubmit('.js-form-signup', home_uri + 'nutricionista/signUp');

    LoginSlider.onClickSlider(500);

    // Dashboard
    DashboardMenu.onClick();
    DashboardMenu.dropDown();
    DashboardMenu.verifyItemActive();

    DashboardWindow.verifyWindow();

    DashboardForm.onSubmit('.js-form-deleteNutritionist', home_uri + 'nutricionista/delete');
    DashboardForm.onSubmit('.js-form-updateNutritionist', home_uri + 'nutricionista/update');
    
    DashboardForm.onSubmit('.js-form-addPatient', home_uri + 'nutricionista/paciente/create');
    DashboardForm.onSubmit('.js-form-deletePatient', home_uri + 'nutricionista/paciente/delete');
    DashboardForm.onSubmit('.js-form-updatePatient', home_uri + 'nutricionista/paciente/update');

    DashboardHeader.toggleOptions();

    DashboardTab.changeTab();


    jQuery(".js-report-generate").on("submit", function(e){
        e.preventDefault();
        jQuery(".js-load-report").fadeIn(300, function(){
            setTimeout(function(){jQuery(".js-load-report").fadeOut(300, function(){jQuery(".js-table-patient").css("display", "block");})}, 2000);
        });
    });


/*
// Definindo o objeto global da aplicação
var app = app || {};
app.loadModules = (function(jQuery){
    "use strict";

    function load(){
        if(jQuery(".js-input-field").length > 0){
            require("inputs");
            app.inputs.init();
        }
        if(jQuery(".js-btn-slider").length > 0){
            require("slider");
            app.slider.execute();
        }
    }

    function require(module){
        var home_uri = getHomeUri();
        var src = home_uri + "app/public/js/" + module;
        jQuery("main").after("<script type='text/javascript' src='" + src + ".js'></script>");
    }

    function getHomeUri(){
        var src = jQuery("script[src*='app.js']").attr("src"); //Pega o src do script que contem a expressão app.js
        var uri = src.indexOf("azurewebsites") != -1 ? src.substring(0, 34) : uri = src.substring(0, 9);
        return uri;
    }

    return {
        init : load
    }
}(jQuery));

app.loadModules.init();*/
