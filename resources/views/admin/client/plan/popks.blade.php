@extends('admin.layouts.main')

@section('container')
    
    <div class="bg-grey justify-between flex flex-col h-[calc(90vh-90px)] text-lightGrey p-8 rounded-md space-y-3">
        
        <div>JagoIT:</div>
        <div class="flex flex-row space-x-2">
            <div class="flex-auto flex flex-col">
                Nama
                <input class="rounded-md" type="text" name="" id="">
            </div>
            <div class="flex-auto flex flex-col ">
                Jabatan
                <input class="rounded-md" type="text" name="" id="">
            </div>
            <div class="flex-auto flex flex-col">
                Alamat
                <input class="rounded-md" type="text" name="" id="">
            </div>
        </div>

        <div>Client:</div>
        <div class="flex flex-row space-x-2">
            <div class="flex-auto flex flex-col">
                Nama
                <input class="rounded-md" type="text" name="" id="">
            </div>
            <div class="flex-auto flex flex-col">
                Jabatan
                <input class="rounded-md" type="text" name="" id="">
            </div>
            <div class="flex-auto flex flex-col">
                Alamat
                <input class="rounded-md" type="text" name="" id="">
            </div>
        </div>

        <div>Jangka Waktu Kontrak:</div>
        <div class="flex flex-row space-x-2">
            <div>Dari</div>
            <input class="rounded-md" type="text" name="" id="">
            <div>Sampai</div>
            <input class="rounded-md" type="text" name="" id="">
        </div>

        <div>Biaya Kontrak</div>
        <div class="flex flex-row space-x-2">
            <div class="flex-auto flex flex-col">
                Termasuk Biaya
                <input type="text" class="rounded-md">
            </div>
            <div class="flex-auto flex flex-col">
                Nominal
                <input type="text" class="rounded-md">
            </div>
        </div>
    </div>
@endsection
