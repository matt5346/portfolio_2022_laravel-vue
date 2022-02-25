<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Progerboy') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-180x180.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-72x72.png">

        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="body-login">
        <div class="form-wrapper">
            <div class="notice-box">
                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 1.125C7.44248 1.125 5.91993 1.58686 4.62489 2.45218C3.32985 3.31749 2.32049 4.5474 1.72445 5.98637C1.12841 7.42534 0.972461 9.00874 1.27632 10.5363C1.58018 12.0639 2.3302 13.4671 3.43154 14.5685C4.53288 15.6698 5.93607 16.4198 7.46367 16.7237C8.99127 17.0275 10.5747 16.8716 12.0136 16.2756C13.4526 15.6795 14.6825 14.6702 15.5478 13.3751C16.4131 12.0801 16.875 10.5575 16.875 9C16.875 6.91142 16.0453 4.90838 14.5685 3.43153C13.0916 1.95469 11.0886 1.125 9 1.125ZM9 15.75C7.66498 15.75 6.35994 15.3541 5.24991 14.6124C4.13987 13.8707 3.27471 12.8165 2.76382 11.5831C2.25293 10.3497 2.11925 8.99251 2.3797 7.68314C2.64015 6.37377 3.28303 5.17103 4.22703 4.22703C5.17104 3.28302 6.37377 2.64015 7.68315 2.3797C8.99252 2.11925 10.3497 2.25292 11.5831 2.76381C12.8165 3.2747 13.8707 4.13987 14.6124 5.2499C15.3541 6.35993 15.75 7.66498 15.75 9C15.75 10.7902 15.0388 12.5071 13.773 13.773C12.5071 15.0388 10.7902 15.75 9 15.75Z"/>
                    <path d="M7.3125 9H8.4375V13.5H9.5625V7.875H7.3125V9Z"/>
                    <path d="M9 6.75C9.62132 6.75 10.125 6.24632 10.125 5.625C10.125 5.00368 9.62132 4.5 9 4.5C8.37868 4.5 7.875 5.00368 7.875 5.625C7.875 6.24632 8.37868 6.75 9 6.75Z"/>
                </svg>
                <p class="notice-box__text">Login for testing purposes </br> <b>mail:</b> test@gmail.com <br/> <b>password:</b> test123</p>
            </div>
            {{ $slot }}
        </div>
    </body>
</html>
