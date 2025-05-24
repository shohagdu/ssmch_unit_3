<div class="border-b pb-4">
    <h3 class="text-lg font-semibold mb-4">Follow Up Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
        <div>
            <table class="table-auto w-full table-bordered border border-gray-300">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Clinical Features</th>
                    <th class="border p-2">Investigation</th>
                    <th class="border p-2">Follow Up Description</th>
                    <th class="border p-2">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $index => $row)
                        <tr>
                            <td class="border p-2">
                                <input type="hidden" wire:model.defer="rows.{{ $index }}.id" class="w-full border rounded p-1">
                                <input type="text" wire:model.defer="rows.{{ $index }}.clinical_features" class="w-full border rounded p-1">
                            </td>
                            <td class="border p-2">
                                <textarea wire:model.defer="rows.{{ $index }}.investigation" class="w-full border rounded p-1"></textarea>
                            </td>
                            <td class="border p-2">
                                <textarea wire:model.defer="rows.{{ $index }}.followup_description" class="w-full border rounded p-1"></textarea>
                            </td>
                            <td class="border p-2">
                                <button type="button"
                                         wire:click="removeFollowUpdRow({{ $index }})"
                                         class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                     Drop
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="p-2">
                        <button type="button" wire:click="addRow" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            + Add New
                        </button>
                    </td>
                </tr>
                </tfoot>
            </table>

            <div class="mt-4">
                <button wire:click="saveFollowUpRecords" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                    Save All
                </button>
            </div>

            @if (session()->has('success'))
                <div class="text-green-600 mt-2">{{ session('success') }}</div>
            @endif
        </div>




{{--        <div>--}}
{{--            <label for="date_of_death" class="block text-sm font-medium text-gray-700">Date of Death</label>--}}
{{--            <input type="date" id="date_of_death" wire:model.debounce.500ms="form.date_of_death" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">--}}
{{--            @error('form.date_of_death') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="causes_death" class="block text-sm font-medium text-gray-700">Causes of Death</label>--}}
{{--            <textarea id="causes_death" wire:model.debounce.500ms="form.causes_death" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>--}}
{{--            @error('form.causes_death') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror--}}
{{--        </div>--}}
    </div>
    <!-- Submit and Cancel Buttons -->
{{--    <div class="flex justify-end space-x-4 mt-6">--}}
{{--        <a href="{{ route('patient.list') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>--}}
{{--        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Submit</button>--}}
{{--    </div>--}}
</div>
