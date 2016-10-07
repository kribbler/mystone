@extends('templates.master')

@section('breadcrumbs')
    @include('templates/breadcrumbs', array('title' => 'Contact Us'))
@stop

@section('main-content')

<div class="container content">
    <div class="row margin-bottom-30">
        <div class="col-md-9 mb-margin-bottom-30">
            <div ng-controller="ContactForm as vm">
                <div class="headline"><h2>Contact Form</h2></div>
                <p>Please submit any queries you may have about our service by using the form provided below. If your message requires a reply then please make sure you fill in the e-mail section correctly, we will get back to you as a soon as possible.</p><br>

                <div ng-if="vm.contact_form_error" class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    <span class="sr-only">Error:</span>
                    <% vm.contact_form_error %>
                </div>
                <div ng-if="vm.contact_form_success" class="alert alert-success" role="alert">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    <span class="sr-only">Success:</span>
                    <% vm.contact_form_success %>
                </div>

                <form method="post" id="sky-form3" class="sky-form contact-style" novalidate="novalidate" ng-submit="vm.submitContactForm(vm.contact_form)">
                    {{ csrf_field() }}
                    <fieldset class="no-padding">
                        <div class="col-md-7 col-md-offset-0">
                            <div class="row sky-space-20">
                                <div class="form-group" ng-class="{'state-error': vm.form_errors.name}">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input class="form-control ng-pristine ng-untouched ng-valid" type="text" ng-model="vm.contact_form.name">
                                </div>
                                <em class="invalid" ng-show="vm.form_errors.name"><% vm.form_errors.name[0] %></em>
                            </div>

                            <div class="row sky-space-20">
                                <div class="form-group" ng-class="{'state-error': vm.form_errors.email}">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control ng-pristine ng-untouched ng-valid" type="text" ng-model="vm.contact_form.email">
                                </div>
                                <em class="invalid" ng-show="vm.form_errors.email"><% vm.form_errors.email[0] %></em>
                            </div>
                        </div>

                        <div class="col-md-11 col-md-offset-0">
                            <div class="row sky-space-20">
                                <div class="form-group" ng-class="{'state-error': vm.form_errors.message}">
                                    <label>Message <span class="text-danger">*</span></label>
                                    <textarea rows="8" class="form-control ng-pristine ng-untouched ng-valid" type="text" ng-model="vm.contact_form.message">
                                    </textarea>
                                </div>
                                <em class="invalid" ng-show="vm.form_errors.message"><% vm.form_errors.message[0] %></em>
                            </div>

                            <p><button type="submit" class="btn-u">Send Message</button></p>
                        </div>
                    </fieldset>

                </form>
            </div>
        </div><!--/col-md-9-->

        <div class="col-md-3">
            <!-- Contact -->
            <div class="headline"><h2>Contact</h2></div>
            <ul class="list-unstyled who margin-bottom-30">
                <li><i class="fa fa-home"></i>{{ Multisite::getContactDetails()->contact_address_1 }}, {{ Multisite::getContactDetails()->contact_address_2 }}, {{ Multisite::getContactDetails()->contact_address_postcode }}</li>
                <li><a href="mailto:{{ Multisite::getContactDetails()->contact_email }}" class=""><i class="fa fa-envelope"></i>{{ Multisite::getContactDetails()->contact_email }}</a></li>
                <li><i class="fa fa-phone"></i>{{ Multisite::getContactDetails()->contact_telephone }}</li>
            </ul>

            <!-- Business Hours -->
            <div class="headline"><h2>Business Hours</h2></div>
            <ul class="list-unstyled margin-bottom-30">
                <li><strong>Monday-Friday:</strong> 9am to 5pm</li>
                <li><strong>Weekends:</strong> Closed</li>
            </ul>

        </div><!--/col-md-3-->
    </div><!--/row-->

</div>

@stop