var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.scripts([
        //Dependencies
        '../../../bower_components/angular/angular.js',
        "../../../bower_components/angular-bootstrap/ui-bootstrap-tpls.js",
        '../../../bower_components/angular-resource/angular-resource.js',
        "../../../bower_components/angular-ui-grid/ui-grid.js",
        "../../../bower_components/ng-file-upload/ng-file-upload.js",
        "../../../bower_components/moment/moment.js",
        "../../../bower_components/angular-xeditable/dist/js/xeditable.js",
        "../../../bower_components/angular-toastr/dist/angular-toastr.tpls.js",
        "../../../bower_components/angular-aria/angular-aria.js",
        "../../../bower_components/angular-animate/angular-animate.js",
        //"../../../bower_components/angular-loading-bar/build/loading-bar.js",
        "../../../bower_components/angular-material/angular-material.js",
        "../../../bower_components/angular-animate/angular-animate.js",
        //Template files:
        //
        //Angular files:
        "../../../resources/assets/js/app.js",
        "../../../resources/assets/js/filters.js",
        "../../../resources/assets/js/directives.js",
        "../../../resources/assets/js/services/time.js",
        "../../../resources/assets/js/controllers/Home.js",
        "../../../resources/assets/js/controllers/Dashboard.js",
        "../../../resources/assets/js/controllers/Application.js",
        "../../../resources/assets/js/controllers/Admin.js",
    ]);
    mix.styles([
        "../../../resources/assets/css/app.css",
        "../../../bower_components/angular-ui-grid/ui-grid.css",
        "../../../bower_components/bootstrap/dist/css/bootstrap.css",
        "../../../bower_components/angular-xeditable/dist/css/xeditable.css",
        "../../../bower_components/angular-toastr/dist/angular-toastr.css",
        "../../../public/font-awesome/css/font-awesome.css",
        "../../../resources/assets/theme/css/style.css",
        "../../../resources/assets/theme/css/app.css",
        "../../../resources/assets/theme/css/headers/header-default.css",
        "../../../resources/assets/theme/css/footers/footer-v1.css",
        "../../../resources/assets/theme/css/login.css",
        "../../../resources/assets/theme/css/blocks.css",
        "../../../resources/assets/theme/css/pages/profile.css",
        "../../../resources/assets/plugins/line-icons/line-icons.css",
        "../../../resources/assets/plugins/parallax-slider/css/parallax-slider.css",
        "../../../resources/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css",
        "../../../resources/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css",
    ]);
    mix.version(['public/js/all.js', 'public/css/all.css', 'public/css/app.css']);
});