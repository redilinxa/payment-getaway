@extends('layouts.app')

@section('Registration', 'Step 1')

@section('content')
    <div class="mb-5 p-4 bg-white shadow-sm">
        <h3>Non linear stepper</h3>
        <div id="stepper2" class="bs-stepper">
            <div class="bs-stepper-header" role="tablist">
                <div class="step active" data-target="#test-nl-1">
                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger1" aria-controls="test-nl-1" aria-selected="true">
                <span class="bs-stepper-circle">
                  <span class="fas fa-user" aria-hidden="true"></span>
                </span>
                        <span class="bs-stepper-label">Name</span>
                    </button>
                </div>
                <div class="bs-stepper-line"></div>
                <div class="step" data-target="#test-nl-2">
                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger2" aria-controls="test-nl-2" aria-selected="false">
                <span class="bs-stepper-circle">
                  <span class="fas fa-map-marked" aria-hidden="true"></span>
                </span>
                        <span class="bs-stepper-label">Address</span>
                    </button>
                </div>
                <div class="bs-stepper-line"></div>
                <div class="step" data-target="#test-nl-3">
                    <button type="button" class="step-trigger" role="tab" id="stepper2trigger3" aria-controls="test-nl-3" aria-selected="false">
                <span class="bs-stepper-circle">
                  <span class="fas fa-save" aria-hidden="true"></span>
                </span>
                        <span class="bs-stepper-label">Submit</span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <form onsubmit="return false">
                    <div id="test-nl-1" role="tabpanel" class="bs-stepper-pane active dstepper-block" aria-labelledby="stepper2trigger1">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="email" class="form-control" id="exampleInputName1" placeholder="Enter your name">
                        </div>
                        <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                    </div>
                    <div id="test-nl-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger2">
                        <div class="form-group">
                            <label for="exampleInpuAddress1">Address</label>
                            <input type="email" class="form-control" id="exampleInpuAddress1" placeholder="Enter your address">
                        </div>
                        <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                    </div>
                    <div id="test-nl-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper2trigger3">
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
    <script type="application/javascript">
        var stepper2;
        document.addEventListener('DOMContentLoaded', function () {
            stepper2 = new Stepper(document.querySelector('#stepper2'), {
                linear: false
            });
            var stepperForm;

            /*var stepperFormEl = document.querySelector('#stepperForm')
            stepperForm = new Stepper(stepperFormEl, {
                animation: true
            })

            var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'))
            var stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'))
            var inputMailForm = document.getElementById('inputMailForm')
            var inputPasswordForm = document.getElementById('inputPasswordForm')
            var form = stepperFormEl.querySelector('.bs-stepper-content form')

            btnNextList.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    stepperForm.next()
                })
            })

            stepperFormEl.addEventListener('show.bs-stepper', function (event) {
                form.classList.remove('was-validated')
                var nextStep = event.detail.indexStep
                var currentStep = nextStep

                if (currentStep > 0) {
                    currentStep--
                }

                var stepperPan = stepperPanList[currentStep]

                if ((stepperPan.getAttribute('id') === 'test-form-1' && !inputMailForm.value.length)
                    || (stepperPan.getAttribute('id') === 'test-form-2' && !inputPasswordForm.value.length)) {
                    event.preventDefault()
                    form.classList.add('was-validated')
                }
            })*/
        });
    </script>

