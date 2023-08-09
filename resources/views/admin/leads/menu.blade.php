@extends('admin.layouts.main')

<style>
    .hide-scrollbar {
        scrollbar-width: none; /* Untuk browser yang mendukung */
        overflow: auto;
    }

    .hide-scrollbar::-webkit-scrollbar {
        width: 0.5em; /* Lebar scrollbar */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb {
        background-color: transparent; /* Warna thumb scrollbar */
    }

    .hide-scrollbar::-webkit-scrollbar-track {
        background-color: transparent; /* Warna track scrollbar */
    }
</style>

@section('container')
    <div class=" overflow-auto">
        {{-- <div class=" mt-64 mb-5">
            <h1>Leads / <span>Menu</span></h1>
        </div> --}}
        <div class="w-full bg-darkSecondary py-10 px-8  rounded-md mt-5 ">

            <div class="border-b border-white w-full pb-3 mb-3">
                <h3 class="text-white font-semibold text-3xl">Data Leads</h3>
            </div>

            <div class=" flex items-start my-4 justify-between mb-3 w-full">
                <div class=" md:block flex items-center justify-between">
                    <div class="flex gap-3 items-center justify-start">
                        <p class="text-white text-sm">Show</p>
                        <div class="flex items-center bg-grey rounded-lg justify-center py-1 w-[60px] px-1">
                            <input type="text" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                        </div>
                        <p>entries</p>
                    </div>
                    <div>
                        <a href="/leads/create">
                            <button class=" bg-secondary font-semibold text-[16px] py-1 px-5 rounded-lg mt-7 hover:scale-95 duration-200">Create Leads</button>   
                        </a>
                    </div>
                </div>
                <div class=" flex items-center gap-5">
                    <p>Search</p>
                    <input type="text" class=" outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold">
                </div>
            </div>

            <div class=" border-b border-white w-full rounded-lg mt-4"></div>

            <div class=" hide-scrollbar w-full mt-5 h-72 overflow-auto">
                <table class=" w-full text-sm font-bold ">
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