<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <title>{{ __('panel.site_title') }}</title>
</head>

<body class="h-auto text-blueGray-700 bg-blueGray-800 antialiased pt-3 pb-3 pb-4">

    <main>
        @yield('content')
    </main>

</body>

</html>
