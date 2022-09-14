<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <title>{{ __('panel.site_title') }}</title>
</head>

<body class="h-auto text-blueGray-700 bg-blueGray-800 antialiased pt-3 pb-3 pb-4 h-full">

    <main>
        @yield('content')
    </main>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5f3ec60e1e7ade5df44299c0/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>
