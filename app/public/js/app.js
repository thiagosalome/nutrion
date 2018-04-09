config.require('messages'); // require messages file
config.require('main'); // require main file

    // Inputs
    mainInputs.onChange();
    mainInputs.onFocus();
    mainInputs.onBlur();
    mainInputs.eachInput();

    // Form
    mainForm.onSubmit('.js-form-signin', '/nutrion/nutricionista/signIn');
    mainForm.onSubmit('.js-form-signup', '/nutrion/nutricionista/signUp');

    // Slider
    mainSlider.onClickSlider(500);