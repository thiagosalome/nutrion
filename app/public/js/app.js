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

    DashboardForm.onSubmit('.js-form-addPatient', home_uri + 'nutricionista/paciente/create');
    DashboardForm.onSubmit('.js-form-deleteNutritionist', home_uri + 'nutricionista/delete');
    DashboardForm.onSubmit('.js-form-updateNutritionist', home_uri + 'nutricionista/update');

    DashboardHeader.toggleOptions();