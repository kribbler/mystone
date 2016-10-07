<!DOCTYPE html>
<html>
    <head>
        <title>{{ Multisite::getWebsiteTitle() }}</title>
        <link rel="stylesheet" href="{{ elixir('css/all.css') }}" />
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
        <script src="{{ elixir('js/all.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @if (Multisite::getGoogleAnalytics())
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

              ga('create', '{{ Multisite::getGoogleAnalytics() }}', 'auto');
              ga('send', 'pageview');
            </script>
        @endif
    </head>

    @include('templates/header')

    @yield('breadcrumbs')

    <body ng-app="mainWebsite">
        @yield('main-banner')
        <div class="container content">
            <div class="row">
                @yield('main-content')
            </div>
        </div>
    </body>

    @include('templates/footer')
</html>