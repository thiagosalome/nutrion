require('messages'); // require messages file
require('login'); // require main file
require('dashboard'); // require main file

    // Inputs
    LoginInputs.onChange();
    LoginInputs.onFocus();
    LoginInputs.onBlur();
    LoginInputs.eachInput();

    // Form
    var home_uri = getHomeUri();
    LoginForm.onSubmit('.js-form-signin', home_uri + 'nutricionista/signIn');
    LoginForm.onSubmit('.js-form-signup', home_uri + 'nutricionista/signUp');

    // Slider
    LoginSlider.onClickSlider(500);

    //Menu
    DashboardMenu.onClick();
    DashboardMenu.dropDown();
    DashboardMenu.verifyDropDown();
    DashboardMenu.verifyWindow();