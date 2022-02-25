<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-180x180.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-72x72.png">

    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">

    <title> Welcome to the Admin dashboard </title>
    <style>
        html, body {
            background-color: #202B33;
            color: #738491;
            font-family: "Open Sans";
            font-size: 16px;
            font-smoothing: antialiased;
            overflow: hidden;
        }
    </style>
</head>
<body>

    <div
        id="app"
    >
        <admindash
            :user-name='@json(auth()->user()->name)'
            :user-id='@json(auth()->user()->id)'
        >
        </admindash>
    </div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
