@extends('admin.layouts.main')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>


@if(session()->has('error'))
<div class="alert alert-error absolute top-10 right-10 w-auto animate-slide-up text-white font-medium border-2 border-red-500 cursor-pointer" onclick="closeAlert()">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>{{ session('error') }}</span>
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success absolute top-10 right-10 w-auto animate-slide-up text-white font-medium border-2 border-green-300 cursor-pointer" onclick="closeAlert()">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>{{ session('success') }}</span>
</div>
@endif

@section('container')
<div class="pt-20 lg:pt-0">
</div>
<div class="overflow-auto pt-0 h-[90vh] w-full rounded-md hide-scrollbar">
    <div class="bg-darkSecondary flex flex-col px-8 py-10 h-[90vh]">
        <form action="{{ url(request() -> path()) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="flex flex-col text-lightGrey space-y-2">
                <div class=" flex justify-between">
                    <div class="text-2xl">Edit Leads</div>
                    <div class=" font-bold hover:scale-95 duration-200">
                        <button class=" bg-success bg-opacity-95  rounded-md py-1 px-5 " type="submit">Save</button>
                    </div>
                </div>
                <div class="divide-y divide-slate-50 gap-4 flex flex-col">
                    <div class="pt-3 flex items-center gap-1 md:gap-2">
                         <p class="text-xs md:text-[16px]">
                        Nama Perusahaan :
                        </p>
                        <div>
                            <input name="business_name" type="text" required class=" bg-transparent outline-none" value="{{ old('business_name', @$lead -> business_name) }}">
                        </div>
                    </div>
                    <div class="pt-3 flex items-center gap-1 md:gap-2">
                         <p class="text-sm md:text-[16px]">
                        Alamat : 
                        </p>
                        <div>
                            <input name="address" type="text" required class=" bg-transparent outline-none" value="{{ old('business_name', @$lead -> address) }}">
                        </div>
                    </div>
                    <div class="pt-3 flex items-center gap-1 md:gap-2">
                         <p class="text-sm md:text-[16px]">
                        Nama PIC :
                        </p>
                        <div>
                            <input name="pic_name" type="text" required class=" bg-transparent outline-none" value="{{ old('business_name', @$lead -> pic_name) }}">
                        </div>
                    </div>
                    <div class="pt-3 flex items-center gap-1 md:gap-2">
                        <p class="text-sm md:text-[16px]">
                            No Telepon PIC :
                        </p>
                        <div>
                            <input name="pic_contact_number" type="number" required class=" bg-transparent outline-none" value="{{ old('business_name', @$lead -> pic_contact_number) }}">
                        </div>
                    </div>
                    <div class="pt-3 flex items-center justify-between">
                        <div class=" flex items-center gap-1 md:gap-2">
                              <p class="text-sm md:text-[16px]">
                                Email :
                            </p>
                            <button class=" font-bold underline" onclick="my_modal_3.showModal()">Lihat Email</button>  
                        </div>  
                        <div class="" onclick="my_modal_3.showModal()">
                            <p class=" px-5 py-1 bg-success rounded-md font-bold text-2xl cursor-pointer hover:scale-95 duration-200">+</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </form>
    </div>
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box bg-primary">
            <form method="dialog" class=" flex items-center justify-end">
                <button class="">✕</button>
            </form>
             <div class=" hide-scrollbar w-full mt-5 max-h-96 overflow-auto">
                <table class=" w-full text-xs md:text-sm font-bold ">
                    <thead class="bg-darkSecondary sticky top-0">
                        <tr>
                            <td class=" p-2" align="center">No</td>
                            <td class=" p-2" align="center">Email</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(@$lead -> hasOneEmail)
                            @foreach($lead -> emails as $email)
                                <tr class=" odd:bg-grey">
                                    <td align="center" class=" p-4">{{ isset($i) ? ++$i : $i = 1 }}</td>
                                    <td align="center" class=" p-4">{{ $email -> email_name }}</td>
                                </tr>
                            @endforeach
                        @else
                            {{ $lead -> business_name }} has No Email
                        @endif
                    </tbody>
                </table>
            </div>
           <form action="{{ url(request() -> path()) }}" method="post" class=" my-3 w-full">
            @csrf
            <div class=" flex w-full " >
                <input autofocus required name="email_name" type="email" class=" bg-grey outline-none w-full py-1 px-2" placeholder="Tambah Email">
                <div>
                    <button type="submit" class=" bg-grey py-2 px-3 text-sm underline ">Save</button>
                </div>
            </div>
           </form>
        </div>
    </dialog>
</div>  
@endsection
