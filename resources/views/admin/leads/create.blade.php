@extends('admin.layouts.main')
@section('container')
    <div class="hide-scrollbar overflow-auto pt-28 lg:pt-0 h-screen w-full">
        <form class="w-full bg-darkSecondary py-10 px-8 rounded-md" action="{{ route('create_leads') }}" method="post">
            @csrf
            <div class="px-0 md:px-5 py-0 md:py-4 overflow-auto">
                <div class="mb-2 text-3xl pb-5 border-white border-b "> 
                    <h1>Create Leads</h1> 
                </div>

                <div class="flex flex-col w-full gap-5 md:gap-8">
                    <div class=" block md:flex w-full gap-14 mt-2 md:mt-0" >
                        <div class="">
                            <h4 class=" text-sm md:text-[16px]">Nama Perusahaan</h4>
                            <input required type="text" placeholder="Nama Perusahaan" name="business_name" class="text-black bg-white rounded-lg mt-2 w-full md:w-96  py-3 px-3 outline-none">
                        </div>

                        <div class=" mt-3 md:mt-0">
                            <h4  class=" text-sm md:text-[16px]">Email</h4>
                            <div class=" flex items-start  gap-5">
                                <div id="inputContainer" class="">
                                    <div class="">
                                        <input type="email" class="text-black bg-white rounded-lg mt-2 w-full lg:w-96 py-3 px-3 outline-none" placeholder="Email 1" name="input_1" id="1" required>
                                    </div>
                                </div>
                                <div>
                                    <div class=" bg-secondary py-2 px-4 rounded-md hover:scale-95 duration-200 cursor-pointer mt-2" id="addInputBtn">
                                        <i class="ri-add-line"></i>
                                    </div>
                                    <div class="bg-secondary py-2 px-4 rounded-md hover:scale-95 duration-200 cursor-pointer mt-2 hidden" id="deleteInputBtn">
                                        <i class="ri-delete-bin-2-line"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" block md:flex w-full  gap-14">
                        <div class="">
                            <h4 class="mb-1 text-sm md:text-[16px]">Alamat Perusahaan</h4>
                            <input required placeholder="Alamat Perusahaan" type="text" name="address" class="text-black bg-white rounded-lg w-full md:w-96  py-6 px-3 outline-none">
                        </div>

                        <div class=" mt-3 md:mt-0">
                            <h4 class="mb-1 text-sm md:text-[16px]">Bidang</h4>
                            <input required placeholder="Bidang" type="text" name="business_sector" class="bg-white text-black rounded-lg w-full  lg:w-96  py-6 px-3 outline-none">
                        </div>
                    </div>

                      <div class=" block md:flex w-full  gap-14">
                        <div class="">
                            <h4 class="mb-1 text-sm md:text-[16px]">Nama PIC</h4>
                            <input required placeholder="Nama PIC" type="text" name="pic_name" class="bg-white text-black rounded-lg w-full md:w-96  py-3 px-3 outline-none">
                        </div>

                        <div class=" mt-3 md:mt-0">
                            <h4 class="mb-1 text-sm md:text-[16px]">Nomor Kontak PIC</h4>
                            <input required placeholder="089xxxxxxxxx" type="number" name="pic_contact_number" class="bg-white text-black rounded-lg mt-1 w-full  lg:w-96  py-3 px-3 outline-none">
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-between gap-5 md:gap-0 w-full"> 
                    <a href="/leads">
                        <button type="button" class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[97px] hover:scale-95 duration-200">Back</button>
                    </a>
                    <input type="submit"  value="Create" class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[198px]  hover:scale-95 duration-200"/>
                </div>
            </div>
        </form>
    </div>

    <script>
        const deleteButton = document.getElementById('deleteInputBtn');

        function generateInputFields() {
            const inputContainer = document.getElementById('inputContainer');
            const manyChild = inputContainer.children.length

            const newDiv = document.createElement('div')
            const inputField = document.createElement('input');
            inputField.type = 'email';
            inputField.name = `input_${manyChild + 1}`;
            inputField.placeholder = `Email ${manyChild + 1}`;
            inputField.id = `${manyChild + 1}`
            inputField.className = 'text-black bg-white rounded-lg mt-2 w-full lg:w-96 py-3 px-3 outline-none';
            inputField.required = true;

            newDiv.appendChild(inputField)
            inputContainer.appendChild(newDiv);

            const deleteButton = document.getElementById('deleteInputBtn');
            if ( inputContainer.children.length > 1) {
                deleteButton.classList.remove('hidden');
            } else {
                deleteButton.classList.add('hidden');
            }
        }

        function addNewInput() {
            generateInputFields();
        }

        function deleteLastInput() {
            const    inputCon = document.getElementById('inputContainer');
            inputCon.removeChild(inputCon.lastChild);
            
            if ( inputCon.children.length == 1) {
                deleteButton.classList.add('hidden');
            }
        }

        document.getElementById('addInputBtn').addEventListener('click', addNewInput);
        document.getElementById('deleteInputBtn').addEventListener('click', deleteLastInput);
    </script>

@endsection
