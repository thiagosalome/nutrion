require('messages'); // require messages file
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
    DashboardMenu.verifyDropDown();

    DashboardWindow.verifyWindow();

    DashboardForm.onSubmit('.js-form-addPatient', home_uri + 'nutricionista/paciente/create');

    DashboardHeader.toggleOptions();