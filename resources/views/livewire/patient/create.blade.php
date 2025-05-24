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
                        ['id' => 'patient_diseases', 'label' => 'Patient Disease'],
                        ['id' => 'investigation', 'label' => 'Investigation'],
                        ['id' => 'surgical', 'label' => 'Treatment Information'],
                        ['id' => 'outcome', 'label' => 'Follow up'],
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
                    @include('livewire.patient.personal')
                @endif

                <!-- Hospital Information Tab -->
                @if($currentTab === 'hospital')
                    @include('livewire.patient.hospital')
                @endif

                <!-- Medical History Tab -->
                @if($currentTab === 'patient_diseases')
                    @include('livewire.patient.patient_diseases')
                @endif

                <!-- Diagnostic Tests Tab -->
                @if($currentTab === 'investigation')
                    @include('livewire.patient.investigation')
                @endif

                <!-- Surgical Information Tab -->
                @if($currentTab === 'surgical')
                    @include('livewire.patient.treatment_info')
                @endif

                <!-- Outcome Tab -->
                @if($currentTab === 'outcome')
                    @include('livewire.patient.outcome')
                @endif

        </div>
    </div>
</div>
