@extends('admin.layouts.main')

@section('container')
    <h1 class="text-black-500  mt-10 text-3xl">Create Order</h1> 

    <div class="w-full rounded overflow-hidden shadow-lg bg-primary mt-2 pb-10">
        <div class="px-6 py-4">
            <div class="mb-2 text-3xl pb-5 border-white border-b mt-5"> 
                <h1>New Order</h1> 
            </div>

            <div class="mt-4 flex items-center gap-2">
                <h4>Order/Request ID</h4>
                <input type="text" disabled class="text-black rounded-lg">
            </div>

            <div class="mt-4">
                <h4>Nama Perusahaan</h4>
                <input type="text" class="text-black rounded-lg mt-1 w-full h-[38px]">
            </div>

                <div class="flex items-center gap-9">
                    <div class="mt-4">
                        <h4>Posisi yang Dibutuhkan</h4>
                        <input type="text" class="text-black rounded-lg mt-1 h-[38px] w-[400px]">
                    </div>
        
                    <div class="mt-4">
                        <h4 class="mb-1">Jumlah</h4>
                        <input type="text" class="text-black rounded-lg h-[38px] w-[100%]">
                    </div>

                    <div class="mt-4">
                        <h4 class="mb-1">Due Date</h4>
                        <input type="text" class="text-black rounded-lg h-[38px] w-[295%]">
                    </div>
                </div>

            <div class="mt-4">
                    <h4>Job Description</h4>
                    <input type="text" class="text-black rounded-lg mt-1 h-[90px] w-full">
            </div>

            <div class="flex">
                <div class="flex flex-col">
                    <div class="mt-4">
                        <h4>Kriteria Keterampilan</h4>
                        <input type="text" class="text-black rounded-lg mt-1 h-[108px] w-[280%]">
                    </div>
        
                    <div class="mt-4">
                        <h4 class="mb-1">File TOR</h4>
                        <input type="text" class="text-black rounded-lg h-[79px] w-[280%]">
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="mt-4">
                        <h4>Anggaran</h4>
                        <input type="text" class="text-black rounded-lg mt-1 h-[108px] w-[337px]">
                    </div>
        
                    <div class="mt-4">
                        <h4 class="mb-1">Kriteria Karakteristik</h4>
                        <input type="text" class="text-black rounded-lg h-[79px] w-[377px]">
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button class="bg-secondary text-white rounded-md px-4 py-2 mr-2 h-[37px] w-[97px]">Cancel</button>
                <button class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[198px]">Create</button>
            </div>
    </div>
@endsection