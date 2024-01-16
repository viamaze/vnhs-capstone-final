<div class="mb-6" >
    <h2 class="text-3xl text-center font-bold my-5">VNHS Student Registration</h2>
    @if(!empty($successMessage))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
        <span class="font-bold">{{ $successMessage }}</span>
    </div>

    @endif
    <div class="table w-full relative p-2">


        <div class="table-row before:top-6 before:bottom-0 before:absolute before:content-[' '] before:w-full before:h-0.5 before:bg-gray-300 z-0">
            
            <div class="table-cell text-center relative">
                <a href="#" type="button" class="inline-block font-normal whitespace-nowrap align-middle select-none border border-solid border-transparent transition-colors w-8 h-8 text-center py-1.5 text-xs leading-snug rounded-3xl bg-blue-700 text-white {{ $currentStep != 1 ? 'bg-gray-900 text-white' : 'bg-blue-700' }}" >1</a>
                <p class="my-2.5">Student Information</p>
            </div>
            <div class="table-cell text-center relative">
                <a href="#" type="button" class="inline-block font-normal whitespace-nowrap align-middle select-none border border-solid border-transparent transition-colors w-8 h-8 text-center py-1.5 text-xs leading-snug rounded-3xl bg-blue-700 text-white {{ $currentStep != 2 ? 'bg-gray-900 text-white' : 'bg-blue-700' }}">2</a>
                <p class="my-2.5">Parents Information</p>
            </div>
            <div class="table-cell text-center relative">
                <a href="#" type="button" class="inline-block font-normal whitespace-nowrap align-middle select-none border border-solid border-transparent transition-colors w-8 h-8 text-center py-1.5 text-xs leading-snug rounded-3xl bg-blue-700 text-white {{ $currentStep != 3 ? 'bg-gray-900 text-white' : 'bg-blue-700' }}">3</a>
                <p class="my-2.5">Emergency Contact</p>
            </div>
            <div class="table-cell text-center relative">
                <a href="#" type="button" class="inline-block font-normal whitespace-nowrap align-middle select-none border border-solid border-transparent transition-colors w-8 h-8 text-center py-1.5 text-xs leading-snug rounded-3xl bg-blue-700 text-white {{ $currentStep != 4 ? 'bg-gray-900 text-white' : 'bg-blue-700' }}">4</a>
                <p class="my-2.5">Submit</p>
            </div>
        </div>
    </div>
        <div class="{{ $currentStep != 1 ? 'hidden' : '' }} " id="step-1">
            <h3 class="mb-2 text-2xl text-center font-bold">Student Information</h3>
            <div class="grid grid-cols-4">

                <div class="mb-6 px-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade Level</label>
                    <select wire:model="level_id" name="level_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Select Grade Level</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                        @endforeach
                    </select>
                    @error('level_id') 
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-4">
                
                <div class="mb-6 px-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" wire:model="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('firstname') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                        <input type="text" wire:model="middlename" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('middlename') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" wire:model="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('lastname') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>

                <div class="mb-6 px-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M.I.</label>
                    <input type="text" wire:model="mi" maxlength="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mi') 
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                     @enderror
                </div>

            </div>
            <div class="grid grid-cols-4">


                <div class="mb-6 px-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suffix</label>
                    <select wire:model="suffix" name="suffix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Select Suffix</option>
                        <option value="Jr.">Jr.</option>
                        <option value="Sr.">Sr.</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>    
                    </select>
                    @error('suffix') 
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                     @enderror

                </div>

                <div class="mb-6 px-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Civil Status</label>
                    <select wire:model="civil_status" name="civil_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorce">Divorce</option>
                        <option value="Widower">Widower</option>
                    </select>
                    @error('civil_status') 
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>

                <div class="mb-6 px-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                    
                    <select wire:model="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender') 
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                     @enderror
            </div>
            
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>

                        <input type="date" name="date_of_birth" placeholder="dd-mm-yyyy" min="1980-01-01" max="2023-12-31" wire:model="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('date_of_birth') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                    <input type="text" wire:model="place_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('place_of_birth') 
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                    </div>
            </div>

            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                        <label for="nationality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nationality</label>
                        <select id="nationality" wire:model="nationality" name="nationality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Nationality</option>
                            <option value="Filipino">Filipino</option>
                            <option value="American">American</option>
                        </select>

                        @error('nationality') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="religion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Religion</label>

                        <select id="religion" wire:model="religion" name="religion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Religion</option>
                            <option value="Roman Catholic">Roman Catholic</option>
                            <option value="Baptist">Baptist</option>
                            <option value="SDA">SDA</option>
                            <option value="Muslim">Muslim</option>
                        </select>

                        @error('religion') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                        <input id="email" type="email" wire:model="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('email') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="contact_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                        <input type="text" wire:model="contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('contact_number') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                        <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height</label>
                        <input type="text" wire:model="height" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('height') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
                        <input type="text" wire:model="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('weight') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="bloodtype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blood Type</label>
                        <select id="bloodtype" wire:model="bloodtype" name="bloodtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Blood Type</option>
                            <option value="Type A">Type A</option>
                            <option value="Type B">Type B</option>
                            <option value="Type AB">Type AB</option>
                            <option value="B Negative">B Negative</option>
                            <option value="B Positive">B Positive</option>
                            <option value="Type O">Type O</option>
                            <option value="O Negative">O Negative</option>
                        </select>
                        @error('bloodtype') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="ethnicity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ethnicity</label>
                        
                        <select id="ethnicity" wire:model="ethnicity" name="ethnicity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Ethnicity</option>
                            <option value="Cebuano">Cebuano</option>
                            <option value="Ilonggo">Ilonggo</option>
                            <option value="Tagalog">Tagalog</option>
                            <option value="Ilocano">Ilocano</option>
                            <option value="Ilocano">Bisaya</option>
                        </select>
                        @error('ethnicity') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" wire:model="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('address') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="barangay_id" name="barangay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                        <select id="barangay_id" wire:model="barangay_id" name="barangay_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Barangay</option>
                            @foreach($barangays as $barangay)
                                <option value="{{ $barangay->id }}">{{ $barangay->barangay }}</option>
                            @endforeach
                        </select>
                        @error('barangay') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="municipality_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipality</label>
                       
                        <select id="municipality_id" wire:model="municipality_id" name="municipality_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Municipality</option>
                            @foreach($municipalities as $municipality)
                                <option value="{{ $municipality->id }}">{{ $municipality->municipality }}</option>
                            @endforeach
                        </select>
                        @error('municipality') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="province_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                        <select id="province_id" wire:model="province_id" name="province_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Province</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->province }}</option>
                            @endforeach
                        </select>
                        @error('province_id') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                        <label for="zipcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip Code</label>
                        <input type="text" wire:model="zipcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('zipcode') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>

            </div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="firstStepSubmit" type="button" >Next</button>
        </div>
    
        <div class="{{ $currentStep != 2 ? 'hidden' : '' }}" id="step-2">
            <h3 class="mb-2 text-2xl text-center font-bold">Parents Information</h3>
            <div class="grid cols">
                <h3 class="text-xl">Father Information</h3>
            </div>
             <div class="grid grid-cols-4">
                    <div class="mb-6 px-2">
                        <label for="father_first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" wire:model="father_first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('father_first_name')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 px-2">
                        <label for="father_middle_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                        <input type="text" wire:model="father_middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('father_middle_name')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 px-2">
                        <label for="father_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" wire:model="father_last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('father_last_name')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
            </div>

            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                    <label for="father_dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                   
                    <input type="date" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31" wire:model="father_dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('father_dob')
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="father_occupation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Occupation</label>
                    <input type="text" wire:model="father_occupation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('father_occupation')
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="father_monthlyincome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Income</label>
                    <input type="text" wire:model="father_monthlyincome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('father_monthlyincome')
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="father_yearlycomp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Yearly Compensation</label>
                    <input type="text" wire:model="father_yearlycomp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('father_yearlycomp')
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                    <label for="father_contactno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                    <input type="text" wire:model="father_contactno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('father_contactno')
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="father_educational" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educational Attainment</label>
                    <input type="text" wire:model="father_educational" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('father_educational')
                    <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="father_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" wire:model="father_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('father_address')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid cols">
                <h3 class="text-xl">Mother Information</h3>
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                    <label for="mother_first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" wire:model="mother_first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_first_name')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_middle_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                    <input type="text" wire:model="mother_middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_middle_name')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" wire:model="mother_last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_last_name')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                    <label for="mother_dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                    <input type="date" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31" wire:model="mother_dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_dob')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_occupation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Occupation</label>
                    <input type="text" wire:model="mother_occupation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_occupation')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_monthlyincome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Income</label>
                    <input type="text" wire:model="mother_monthlyincome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_monthlyincome')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_yearlycomp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Yearly Compensation</label>
                    <input type="text" wire:model="mother_yearlycomp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_yearlycomp')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                    <label for="mother_contactno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                    <input type="text" wire:model="mother_contactno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_contactno')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_educational" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Educational Attainment</label>
                    <input type="text" wire:model="mother_educational" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_educational')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" wire:model="mother_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_address')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
            </div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click="back(1)">Back</button>

            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click="secondStepSubmit">Next</button>
        </div>
        <div class="{{ $currentStep != 3 ? 'hidden' : '' }}" id="step-3">
            <h3 class="mb-2 text-2xl text-center font-bold">Emergency Contact Details</h3>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                    <label for="emergency_contact_person" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Person</label>
                    <input type="text" wire:model="emergency_contact_person" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('emergency_contact_person')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2"> 
                    <label for="emergency_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" wire:model="emergency_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('emergency_address')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>

                <div class="mb-6 px-2"> 
                    <label for="emergency_mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number</label>
                    <input type="text" wire:model="emergency_mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('emergency_mobile')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
            </div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click="back(2)">Back</button>

            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click="thirdStepSubmit">Next</button>
        </div>
    
        <div class="{{ $currentStep != 4 ? 'hidden' : '' }}" id="step-4">
            <div class="mb-6">
                <div class="mb-6">
                    <h3 class="mb-2 text-2xl text-center font-bold">Confirm </h3>

                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td><strong>{{$firstname}}</strong></td>
                        </tr>
    
                        <tr>
                            <td>Address</td>
                            <td><strong>{{$address}}</strong></td>
                        </tr>

                    </table>
                    <div class="my-10">
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click="back(3)">Back</button>

                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click.prevent="submitForm" type="button">Finish!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>