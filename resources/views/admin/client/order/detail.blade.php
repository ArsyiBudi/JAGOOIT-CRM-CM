@extends('admin.layouts.main')

@section('container')
    <div class="bg-primary rounded-md flex py-6 flex-col px-7 h-full ">
        <div class="flex flex-col text-lightGrey space-y-2">
            <div class="flex flex-row justify-between">
                <div class="text-2xl">Detail Order</div>
                <a class="bg-secondary rounded-md py-2 px-4 text-sm" href="/client/order/history/detail/timeline">Lihat Timeline</a>
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

        
        <table class="text-lightGrey w-full h-full overflow-scroll">
            <thead class="border-white">
                <tr class="">
                    <th class="py-2 font-bold">No</th>
                    <th class="font-bold">Nama Talent</th>
                    <th class="font-bold">Pendidikan</th>
                    <th class="font-bold">Keterampilan</th>
                    <th class="font-bold">Posisi</th>
                </tr>
            </thead>
            <tbody class="">
                <tr class="text-center bg-grey font-medium">
                    <td class="py-2">1</td>
                    <td class="">Bambang Nurjaman</td>
                    <td class="">Los Santos 88</td>
                    <td class="">Samsul</td>
                    <td class="">Front End</td>
                </tr>
                <tr class="text-center bg-primary">
                    <td class="py-2">2</td>
                    <td class="">Bambang Nurjaman</td>
                    <td class="">Los Santos 88</td>
                    <td class="">Samsul</td>
                    <td class="">Front End</td>
                </tr>
                <tr class="text-center bg-grey">
                    <td class="py-2">3</td>
                    <td class="">Bambang Nurjaman</td>
                    <td class="">Los Santos 88</td>
                    <td class="">Samsul</td>
                    <td class="">Front End</td>
                </tr>
                <tr class="text-center bg-primary">
                    <td class="py-2">4</td>
                    <td class="">Bambang Nurjaman</td>
                    <td class="">Los Santos 88</td>
                    <td class="">Samsul</td>
                    <td class="">Front End</td>
                </tr>
                <tr class="text-center bg-grey">
                    <td class="py-2">5</td>
                    <td class="">Bambang Nurjaman</td>
                    <td class="">Los Santos 88</td>
                    <td class="">Samsul</td>
                    <td class="">Front End</td>
                </tr>
            </tbody>
        </table>
    
        
    </div>
@endsection
