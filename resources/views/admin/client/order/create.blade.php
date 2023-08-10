@extends('admin.layouts.main')

<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0; /* Width of the scrollbar */
    }
</style>

@section('container')
<div class="mt-10">
    <h1 class="text-3xl font-semibold text-white">Create Order</h1>

    <div class="bg-primary rounded shadow-lg mt-6 p-6 h-[calc(100vh-100px)] overflow-y-auto hide-scrollbar">
        <div class="border-b pb-3 mb-6">
            <h2 class="text-2xl font-semibold text-white">New Order</h2>
        </div>

        <div class="mb-4 flex items-center gap-4">
            <label for="order-id" class="text-sm text-white">Order/Request ID</label>
            <input id="order-id" type="text" disabled class="text-black rounded-lg px-2 py-1 bg-gary">
        </div>

        <div class="mb-4">
            <label for="nama-perusahaan" class="text-sm text-white">Nama Perusahaan</label>
            <input id="nama-perusahaan" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
        </div>

        <div class="flex   gap-4">
            <div class="w-full md:w-1/2 mb-4">
                <label for="posisi" class="text-sm text-white">Posisi yang Dibutuhkan</label>
                <input id="posisi" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
            </div>

            <div class="w-full md:w-1/4 mb-4">
                <label for="jumlah" class="text-sm text-white">Jumlah</label>
                <input id="jumlah" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
            </div>

            <div class="w-full md:w-1/4 mb-4">
                <label for="due-date" class="text-sm text-white">Due Date</label>
                <input id="due-date" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
            </div>
        </div>

        <div class="mb-4">
            <label for="job-description" class="text-sm text-white">Job Description</label>
            <input id="job-description" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
        </div>

        <div class="flex items-center gap-4">

        
        <div class="flex flex-wrap gap-4 md:w-1/2">
            <div class="w-full  mb-4">
                <label for="kriteria-keterampilan" class="text-sm text-white">Kriteria Keterampilan</label>
                <input id="kriteria-keterampilan" type="text" class="text-black rounded-lg px-2 py-4 h-32 w-full bg-white">
            </div>
            
            <div class="w-full  mb-4">
                <label for="file-tor" class="text-sm text-white">File TOR</label>
                <input id="file-tor" type="text" class="text-black rounded-lg px-2 py-10 h-18 w-full bg-white">
            </div>
        </div>
        
        <div class="flex flex-wrap gap-4 md:w-1/2">
            <div class="w-full mb-4">
                <label for="anggaran" class="text-sm text-white">Anggaran</label>
                <input id="anggaran" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
            </div>
            
            <div class="w-full mb-4">
                <label for="kriteria-karakteristik" class="text-sm text-white">Kriteria Karakteristik</label>
                <input id="kriteria-karakteristik" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
            </div>
        </div>
    </div>
        <div class="flex justify-end mt-6">
            <button class="bg-secondary text-white rounded-md px-4 py-2 mr-2">Cancel</button>
            <button class="bg-secondary text-white rounded-md px-4 py-2">Create</button>
        </div>
    </div>
</div>      
@endsection
