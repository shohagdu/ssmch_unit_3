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
