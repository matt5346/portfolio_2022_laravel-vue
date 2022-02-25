<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webmattiz portfolio website</title>
    <meta name="description" content="Matvey Bochko">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-180x180.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-72x72.png">

    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">

    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app"></div>

    @if (auth()->user())
        <script>
            window.userName = "{{ auth()->user()->name }}"
            window.userId = "{{ auth()->user()->id }}"
        </script>
    @endif
    <script async src="{{ mix('js/app.js') }}"></script>

    <p class="hidden-text" style="visibility: hidden;">Matvey Bochko portfolio</p>
    <p class="hidden-text" style="visibility: hidden;">Матвей Бочко портфолио</p>
</body>
</html>
