@extends('admin.layouts.main')

@section('container')
    <div class="w-full bg-darkSecondary pt-5 px-7 flex items-center flex-col">

        <div class="border-b border-white w-full pb-3 mb-3">
            <h3 class="text-white font-semibold text-3xl">Data Leads</h3>
        </div>

        <div class="flex items-center justify-between mb-3">
            <div class="flex gap-3 items-center">
                <p class="text-white text-sm">Show</p>
                <div class="flex items-center bg-grey rounded-xl justify-center py-1 w-[60px] px-1">
                    <input type="text" class=" text-white w-full text-center bg-transparent outline-none">

                </div>
            </div>
            <div></div>
        </div>
    </div>
@endsection