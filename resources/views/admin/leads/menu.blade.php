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
    <div class=" overflow-auto mt-28 md:mt-0 h-screen">
        {{-- <div class=" mt-64 mb-5">
            <h1>Leads / <span>Menu</span></h1>
        </div> --}}
        <div class="w-full bg-darkSecondary py-10 px-8 rounded-md ">

            <div class="border-b border-white w-full pb-3 mb-3">
                <h3 class="text-white font-semibold text-3xl">Data Leads</h3>
            </div>

            <div class=" block md:flex items-start my-4 justify-between mb-3 w-full">
                <div class=" md:block flex items-center justify-between">
                    <div class="flex gap-3 items-center justify-start">
                        <p class="text-white text-xs md:text-sm">Show</p>
                        <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                            <input type="text" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                        </div>
                        <p class="text-white text-xs md:text-sm">entries</p>
                    </div>
                    <div>
                        <a href="/leads/create">
                            <button class=" bg-secondary font-semibold text-sm md:text-[16px] py-1 px-3 md:px-5 rounded-lg mt-0 md:mt-7 hover:scale-95 duration-200">Create Leads</button>   
                        </a>
                    </div>
                </div>
                <div class=" flex items-center gap-5 mt-5 md:mt-0">
                    <p class=" hidden md:block">Search</p>
                    <input type="text" class=" outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold placeholder-gray-400 placeholder-opacity-100 md:placeholder-opacity-0" placeholder="search">
                </div>
            </div>

            <div class=" border-b border-white w-full rounded-lg mt-4"></div>

            <div class=" hide-scrollbar w-full mt-5 h-72 overflow-auto pr-2">
                <table class=" w-full text-xs md:text-sm font-bold ">
                    <thead>
                        <tr >
                            <td  class=" p-4" align="center">No</td>
                            <td  class=" p-4" align="center">Nama Perusahaan</td>
                            <td  class=" p-4" align="center">Alamat</td>
                            <td  class=" p-4" align="center">PIC</td>
                            <td  class=" p-4" align="center">Kontak</td>    
                            <td  class=" p-4" align="center">Last Activity</td>    
                            <td  class=" p-4" align="center">Status</td>    
                            <td  class=" p-4" align="center">Aksi</td>    
                        </tr>
                    </thead>
                    <tbody>
                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">1</td>
                            <td align="center" class=" p-4">PT Fuad Military</td>
                            <td align="center" class=" p-4">Los Santos 88</td>
                            <td align="center" class=" p-4">Samsul</td>
                            <td align="center" class=" p-4">089677854432</td>
                            <td align="center" class=" p-4">Appointment</td>
                            <td align="center" class=" p-4">Selesai</td>
                            <td align="center" class=" p-4"> 
                                <div class=" flex items-center gap-2">
                                    <a href="/leads/detail">
                                        <i class=" text-lg cursor-pointer ri-information-line"></i>
                                    </a>
                                    <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                </div> 
                            </td>
                        </tr>

                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">2</td>
                            <td align="center" class=" p-4">PT Fuad Military</td>
                            <td align="center" class=" p-4">Los Santos 88</td>
                            <td align="center" class=" p-4">Samsul</td>
                            <td align="center" class=" p-4">089677854432</td>
                            <td align="center" class=" p-4">Appointment</td>
                            <td align="center" class=" p-4">Selesai</td>
                            <td align="center" class=" p-4">
                                <div class=" flex items-center gap-2">
                                    <a href="/leads/detail">
                                        <i class=" text-lg cursor-pointer ri-information-line"></i>
                                    </a>
                                    <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                </div> 
                            </td>
                        </tr>

                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">3</td>
                            <td align="center" class=" p-4">PT Fuad Military</td>
                            <td align="center" class=" p-4">Los Santos 88</td>
                            <td align="center" class=" p-4">Samsul</td>
                            <td align="center" class=" p-4">089677854432</td>
                            <td align="center" class=" p-4">Appointment</td>
                            <td align="center" class=" p-4">Selesai</td>
                            <td align="center" class=" p-4">
                                <div class=" flex items-center gap-2">
                                    <a href="/leads/detail">
                                        <i class=" text-lg cursor-pointer ri-information-line"></i>
                                    </a>
                                    <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                </div> 
                            </td>
                        </tr>

                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">4</td>
                            <td align="center" class=" p-4">PT Fuad Military</td>
                            <td align="center" class=" p-4">Los Santos 88</td>
                            <td align="center" class=" p-4">Samsul</td>
                            <td align="center" class=" p-4">089677854432</td>
                            <td align="center" class=" p-4">Appointment</td>
                            <td align="center" class=" p-4">Selesai</td>
                            <td align="center" class=" p-4">
                                <div class=" flex items-center gap-2">
                                    <a href="/leads/detail">
                                        <i class=" text-lg cursor-pointer ri-information-line"></i>
                                    </a>
                                    <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                </div> 
                            </td>
                        </tr>

                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">5</td>
                            <td align="center" class=" p-4">PT Fuad Military</td>
                            <td align="center" class=" p-4">Los Santos 88</td>
                            <td align="center" class=" p-4">Samsul</td>
                            <td align="center" class=" p-4">089677854432</td>
                            <td align="center" class=" p-4">Appointment</td>
                            <td align="center" class=" p-4">Selesai</td>
                            <td align="center" class=" p-4">
                                <div class=" flex items-center gap-2">
                                    <a href="/leads/detail">
                                        <i class=" text-lg cursor-pointer ri-information-line"></i>
                                    </a>
                                    <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                </div> 
                            </td>
                        </tr>

                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">6</td>
                            <td align="center" class=" p-4">PT Fuad Military</td>
                            <td align="center" class=" p-4">Los Santos 88</td>
                            <td align="center" class=" p-4">Samsul</td>
                            <td align="center" class=" p-4">089677854432</td>
                            <td align="center" class=" p-4">Appointment</td>
                            <td align="center" class=" p-4">Selesai</td>
                            <td align="center" class=" p-4">
                                <div class=" flex items-center gap-2">
                                    <a href="/leads/detail">
                                        <i class=" text-lg cursor-pointer ri-information-line"></i>
                                    </a>
                                    <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                </div> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class=" flex justify-center items-center gap-3">
                <div class="">
                    <button class=" bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5">Prev</button>
                </div>
                <div class=" bg-grey p-1 rounded-md w-8 text-center">
                    <p>1</p>
                </div>
                <div class=" bg-grey p-1 rounded-md w-8 text-center">
                    <p>10</p>
                </div>
                <div class="">
                    <button class=" bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5">Next</button>
                </div>
            </div>
        </div>
    </div>
@endsection