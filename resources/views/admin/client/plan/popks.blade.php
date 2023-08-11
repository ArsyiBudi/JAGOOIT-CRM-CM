@extends('admin.layouts.main')

@section('container')
    <div class="bg-grey flex flex-col text-lightGrey p-8 rounded-md space-y-2 overflow-auto">
        <div class="flex flex-col justify-between">
            JagoIT:
            <div class="flex flex-row space-x-2">
                <div class="flex flex-col">
                    Nama
                    <input type="text" name="" id="">
                </div>
                <div class="flex flex-col ">
                    Jabatan
                    <input type="text" name="" id="">
                </div>
                <div class="flex flex-col">
                    Alamat
                    <input type="text" name="" id="">
                </div>
            </div>

            Client:
            <div class="flex flex-row space-x-2">
                <div class="flex flex-col">
                    Nama
                    <input type="text" name="" id="">
                </div>
                <div class="flex flex-col">
                    Jabatan
                    <input type="text" name="" id="">
                </div>
                <div class="flex flex-col">
                    Alamat
                    <input type="text" name="" id="">
                </div>
            </div>

            Jangka Waktu Kontrak:
            <div class="flex flex-row space-x-2">
                <div>Dari</div>
                <input type="text" name="" id="">
                <div>Sampai</div>
                <input type="text" name="" id="">
                </div>
            </div>
            
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
@endsection
