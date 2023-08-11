@extends('admin.layouts.main')

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


@section('container')
    <form class=" hide-scrollbar w-full rounded shadow-lg bg-primary h-auto md:h-[580px]  pb-20 overflow-hidden mt-48 md:mt-0">
        <div class="px-6 py-4 overflow-auto">
            <div class="mb-2 text-3xl pb-5 border-white border-b mt-12"> 
                <h1>Create Leads</h1> 
            </div>

            <div class="flex justify-between pr-5 overflow-auto overflow-x-hidden">
                <div class="kiri flex flex-col items-start">
                    <div class="mt-8">
                        <h4>Nama Perusahaan</h4>
                        <input type="text" class="text-white bg-white rounded-lg mt-1 w-full md:w-96 py-3 px-3 outline-none">
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="mb-1">Alamat Perusahaan</h4>
                        <input type="text" class="text-white rounded-lg w-full md:w-96 py-6 px-3 outline-none">
                    </div>

                    <div class="mt-8">
                        <h4 class="mb-1">Nama PIC</h4>
                        <input type="text" class="text-white rounded-lg w-full md:w-96 py-3 px-3 outline-none">
                    </div>
                </div>
            
                <div class="flex flex-col items-end ml-10">
                    <div class="mt-8">
                        <h4>Email</h4>
                        <input type="text" class="text-white rounded-lg mt-1 w-full md:w-96 py-3 px-3 outline-none">
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="mb-1">Bidang</h4>
                        <input type="text" class="text-white rounded-lg w-full md:w-96 py-6 px-3 outline-none">

                    </div>

                    <div class="mt-8">
                        <h4 class="mb-1">Nomor Kontakk PIC</h4>
                        <input type="text" class="text-white rounded-lg mt-1 w-full md:w-96 py-3 px-3 outline-none">

                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-between pr-5"> <!-- Menggunakan kelas justify-between untuk mengatur posisi tombol -->
                <button class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[97px]">Back</button>
                <input type="submit"  value="Create" class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[198px]"></input>
            </div>
    </div>
@endsection