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
            width: 0.4em;
            /* Width of the scrollbar */
        }

        .hide-scrollbar::-webkit-scrollbar-thumb {
            background-color: #555555;
            /* Color of the scrollbar thumb */
            border-radius: 8px;
            /* Rounded corners for the scrollbar thumb */
        }

        .hide-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #777777;
            /* Color of the scrollbar thumb on hover */
        }

        .hide-scrollbar::-webkit-scrollbar-track {
            background-color: #555555;
            /* Color of the scrollbar track */
        }

        .hide-scrollbar::-webkit-scrollbar-track:hover {
            background-color: #666666;
            /* Color of the scrollbar track on hover */
        }

        /* Customize the appearance of the scrollbar wheel */
        .hide-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #555555 #333333;
        }

        /* Customize the appearance of the scrollbar thumb icon */
        .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
            background-color: #fff;
            /* Color of the scrollbar thumb icon */
        }
    </style>

    <title>{{ $title }}</title>
</head>

<body class="flex items-center justify-center gap-0 lg:gap-5 bg-layoutBg font-quicksand text-white min-h-screen overflow-hidden">
    @if(session()->has('error'))
    <div id="error-alert" class="alert alert-error absolute md:top-10 md:right-10 z-50 w-auto animate-slide-up text-white font-medium border-2 border-red-500 cursor-pointer" onclick="closeErrorAlert()">
        <span>{{ session('error') }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    @endif

    @if(session()->has('success'))
    <div id="success-alert" class="alert alert-success absolute lg:top-10 lg:right-10 w-auto z-50 animate-slide-up text-white font-medium border-2 border-green-300 cursor-pointer flex items-center" onclick="closeSuccessAlert()">
        <span>{{ session('success') }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" onclick="closeAlert()">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    @endif

    @include('admin.partials.sidebar')
    <div class=" pl-0 lg:pl-[18%]"></div>
    <div class="container mr-0 lg:pr-4  pt-0 lg:pt-14 mb-0 lg:mb-12 overflow-y-scroll overflow-x-hidden hide-scrollbar">
        @yield('container')
    </div>
</body>

</html>

<script>
    function closeSuccessAlert() {
        var alert = document.getElementById('success-alert');
        alert.style.display = 'none';
    }
    function closeErrorAlert(){
        var alert = document.getElementById('error-alert');
        alert.style.display = 'none';
    }

    setTimeout(function() {
        closeSuccessAlert();
        closeErrorAlert();
    }, 3000);
</script>