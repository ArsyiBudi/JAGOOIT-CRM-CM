    @extends('admin.layouts.main')

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
            /* Color of the scrollbar track */
        }

        .hide-scrollbar::-webkit-scrollbar-track:hover {
            background-color: #666666;
            /* Color of the scrollbar track on hover */
        }

        /* Customize the appearance of the scrollbar wheel */
        .hide-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #555555 #333333;
        }

        /* Customize the appearance of the scrollbar thumb icon */
        .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
            background-color: #fff;
            /* Color of the scrollbar thumb icon */
        }
    </style>

    @section('container')
    <div class="pt-20 pb-2 lg:pt-0">
    </div>
    <div class=" overflow-auto bg-darkSecondary lg:pt-0 h-[90vh] rounded-md">
        <div class="w-full bg-darkSecondary py-10 px-8 rounded-md ">

            <div class="border-b border-white w-full pb-3 mb-3">
                <h3 class="text-white font-semibold text-3xl">History Order</h3>
            </div>

            <form class=" block md:flex items-start my-4 justify-between mb-3 w-full">
                <div class=" md:block flex items-center justify-between">
                    <div class="flex gap-3 items-center justify-start">
                        <p class="text-white text-xs md:text-sm">Show</p>
                        <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                            <input type="number" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                        </div>
                        <p class="text-white text-xs md:text-sm">entries</p>
                    </div>
                </div>
                <div class=" flex items-center gap-5 mt-5 md:mt-0">
                    <p class=" hidden md:block">Search</p>
                    <input type="text" class=" outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold placeholder-gray-400 placeholder-opacity-100 md:placeholder-opacity-0" placeholder="search">
                </div>
            </form>

            <div class=" border-b border-white w-full rounded-lg mt-4"></div>

            <div class=" hide-scrollbar w-full mt-5 h-72 overflow-auto pr-2">
                <table class=" w-full text-xs md:text-sm font-bold ">
                    <thead>
                        <tr>
                            <td class=" p-4" align="center">No</td>
                            <td class=" p-4" align="center">Order ID</td>
                            <td class=" p-4" align="center">Nama Perusahaan</td>
                            <td class=" p-4" align="center">Due Date</td>
                            <td class=" p-4" align="center">Status</td>
                            <td class=" p-4" align="center">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orders -> isEmpty())
                        <p class="text-white text-center py-4">No Data</p>
                        @else
                        @php
                        $count = ($orders->currentPage() - 1) * $orders->perPage() + 1;
                        @endphp
                        @foreach($orders as $order)
                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">{{ $count }}</td>
                            @php
                            $count++;
                            @endphp
                            <td align="center" class=" p-4">{{ $order -> id }}</td>
                            <td align="center" class=" p-4">{{ $order -> leadData -> business_name }}</td>
                            <td align="center" class=" p-4">{{ $order -> due_date }}</td>
                            <td align="center" class=" p-4">
                                <div class="bg-success rounded-md py-1">
                                    {{ $order -> globalParams -> params_name }}
                                </div>
                            </td>
                            <td align="center" class=" p-4">
                                <div class=" flex items-center gap-2 justify-center">
                                    <i class="ri-checkbox-circle-line text-lg cursor-pointer" title="Complete Manual"></i>
                                    <a href="{{  url('/client/order/detail/'. $order -> id) }}">
                                        <i class=" text-lg cursor-pointer ri-information-line" title="Detail"></i>
                                    </a>
                                    <form action="{{ route('delete_order', ['order_id' => $order -> id]) }}" method="post" class=" block  mt-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete" title="Delete"></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class=" flex justify-center items-center gap-3">
                {{ $orders -> links('vendor.pagination.custom-pagination-order') }}
            </div>
        </div>
    </div>
    @endsection