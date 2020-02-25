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
            console.log(nextStep);
        }else{
            localStorage.setItem('currentStep', nextStep + 1);
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
            var sendToPaymentGateway = new CustomEvent('send-to-payment-gateway', {detail: data});
            this.dispatchEvent(sendToPaymentGateway);
        }).fail((error) => {
            console.log(error);
        });
    });
    /* Catch the event sending payment information to the wunder mobility remote service*/
    finalButton.addEventListener('send-to-payment-gateway', function(event){
        $.ajax({
            //bypass the request to create e proxy and avoid cors issues. Needs https requests with trusted origins.
            url: 'https://cors-anywhere.herokuapp.com/https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data',
            data: JSON.stringify({'customerId':event.detail.customer_id, 'iban':event.detail.iban,'owner':event.detail.owner}),
            type: 'POST',
            crossDomain: true,
            dataType: 'json'
        }).done((data) => {
            console.log(data.paymentDataId);
            var updatePaymentId = new CustomEvent('update-payment-id', {detail: {account_id:event.detail.id, payment_id: data.paymentDataId}});
            this.dispatchEvent(updatePaymentId);
            $('#test-form-4 h1').removeClass('text-danger').addClass('text-success').html("Success!")
            $('#test-form-4 div').removeClass('alert alert-danger').addClass('alert alert-success').html('PAYMENT_ID:{'+ data.paymentDataId +'}!');
        }).fail((error) => {
            $('#test-form-4 h1').removeClass('text-success').addClass('text-danger').html("ERROR!")
            $('#test-form-4 div').removeClass('alert alert-success').addClass('alert alert-danger').html(error.responseJSON.error);
        });
    });
    /* Update payment locally. */
    finalButton.addEventListener('update-payment-id', function(event){
        $.ajax({
            url: '/api/account/'+event.detail.account_id+'/updatePayment',
            data: {'paymentId': event.detail.payment_id},
            type: 'POST',
            dataType: 'json'
        }).done((data) => {
            console.log(data);
            window.localStorage.clear();
        }).fail((error) => {
            console.log(error);
        });
    });
});
