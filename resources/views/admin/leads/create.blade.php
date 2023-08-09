@extends('admin.layouts.main')

@section('container')
    <div class="w-full rounded overflow-hidden shadow-lg bg-primary mt-2 pb-20">
        <div class="px-6 py-4">
            <div class="mb-2 text-3xl pb-5 border-white border-b mt-12"> 
                <h1>Create Leads</h1> 
            </div>

            <div class="flex">
                <div class="kiri flex flex-col items-start">
                    <div class="mt-8">
                        <h4>Nama Perusahaan</h4>
                        <input type="text" class="text-black rounded-lg mt-1 h-[79px] w-[450px]">
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="mb-1">Alamat Perusahaan</h4>
                        <input type="text" class="text-black rounded-lg h-[84px] w-[450px]">
                    </div>

                    <div class="mt-8">
                        <h4 class="mb-1">Nama PIC</h4>
                        <input type="text" class="text-black rounded-lg h-[79px] w-[450px]">
                    </div>
                </div>
            
                <div class="flex flex flex-col items-end ml-10">
                    <div class="mt-8">
                        <h4>Email</h4>
                        <input type="text" class="text-black rounded-lg mt-1 h-[79px] w-[450px]">
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="mb-1">Bidang</h4>
                        <input type="text" class="text-black rounded-lg h-[84px] w-[450px]">
                    </div>

                    <div class="mt-8">
                        <h4 class="mb-1">Nomor Kontakk PIC</h4>
                        <input type="text" class="text-black rounded-lg h-[79px] w-[450px]">
                    </div>
                </div>
            </div>

            <div class="mt-14 flex justify-between"> <!-- Menggunakan kelas justify-between untuk mengatur posisi tombol -->
                <button class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[97px]">Back</button>
                <button class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[198px]">Create</button>
            </div>
    </div>
@endsection