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
  <div class=" overflow-auto pt-28 lg:pt-0 h-screen">
    <div class="w-full bg-darkSecondary py-10 px-8 flex  flex-col rounded-md">

        <div class="border-b border-white w-full pb-3 mb-3">
            <h3 class="text-white font-semibold text-3xl">Daftar Order</h3>
        </div>

        <form class=" block md:flex items-start my-4 justify-between mb-8 w-full">
            <div class=" md:block flex items-center justify-between">
                <div class="flex gap-3 items-center justify-start">
                    <p class="text-white text-xs md:text-sm">Show</p>
                    <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                        <input type="text" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                    </div>
                    <p class="text-white text-xs md:text-sm">entries</p>
                </div>
                <div class="md:mt-5">
                        <a class=" bg-secondary text-sm md:text-[16px] py-1 px-3 md:px-5 rounded-lg mt-0 md:mt-7 hover:scale-95 duration-200" href="/client/order/create">New Orders</a>  
                </div>
            </div>
            <div class=" flex items-center gap-5 mt-5 md:mt-0">
                <p class=" hidden md:block">Search</p>
                <input type="text" class=" outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold placeholder-gray-400 placeholder-opacity-100 md:placeholder-opacity-0" placeholder="search">
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
                                <div class=" flex justify-center items-center gap-2">
                                    <i class="ri-checkbox-circle-line text-2xl"></i>
                                    <a href="/client/order/plan/recruitment">
                                        <i class="ri-calendar-todo-fill text-2xl"></i>
                                    </a>
                                    <a href="/client/detail">
                                        <i class="ri-information-line text-2xl"></i>
                                    </a>
                                    <i class="ri-delete-bin-2-line text-2xl text-delete"></i>
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
                                <div class=" flex justify-center items-center gap-2">
                                    <i class="ri-checkbox-circle-line text-2xl"></i>
                                    <a href="/client/order/plan/recruitment">
                                        <i class="ri-calendar-todo-fill text-2xl"></i>
                                    </a>
                                    <a href="/client/detail">
                                        <i class="ri-information-line text-2xl"></i>
                                    </a>
                                    <i class="ri-delete-bin-2-line text-2xl text-delete"></i>
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
                                <div class=" flex justify-center items-center gap-2">
                                    <i class="ri-checkbox-circle-line text-2xl"></i>
                                    <a href="/client/order/plan/recruitment">
                                        <i class="ri-calendar-todo-fill text-2xl"></i>
                                    </a>
                                    <a href="/client/detail">
                                        <i class="ri-information-line text-2xl"></i>
                                    </a>
                                    <i class="ri-delete-bin-2-line text-2xl text-delete"></i>
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
                                <div class=" flex justify-center items-center gap-2">
                                    <i class="ri-checkbox-circle-line text-2xl"></i>
                                    <a href="/client/order/plan/recruitment">
                                        <i class="ri-calendar-todo-fill text-2xl"></i>
                                    </a>
                                    <a href="/client/detail">
                                        <i class="ri-information-line text-2xl"></i>
                                    </a>
                                    <i class="ri-delete-bin-2-line text-2xl text-delete"></i>
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
                                <div class=" flex justify-center items-center gap-2">
                                    <i class="ri-checkbox-circle-line text-2xl"></i>
                                    <a href="/client/order/plan/recruitment">
                                        <i class="ri-calendar-todo-fill text-2xl"></i>
                                    </a>
                                    <a href="/client/detail">
                                        <i class="ri-information-line text-2xl"></i>
                                    </a>
                                    <i class="ri-delete-bin-2-line text-2xl text-delete"></i>
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
                                <div class=" flex justify-center items-center gap-2">
                                    <i class="ri-checkbox-circle-line text-2xl"></i>
                                    <a href="/client/order/plan/recruitment">
                                        <i class="ri-calendar-todo-fill text-2xl"></i>
                                    </a>
                                    <a href="/client/detail">
                                        <i class="ri-information-line text-2xl"></i>
                                    </a>
                                    <i class="ri-delete-bin-2-line text-2xl text-delete"></i>
                                </div> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        <div class="flex items-center justify-center w-full">

        <div class="flex gap-3 items-center mt-7">
                <button class="bg-secondary hover:scale-95 duration-200 w-[69px] rounded-lg flex items-center justify-center py-2">Prev</button>
                <div class="rounded-lg p-2 w-[32px] bg-grey flex items-center justify-center" onclick="{{ url('/client/detail') }}">
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