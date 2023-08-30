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
<div class="overflow-auto bg-darkSecondary lg:pt-0 h-[90vh] rounded-md">
    <div class="w-full px-8 flex flex-col">
        <div class="pt-10 bg-darkSecondary">
            <div class="border-b border-white w-full pb-3 mb-3">
                <h3 class="text-white font-semibold text-3xl">Data Clients</h3>
            </div>

            <form class=" block md:flex items-start my-4 justify-between mb-8 w-full" action="{{ route('fetch_client') }}" method="get">
                <div class=" md:block flex items-center justify-between">
                    <div class="flex gap-3 items-center justify-start">
                        <p class="text-white text-xs md:text-sm">Show</p>
                        <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                            <input type="text" value="{{ old('per_page', $client->perPage()) }}" name="per_page" min="1" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                        </div>
                        <p class="text-white text-xs md:text-sm">entries</p>
                    </div>
                    <div class="md:mt-5">
                        <a class=" bg-secondary font-semibold text-sm md:text-[16px] py-1 px-3 md:px-5 rounded-lg mt-0 md:mt-7 hover:scale-95 duration-200 " href="/client/order/create">Create Orders</a>
                    </div>
                    <button type="submit"></button>
                </div>
                <div class=" flex items-center gap-5 mt-5 md:mt-0">
                    <p class=" hidden md:block">Search</p>
                    <input type="text" name="search" class=" outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold placeholder-gray-400 placeholder-opacity-100 md:placeholder-opacity-0" placeholder="search" value="{{ old('search') }}">
                </div>
            </form>
            <div class=" border-b border-white w-full rounded-lg mt-4"></div>
        </div>

        <div class=" hide-scrollbar w-full mt-5 max-h-96 overflow-auto pr-2">
            <table class=" w-full text-xs md:text-sm font-bold ">
                <thead class="bg-darkSecondary sticky top-0">
                    <tr>
                        <td align="center" class="pb-4">No</td>
                        <td align="center" class="pb-4">Nama Perusahaan</td>
                        <td align="center" class="pb-4">Alamat</td>
                        <td align="center" class="pb-4">PIC</td>
                        <td align="center" class="pb-4">Kontak</td>
                        <td align="center" class="pb-4">Last Activity</td>
                        <td align="center" class="pb-4">Status</td>
                        <td align="center" class="pb-4">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client as $row)
                    <tr class=" odd:bg-grey">
                        <td align="center" class=" p-4">{{ isset($i) ? ++$i : $i = 1 }}</td>
                        <td align="center" class=" p-4">{{ $row->business_name }}</td>
                        <td align="center" class=" p-4">{{ $row->business_sector }}</td>
                        <td align="center" class=" p-4">{{ $row->pic_name }}</td>
                        <td align="center" class=" p-4">{{ $row->pic_contact_number }}</td>
                        <td align="center" class=" p-4">
                            @if ($row->latestActivity)
                                @if ($row->latestActivityParams)
                                    {{ $row->latestActivityParams->params_name }}
                                @endif
                            @else
                                -
                            @endif
                        </td>
                        <td align="center" class=" p-4">{{ $row->statusParam->params_name }}</td>
                        <td align="center" class=" p-4">
                            <div class=" flex items-center gap-2">
                                <a href="{{ url('/leads/'.$row -> id.'/detail') }}">
                                    <i class="text-lg cursor-pointer ri-information-line"></i>
                                </a>
                                <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="sticky bottom-0 pb-10 bg-darksecondary flex justify-center items-center gap-3">
            {{ $client -> links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
</div>
@endsection