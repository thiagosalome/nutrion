config.require('messages'); // require messages file
config.require('main'); // require main file
config.require('dashboard'); // require main file

    // Inputs
    mainInputs.onChange();
    mainInputs.onFocus();
    mainInputs.onBlur();
    mainInputs.eachInput();

    // Form
    var home_uri = config.getHomeUri();
    mainForm.onSubmit('.js-form-signin', home_uri + 'nutricionista/signIn');
    mainForm.onSubmit('.js-form-signup', home_uri + 'nutricionista/signUp');

    // Slider
    mainSlider.onClickSlider(500);

    //Menu
    menu.onClick();