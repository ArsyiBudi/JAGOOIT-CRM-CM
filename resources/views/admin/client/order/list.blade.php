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
</style>

@section('container')
<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class=" overflow-auto bg-darkSecondary pt-0 h-screen rounded-md">
    <div class="w-full bg-darkSecondary py-10 px-8 flex  flex-col ">

        <div class="border-b border-white w-full pb-3 mb-3">
            <h3 class="text-white font-semibold text-3xl">Daftar Order</h3>
        </div>

        <form class=" block md:flex items-start my-4 justify-between mb-8 w-full" action="{{ route('fetch_order') }}" method="get">
            <div class=" md:block flex items-center justify-between">
                <div class="flex gap-3 items-center justify-start">
                    <p class="text-white text-xs md:text-sm">Show</p>
                    <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                        <input type="number" id="search" value="{{ old('per_page', $order->perPage()) }}" name="per_page" min="1" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                    </div>
                    <p class="text-white text-xs md:text-sm">entries</p>
                </div>
                <div class="md:mt-5">
                    <a class=" bg-secondary text-sm md:text-[16px] py-1 px-3 md:px-5 rounded-lg mt-0 md:mt-7 hover:scale-95 duration-200" href="{{ url('/client/order/create') }}">New Orders</a>
                </div>
                <button type="submit"></button>
            </div>
            <div class=" flex items-center gap-5 mt-5 md:mt-0">
                <p class=" hidden md:block">Search</p>
                <input type="text" name="search" value="{{ old('per_page', session('order_search')) }}" class=" outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold placeholder-gray-400 placeholder-opacity-100 md:placeholder-opacity-0" placeholder="search">
            </div>
        </form>

        <div class=" hide-scrollbar w-full h-72 overflow-auto pr-2 relative">
            <table class=" w-full text-xs md:text-sm font-bold relative">
                <thead class=" sticky top-0 bg-primary">
                    <tr>
                        <td align="center" class="py-3">No</td>
                        <td align="center" class="py-3 pl-2">Order ID</td>
                        <td align="center" class="py-3 pl-2">Nama Perusahaan</td>
                        <td align="center" class="py-3 pl-2">Due Date</td>
                        <td align="center" class="py-3 pl-1">Status</td>
                        <td align="center" class="py-3 pl-5">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @if($order -> isEmpty())
                    <tr>
                        <td colspan="8" class="text-white text-center py-4">No Data.</td>
                    </tr>
                    @else
                    @php
                    $count = ($order->currentPage() - 1) * $order->perPage() + 1;
                    @endphp
                    @foreach($order as $row)
                    <tr class=" odd:bg-grey">
                        <td align="center" class=" p-4">{{ $count }}</td>
                        @php
                        $count++;
                        @endphp
                        <td align="center" class=" p-4">{{ $row -> id  }}</td>
                        <td align="center" class=" p-4">{{ $row -> leadData -> business_name }}</td>
                        <td align="center" class=" p-4">{{ $row -> due_date }}</td>
                        <td align="center" class=" p-4">
                            <p class='bg-green-700 rounded-md'>{{ $row -> globalParams -> params_name }}</p>
                        </td>
                        <td align="center" class=" p-4">
                            <div class=" flex justify-center items-center gap-2">
                                <div class=" block">
                                    <button onclick="finishOrder('{{ $row -> id }}')" type="button" class="ri-checkbox-circle-line text-2xl cursor-pointer" title="Complete Manual"></button>
                                </div>
                                <a href="{{ route('handle_plan', ['order_id' => $row -> id]) }}">
                                    <i class="ri-calendar-todo-fill text-2xl" title="Plan"></i>
                                </a>
                                <a href="{{ route('detail_order', ['order_id' => $row -> id]) }}">
                                    <i class="ri-information-line text-2xl" title="Detail"></i>
                                </a>
                                <div class="block">
                                    <button type="button" onclick="deleteOrder('{{ $row -> id }}')" class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-center w-full">

            <div class="sticky bottom-0 pb-5 bg-darksecondary flex justify-center items-center gap-3">
                {{ $order -> links('vendor.pagination.custom-pagination-order') }}
            </div>

        </div>
    </div>

    <dialog id="my_modal_3" class="modal  text-white">

        <div class="modal-box bg-grey border-2 border-white w-11/12 max-w-sm flex justify-center items-center flex-col">

            <h1>Kamu akan menghapus data order dengan Order ID : <span id="order_id"></span> ?</h1>

            <div class="flex items-center justify-end gap-4 w-full mt-4">
                <button type="submit" class="text-white bg-red-500 font-medium  py-2 px-3 text-sm  rounded-md" id="cancel" onclick="my_modal_3.close()">Cancel</button>

                <form id="deleteForm" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteOrderId" name="order_id" value="">
                </form>

                <button type="button" class="text-white font-medium bg-green-500   py-2 px-3 text-sm  rounded-md" id="yes" onclick="confirmDelete()">Yes</button>

            </div>

        </div>
    </dialog>

    <dialog id="complete_modal" class="modal  text-white">

        <div class="modal-box bg-grey border-2 border-white w-11/12 max-w-sm flex justify-center items-center flex-col">

            <h1>Kamu akan menyelesaikan order dengan Order ID : <span id="order_id_finish"></span> ?</h1>

            <div class="flex items-center justify-end gap-4 w-full mt-4">
                <button type="submit" class="text-white bg-red-500 font-medium  py-2 px-3 text-sm  rounded-md" id="cancel" onclick="confirmation_modal.close()">Cancel</button>

                <form id="confirmationForm" method="POST" style="display: none;">
                    @csrf
                    @method('patch')
                    <input type="hidden" id="finishOrderId" name="order_id" value="">
                </form>

                <button type="button" class="text-white font-medium bg-green-500   py-2 px-3 text-sm  rounded-md" id="yes" onclick="confirmFinish()">Yes</button>

            </div>

        </div>
    </dialog>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const confirmation_modal = document.getElementById('complete_modal');
        const my_modal_3 = document.getElementById('my_modal_3');

        function showModal() {
            my_modal_3.showModal();
        }

        function deleteOrder(id) {
            document.getElementById('deleteOrderId').value = id;
            document.getElementById('order_id').textContent = id;
            showModal();
        }

        function confirmDelete() {
            const form = document.getElementById('deleteForm');
            form.action = `/client/order/${document.getElementById('deleteOrderId').value}`;
            form.submit();
        }

        //?For finishing order
        function showConfrimationModal() {
            confirmation_modal.showModal();
        }

        function finishOrder(order_id) {
            document.getElementById('finishOrderId').value = order_id;
            document.getElementById('order_id_finish').textContent = order_id;
            showConfrimationModal();
        }

        function confirmFinish(){
            const form = document.getElementById('confirmationForm');
            form.action = `/client/order/${document.getElementById('finishOrderId').value}`;
            form.submit();
        }
    </script>

    @endsection