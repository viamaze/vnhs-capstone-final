<div class="mb-6" >
    <h2 class="text-2xl text-center font-bold">Pre-Enrollment</h2>
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
                        <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" wire:model="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('fname') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="mname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                        <input type="text" wire:model="mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('mname') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" wire:model="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('lname') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="mi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MI</label>
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
                        <label for="ext" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ext.</label>
                        <input type="text" wire:model="ext" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('ext') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror

                </div>
                <div class="mb-6 px-2">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        
                        <select wire:model="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>

                        <input type="date" placeholder="dd-mm-yyyy" min="1997-01-01" max="2023-12-31" wire:model="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('dob') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="pob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                    <input type="text" wire:model="pob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('pob') 
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                    </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="mb-6 px-2">
                        <label for="nationality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nationality</label>
                        <select wire:model="nationality" name="nationality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

                        <select wire:model="religion" name="religion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <input type="email" wire:model="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <select wire:model="bloodtype" name="bloodtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        
                        <select wire:model="ethnicity" name="ethnicity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <label for="barangay" name="barangay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                        <select wire:model="barangay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Bagontaas">Bagontaas</option>
                            <option value="Banlag">Banlag</option>
                            <option value="Barobo">Barobo</option>
                            <option value="Batangan">Batangan</option>
                            <option value="Catumbalon">Catumbalon</option>
                            <option value="Colonia">Colonia</option>
                            <option value="Concepcion">Concepcion</option>
                            <option value="Dagat- Kidavao">Dagat- Kidavao</option>
                            <option value="Guinoyuran">Guinoyuran</option>
                            <option value="Kahaponan">Kahaponan</option>
                            <option value="Laligan">Laligan</option>
                            <option value="Lilingayon">Lilingayon</option>
                            <option value="Lourdes">Lourdes</option>
                            <option value="Lumbayao">Lumbayao</option>
                            <option value="Lumbo">Lumbo</option>
                            <option value="Lurogan">Lurogan</option>
                            <option value="Maapag">Maapag</option>
                            <option value="Mabuhay">Mabuhay</option>
                            <option value="Mailag">Mailag</option>
                            <option value="Mt.Nebo">Mt.Nebo</option>
                            <option value="Nabag-o">Nabag-o</option>
                            <option value="Pinatilan">Pinatilan</option>
                            <option value="Poblacion">Poblacion</option>
                            <option value="San Carlos">San Carlos</option>
                            <option value="San Isidro">San Isidro</option>
                            <option value="Sinabuagan">Sinabuagan</option>
                            <option value="Sinayawan">Sinayawan</option>
                            <option value="Sugod">Sugod</option>
                            <option value="Tongantongan">Tongantongan</option>
                            <option value="Tugaya">Tugaya</option>
                            <option value="Vintar">Vintar</option>
                        </select>
                        @error('barangay') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="municipality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipality</label>
                       
                        <select wire:model="municipality" name="municipality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="City of Valencia" selected>City of Valencia</option>
                            <option value="City of Malaybalay">City of Malaybalay</option>
                        </select>
                        @error('municipality') 
                            <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                         @enderror
                </div>
                <div class="mb-6 px-2">
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                        <select wire:model="province" name="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Bukidnon" selected>Bukidnon</option>
                            <option value="Misamis Occidental">Misamis Occidental</option>
                        </select>
                        @error('province') 
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
                <div class="mb-6 px-2">
                    <label for="civil_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Civil Status</label>
                    <select wire:model="civil_status" name="civil_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Single" selected>Single</option>
                        <option value="Single">Married</option>
                        <option value="Single">Divorce</option>
                        <option value="Single">Widower</option>
                    </select>
                    @error('civil_status') 
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
                        <label for="father_fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" wire:model="father_fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('father_fname')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 px-2">
                        <label for="father_mname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                        <input type="text" wire:model="father_mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('father_mname')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 px-2">
                        <label for="father_lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" wire:model="father_lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('father_lname')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-bold">{{ $message }}</span> 
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 px-2">
                        <label for="father_ext" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ext</label>
                        <input type="text" wire:model="father_ext" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('father_ext')
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
                    <label for="mother_fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" wire:model="mother_fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_fname')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_mname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                    <input type="text" wire:model="mother_mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_mname')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" wire:model="mother_lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_lname')
                        <div class="mt-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-bold">{{ $message }}</span> 
                        </div>
                    @enderror
                </div>
                <div class="mb-6 px-2">
                    <label for="mother_ext" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ext</label>
                    <input type="text" wire:model="mother_ext" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('mother_ext')
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
                    <label for="emergency_contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Person</label>
                    <input type="text" wire:model="emergency_contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('emergency_contact')
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
                            <td><strong>{{$fname}}</strong></td>
                        </tr>
    
                        <tr>
                            <td>Address</td>
                            <td><strong>{{$address}}</strong></td>
                        </tr>

                    </table>
                    <div class="my-10">
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click="back(3)">Back</button>

                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="submitForm" type="button">Finish!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>