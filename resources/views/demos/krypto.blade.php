<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Krypto</title>
    <meta name="description" content="Matvey Bochko">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-180x180.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-72x72.png">

    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
</head>
  <body>
      @php
        $manifest = json_decode(file_get_contents(public_path('demo/krypto/manifest.json')), true);
      @endphp
      <script type="module" src="/demo/krypto/{{ $manifest['src/main.jsx']['file'] }}"></script>
      <link rel="stylesheet" href="/demo/krypto/{{ $manifest['src/main.jsx']['css'][0] }}">
      <div id="root"></div>
    
  </body>
</html>