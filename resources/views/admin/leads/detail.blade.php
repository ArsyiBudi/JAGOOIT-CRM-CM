@extends('admin.layouts.main')

@section('container')
<div class="  pt-20 lg:pt-0 h-screen">
<div class="bg-primary flex flex-col text-lightGrey p-0 lg:p-8 rounded-md space-y-2 w-full h-screen">
        <div class=" py-10 px-8 bg-primary flex flex-col text-lightGrey p-8 rounded-md space-y-2 w-full h-full">
            <div class="text-2xl">Detail Leads</div>
            <div class="flex flex-row text-xs space-x-2">
                <a class="bg-secondary rounded-md px-3 md:px-4 py-1 md:py-2 hover:scale-95 duration-200"  href="{{ url('/leads/activity')}}">Create Activity</a>
                <a class="bg-secondary rounded-md px-3 md:px-4 py-1 md:py-2 hover:scale-95 duration-200" href="{{ url('/leads/offer')}}">Create Offer</a>
            </div>
            @foreach($leads as $data)
            <div class="divide-y divide-slate-50 gap-4 flex flex-col">
                <div class="pt-3">
                    <p>
                       Nama Perusahaan : <span class=" font-bold"> {{ $data -> business_name}}</span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                       Alamat :  <span class=" font-bold"> {{ $data -> address }} </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                       Nama PIC : <span class=" font-bold"> {{ $data ->  pic_name }} </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                        No Telepon PIC : <span class=" font-bold"> {{ $data -> pic_contact_number }} </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                       Aktivitas terakhir: <span class=" font-bold"> Appointment </span>
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                      Status : <span class=" font-bold"> {{ $data -> statusParam -> params_name }} </span>
                    </p>
                </div>
                <hr>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
