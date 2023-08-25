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
                       {{ $data -> business_name}}
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                        {{ $data -> address }}
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                        {{ $data ->  pic_name }}
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                        {{ $data -> pic_contact_number }}
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                        Appointment
                    </p>
                </div>
                <div class="pt-3">
                    <p>
                        {{ $data -> statusParam -> params_name }}
                    </p>
                </div>
                <hr>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
