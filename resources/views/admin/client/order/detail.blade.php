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
                    <a class="bg-secondary rounded-md py-2 px-4 text-sm" href="/client/history/detail/timeline">Lihat Timeline</a>
                </div>
                <div class="divide-y divide-slate-50">
                    <div class="pt-3">Nama Perusahaan</div>
                    <div class="pt-3">Alamat</div>
                    <div class="pt-3">Nama PIC</div>
                    <div class="pt-3">No Telp PIC</div>
                    <div class="pt-3">Last Activity</div>
                    <div class="pt-3">Status</div>
                    <div class="pt-3">Keterangan</div>
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
                        <tr class="text-center bg-grey font-medium">
                            <td class="p-4">1</td>
                            <td class="p-4">Bambang Nurjaman</td>
                            <td class="p-4">Los Santos 88</td>
                            <td class="p-4">Samsul</td>
                            <td class="p-4">Front End</td>
                        </tr>
                        <tr class="text-center bg-primary">
                            <td class="p-4">2</td>
                            <td class="p-4">Bambang Nurjaman</td>
                            <td class="p-4">Los Santos 88</td>
                            <td class="p-4">Samsul</td>
                            <td class="p-4">Front End</td>
                        </tr>
                        <tr class="text-center bg-grey">
                            <td class="p-4">3</td>
                            <td class="p-4">Bambang Nurjaman</td>
                            <td class="p-4">Los Santos 88</td>
                            <td class="p-4">Samsul</td>
                            <td class="p-4">Front End</td>
                        </tr>
                        <tr class="text-center bg-primary">
                            <td class="p-4">4</td>
                            <td class="p-4">Bambang Nurjaman</td>
                            <td class="p-4">Los Santos 88</td>
                            <td class="p-4">Samsul</td>
                            <td class="p-4">Front End</td>
                        </tr>
                        <tr class="text-center bg-grey">
                            <td class="p-4">5</td>
                            <td class="">Bambang Nurjaman</td>
                            <td class="">Los Santos 88</td>
                            <td class="">Samsul</td>
                            <td class="">Front End</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
