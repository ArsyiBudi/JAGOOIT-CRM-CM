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
<body>
    <div class="flex items-center gap-5 bg-layoutBg font-quicksand text-white">
        
        @include('admin.partials.sidebar')
        <div class="container mr-8 pt-14 pl-[18%] mb-12">
            @yield('container')
        </div>
    </div>
</body>
</html>