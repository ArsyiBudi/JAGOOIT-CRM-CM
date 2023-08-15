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
  <div class=" overflow-auto pt-28 md:pt-0 h-screen">
    <div class="w-full bg-darkSecondary pt-5 pb-16 px-7 flex  flex-col rounded-md">

        <div class="border-b border-white w-full pb-3 mb-3">
            <h3 class="text-white font-semibold text-3xl">Data Clients</h3>
        </div>

        <a href="/client/create">
            <button class="bg-secondary hover:scale-95 duration-200 md:w-[143px] w-full rounded-lg py-2 flex items-center justify-center">
                Create Orders 
            </button>
        </a>

        <form class=" block md:flex items-center justify-between mt-5 md:mt-3 mb-10">
            <div class="flex gap-3 items-center justify-center md:justify-normal">
                <p class="text-white text-sm">Show</p>
                <div class="flex items-center bg-grey rounded-xl justify-center py-1 w-[60px] px-1">
                    <input type="text" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                </div>
                <p class="text-white text-sm">entries</p>

            </div>
            <div class=" block md:flex gap-3 items-center mt-2 md:mt-0">
                <p class="text-white text-sm">Search</p>
                <div class="bg-white rounded-xl py-1 px-1 w-[320px]  mt-2 md:mt-0">
                    <input type="text" class="text-black bg-transparent outline-none w-full px-2">
                </div>
            </div>
        </form>

          <div class=" hide-scrollbar w-full h-72 overflow-auto pr-2">
                <table class=" w-full text-xs md:text-sm font-bold ">
                    <thead>
                        <tr >  
                            <td align="center" class="pb-4">No</td>
                            <td align="center" class="pb-4">Nama Perusahaan</td>
                            <td align="center" class="pb-4">Alamat</td>
                            <td align="center" class="pb-4">PIC</td>
                            <td align="center" class="pb-4">Kontak</td>
                            <td align="center" class="pb-4">Last Activity</td>
                            <td align="center" class="pb-4">Status</td>
                            <td align="center" class="pb-4">Keterangan</td>
                            <td align="center" class="pb-4">Aksi</td>
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
                            <td align="center" class=" p-4">-</td>
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
                            <td align="center" class=" p-4">-</td>
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
                            <td align="center" class=" p-4">-</td>
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
                            <td align="center" class=" p-4">-</td>
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
                            <td align="center" class=" p-4">-</td>
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
                            <td align="center" class=" p-4">-</td>
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

        <div class="flex items-center justify-center w-full">

            <div class="flex gap-3 items-center mt-7">
                <button class="bg-secondary hover:scale-95 duration-200 w-[69px] rounded-lg flex items-center justify-center py-2">Prev</button>
                <div class="rounded-lg p-2 w-[32px] bg-grey flex items-center justify-center">
                    <p>1</p>
                </div>
                <div class="rounded-lg p-2 w-[32px] bg-grey flex items-center justify-center">
                    <p>10</p>
                </div>
                <button class="bg-secondary hover:scale-95 duration-200 rounded-lg w-[69px] flex items-center justify-center py-2">Next</button>
            </div>
        </div>
        
    </div>
    </div>
@endsection