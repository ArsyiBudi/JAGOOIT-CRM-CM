@extends('admin.layouts.main')

<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0.4em;
        /* Width of the scrollbar */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb {
        background-color: #555555;
        /* Color of the scrollbar thumb */
        border-radius: 8px;
        /* Rounded corners for the scrollbar thumb */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #777777;
        /* Color of the scrollbar thumb on hover */
    }

    .hide-scrollbar::-webkit-scrollbar-track {
        background-color: #555555;
        /* Color of the scrollbar track */
    }

    .hide-scrollbar::-webkit-scrollbar-track:hover {
        background-color: #666666;
        /* Color of the scrollbar track on hover */
    }

    /* Customize the appearance of the scrollbar wheel */
    .hide-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #555555 #333333;
    }

    /* Customize the appearance of the scrollbar thumb icon */
    .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
        background-color: #fff;
        /* Color of the scrollbar thumb icon */
    }

    .custom-date-input::-webkit-calendar-picker-indicator {
        filter: invert(1);
        /* This inverts the icon color */
    }

    .hide-scrollbar::-webkit-scrollbar {
        width: 0;
    }
        /* Width of the scrollbar */
        .animate-slide-up {
    animation: slide-up 0.3s ease-in-out;
}

@keyframes slide-up {
    0% {
        transform: translateY(-10px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>

@section('container')
<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class="overflow-y-auto overflow-x-hidden pt-0 pb-10 lg:pt-0 px-5 lg:px-10 h-[90vh]">
    <h1 class=" text-4xl">Appointment Negosiasi</h1>
    <p class=" text-[16px] font-medium pt-3">Silakan set appointment</p>

    <div class=" mt-5  w-full overflow-auto md:overflow-hidden">
        <div class=" mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <a class="step step-primary" href="{{ route('fetchRecruitment', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary" href="{{ route('fetchTraining', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary" href="{{ route('fetchOffer', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary">
            </a>
            <a class="step" href="{{ route('fetchPercobaan', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step" href="{{ route('fetchPopks', ['order_id' => $order -> id]) }}">
            </a>
            <a></a>
        </div>
    </div>
    <div class=" mt-5">
        <form action="{{ url(request()->path()) }}" method="post" onsubmit="showModal()">
            @csrf
            @method('patch')
            <div class="flex flex-col bg-grey p-9 mt-6 rounded-lg gap-2 border-2 border-white  w-full" id="createSection">
                @if($order -> leadData -> hasOneEmail)
                <div class="w-full">
                    <select required name="email_name" id="email" class="mb-4 bg-transparent border m-1 btn p-2 outline-none border-spacing-1 rounded-md py-1 text-1xl hover:bg-gray-300 hover:text-darkSecondary text-white">
                        <option value="" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Select Email</option>
                        @foreach($order -> leadData -> emails as $email) 
                        <option value="{{ $email -> email_name }}" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">{{  $email -> email_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bg-white opacity-70 p-2 rounded-md w-full">
                    <textarea name="judul" id="judul"
                        class="text-black opacity-100 w-full p-2 bg-transparent outline-none resize-none"
                        placeholder="Judul" required>@if(@$negosiasi->xs1){{@$negosiasi->xs1}}@endif</textarea>
                </div>
                <div class="flex flex-row max-sm:flex-wrap gap-2 w-full">
                    <div class="bg-white opacity-70 rounded-md flex-auto p-2">
                        <textarea name="lokasi" id="lokasi"
                            class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Lokasi"
                            required>@if(@$negosiasi->xs2){{@$negosiasi->xs2}}@endif</textarea>
                    </div>
                    <div class="bg-white opacity-70 rounded-md flex-auto p-2">
                        <input required name="waktu" id="waktu" type="date" value="{{old('waktu',@$negosiasi->xd)}}"
                            class="bg-transparent text-black p-2 w-full outline-none resize-none"
                            placeholder="Waktu">
                    </div>
                </div>
                <div class="bg-white opacity-70 rounded-md w-full p-2">
                    <textarea required name="deskripsi" id="deskripsi"
                        class="bg-transparent outline-none p-2 text-black resize-none w-full"
                        placeholder="Deskripsi">@if(@$negosiasi->desc){{@$negosiasi->desc}}@endif</textarea>
                </div>
                <div class="w-[97px] mx-auto mt-2">
                    <input type="submit" class="bg-secondary  text-white rounded-md px-4 py-2 h-10 cursor-pointer">
                </div>
                @else
                <div class="grid justify-center justify-items-center gap-2">
                    {{ $order -> leadData -> business_name }} has no Email
                    <a href="{{ url('leads/'. $order -> leadData -> id . '/edit') }}" class="bg-secondary text-white text-sm py-1 px-2 md:px-14 rounded-md font-bold flex items-center hover:scale-95 duration-200">Edit Leads</a>
                </div>
                @endif
            </div>
        </form>

        <div class="flex justify-between items-center pt-4 md:mb-0">
            <div>
                <a href="{{ url('/client/order/plan/'.$order -> id.'/penawaran') }}">
                    <div
                        class="bg-grey text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                        <p class=" hidden md:inline">Back</p>
                        <i class="ri-arrow-left-line inline md:hidden"></i>
                    </div>
                </a>
            </div>

            <div class="flex gap-4 max-sm:w-full max-sm:justify-between">
                <div></div>
                <div>
                    <form action="{{ url(request() -> path()) }}" method="POST">
                        @csrf
                        <button type="submit" name="save"
                            class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">
                            <p class="hidden md:block">Save</p>
                            <i class="ri-save-line block md:hidden"></i>
                        </button>
                    </form>
                </div>

                <div>
                    <a href="{{ url('/client/order/plan/'.$order -> id .'/percobaan') }}">
                        <div
                            class=" bg-grey text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                            <p class="hidden md:inline">continue</p>
                            <i class="ri-arrow-right-line block md:hidden"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<dialog id="my_modal_5" class="modal  text-white">

    <div class="modal-box bg-grey border-2 border-white w-11/12 max-w-xs flex justify-center items-center">

        <h1>Email sedang dikirim...</h1>

        {{-- <div onclick="closeAlrt()">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" onclick="closeAlrt()"/></svg>
        </div> --}}

    </div>
</dialog>


<script>
    const my_modal_5 = document.getElementById('my_modal_5');

    function showModal() {
        my_modal_5.showModal();
    }
    
    function closeAlrt() {
        my_modal_5.close();
    }
</script>
@endsection