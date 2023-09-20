@extends('admin.layouts.main')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

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

<div class="pt-20 lg:pt-0">
</div>
<div class="overflow-auto pt-0 h-[90vh] w-full rounded-md hide-scrollbar">
    <div class="bg-darkSecondary flex flex-col px-8 py-10 h-[90vh]">
        <form action="{{ url(request() -> path()) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="flex flex-col text-lightGrey space-y-2">
                <div class=" flex justify-between">
                    <div class="text-2xl">Edit {{ $subject }}</div>
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
                            <input name="address" type="text" required class=" bg-transparent outline-none md:w-[600px] w-[250px]" value="{{ old('business_name', @$lead -> address) }}">
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
                            <input name="pic_contact_number" required class=" bg-transparent outline-none" value="{{ old('business_name', @$lead -> pic_contact_number) }}">
                        </div>
                    </div>
                    <div class="pt-3 flex items-center justify-between">
                        <div class=" flex items-center gap-1 md:gap-2">
                            <p class="text-sm md:text-[16px]">
                                Email :
                            </p>
                            <a class="cursor-pointer font-bold underline" onclick="showEmail()">Lihat Email</a>
                        </div>
                        <div class="" onclick="showModal()">
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
                            <td class="p-2" align="center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(@$lead -> hasOneEmail)
                        @foreach($lead -> emails as $email)
                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">{{ isset($i) ? ++$i : $i = 1 }}</td>
                            <td align="center" class=" p-4">{{ $email -> email_name }}</td>
                            <td align="center" class="p-4">
                                <form action="{{ url(request() -> path() . '/' . $email -> id) }}" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" align="center" class="py-10">{{ $lead -> business_name }} has no email</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <form id="form_email" action="{{ url(request() -> path()) }}" method="post" class=" my-3 w-full">
                @csrf
                <div class=" flex w-full ">
                    <input autofocus required type="email" name="email_name" class=" bg-grey outline-none w-full py-1 px-2" placeholder="Tambah Email">
                    <div>
                        <button type="submit" class=" bg-grey py-2 px-3 text-sm border-l-2 border-white">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>
</div>

<script>
    const my_modal_3 = document.getElementById('my_modal_3');
    const form_email = document.getElementById('form_email');

    function showEmail() {
        showModal();
        form_email.style.display = "none"
    }

    function showModal() {
        my_modal_3.showModal();
        form_email.style.display = "block";
    }
</script>
@endsection