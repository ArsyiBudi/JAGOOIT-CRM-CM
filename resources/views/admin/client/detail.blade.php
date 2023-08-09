@extends('admin.layouts.main')

@section('container')
    <div class="bg-primary flex flex-col text-lightGrey p-8 rounded-md space-y-2">
        <div class="text-2xl">Detail Client</div>
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