@extends('admin.layouts.main')

@section('container')
    <div class="w-full bg-darkSecondary pt-5 px-7 flex  flex-col">

        <div class="border-b border-white w-full pb-3 mb-3">
            <h3 class="text-white font-semibold text-3xl">Data Clients</h3>
        </div>

        <button class="bg-secondary w-[143px] rounded-lg py-2 flex items-center justify-center">
            Create Orders 
        </button>

        <div class="flex items-center justify-between my-3">
            <div class="flex gap-3 items-center">
                <p class="text-white text-sm">Show</p>
                <div class="flex items-center bg-grey rounded-xl justify-center py-1 w-[60px] px-1">
                    <input type="text" class=" text-white w-full text-center bg-transparent outline-none">

                </div>
                <p class="text-white text-sm">entries</p>

            </div>
            <div class="flex gap-3 items-center">
                <p class="text-white text-sm">Search</p>
                <div class="">

                </div>
            </div>
        </div>
    </div>
@endsection