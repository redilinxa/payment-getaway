document.addEventListener('DOMContentLoaded', function () {
    var stepperFormEl = document.querySelector('#stepperForm')
    window.stepperForm = new Stepper(stepperFormEl, {
        animation: true,
    });

    if (localStorage.getItem('currentStep') !== null){
        window.stepperForm.to(localStorage.getItem('currentStep'));
    }

    var inputValues = stepperFormEl.querySelectorAll( '#stepperForm input');

    inputValues.forEach(function(inputItem) {
        if (localStorage.getItem(inputItem.getAttribute('id')) !== null){
            inputItem.value = localStorage.getItem(inputItem.getAttribute('id'));
        }
    });

    var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'));
    var stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'));
    var form = stepperFormEl.querySelector('.bs-stepper-content form');

    btnNextList.forEach(function (btn) {
        console.log(btn);
        btn.addEventListener('click', function () {
            window.stepperForm.next();
            //window.dispatchEvent('next.step.validate')
        });
    });

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
});
