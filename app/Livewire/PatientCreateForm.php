<?php

namespace App\Livewire;

use App\Models\AllSetting;
use App\Models\District;
use Livewire\Component;
use App\Models\Patient;

class PatientCreateForm extends Component
{

    public $form = [
//        'patient_id' => '',
//        'name' => '',
//        'age' => '',
//        'gender' => '',
//        'district_id' => '',
//        'address' => '',
//        'religion' => '',
//        'occupation' => '',
//        'education_status' => '',
//        'monthly_income' => '',
//        'pt_contact_number' => '',
//        'blood_group' => '',
//        'hospital_reg_no' => '',
//        'unit' => '',
//        'ward_no' => '',
//        'bed_no' => '',
//        'admission_date' => '',
//        'discharge_date' => '',
//        'diagnosis' => '',
//        'present_illness' => '',
//        'past_illness' => '',
//        'comorbidities' => '',
//        'family_history' => '',
//        'drug_history' => '',
//        'previous_drug_history' => '',
//        'clinical_findings' => '',
//        'cbc_result' => '',
//        's_electrolytes' => '',
//        's_creatinine' => '',
//        's_urea' => '',
//        'lft' => '',
//        's_bilirubin' => '',
//        'sgpt' => '',
//        'sgot' => '',
//        'ggt' => '',
//        'ast' => '',
//        's_albumin' => '',
//        's_lipase' => '',
//        's_amylase' => '',
//        'blood_glucose' => '',
//        'x_ray' => '',
//        'ecg' => '',
//        'usg' => '',
//        'ct_scan' => '',
//        'mri' => '',
//        'mrcp' => '',
//        'ercp' => '',
//        'endoscopy' => '',
//        'colonoscopy' => '',
//        'fnac' => '',
//        'histopathology' => '',
//        'immuno_histochemistry' => '',
//        'genetic_analysis' => '',
//        'others' => '',
//        'name_of_surgeon' => '',
//        'name_of_surgeon_assistant' => '',
//        'name_of_operation' => '',
//        'date_of_operation' => '',
//        'name_of_anesthesia' => '',
//        'operative_findings' => '',
//        'date_of_death' => '',
//        'causes_death' => '',
    ];

    public function submit()
    {
        //dd($this->form);
        $this->validate([
//            'form.patient_id' => 'required|integer|unique:patient_info,patient_id',
            'form.name' => 'required|string|max:300',
            'form.age' => 'required|integer|min:0|max:255',
            'form.gender' => 'required|in:1,2,3',
            'form.district_id' => 'required|integer',
//            'form.address' => 'required|string',
//            'form.religion' => 'required|integer|min:0|max:255',
//            'form.occupation' => 'required|integer',
//            'form.education_status' => 'required|integer',
//            'form.monthly_income' => 'required|integer',
//            'form.pt_contact_number' => 'required|string|max:50',
//            'form.blood_group' => 'required|string|max:10',
//            'form.hospital_reg_no' => 'required|string|max:50',
//            'form.unit' => 'required|integer|min:0|max:255',
//            'form.ward_no' => 'required|string|max:50',
//            'form.bed_no' => 'required|string|max:50',
//            'form.admission_date' => 'required|date',
//            'form.discharge_date' => 'nullable|date',
//            'form.diagnosis' => 'required|integer',
//            'form.present_illness' => 'required|string|max:100',
//            'form.past_illness' => 'required|string|max:100',
//            'form.comorbidities' => 'required|string|max:100',
//            'form.family_history' => 'required|string',
//            'form.drug_history' => 'required|string',
//            'form.previous_drug_history' => 'required|string',
//            'form.clinical_findings' => 'required|string',
//            'form.cbc_result' => 'required|string',
//            'form.s_electrolytes' => 'required|string',
//            'form.s_creatinine' => 'required|string',
//            'form.s_urea' => 'required|string',
//            'form.lft' => 'required|string',
//            'form.s_bilirubin' => 'required|string',
//            'form.sgpt' => 'required|string',
//            'form.sgot' => 'required|string',
//            'form.ggt' => 'required|string',
//            'form.ast' => 'required|string',
//            'form.s_albumin' => 'required|string',
//            'form.s_lipase' => 'required|string',
//            'form.s_amylase' => 'required|string',
//            'form.blood_glucose' => 'required|string',
//            'form.x_ray' => 'required|string',
//            'form.ecg' => 'required|string',
//            'form.usg' => 'required|string',
//            'form.ct_scan' => 'required|string',
//            'form.mri' => 'required|string',
//            'form.mrcp' => 'required|string',
//            'form.ercp' => 'required|string',
//            'form.endoscopy' => 'required|string',
//            'form.colonoscopy' => 'required|string',
//            'form.fnac' => 'required|string',
//            'form.histopathology' => 'required|string',
//            'form.immuno_histochemistry' => 'required|string',
//            'form.genetic_analysis' => 'required|string',
//            'form.others' => 'required|string',
//            'form.name_of_surgeon' => 'required|string',
//            'form.name_of_surgeon_assistant' => 'required|string',
//            'form.name_of_operation' => 'required|string',
//            'form.date_of_operation' => 'nullable|date',
//            'form.name_of_anesthesia' => 'required|string',
//            'form.operative_findings' => 'required|string',
//            'form.date_of_death' => 'nullable|date',
//            'form.causes_death' => 'required|string',
        ]);


        Patient::create($this->form);

        session()->flash('message', 'Patient information saved successfully!');
        return redirect()->route('patient.list');
    }
    public function submitHospital()
    {
        $this->validate([
            'form.hospital_reg_no' => 'required|string|max:50',
            'form.unit' => 'required|integer|min:0|max:255',
            'form.ward_no' => 'required|string|max:50',
            'form.bed_no' => 'required|string|max:50',
            'form.admission_date' => 'required|date',
            'form.discharge_date' => 'nullable|date',
        ]);


        Patient::create($this->form);

        session()->flash('message', 'Patient information saved successfully!');
        return redirect()->route('patient.list');
    }


    public $currentTab = 'personal'; // Default tab

    public function switchTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        $religions          =   AllSetting::where(['type'=>1,'is_active'=>1])->pluck('title','id');
        $occupations        =   AllSetting::where(['type'=>2,'is_active'=>1])->pluck('title','id');
        $educations         =   AllSetting::where(['type'=>3,'is_active'=>1])->pluck('title','id');
        $monthlyIncomes     =   AllSetting::where(['type'=>4,'is_active'=>1])->pluck('title','id');
        $bloodGroups        =   AllSetting::where(['type'=>5,'is_active'=>1])->pluck('title','id');
        $districts           =  District::where('is_active',1) ->orderBy('name')->pluck('name','id');

        return view('livewire.patient.create',['religions'=>$religions,'occupations'=>$occupations,'educations'=>$educations,'monthlyIncomes'=>$monthlyIncomes,'bloodGroups'=>$bloodGroups,'districts'=>$districts]);
    }
    public function submitPersonalInfo(){

        $validated = $this->validate(
            [
                'form.name'         => 'required|string|max:300',
                'form.age'          => 'required|string|max:255',
                'form.gender'       => 'required|integer',
                'form.religion'     => 'required|integer',
                'form.occupation'   => 'required|integer',
                'form.education_status' => 'required|integer',
                'form.monthly_income'   => 'required|integer',
                'form.district_id'      => 'required|integer',
                'form.address'          => 'nullable|string|max:1000',
                'form.contact_number'   => 'required|string',
                'form.blood_group'      => 'nullable|integer',
            ],
            [ // Custom Messages
                'form.name.required'            => 'Patient name is required.',
                'form.age.required'             => 'Age is required.',
                'form.gender.required'          => 'Please select a gender.',
                'form.religion.required'        => 'Please select a religion.',
                'form.occupation.required'      => 'Please select an occupation.',
                'form.education_status.required'=> 'Please select an education status.',
                'form.monthly_income.required'  => 'Monthly income must be selected.',
                'form.district_id.required'     => 'District is required.',
                'form.contact_number.required'  => 'Contact number is required.',
                'form.blood_group.required'     => 'Contact Blood Group is required.',
            ]
        );
        $totalCount =   Patient::count();
        $totalCount = $totalCount > 0 ? $totalCount + 1 : 1;

        // Save to DB - Example Model: PatientInfo
        Patient::create([
            'patient_id'            => date('ym') . str_pad($totalCount, 4, '0', STR_PAD_LEFT),
            'name'                  => $validated['form']['name'],
            'age'                   => $validated['form']['age'],
            'gender'                => $validated['form']['gender'],
            'religion'              => $validated['form']['religion'],
            'occupation'            => $validated['form']['occupation'],
            'education_status'      => $validated['form']['education_status'] ,
            'monthly_income'        => $validated['form']['monthly_income'],
            'district_id'           => $validated['form']['district_id'],
            'address'               => $validated['form']['address'] ?? null,
            'pt_contact_number'     => $validated['form']['contact_number'],
            'blood_group'           => $validated['form']['blood_group']?? null,
            'created_ip'            => request()->ip(),
            'created_by'            => auth()->id()
        ]);

        session()->flash('success', 'Personal information saved successfully!');

        // Optionally reset form
        //$this->reset('form');
        $this->currentTab = 'hospital';
        return redirect()->route('patient.list');


    }
}
