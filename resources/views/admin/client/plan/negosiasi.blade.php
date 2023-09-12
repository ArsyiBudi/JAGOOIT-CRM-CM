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
</style>

@section('container')
<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class="overflow-y-auto overflow-x-hidden pt-0 pb-10 lg:pt-0 px-5 lg:px-10 h-[90vh]">
    <h1 class=" text-4xl">Appointment Negosiasi</h1>
    <p class=" text-[16px] font-medium pt-3">Silakan set appointment</p>

    <div class=" mt-5  w-full overflow-auto md:overflow-hidden">
        <ul class=" mx-0 md:mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
            </li>
            <li class="step">
            </li>
            <li class="step"></li>
            <li></li>
        </ul>
    </div>
    <div class=" mt-5">
        <form action="">
            <div class="flex flex-col bg-grey p-9 mt-6 rounded-lg gap-2 border-2 border-white  w-full"
                id="createSection">
                <div class="bg-white opacity-70 p-2 rounded-md w-full">
                    <textarea name="judul" id="judul"
                        class="text-black opacity-100 w-full p-2 bg-transparent outline-none resize-none"
                        placeholder="Judul" required></textarea>
                    <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                </div>
                <div class="flex flex-row max-sm:flex-wrap gap-2 w-full">
                    <div class="bg-white opacity-70 rounded-md flex-auto p-2">
                        <textarea name="lokasi" id="lokasi"
                            class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Lokasi"
                            required></textarea>
                    </div>
                    <div class="bg-white opacity-70 rounded-md flex-auto p-2">
                        <textarea required name="waktu" id="waktu"
                            class="bg-transparent text-black p-2 w-full outline-none resize-none"
                            placeholder="Waktu"></textarea>
                    </div>
                </div>
                <div class="bg-white opacity-70 rounded-md w-full p-2">
                    <textarea required name="deskripsi" id="deskripsi"
                        class="bg-transparent outline-none p-2 text-black resize-none"
                        placeholder="Deskripsi"></textarea>
                    <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                </div>
                <div class="w-[97px] mx-auto mt-2">
                    <input type="submit" class="bg-secondary  text-white rounded-md px-4 py-2 h-10 cursor-pointer">
                </div>
            </div>
        </form>

        <div class="flex justify-between items-center pt-4 md:mb-0">
            <div>
                <a href="{{ url('/client/order/plan/'.$order_id.'/penawaran') }}">
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
                    <a href="{{ url('/client/order/plan/'.$order_id.'/percobaan') }}">
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
@endsection