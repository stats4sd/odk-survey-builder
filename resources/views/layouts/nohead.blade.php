<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Farmer Research Netorks - Data Collection Tools">

    <!-- Favicon -->
    <link href="img/noun_survey.png" rel="shortcut icon"/>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>

    @yield('content')

    <!-- Footer section -->
    <footer class="footer-section w-100">
        <div class="attributions">
            "Survey" favicon by Iconika from the <a href="https://thenounproject.com/search/?q=survey&i=1022157">Noun Project</a>
        </div>
    </footer>
    <!-- Footer top section end -->


    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
