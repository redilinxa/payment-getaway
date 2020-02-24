document.addEventListener('DOMContentLoaded', function () {
    var stepperFormEl = document.querySelector('#stepperForm');

    /*Set window based variable to access this from templates.*/
    window.stepperForm = new Stepper(stepperFormEl, {
        animation: true,
    });

    /*Check if there is a previous state.*/
    if (localStorage.getItem('currentStep') !== null){
        window.stepperForm.to(localStorage.getItem('currentStep'));
    }

    /*Check if there are already input values set for the registration transaction.*/
    var inputValues = stepperFormEl.querySelectorAll( '#stepperForm input');
    inputValues.forEach(function(inputItem) {
        if (localStorage.getItem(inputItem.getAttribute('id')) !== null){
            inputItem.value = localStorage.getItem(inputItem.getAttribute('id'));
        }
    });

    /*Process steps.*/
    var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'));
    var stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'));
    var form = stepperFormEl.querySelector('.bs-stepper-content form');

    btnNextList.forEach(function (btn) {
        console.log(btn);
        btn.addEventListener('click', function () {
            window.stepperForm.next();
        });
    });

    /* Listen to library's stepper event and validate the step blocks accordingly.*/
    stepperFormEl.addEventListener('show.bs-stepper', function (event) {
        form.classList.remove('was-validated');
        var nextStep = event.detail.indexStep;
        var currentStep = nextStep;

        if (currentStep > 0) {
            currentStep--;
        }

        var stepperPan = stepperPanList[currentStep];
        localStorage.setItem('currentStep', nextStep + 1);
        /*
        * Validate only the inputs on each step.
        * */
        var inputValidations = stepperFormEl.querySelectorAll('#' + stepperPan.getAttribute('id') + ' input');
        var formValid = 1;
        inputValidations.forEach(function(userItem) {
            localStorage.setItem(userItem.getAttribute('id'), userItem.value);
            if (!userItem.value.length && userItem.required){
                formValid = 0;
                userItem.nextSibling.display = 'block';
            }
        });
        if (!formValid){
            event.preventDefault();
            form.classList.add('was-validated');
        }
    });


    /* Process the input in the BE and reset the form.*/
    var stepsForm = stepperFormEl.querySelector('#stepsForm');
    var finalButton = stepperFormEl.querySelector('#submitFinal');
    finalButton.addEventListener('click', function(){
        var formData = new FormData(stepsForm);
        $.ajax({
            url: "/api/customers",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false
        }).done((data) => {
            //implement messaging
            console.log(data);
        }).fail((error) => {
            console.log(error);
        });
    });
});
