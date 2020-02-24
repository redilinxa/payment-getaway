@extends('layouts.app')

@section('content')
    <div class="container flex-grow-1 flex-shrink-0 py-5">
        <div class="mb-5 p-4 bg-white shadow-sm">
            <h3>Form validation</h3>
            <div id="stepperForm" class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <div class="step" data-target="#test-form-1">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Personal Information</span>
                        </button>
                    </div>
                    <div class="bs-stepper-line"></div>
                    <div class="step" data-target="#test-form-2">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Address</span>
                        </button>
                    </div>
                    <div class="bs-stepper-line"></div>
                    <div class="step" data-target="#test-form-3">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Payment Information</span>
                        </button>
                    </div>
                    <div class="bs-stepper-line"></div>
                    <div class="step" data-target="#test-form-4">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger4" aria-controls="test-form-4">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label">Status</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form id="stepsForm" class="needs-validation" onSubmit="return false" novalidate>
                        <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                            <div class="form-group">
                                <label for="inputFirstNameForm">First Name <span class="text-danger font-weight-bold">*</span></label>
                                <input name="firstName" id="inputFirstNameForm" type="text" class="form-control" placeholder="First Name" required>
                                <div class="invalid-feedback">Please fill First Name</div>
                            </div>
                            <div class="form-group">
                                <label for="inputLastNameForm">Last Name <span class="text-danger font-weight-bold">*</span></label>
                                <input name="lastName" id="inputLastNameForm" type="text" class="form-control" placeholder="Last Name" required>
                                <div class="invalid-feedback">Please fill Last Name</div>
                            </div>
                            <div class="form-group">
                                <label for="inputTelephoneForm">Telephone<span class="text-danger font-weight-bold">*</span></label>
                                <input name="telephone" id="inputTelephoneForm" type="text" class="form-control" placeholder="Telephone" required>
                                <div class="invalid-feedback">Please fill Telephone</div>
                            </div>
                            <button class="btn btn-primary btn-next-form" >Next</button>
                        </div>
                        <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                            <div class="form-group">
                                <label for="inputStreetForm">Street <span class="text-danger font-weight-bold">*</span></label>
                                <input name="street" id="inputStreetForm" type="text" class="form-control" placeholder="Street" required>
                                <div class="invalid-feedback">Please fill Street</div>
                            </div>
                            <div class="form-group">
                                <label for="inputHouseNoForm">House Number <span class="text-danger font-weight-bold">*</span></label>
                                <input name="house_no" id="inputHouseNoForm" type="text" class="form-control" placeholder="House Number" required>
                                <div class="invalid-feedback">Please fill House Number</div>
                            </div>
                            <div class="form-group">
                                <label for="inputZipCodeForm">Zip Code <span class="text-danger font-weight-bold">*</span></label>
                                <input name="zip_code" id="inputZipCodeForm" type="text" class="form-control" placeholder="Zip Code" required>
                                <div class="invalid-feedback">Please fill Zip Code </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCityForm">City <span class="text-danger font-weight-bold">*</span></label>
                                <input name="city" id="inputCityForm" type="text" class="form-control" placeholder="City" required>
                                <div class="invalid-feedback">Please fill City</div>
                            </div>
                            <button class="btn btn-primary" onclick="stepperForm.previous()">Previous</button>
                            <button class="btn btn-primary btn-next-form">Next</button>
                        </div>
                        <div id="test-form-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger3">
                            <div class="form-group">
                                <label for="inputAccountOwnerForm">Account Owner <span class="text-danger font-weight-bold">*</span></label>
                                <input name="owner" id="inputAccountOwnerForm" type="text" class="form-control" placeholder="Account Owner" required>
                                <div class="invalid-feedback">Please fill Account Owner</div>
                            </div>
                            <div class="form-group">
                                <label for="inputIBANForm">IBAN</label>
                                <input name="iban" id="inputIBANForm" type="text" class="form-control" placeholder="IBAN">
                                <div class="invalid-feedback">Please fill IBAN</div>
                            </div>
                            <button class="btn btn-primary" onclick="stepperForm.previous()">Previous</button>
                            <button id = "submitFinal" class="btn btn-primary btn-next-form">Next</button>
                        </div>
                        <div id="test-form-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger4">
                            <div id="displayResult"><p></p></div>
                            <button class="btn btn-primary mt-5" onclick="stepperForm.previous()">Previous</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
