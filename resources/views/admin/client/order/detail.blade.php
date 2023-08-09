@extends('admin.layouts.main')

@section('container')
    <div class="bg-primary flex flex-col text-lightGrey p-8 rounded-md space-y-2">
        <div class="flex flex-row justify-between">
            <div class="text-2xl">Detail Order</div>
            <Button class="bg-secondary rounded-md py-2 px-4 text-sm">Lihat Timeline</Button>
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
