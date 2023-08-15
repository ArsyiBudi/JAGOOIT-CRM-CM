@extends('admin.layouts.main')

@section('container')
    <div class="bg-primary flex flex-col text-lightGrey p-8 rounded-md space-y-2 w-full">
        <div class="text-2xl">Detail Leads</div>
        <div class="flex flex-row text-xs space-x-2">
            <a class="bg-secondary rounded-md px-4 py-2">Create Activity</a>
            <a class="bg-secondary rounded-md px-4 py-2" href="{{ url('/leads/offer')}}">Create Offer</a>
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
@endsection
