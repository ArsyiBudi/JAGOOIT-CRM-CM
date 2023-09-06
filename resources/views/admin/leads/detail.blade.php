@extends('admin.layouts.main')

@section('container')
<div class="pt-20 lg:pt-0">
</div>
<div class="overflow-auto pt-0 h-[90vh] w-full rounded-md hide-scrollbar">
    <div class="bg-darkSecondary flex flex-col px-8 py-10">
         <div class="flex flex-col text-lightGrey space-y-2">
            <div class="text-2xl">Detail Leads</div>
            @foreach($leads as $data)
            <div class="flex flex-row text-xs space-x-2">
                <a class="bg-secondary rounded-md px-3 md:px-4 py-1 md:py-2 hover:scale-95 duration-200"  href="{{ url('/leads/activity/'. $data -> id) }}">Create Activity</a>
                <a class="bg-secondary rounded-md px-3 md:px-4 py-1 md:py-2 hover:scale-95 duration-200" href="{{ url('/leads/offer/'. $data -> id)}}">Create Offer</a>
            </div>
            <div class="divide-y divide-slate-50 gap-4 flex flex-col">
                <div class="pt-3">
                    <p>
                       Nama Perusahaan : <span class=" font-bold"> {{ $data -> business_name}}</span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                       Alamat :  <span class=" font-bold"> {{ $data -> address }} </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                       Nama PIC : <span class=" font-bold"> {{ $data ->  pic_name }} </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                        No Telepon PIC : <span class=" font-bold"> {{ $data -> pic_contact_number }} </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                       Aktivitas terakhir : <span class=" font-bold">
                            @if ($data->latestActivity)
                                @if ($data->latestActivityParams)
                                    {{ $data->latestActivityParams->params_name }}
                                @endif
                            @else
                                -
                            @endif
                       </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                      Status : <span class=" font-bold"> {{ $data -> statusParam -> params_name }} </span>
                    </p>
                </div>
                <hr>
            </div>
            @endforeach
        </div>

        <div class="w-full mt-10 max-h-72 overflow-auto hide-scrollbar">
            <table class="text-lightGrey  w-full h-full ">
                <thead class="border-white">
                    <tr class="">
                        <th class="p-4 font-bold">No</th>
                        <th class="p-4 font-bold">Activity</th>
                        <th class="p-4 font-bold">Judul</th>
                        <th class="p-4 font-bold">Tanggal/File</th>
                        <th class="p-4 font-bold">Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="">
                    {{-- @if($data -> talentData)
                        @foreach($data -> talentDataFetch as $row) --}}
                        <tr class="text-center bg-grey font-medium">
                            <td class="p-4">id</td>
                            <td class="p-4">Appointment</td>
                            <td class="p-4">Tawuran RT</td>
                            <td class="p-4">40 Agustus</td>
                            <td class="p-4">Hajar lawan</td>
                        </tr>
                        {{-- @endforeach
                    @else
                        No Talent Data
                    @endif --}}
                    <tr class="text-center bg-grey font-medium">
                        <td class="p-4">id</td>
                        <td class="p-4">Appointment</td>
                        <td class="p-4">Tawuran RT</td>
                        <td class="p-4">40 Agustus</td>
                        <td class="p-4">Hajar lawan</td>
                    </tr>
                    <tr class="text-center bg-grey font-medium">
                        <td class="p-4">id</td>
                        <td class="p-4">Appointment</td>
                        <td class="p-4">Tawuran RT</td>
                        <td class="p-4">40 Agustus</td>
                        <td class="p-4">Hajar lawan</td>
                    </tr>
                    <tr class="text-center bg-grey font-medium">
                        <td class="p-4">id</td>
                        <td class="p-4">Appointment</td>
                        <td class="p-4">Tawuran RT</td>
                        <td class="p-4">40 Agustus</td>
                        <td class="p-4">Hajar lawan</td>
                    </tr>
                    <tr class="text-center bg-grey font-medium">
                        <td class="p-4">id</td>
                        <td class="p-4">Appointment</td>
                        <td class="p-4">Tawuran RT</td>
                        <td class="p-4">40 Agustus</td>
                        <td class="p-4">Hajar lawan</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
