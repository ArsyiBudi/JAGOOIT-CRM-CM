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

        <form class=" block md:flex items-start my-4 justify-between mb-8 w-full" action="{{ route('fetch_order') }}" method="get">
            <div class=" md:block flex items-center justify-between">
                <div class="flex gap-3 items-center justify-start">
                    <p class="text-white text-xs md:text-sm">Show</p>
                    <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                        <input type="text" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                    </div>
                    <p class="text-white text-xs md:text-sm">entries</p>
                </div>
                <div class="md:mt-5">
                        <a class=" bg-secondary text-sm md:text-[16px] py-1 px-3 md:px-5 rounded-lg mt-0 md:mt-7 hover:scale-95 duration-200" href="{{ url('/client/order/create') }}">New Orders</a>  
                </div>
                <button type="submit"></button>
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
                            <td align="center" class="pb-4 pl-2">Order ID</td>
                            <td align="center" class="pb-4 pl-2">Nama Perusahaan</td>
                            <td align="center" class="pb-4 pl-2">Due Date</td>
                            <td align="center" class="pb-4 pl-1">Status</td>
                            <td align="center" class="pb-4 pl-5">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">{{ isset($i) ? ++$i : $i = 1 }}</td>
                            <td align="center" class=" p-4">{{ $row -> id  }}</td>
                            <td align="center" class=" p-4">{{ $row -> leadData -> business_name }}</td>
                            <td align="center" class=" p-4">{{ $row -> due_date }}</td>
                            <td align="center" class=" p-4"><p class='bg-green-700 rounded-md'>{{ $row -> globalParams -> params_name }}</p></td>
                            <td align="center" class=" p-4"> 
                                <div class=" flex justify-center items-center gap-2">
                                    <i class="ri-checkbox-circle-line text-2xl cursor-pointer" title="Complete Manual"></i>
                                    <a href="/client/order/plan/recruitment">
                                        <i class="ri-calendar-todo-fill text-2xl" title="Plan"></i>
                                    </a>
                                    <a href="/client/order/history/detail">
                                        <i class="ri-information-line text-2xl" title="Detail"></i>
                                    </a>
                                    <i class="ri-delete-bin-2-line text-2xl text-delete cursor-pointer" title="Delete"></i>
                                </div> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        <div class="flex items-center justify-center w-full">

        <div class="sticky bottom-0 pb-10 bg-darksecondary flex justify-center items-center gap-3">
            {{ $order -> links('vendor.pagination.custom-pagination') }}
        </div>
        
    </div>
    </div>
@endsection