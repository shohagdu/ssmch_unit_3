<div class="border-b pb-4">
    <h3 class="text-lg font-semibold mb-4">Investigation Information</h3>
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
