@extends('admin.layouts.main')

<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0em;
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

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

@section('container')
<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class=" overflow-y-auto overflow-x-hidden pt-0 pb-10 lg:pt-0 px-5 md:px-10 h-[90vh]">
    <h1 class=" text-4xl">Training</h1>
    <p class=" text-sm md:text-[16px] font-medium pt-3">Silakan nilai kandidat</p>

    <div class=" mt-5  w-full ">
        <div class=" mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <a class="step step-primary" href="{{ route('fetchRecruitment', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary">
            </a>
            <a class="step" href="{{ route('fetchOffer', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step" href="{{ route('fetchNegosiasi', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step" href="{{ route('fetchPercobaan', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step" href="{{ url('/client/order/plan/'.$order -> id.'/popks') }}">
            </a>
            <a></a>
        </div>
    </div>

    <div class=" mt-5">
        <form action="{{ url(request() -> path()) }}" method="get">
            <div class=" block md:flex justify-between">
                <div class=" relative w-full md:w-auto">
                    <input type="text" name="search" value="{{ old('search', session('talent_search')) }}"
                        class=" bg-[#D9D9D9] outline-none rounded-md text-black py-1  px-8 w-full md:w-auto"
                        placeholder="Search">
                    <i class="ri-search-line absolute top-1 left-2 text-black"></i>
                </div>
            </div>
        </form>

        <div class=" bg-darksecondary w-full px-3 rounded-md mt-4 overflow-auto hide-scrollbar">
            <div class="overflow-auto ">
                <table class="table overflow-auto">
                    <!-- head -->
                    <thead>
                        <tr class=" text-white">
                            <th align="center">No</th>
                            <th align="center">Nama Talent</th>
                            <th align="center">Pre-Test</th>
                            <th align="center">Pre-Test</th>
                            <th align="center">Kelompok</th>
                            <th align="center">Akhir</th>
                            <th align="center">Rata-Rata</th>
                            <th align="center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div>
                            @php
                            $count = ($datas->currentPage() - 1) * $datas->perPage() + 1;
                            @endphp
                            @if ($datas->isEmpty())
                            <p>No data available.</p>
                            @else
                            @foreach($datas as $data)
                            @if($data -> talentData)
                            <tr data-row="{{ $data->id }}">
                                <form action="{{ url(request() -> path() . '/' . $data -> id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <th align="center">{{ $count }}</th>
                                    @php
                                    $count++;
                                    @endphp
                                    <td align="center">{{ $data -> talentData -> name}}</td>
                                    <td align="center">
                                        <div
                                            class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                            <input id='pre-test' name='pre_score' type="number"
                                                value="{{ old('pre_score', @$data -> pre_score) }}"
                                                class='text-black w-full text-center outline-none bg-transparent'
                                                placeholder='nilai'>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <div
                                            class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                            <input id='post-test' name='post_score' type="number"
                                                value="{{ old('pre_score', @$data -> post_score) }}"
                                                class='text-black w-full text-center outline-none bg-transparent'
                                                placeholder='nilai'>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <div
                                            class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                            <input id='nilai-kelompok' name='group_score' type="number"
                                                value="{{ old('pre_score', @$data -> group_score) }}"
                                                class='text-black w-full text-center outline-none bg-transparent'
                                                placeholder='nilai'>
                                        </div>
                                    </td align="center">
                                    <td align="center">
                                        <div
                                            class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                            <input id='nilai-akhir' name='final_score' type="number"
                                                value="{{ old('pre_score', @$data -> final_score) }}"
                                                class='text-black w-full text-center outline-none bg-transparent'
                                                placeholder='nilai'>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <div
                                            class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                            <input disabled id='rata-rata' name='average_score' type="number"
                                                value="{{ old('average_score', ($data->pre_score + $data->post_score + $data->group_score + $data->final_score) / 4) }}"
                                                class='text-black w-full text-center outline-none bg-transparent'
                                                placeholder='0'>
                                        </div>
                                    </td>
                                    <td align="center"><input type="submit"
                                            class="bg-secondary text-white rounded-md w-[82px] h-[25px] cursor-pointer">
                                    </td>
                                </form>
                            </tr>
                            @else
                            No Talent Data
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </tbody>
                </table>
            </div>
            <div class="sticky bottom-0 pb-1 text-sm bg-darkSecondary flex items-center justify-center w-full">
                {{ $datas -> links('vendor.pagination.custom-pagination') }}
            </div>
        </div>

        <div class="mt-2 flex justify-between items-center gap-1 md:gap-0">
            <div>
                <div>
                    <a href="{{ url('/client/order/plan/'. $order -> id . '/recruitment') }}"
                        class="bg-grey text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center hover:scale-95 duration-200">
                        <p class="hidden md:block">Back</p>
                        <i class="ri-arrow-left-line block md:hidden ml-1"></i>
                    </a>
                </div>

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
                    <form method="get" action="{{ route('fetchOffer', ['order_id' => $order -> id]) }}">
                        <button>
                            <div
                                class="bg-grey  text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                                <p class="hidden md:inline">Continue</p>
                                <i class="ri-arrow-right-line block md:hidden"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection