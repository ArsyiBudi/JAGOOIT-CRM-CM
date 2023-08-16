@extends('admin.layouts.main')

@section('container')
<div class="bg-primary flex flex-col text-lightGrey p-8 rounded-md space-y-2 w-full mt-20">
    <div class=" py-10 px-8 bg-primary flex flex-col text-lightGrey p-8 rounded-md space-y-2 w-full h-full">
        <div class="text-2xl">Detail Client</div>
        
        <div class="divide-y divide-slate-50 gap-4 flex flex-col">
            <div class="pt-3">
                <p>
                    Nama Perusahaan
                </p>
            </div>
            <div class="pt-3">
                <p>
                    Alamat
                </p>
            </div>
            <div class="pt-3">
                <p>
                    Nama PIC
                </p>
            </div>
            <div class="pt-3">
                <p>
                    No Telp PIC
                </p>
            </div>
            <div class="pt-3">
                <p>
                    Last Activity
                </p>
            </div>
            <div class="pt-3">
                <p>
                    Status
                </p>
            </div>
            <div class="pt-3">
                <p>
                    Keterangan
                </p>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
