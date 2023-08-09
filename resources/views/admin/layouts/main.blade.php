<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <title>Document</title>
</head>
<body class="flex gap-5 bg-layoutBg font-quicksand text-white h-screen">
        @include('admin.partials.sidebar')
        <div class="pl-[18%]"></div>
        <div class="container mr-8 pt-14 mb-12">
            @yield('container')
        </div>
</body>
</html>