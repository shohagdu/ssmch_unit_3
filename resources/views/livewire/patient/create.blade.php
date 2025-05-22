<!-- resources/views/livewire/patient-info-form.blade.php -->
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-2xl font-bold mb-6">Patient Information Form</h2>
                </div>
                <div class="text-right">
                    <x-nav-link :href="route('patient.list')" :active="request()->routeIs('patient.list')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded  inline-block">
                        {{ __('Patient Record') }}
                    </x-nav-link>
                </div>
            </div>
            <!-- Success Message -->
            @if (session()->has('message'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Inline Tabs Navigation -->
            <div class="mb-6">
                <ul class="flex flex-wrap border-b">
                    @foreach([
                        ['id' => 'personal', 'label' => 'Personal Information'],
                        ['id' => 'hospital', 'label' => 'Hospital Information'],
                        ['id' => 'medical', 'label' => 'Medical History'],
                        ['id' => 'diagnostic', 'label' => 'Diagnostic Tests'],
                        ['id' => 'surgical', 'label' => 'Surgical Information'],
                        ['id' => 'outcome', 'label' => 'Outcome'],
                    ] as $tab)
                        <li class="-mb-px mr-1">
                            <button
                                wire:click="switchTab('{{ $tab['id'] }}')"
                                class="bg-white inline-block py-2 px-4 font-semibold transition-colors duration-200 @if($currentTab === $tab['id']) border-l border-t border-r rounded-t text-indigo-700 bg-indigo-50 @else text-indigo-500 hover:text-indigo-700 @endif"
                            >
                                {{ $tab['label'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Form with Tab Content -->

                <!-- Personal Information Tab -->
                @if($currentTab === 'personal')
                    <form wire:submit.prevent="submitPersonalInfo" class="space-y-6">
                        <div class="border-b pb-4">
                            <h3 class="text-lg font-semibold mb-4">Personal Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="name" wire:model.debounce.500ms="form.name" placeholder="Enter Patient Name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                                    <input type="text" id="age" wire:model.debounce.500ms="form.age" placeholder="Enter Age Exp 20" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.age') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <select id="gender" wire:model="form.gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                    @error('form.gender') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="religion" class="block text-sm font-medium text-gray-700">Religion</label>
                                    <select id="religion" wire:model="form.religion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Select Religion</option>
                                        @foreach($religions ?? [] as $key => $religion)
                                            <option value="{{ $key }}">{{ $religion }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.religion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
                                    <select id="occupation" wire:model="form.occupation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Select Occupation</option>
                                        @foreach($occupations ?? [] as $key => $occupation)
                                            <option value="{{ $key }}">{{ $occupation }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.occupation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>


                                <div>
                                    <label for="education_status" class="block text-sm font-medium text-gray-700">Education Status</label>
                                    <select id="education_status" wire:model="form.education_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Select Education Status</option>
                                        @foreach($educations ?? [] as $key => $education)
                                            <option value="{{ $key }}">{{ $education }}</option>
                                        @endforeach
                                    </select>

                                    @error('form.education_status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="monthly_income" class="block text-sm font-medium text-gray-700">Monthly Income</label>
                                    <select id="monthly_income" wire:model="form.monthly_income" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Select Monthly Income</option>
                                        @foreach($monthlyIncomes ?? [] as $key => $monthlyIncome)
                                            <option value="{{ $key }}">{{ $monthlyIncome }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.monthly_income') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="district_id" class="block text-sm font-medium text-gray-700">District </label>
                                    <select id="district_id" wire:model="form.district_id" class="select2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Select District</option>
                                        @foreach($districts ?? [] as $key => $district)
                                            <option value="{{ $key }}">{{ $district }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.district_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 my-4">
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <textarea id="address" wire:model.debounce.500ms="form.address" placeholder="Enter Address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                    @error('form.address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                    <input type="text" id="contact_number" placeholder="Enter Conact Number" wire:model.debounce.500ms="form.contact_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.contact_number') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="blood_group" class="block text-sm font-medium text-gray-700">Blood Group</label>
                                    <select id="blood_group" wire:model="form.blood_group" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Select Blood Group</option>
                                        @foreach($bloodGroups ?? [] as $key => $bloodGroup)
                                            <option value="{{ $key }}">{{ $bloodGroup }}</option>
                                        @endforeach
                                    </select>

                                    @error('form.blood_group') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- Submit and Cancel Buttons -->
                            <div class="flex justify-end space-x-4 mt-6">
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit (Personal)</button>
                                <a href="{{ route('patient.list') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                            </div>
                        </div>
                    </form>
                @endif

                <!-- Hospital Information Tab -->
                @if($currentTab === 'hospital')
                    <form wire:submit.prevent="submitHospital" class="space-y-6">
                        <div class="border-b pb-4">
                            <h3 class="text-lg font-semibold mb-4">Hospital Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="hospital_reg_no" class="block text-sm font-medium text-gray-700">Hospital Registration No</label>
                                    <input type="text" id="hospital_reg_no" wire:model.debounce.500ms="form.hospital_reg_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.hospital_reg_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                                    <input type="number" id="unit" wire:model.debounce.500ms="form.unit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.unit') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="ward_no" class="block text-sm font-medium text-gray-700">Ward No</label>
                                    <input type="text" id="ward_no" wire:model.debounce.500ms="form.ward_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.ward_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="bed_no" class="block text-sm font-medium text-gray-700">Bed No</label>
                                    <input type="text" id="bed_no" wire:model.debounce.500ms="form.bed_no" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.bed_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="admission_date" class="block text-sm font-medium text-gray-700">Admission Date</label>
                                    <input type="date" id="admission_date" wire:model.debounce.500ms="form.admission_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.admission_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="discharge_date" class="block text-sm font-medium text-gray-700">Discharge Date</label>
                                    <input type="date" id="discharge_date" wire:model.debounce.500ms="form.discharge_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('form.discharge_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- Submit and Cancel Buttons -->
                            <div class="flex justify-end space-x-4 mt-6">
                                <a href="{{ route('patient.list') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif

                <!-- Medical History Tab -->
                @if($currentTab === 'medical')
                    <div class="border-b pb-4">
                        <h3 class="text-lg font-semibold mb-4">Medical History</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="diagnosis" class="block text-sm font-medium text-gray-700">Diagnosis</label>
                                <input type="number" id="diagnosis" wire:model.debounce.500ms="form.diagnosis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.diagnosis') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="present_illness" class="block text-sm font-medium text-gray-700">Present Illness</label>
                                <input type="text" id="present_illness" wire:model.debounce.500ms="form.present_illness" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.present_illness') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="past_illness" class="block text-sm font-medium text-gray-700">Past Illness</label>
                                <input type="text" id="past_illness" wire:model.debounce.500ms="form.past_illness" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.past_illness') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="comorbidities" class="block text-sm font-medium text-gray-700">Comorbidities</label>
                                <input type="text" id="comorbidities" wire:model.debounce.500ms="form.comorbidities" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.comorbidities') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="family_history" class="block text-sm font-medium text-gray-700">Family History</label>
                                <textarea id="family_history" wire:model.debounce.500ms="form.family_history" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.family_history') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="drug_history" class="block text-sm font-medium text-gray-700">Drug History</label>
                                <textarea id="drug_history" wire:model.debounce.500ms="form.drug_history" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.drug_history') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="previous_drug_history" class="block text-sm font-medium text-gray-700">Previous Drug History</label>
                                <textarea id="previous_drug_history" wire:model.debounce.500ms="form.previous_drug_history" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.previous_drug_history') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="clinical_findings" class="block text-sm font-medium text-gray-700">Clinical Findings</label>
                                <textarea id="clinical_findings" wire:model.debounce.500ms="form.clinical_findings" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.clinical_findings') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Submit and Cancel Buttons -->
                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('patient.list') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </div>
                @endif

                <!-- Diagnostic Tests Tab -->
                @if($currentTab === 'diagnostic')
                    <div class="border-b pb-4">
                        <h3 class="text-lg font-semibold mb-4">Diagnostic Tests</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="cbc_result" class="block text-sm font-medium text-gray-700">CBC Result</label>
                                <textarea id="cbc_result" wire:model.debounce.500ms="form.cbc_result" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.cbc_result') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="s_electrolytes" class="block text-sm font-medium text-gray-700">S. Electrolytes</label>
                                <textarea id="s_electrolytes" wire:model.debounce.500ms="form.s_electrolytes" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.s_electrolytes') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="s_creatinine" class="block text-sm font-medium text-gray-700">S. Creatinine</label>
                                <textarea id="s_creatinine" wire:model.debounce.500ms="form.s_creatinine" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.s_creatinine') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="s_urea" class="block text-sm font-medium text-gray-700">S. Urea</label>
                                <textarea id="s_urea" wire:model.debounce.500ms="form.s_urea" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.s_urea') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="lft" class="block text-sm font-medium text-gray-700">LFT</label>
                                <textarea id="lft" wire:model.debounce.500ms="form.lft" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.lft') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="s_bilirubin" class="block text-sm font-medium text-gray-700">S. Bilirubin</label>
                                <textarea id="s_bilirubin" wire:model.debounce.500ms="form.s_bilirubin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.s_bilirubin') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="sgpt" class="block text-sm font-medium text-gray-700">SGPT</label>
                                <textarea id="sgpt" wire:model.debounce.500ms="form.sgpt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.sgpt') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="sgot" class="block text-sm font-medium text-gray-700">SGOT</label>
                                <textarea id="sgot" wire:model.debounce.500ms="form.sgot" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.sgot') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="ggt" class="block text-sm font-medium text-gray-700">GGT</label>
                                <textarea id="ggt" wire:model.debounce.500ms="form.ggt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.ggt') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="ast" class="block text-sm font-medium text-gray-700">AST</label>
                                <textarea id="ast" wire:model.debounce.500ms="form.ast" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.ast') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="s_albumin" class="block text-sm font-medium text-gray-700">S. Albumin</label>
                                <textarea id="s_albumin" wire:model.debounce.500ms="form.s_albumin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.s_albumin') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="s_lipase" class="block text-sm font-medium text-gray-700">S. Lipase</label>
                                <textarea id="s_lipase" wire:model.debounce.500ms="form.s_lipase" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.s_lipase') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="s_amylase" class="block text-sm font-medium text-gray-700">S. Amylase</label>
                                <textarea id="s_amylase" wire:model.debounce.500ms="form.s_amylase" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.s_amylase') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="blood_glucose" class="block text-sm font-medium text-gray-700">Blood Glucose</label>
                                <textarea id="blood_glucose" wire:model.debounce.500ms="form.blood_glucose" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.blood_glucose') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="x_ray" class="block text-sm font-medium text-gray-700">X-Ray</label>
                                <textarea id="x_ray" wire:model.debounce.500ms="form.x_ray" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.x_ray') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="ecg" class="block text-sm font-medium text-gray-700">ECG</label>
                                <textarea id="ecg" wire:model.debounce.500ms="form.ecg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.ecg') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="usg" class="block text-sm font-medium text-gray-700">USG</label>
                                <textarea id="usg" wire:model.debounce.500ms="form.usg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.usg') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="ct_scan" class="block text-sm font-medium text-gray-700">CT Scan</label>
                                <textarea id="ct_scan" wire:model.debounce.500ms="form.ct_scan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.ct_scan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="mri" class="block text-sm font-medium text-gray-700">MRI</label>
                                <textarea id="mri" wire:model.debounce.500ms="form.mri" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.mri') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="mrcp" class="block text-sm font-medium text-gray-700">MRCP</label>
                                <textarea id="mrcp" wire:model.debounce.500ms="form.mrcp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.mrcp') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="ercp" class="block text-sm font-medium text-gray-700">ERCP</label>
                                <textarea id="ercp" wire:model.debounce.500ms="form.ercp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.ercp') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="endoscopy" class="block text-sm font-medium text-gray-700">Endoscopy</label>
                                <textarea id="endoscopy" wire:model.debounce.500ms="form.endoscopy" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.endoscopy') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="colonoscopy" class="block text-sm font-medium text-gray-700">Colonoscopy</label>
                                <textarea id="colonoscopy" wire:model.debounce.500ms="form.colonoscopy" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.colonoscopy') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="fnac" class="block text-sm font-medium text-gray-700">FNAC</label>
                                <textarea id="fnac" wire:model.debounce.500ms="form.fnac" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.fnac') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="histopathology" class="block text-sm font-medium text-gray-700">Histopathology</label>
                                <textarea id="histopathology" wire:model.debounce.500ms="form.histopathology" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.histopathology') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="immuno_histochemistry" class="block text-sm font-medium text-gray-700">Immuno Histochemistry</label>
                                <textarea id="immuno_histochemistry" wire:model.debounce.500ms="form.immuno_histochemistry" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.immuno_histochemistry') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="genetic_analysis" class="block text-sm font-medium text-gray-700">Genetic Analysis</label>
                                <textarea id="genetic_analysis" wire:model.debounce.500ms="form.genetic_analysis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.genetic_analysis') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="others" class="block text-sm font-medium text-gray-700">Others</label>
                                <textarea id="others" wire:model.debounce.500ms="form.others" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.others') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Submit and Cancel Buttons -->
                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('patient.list') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </div>
                @endif

                <!-- Surgical Information Tab -->
                @if($currentTab === 'surgical')
                    <div class="border-b pb-4">
                        <h3 class="text-lg font-semibold mb-4">Surgical Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name_of_surgeon" class="block text-sm font-medium text-gray-700">Name of Surgeon</label>
                                <input type="text" id="name_of_surgeon" wire:model.debounce.500ms="form.name_of_surgeon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.name_of_surgeon') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="name_of_surgeon_assistant" class="block text-sm font-medium text-gray-700">Name of Surgeon Assistant</label>
                                <input type="text" id="name_of_surgeon_assistant" wire:model.debounce.500ms="form.name_of_surgeon_assistant" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.name_of_surgeon_assistant') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="name_of_operation" class="block text-sm font-medium text-gray-700">Name of Operation</label>
                                <input type="text" id="name_of_operation" wire:model.debounce.500ms="form.name_of_operation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.name_of_operation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="date_of_operation" class="block text-sm font-medium text-gray-700">Date of Operation</label>
                                <input type="date" id="date_of_operation" wire:model.debounce.500ms="form.date_of_operation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.date_of_operation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="name_of_anesthesia" class="block text-sm font-medium text-gray-700">Name of Anesthesia</label>
                                <input type="text" id="name_of_anesthesia" wire:model.debounce.500ms="form.name_of_anesthesia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.name_of_anesthesia') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="operative_findings" class="block text-sm font-medium text-gray-700">Operative Findings</label>
                                <textarea id="operative_findings" wire:model.debounce.500ms="form.operative_findings" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.operative_findings') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Submit and Cancel Buttons -->
                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('patient.list') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </div>
                @endif

                <!-- Outcome Tab -->
                @if($currentTab === 'outcome')
                    <div class="border-b pb-4">
                        <h3 class="text-lg font-semibold mb-4">Outcome</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="date_of_death" class="block text-sm font-medium text-gray-700">Date of Death</label>
                                <input type="date" id="date_of_death" wire:model.debounce.500ms="form.date_of_death" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('form.date_of_death') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="causes_death" class="block text-sm font-medium text-gray-700">Causes of Death</label>
                                <textarea id="causes_death" wire:model.debounce.500ms="form.causes_death" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                @error('form.causes_death') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Submit and Cancel Buttons -->
                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('patient.list') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </div>
                @endif

        </div>
    </div>
</div>
