<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail | Timeline</title>
    <link rel="shortcut icon" href="https://lh3.google.com/u/2/d/1QSOrEITHjSK8BU-H1EcEn2iQ1Cl2yWOh=w1919-h983-iv1" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
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
        }

        .hide-scrollbar::-webkit-scrollbar-track:hover {
            background-color: #666666;
        }

        .hide-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #555555 #333333;
        }

        .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
            background-color: #fff;
        }

        .date-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            /* Show ellipsis (...) if text overflows */
            max-width: 100%;
            /* Optional: Restrict the width of the element */
        }
    </style>
</head>

<body class="bg-primary font-quicksand text-white min-h-screen hide-scrollbar">
    @php
    use Carbon\Carbon;
    Carbon::setLocale('id'); // 'id' is the locale code for Indonesian
    @endphp

    <div class="pt-6">
        <div class="pt-6">
            <h1 class="text-center text-3xl font-bold pt">Detail Timeline</h1>
            <p class="text-center pt-3">Order ID {{ $order -> id }}</p>
            <p class="text-center pt-1">{{ $lead -> business_name }}</p>
        </div>

        <div class="flex justify-center">
            <div class="mb-7 mr-10">
                <a href="{{ url('/client/order/detail/'. $order -> id) }}" class="flex items-center justify-start mb-2">
                    <i class="ri-arrow-left-s-line md:hidden block text-3xl"></i>
                    <p class="text-left hidden md:block ml-2"> &lt; Kembali </p>
                </a>
            </div>


            <div class="flex items-center -ml-4">
                <div class="">
                    <ul class="steps steps-vertical w-full ">
                        <li @if($order -> order_status > 1)
                            data-content="✓"
                            class="step step-primary"
                            @elseif($order -> order_status == 1)
                            class="step step-primary "
                            @else
                            class="step "
                            @endif >
                            <div class=" relative w-full ">
                                <h1 class=" text-left pb-2 text-lg w-full ">Recruitment</h1>
                                <p class=" absolute text-xs  text-left date-text">Start Date :
                                    @php
                                    if ($order->start_recruitment) {
                                    echo Carbon::parse($order->start_recruitment)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                                <p class="absolute top-12 text-xs py-4 text-left date-text ">End Date :
                                    @php
                                    if ($order->end_recruitment) {
                                    echo Carbon::parse($order->end_recruitment)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                            </div>
                        </li>
                        <li @if($order -> order_status > 2)
                            data-content="✓"
                            class="step step-primary"
                            @elseif($order -> order_status == 2)
                            class="step step-primary"
                            @else
                            class="step"
                            @endif >
                            <div class=" relative w-full">
                                <h1 class=" text-left text-lg pb-2">Training</h1>
                                <p class=" absolute text-xs  text-left date-text">Start Date :
                                    @php
                                    if ($order->start_training) {
                                    echo Carbon::parse($order->start_training)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                                <p class="absolute top-12 text-xs py-4 text-left date-text">End Date :
                                    @php
                                    if ($order->end_training) {
                                    echo Carbon::parse($order->end_training)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                            </div>
                        </li>
                        <li @if($order -> order_status > 3)
                            data-content="✓"
                            class="step step-primary"
                            @elseif($order -> order_status == 3)
                            class="step step-primary"
                            @else
                            class="step"
                            @endif >
                            <div class=" relative w-full">
                                <h1 class=" text-left text-lg pb-2">Penawaran</h1>
                                <p class=" absolute text-xs  text-left date-text">Start Date :
                                    @php
                                    if ($order->start_offer) {
                                    echo Carbon::parse($order->start_offer)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                                <p class="absolute top-12 text-xs py-4 text-left date-text">End Date :
                                    @php
                                    if ($order->end_offer) {
                                    echo Carbon::parse($order->end_offer)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                            </div>
                        </li>
                        <li @if($order -> order_status > 4)
                            data-content="✓"
                            class="step step-primary"
                            @elseif($order -> order_status == 4)
                            class="step step-primary"
                            @else
                            class="step"
                            @endif >
                            <div class=" relative w-full">
                                <h1 class=" text-left text-lg pb-2">Appoinment Negosiasi</h1>
                                <p class=" absolute text-xs  text-left date-text">Start Date :
                                    @php
                                    if ($order->start_appointment) {
                                    echo Carbon::parse($order->start_appointment)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                                <p class="absolute top-12 text-xs py-4 text-left date-text">End Date :
                                    @php
                                    if ($order->end_appointment) {
                                    echo Carbon::parse($order->end_appointment)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                            </div>
                        </li>
                        <li @if($order -> order_status > 5)
                            data-content="✓"
                            class="step step-primary"
                            @elseif($order -> order_status == 5)
                            class="step step-primary"
                            @else
                            class="step"
                            @endif >
                            <div class=" relative w-full">
                                <h1 class=" text-left text-lg pb-2">User Interview</h1>
                                <p class=" absolute text-xs  text-left date-text">Start Date :
                                    @php
                                    if ($order->start_probation) {
                                    echo Carbon::parse($order->start_probation)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                                <p class="absolute top-12 text-xs py-4 text-left date-text">End Date :
                                    @php
                                    if ($order->end_probation) {
                                    echo Carbon::parse($order->end_probation)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                            </div>
                        </li>
                        <li @if($order -> order_status > 6)
                            data-content="✓"
                            class="step step-primary"
                            @elseif($order -> order_status == 6)
                            class="step step-primary"
                            @else
                            class="step"
                            @endif >
                            <div class=" relative w-full">
                                <h1 class=" text-left text-lg pb-2">PO & PKS</h1>
                                <p class=" absolute text-xs  text-left date-text">Start Date :
                                    @php
                                    if ($order->start_popks) {
                                    echo Carbon::parse($order->start_popks)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                                <p class="absolute top-12 text-xs py-4 text-left date-text">End Date :
                                    @php
                                    if ($order->end_popks) {
                                    echo Carbon::parse($order->end_popks)->translatedFormat('j F Y ');
                                    } else {
                                    echo '-';
                                    }
                                    @endphp
                                </p>
                            </div>
                        </li>
                        <li @if($order -> order_status > 7)
                            data-content="✓"
                            class="step step-primary"
                            @elseif($order -> order_status == 7)
                            class="step step-primary"
                            @else
                            class="step"
                            @endif >
                            Onboarding</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>