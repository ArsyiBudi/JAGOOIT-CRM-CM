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
<div class=" overflow-auto hide-scrollbar lg:pt-0 h-screen rounded-md">
    <div class="w-full bg-darkSecondary px-8 mb-20 flex flex-col">

        <div class="pt-10 bg-darkSecondary">
            <div class="border-b border-white w-full pb-3 mb-3">
                <h3 class="text-white font-semibold text-3xl">Data Leads</h3>
            </div>

            <form method="{{ route('fetch_leads') }}" method="get" class="block md:flex items-start my-4 justify-between mb-3 w-full">
                <div class="md:block flex items-center justify-between">
                    <div class="flex gap-3 items-center justify-start">
                        <p class="text-white text-xs md:text-sm">Show</p>
                        <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                            <input type="number" id="search" value="{{ old('per_page', $leads->perPage()) }}" name="per_page" min="1" class="text-white w-full text-center bg-transparent outline-none" placeholder="5">
                        </div>
                        <p class="text-white text-xs md:text-sm">entries</p>
                    </div>
                    <div class="md:mt-5">
                        <a class="bg-secondary font-semibold text-sm md:text-[16px] py-1 px-3 md:px-5 rounded-lg mt-0 md:mt-7 hover:scale-95 duration-200" href="/leads/create">Create Leads</a>
                    </div>
                    <button type="submit"></button>
                </div>
                <div class="flex items-center gap-5 mt-5 md:mt-0">
                    <p class="hidden md:block">Search</p>
                    <input name="search" type="text" value="{{ old('search', session('leads_search')) }}" class="outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold placeholder-gray-400 placeholder-opacity-100 md:placeholder-opacity-0" placeholder="search" value="{{ old('search') }}">
                </div>
            </form>

            <div class=" border-b border-white w-full rounded-lg mt-4"></div>
        </div>

        <div class=" hide-scrollbar w-full mt-5 max-h-96 overflow-auto pr-2">
            <table class=" w-full text-xs md:text-sm font-bold ">
                <thead class="bg-darkSecondary sticky top-0">
                    <tr>
                        <td class=" p-2" align="center">No</td>
                        <td class=" p-2" align="center">Nama Perusahaan</td>
                        <td class=" p-2" align="center">Alamat</td>
                        <td class=" p-2" align="center">PIC</td>
                        <td class=" p-2" align="center">Kontak</td>
                        <td class=" p-2" align="center">Last Activity</td>
                        <td class=" p-2" align="center">Status</td>
                        <td class=" p-2" align="center">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @if($leads -> isEmpty())
                    <tr>
                        <td colspan="8" class="text-white text-center py-4">No Data.</td>
                    </tr>
                    @else
                    @php
                    $count = ($leads->currentPage() - 1) * $leads->perPage() + 1;
                    @endphp
                    @foreach($leads as $row)
                    <tr class=" odd:bg-grey">
                        <td align="center" class=" p-4">{{ $count }}</td>
                        @php
                        $count++;
                        @endphp
                        <td align="center" class=" p-4">{{ $row->business_name }}</td>
                        <td align="center" class=" p-4">{{ $row->address }}</td>
                        <td align="center" class=" p-4">{{ $row->pic_name }}</td>
                        <td align="center" class=" p-4">{{ $row->pic_contact_number }}</td>
                        <td align="center" class=" p-4">
                            @if ($row-> hasOneActivity)
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
                                <a href="{{ url('/leads/'. $row -> id .'/detail') }}">
                                    <i class=" text-lg cursor-pointer ri-information-line"></i>
                                </a>
                                <a href="{{ url('/leads/'. $row -> id .'/edit') }}">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <div  class=" block " >
                                        <button type="button" onclick="deleteLead({{ $row -> id }})" class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></button>
                                    </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="sticky bottom-5 pb-10 bg-darksecondary flex justify-center items-center gap-3">
            {{ $leads -> links('vendor.pagination.custom-pagination-leads') }}
        </div>
    </div>
</div>

<dialog id="my_modal_3" class="modal  text-white">

    <div class="modal-box bg-grey border-2 border-white w-11/12 max-w-sm flex justify-center items-center flex-col">

        <h1>Are you sure you want to delete this leads?</h1>

        <div class="flex items-center justify-end gap-4 w-full mt-4">
            <button type="submit" class="text-white bg-red-500 font-medium  py-2 px-3 text-sm  rounded-md" id="cancel" onclick="my_modal_3.close()">Cancel</button>
           
            <!-- Hidden form for deletion -->
            <form id="deleteForm" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deleteClientId" name="client_id" value="">
            </form>

            <button type="button" class="text-white font-medium bg-green-500   py-2 px-3 text-sm  rounded-md" id="yes" onclick="confirmDelete()">Yes</button>
        
        </div>

    </div>
</dialog>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

    const my_modal_3 = document.getElementById('my_modal_3');
    function showModal() {
        my_modal_3.showModal();
    }

    function deleteLead(id) {
        //diset si id nu dikirim ke input nu hidden di nu dialog
        document.getElementById('deleteClientId').value = id;
        showModal();
    }

    function confirmDelete() {
        //terus di tombol yes aya onclick ka function ieu. mun di pencet bakal dicari formna terus dibere action keur dikirim ke client/{client_id}
        const form = document.getElementById('deleteForm');
        form.action = `/leads/${document.getElementById('deleteClientId').value}`;
        form.submit();
    }
</script>


@endsection