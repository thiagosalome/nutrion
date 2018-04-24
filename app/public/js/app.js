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