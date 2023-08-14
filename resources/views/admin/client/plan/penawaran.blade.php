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

.custom-date-input::-webkit-calendar-picker-indicator {
    filter: invert(1); /* This inverts the icon color */
}
</style>

@section('container')
    <div class=" overflow-y-auto overflow-x-hidden mt-28 md:mt-0 px-10">
        <h1 class=" text-4xl">Penawaran</h1>
        <p class=" text-[16px] font-medium pt-3">Silakan pilih kandidat</p>
    </div>

    <div class=" mt-5  w-full ">
        <ul class=" mx-auto steps steps-horizontal w-full ml-14">
            <li  class="step step-primary">
            </li>
            <li  class="step step-primary">
            </li>
            <li class="step">
            </li>
            <li class="step">
            </li>
            <li class="step">
            </li>
            <li class="step"></li>
            <li></li>
        </ul>
    </div>

        <div class=" mt-5">
            <form action="">
                <div class=" block md:flex justify-end">
                    <div class="flex gap-3 items-center w-full md:w-auto">
                        <label for="endDate">End Date: </label>
                        <input type="date" id="endDate" class=" custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                    </div>
                </div>
        </div>

        <div class="bg-grey rounded shadow-lg mt-6 p-6 h-[calc(60vh-60px)] overflow-y-auto hide-scrollbar">
            <div class="border-b pb-3 mb-6">
                <h2 class="text-4xl text-white">Form Generate Surat Penawaran</h2>
            </div>
    
            <div class="mb-4">
                <label for="perihal" class="text-sm text-white">Perihal</label>
                <input id="perihal" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white" placeholder="Perihal">
            </div>
    
            <div class="flex   gap-4">
                <div class="w-full md:w-1/2 mb-4">
                    <label for="kepada" class="text-sm text-white">Kepada</label>
                    <input id="kepada" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white" placeholder="Kepada">
                </div>
    
                <div class="w-full md:w-1/4 mb-4">
                    <label for="tempat" class="text-sm text-white">Tempat</label>
                    <input id="tempat" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white" placeholder="Bandung">
                </div>
    
                <div class="w-full md:w-1/4 mb-4">
                    <label for="tanggal" class="text-sm text-white">Tanggal</label>
                    <input id="tanggal" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white" placeholder="03 Agustus 2023">
                </div>
            </div>
    
            <div class="flex gap-4">
                <div>
                    <label for="ditawarkan" class="text-sm text-white">Hal yang Ditawarkan</label>
                    <input id="ditawarkan" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white" placeholder="Hal yang Ditawarkan">
                </div>

                <div>
                    <label for="jumlah" class="text-sm text-white">Jumlah Talent</label>
                    <input id="jumlah" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white" placeholder="Jumlah">
                </div>
            </div>

            <div class="mt-4">
                <div>
                    <p class="gap-4">Outsourcing Detail</p>
                    <button class=" bg-white text-darkSecondary text-opacity-50 text-sm text-center w-[122px] h-[25px] mt-2 rounded-md font-bold">Add Detail +</button>
                </div>
            </div>

            <div>
                <p class="mt-4">Biaya Overtime (perjam)</p>
                <div class="flex gap-4 mt-4">
                    <div>
                        <label for="weekday" class="text-sm text-white">Weekday</label>
                        <input id="weekday" type="text" class="text-black rounded-lg px-2 py-1 mt-2 w-full bg-white">
                    </div>
                    <div>
                        <label for="weekend" class="text-sm text-white">Weekend</label>
                        <input id="weekend" type="text" class="text-black rounded-lg px-2 py-1 mt-2 w-full bg-white">
                    </div>
                </div>
            </div>

            <div>
                <p class="mt-4">Biaya Dinas Luar Kota</p>
                <div class="flex gap-4 mt-4">
                    <div>
                        <label for="konsumsi" class="text-sm text-white">Konsumsi (perhari)</label>
                        <input id="konsumsi" type="text" class="text-black rounded-lg px-2 py-1 mt-2 w-full bg-white">
                    </div>
                    <div>
                        <label for="transport" class="text-sm text-white">Transport Pulang-Pergi Standar JKT-BDG</label>
                        <input id="transport" type="text" class="text-black rounded-lg px-2 py-1 mt-2 w-full bg-white">
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button class="bg-secondary text-white text-sm text-center w-[188px] h-[37px] rounded-md">Create</button>
            </div>
        </div>

        <div class="bg-grey rounded shadow-lg mt-6 p-6 h-[calc(20vh-20px)] overflow-y-auto hide-scrollbar">
            <div class="w-full  mb-4 ">
                <label for="file-tor" class="text-sm text-white">File Surat Penawaran + CV (1 file, pdf)</label>
                <div class="flex justify-center items-center bg-white py-4 rounded-lg px-2 h-24">
                    <input id="file-cv" type="file" class="text-black rounded-lg px-2 py-4 h-[56px] w-[337px] hidden bg-white" name="tor">
                    <label for="file-cv" class="cursor-pointer">
                        <i class="ri-upload-2-fill text-3xl text-black"></i>
                    </label>
                </div>
            </div>

            <div class="w-full">
                <label for="deskripsi" class="text-sm text-white">Deskirpsi</label>
                <div class="rounded-lg px-2 py-4 h-24 w-full bg-white">
                    <textarea id="deskripsi" type="text" class="text-black bg-transparent outline-none h-full w-full hide-scrollbar resize-none"></textarea>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button class="bg-secondary text-white text-sm text-center w-[188px] h-[37px] rounded-md">Send</button>
            </div>
        </div>

        <div class=" flex justify-between items-center">
            <div>
                <button class=" bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold">Back</button>
            </div>
            
            <div class="flex gap-4">
                <div>
                    <button class=" bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold">Save</button>
                </div>
    
                <div>
                    <button class=" bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold">Continue</button>
                </div>
            </div>
        </div>
    </div>
            
@endsection