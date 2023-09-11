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
    <div class="pt-20 lg:pt-0">
    </div>
    <div class="overflow-auto pt-0 h-[90vh] w-full rounded-md hide-scrollbar">
        <div class="bg-darkSecondary flex flex-col px-8 py-10">
            <div class="flex flex-col text-lightGrey space-y-2">
                <div class="flex flex-row justify-between">
                    <div class="text-2xl">Detail Order</div>
                    <a class="bg-secondary rounded-md py-2 px-4 text-sm" href="{{ url('/client/order/detail/'. $data -> id . '/timeline') }}">Lihat Timeline</a>
                </div>
                <div class="divide-y divide-slate-50 gap-4 flex flex-col">
                    <div class="pt-3">
                        <p>
                            Nama Perusahaan : <span class="font-bold"> {{ $data -> leadData -> business_name }}</span>
                        </p>
                    </div>
                    <div class="pt-3">
                        <p>
                            Alamat : <span class="font-bold"> {{ $data -> leadData -> address }}</span>
                        </p>
                    </div>
                    <div class="pt-3">
                        <p>
                            Nama PIC : <span class="font-bold"> {{ $data -> leadData -> pic_name }}</span>
                        </p>
                    </div>
                    <div class="pt-3">
                        <p>
                            No Telepon PIC : <span class="font-bold"> {{ $data -> leadData -> pic_contact_number }}</span>
                        </p>
                    </div>
                    <div class="pt-3">
                        <p>
                            Aktivitas terakhir : <span class="font-bold">
                                @if ($data-> leadData -> hasOneActivity)
                                @if ($data -> leadData ->latestActivityParams)
                                    {{ $data -> leadData ->latestActivityParams->params_name }}
                                @endif
                                @else
                                    -
                                @endif
                            </span>
                        </p>
                    </div>
                    <div class="pt-3">
                        <p>
                           Status : <span class="font-bold"> {{ $data -> leadData -> statusParam -> params_name }}</span> 
                        </p>
                    </div>
                    <hr>
                </div>
            </div>
    
            <div class="w-full mt-10 h-72 overflow-auto hide-scrollbar">
                <table class="text-lightGrey  w-full h-full ">
                    <thead class="border-white">
                        <tr class="">
                            <th class="p-4 font-bold">No</th>
                            <th class="p-4 font-bold">Nama Talent</th>
                            <th class="p-4 font-bold">Pendidikan</th>
                            <th class="p-4 font-bold">Keterampilan</th>
                            <th class="p-4 font-bold">Posisi</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @if($data -> talentData)
                            @foreach($data -> talentDataFetch as $row)
                            <tr class="text-center bg-grey font-medium">
                                <td class="p-4">{{ isset($i) ? ++$i : $i = 1 }}</td>
                                <td class="p-4">{{ $row -> talentData -> name }}</td>
                                <td class="p-4">{{ $row -> talentData -> pendidikanTalent -> description }}</td>
                                <td class="p-4">{{ $row -> talentData -> keterampilanTalent -> description }}</td>
                                <td class="p-4">{{ $row -> talentData -> posisiTalent -> description }}</td>
                            </tr>
                            @endforeach
                        @else
                            No Talent Data
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
