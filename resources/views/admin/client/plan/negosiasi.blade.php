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
        <div class=" overflow-y-auto overflow-x-hidden mt-28 md:mt-0 px-10 ">
            <h1 class=" text-4xl">Recruitment</h1>
            <p class=" text-[16px] font-medium pt-3">Silakan pilih kandidat dengan jumlah melebihi yang dibutuhkan <br> untuk cadangan</p>

            <div class=" mt-5  w-full ">
                <ul class=" mx-auto steps steps-horizontal w-full ml-14">
                    <li  class="step step-primary">
                    </li>
                    <li  class="step step-primary">
                    </li>
                    <li class="step step-primary">
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
                    <div class=" block md:flex justify-between">
                        <div class=" relative w-full md:w-auto">
                            <input type="text"  class=" bg-[#D9D9D9] outline-none rounded-md text-black py-1  px-8">
                            <i class="ri-search-line absolute top-1 left-2 text-black"></i>
                        </div>
                        <div class="flex gap-3 items-center w-full md:w-auto">
                            <label for="endDate">End Date: </label>
                            <input type="date" id="endDate" class=" custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                        </div>
                    </div>

                    <div class="bg-grey p-9 mt-6 rounded-lg border-2 border-white  w-full h-[240px] overflow-y-scroll hide-scrollbar" id="createSection"> 
                    <form id="form2" class="w-full">
                        <div class="bg-white opacity-70 mb-4 p-2 rounded-md w-full">
                            <textarea name="judul" id="judul" class="text-black opacity-100 w-full p-2 bg-transparent outline-none resize-none" placeholder="Judul"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                        </div>
                        <div class="flex gap-2 mb-4 w-full">
                            <div class="bg-white opacity-70 rounded-md mr-2 w-1/2 p-2">
                                <textarea name="lokasi" id="lokasi" class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Lokasi"></textarea>
                            </div>
                            <div class="bg-white opacity-70 rounded-md  w-1/2 p-2">
                                <textarea name="waktu" id="waktu" class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Waktu"></textarea>
                            </div>
                            
                        </div>
                        <div class="bg-white opacity-70 rounded-md w-full p-2 h-[100px]">
                            <textarea name="deskripsi" id="deskripsi" class="bg-transparent outline-none p-2 text-black resize-none h-full w-full" placeholder="Deskripsi"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                        </div>
                        <div class="w-[97px] mx-auto">
                            <input type="submit" class="bg-secondary  text-white rounded-md px-4 py-2 h-[39px] mt-11 cursor-pointer">
                        </div>
                    </form>
                    </div>


                    <div>
                        <button class="bg-secondary text-white rounded-md px-4 py-2 mr-2">Back</button>
                    </div>
                    <div class="flex justify-end">
                            <button class="bg-secondary text-white rounded-md px-4 py-2 mr-2">Save</button>
            
                        <button class="bg-secondary text-white rounded-md px-4 py-2">Continue</button>
                    </div>
                </form> 
            </div>
        </div>
    @endsection