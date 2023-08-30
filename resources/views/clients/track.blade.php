<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Your Order</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
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
    text-overflow: ellipsis; /* Show ellipsis (...) if text overflows */
    max-width: 100%; /* Optional: Restrict the width of the element */
}



</style>

</head>
<body class=" bg-primary font-quicksand text-white min-h-screen hide-scrollbar">
     @include('admin.partials.navbar')
     <div class=" pt-28">
        <h1 class=" text-center text-3xl font-bold">Tracking Your Order</h1>
        @foreach($data as $row)
        <p class=" text-center pt-3">{{ $row -> id }}</p>
        @endforeach
     </div>
     <div class=" block md:flex items-start gap-5 md:gap-40 px-10 mt-10 w-full">
        <div class=" bg-darkSecondary border-white border-2 rounded-lg py-5 pr-20 pl-5 mt-5 w-full md:w-auto">
            <h1 class=" text-xl font-bold">Keterangan</h1>
            <div class=" flex items-center gap-4 my-4">
                <div class="bg-secondary rounded-full px-[5px]">
                    <p class=" text-center">✓</p>
                </div>
                <p class=" font-semibold text-sm md:text-[16px]">Selesai</p>
            </div>
             <div class=" flex items-center gap-4 my-4">
                <div class="bg-secondary rounded-full w-5 h-5"></div>
                <p class=" font-semibold text-sm md:text-[16px]">Dalam Proses</p>
            </div>
             <div class=" flex items-center gap-4 my-4">
                <div class="bg-white rounded-full w-5 h-5"></div>
                <p class=" font-semibold text-sm md:text-[16px] ">Proses Selanjutnya</p>
            </div>
        </div>


        <div class=" w-96 flex items-center justify-center">
            <ul class="steps steps-vertical w-full">
                <li data-content="✓" class="step step-primary">
                    <div class=" relative w-full">
                        <h1 class=" text-left pb-2 text-lg">Recruitment</h1> 
                        <p class=" absolute text-xs  text-left date-text">Start Date : 8 desember 2022 </p>
                        <p class="absolute top-12 text-xs py-4 text-left date-text">End Date : 8 desember 2022 </p>
                    </div> 
                </li>
                <li class="step step-primary">
                    <div class=" relative w-full">
                        <h1 class=" text-left text-lg pb-2">Training</h1> 
                        <p class=" absolute text-xs  text-left date-text">Start Date : 8 desember 2022 </p>
                        <p class="absolute top-12 text-xs py-4 text-left date-text">End Date : 8 desember 2022 </p>
                    </div> 
                </li>
                <li class="step">
                    <div class=" relative w-full">
                        <h1 class=" text-left text-lg pb-2">Penawaran</h1> 
                        <p class=" absolute text-xs  text-left date-text">Start Date : 8 desember 2022 </p>
                        <p class="absolute top-12 text-xs py-4 text-left date-text">End Date : 8 desember 2022 </p>
                    </div>
                </li>
                <li class="step">
                    <div class=" relative w-full">
                        <h1 class=" text-left text-lg pb-2">User Interview</h1> 
                        <p class=" absolute text-xs  text-left date-text">Start Date : 8 desember 2022 </p>
                        <p class="absolute top-12 text-xs py-4 text-left date-text">End Date : 8 desember 2022 </p>
                    </div>
                </li>
                <li class="step">
                    <div class=" relative w-full">
                        <h1 class=" text-left text-lg pb-2">PO & PKS</h1> 
                        <p class=" absolute text-xs  text-left date-text">Start Date : 8 desember 2022 </p>
                        <p class="absolute top-12 text-xs py-4 text-left date-text">End Date : 8 desember 2022 </p>
                    </div>
                </li>
                <li class="step">Onboarding</li>
            </ul>
        </div>
     </div>
</body>
</html>