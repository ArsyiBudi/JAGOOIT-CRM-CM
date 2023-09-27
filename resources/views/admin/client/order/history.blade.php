    @extends('admin.layouts.main')
    @section('container')
    <div class="pt-20 pb-2 lg:pt-0">
    </div>
    <div class=" overflow-auto bg-darkSecondary lg:pt-0 h-[90vh] rounded-md">
        <div class="w-full bg-darkSecondary py-10 px-8 rounded-md ">

            <div class="border-b border-white w-full pb-3 mb-3">
                <h3 class="text-white font-semibold text-3xl">History Order</h3>
            </div>

            <form action="{{ url(request() -> path()) }}" method="get" class=" block md:flex items-start my-4 justify-between mb-3 w-full">
                <div class=" md:block flex items-center justify-between">
                    <div class="flex gap-3 items-center justify-start">
                        <p class="text-white text-xs md:text-sm">Show</p>
                        <div class="flex items-center bg-grey rounded-md md:rounded-lg justify-center py-0 md:py-1 w-[40px] md:w-[60px] px-1">
                            <input name="per_page" type="number" class=" text-white w-full text-center bg-transparent outline-none" placeholder="5">
                        </div>
                        <p class="text-white text-xs md:text-sm">entries</p>
                    </div>
                    <button type="submit"></button>
                </div>
                <div class=" flex items-center gap-5 mt-5 md:mt-0">
                    <p class=" hidden md:block">Search</p>
                    <input type="text" name="search" class=" outline-none bg-white rounded-md w-full md:w-80 py-1 px-2 text-black font-semibold placeholder-gray-400 placeholder-opacity-100 md:placeholder-opacity-0" placeholder="search">
                </div>
            </form>

            <div class=" border-b border-white w-full rounded-lg mt-4"></div>

            <div class=" hide-scrollbar w-full mt-5 h-72 overflow-auto pr-2">
                <table class=" w-full text-xs md:text-sm font-bold ">
                    <thead>
                        <tr>
                            <td class=" p-4" align="center">No</td>
                            <td class=" p-4" align="center">Order ID</td>
                            <td class=" p-4" align="center">Nama Perusahaan</td>
                            <td class=" p-4" align="center">Due Date</td>
                            <td class=" p-4" align="center">Status</td>
                            <td class=" p-4" align="center">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orders -> isEmpty())
                        <tr>
                            <td colspan="8" class="text-white text-center py-4">No Data.</td>
                        </tr>
                        @else
                        @php
                        $count = ($orders->currentPage() - 1) * $orders->perPage() + 1;
                        @endphp
                        @foreach($orders as $order)
                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">{{ $count }}</td>
                            @php
                            $count++;
                            @endphp
                            <td align="center" class=" p-4">{{ $order -> id }}</td>
                            <td align="center" class=" p-4">{{ $order -> leadData -> business_name }}</td>
                            <td align="center" class=" p-4">{{ $order -> due_date }}</td>
                            <td align="center" class=" p-4">
                                <div class="bg-success rounded-md py-1">
                                    {{ $order -> globalParams -> params_name }}
                                </div>
                            </td>
                            <td align="center" class=" p-4">
                                <div class=" flex items-center gap-2 justify-center">
                                    <a href="{{  url('/client/order/detail/'. $order -> id) }}">
                                        <i class=" text-lg cursor-pointer ri-information-line" title="Detail"></i>
                                    </a>
                                    <div class=" block">
                                        <button type="submit" onclick="deleteOrder('{{ $order -> id }}')" class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete" title="Delete"></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class=" flex justify-center items-center gap-3">
                {{ $orders -> links('vendor.pagination.custom-pagination-order') }}
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

    <script>
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
    </script>
    @endsection