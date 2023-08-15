<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            width: 0.4em; /* Width of the scrollbar */
        }
        
        .hide-scrollbar::-webkit-scrollbar-thumb {
            background-color: #555555; /* Color of the scrollbar thumb */
            border-radius: 8px; /* Rounded corners for the scrollbar thumb */
        }
        
        .hide-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #777777; /* Color of the scrollbar thumb on hover */
        }
        
        .hide-scrollbar::-webkit-scrollbar-track {
            background-color: #555555; /* Color of the scrollbar track */
        }
        
        .hide-scrollbar::-webkit-scrollbar-track:hover {
            background-color: #666666; /* Color of the scrollbar track on hover */
        }
        
        /* Customize the appearance of the scrollbar wheel */
        .hide-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #555555 #333333;
        }
        
        /* Customize the appearance of the scrollbar thumb icon */
        .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
            background-color: #fff; /* Color of the scrollbar thumb icon */
        }
        
        </style>

    <title>{{ $title }}</title>
</head>
<body class="flex items-center justify-center gap-0 lg:gap-5 bg-layoutBg font-quicksand text-white min-h-screen overflow-hidden">
        @include('admin.partials.sidebar')
        <div class=" pl-0 lg:pl-[18%]"></div>
        <div class="container mr-0 lg:pr-4  pt-0 lg:pt-14 mb-0 lg:mb-12 overflow-y-scroll overflow-x-hidden h-screen hide-scrollbar">
            @yield('container')
        </div>
</body>
</html> 