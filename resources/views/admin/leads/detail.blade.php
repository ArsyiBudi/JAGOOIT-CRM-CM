@extends('admin.layouts.main')

@section('container')
    <div class=" overflow-auto pt-28 md:pt-0 h-screen">
        <div class=" py-10 px-8 bg-primary flex flex-col text-lightGrey p-8 rounded-md space-y-2 w-full h-full">
            <div class="text-2xl">Detail Leads</div>
            <div class="flex flex-row text-xs space-x-2">
                <a class="bg-secondary rounded-md px-3 md:px-4 py-1 md:py-2 hover:scale-95 duration-200">Create Activity</a>
                <a class="bg-secondary rounded-md px-3 md:px-4 py-1 md:py-2 hover:scale-95 duration-200">Create Offer</a>
            </div>
            <div class="divide-y divide-slate-50">
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
