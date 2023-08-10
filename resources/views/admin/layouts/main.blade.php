<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')

    <title>Document</title>
</head>
<body class="flex items-center justify-center gap-0 md:gap-5 bg-layoutBg font-quicksand text-white h-screen overflow-hidden">
        @include('admin.partials.sidebar')
        <div class=" pl-0 md:pl-[18%]"></div>
        <div class="container mr-0 md:mr-8 pt-0 md:pt-14 mb-0 md:mb-12 w-full overflow-auto">
            @yield('container')
        </div>
</body>
</html> 