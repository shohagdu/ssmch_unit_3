<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Posts (Laravel 11 Livewire CRUD with Jetstream & Tailwind CSS - ItSolutionStuff.com)
    </h2>
</x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

{{--                <x-nav-link :href="route('patient-info.create')" :active="request()->routeIs('patient-info.create')">--}}
{{--                    {{ __('Patient Info') }}--}}
{{--                </x-nav-link>--}}
                <x-nav-link :href="route('patient.create')" :active="request()->routeIs('patient.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                    {{ __('Create Patient') }}
                </x-nav-link>

            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2">Patient ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Contact Number</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
