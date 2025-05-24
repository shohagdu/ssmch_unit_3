<?php

namespace App\Livewire;

use App\Models\AllSetting;
use App\Models\District;
use App\Models\Patient;
use App\Models\PatientFollowHistory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;

class PatientEditForm extends Component
{
    public $currentTab = 'personal'; // Default tab
    public $id;
    public $form = [];
    public $rows = [];

    public function mount($id = null)
    {
        if ($id === null) {
            abort(404); // or some fallback
        }
        $this->id           = $id;
        $this->currentTab   = request()->query('tab', 'personal');

        $this->rows = PatientFollowHistory::where('patient_id', $this->id)
            ->get()
            ->map(function ($record) {
                return [
                    'id' => $record->id,
                    'clinical_features' => $record->clinical_features,
                    'investigation' => $record->investigation,
                    'followup_description' => $record->followup_description,
                ];
            })->toArray();

        // Ensure at least one row is present if none from DB
        if (empty($this->rows)) {
            $this->rows[] = ['clinical_features' => '', 'investigation' => '', 'followup_description' => ''];
        }
    }

    public function render()
    {
        $patient            = !empty($this->id)? Patient::find($this->id) :'';

        $religions          =   AllSetting::where(['type'=>1,'is_active'=>1])->pluck('title','id');
        $occupations        =   AllSetting::where(['type'=>2,'is_active'=>1])->pluck('title','id');
        $educations         =   AllSetting::where(['type'=>3,'is_active'=>1])->pluck('title','id');
        $monthlyIncomes     =   AllSetting::where(['type'=>4,'is_active'=>1])->pluck('title','id');
        $bloodGroups        =   AllSetting::where(['type'=>5,'is_active'=>1])->pluck('title','id');
        $districts          =   District::where('is_active',1) ->orderBy('name')->pluck('name','id');



        $this->form   =
        [
            'name'              =>  $patient->name,
            'age'               =>  $patient->age,
            'gender'            =>  $patient->gender,
            'religion'          =>  $patient->religion,
            'occupation'        =>  $patient->occupation,
            'education_status'  =>  $patient->education_status,
            'monthly_income'    =>  $patient->monthly_income,
            'district_id'       =>  $patient->district_id,
            'address'           =>  $patient->address,
            'contact_number'    =>  $patient->pt_contact_number,
            'blood_group'       =>  $patient->blood_group,
            'hospital_reg_no'   =>  $patient->hospital_reg_no,
            'diagnosis'         =>  $patient->diagnosis,
            'ward_no'           =>  $patient->ward_no,
            'bed_no'            =>  $patient->bed_no,
            'admission_date'    =>  $patient->admission_date? Carbon::parse($patient->admission_date)->format('Y-m-d') : null,
            'discharge_date'    =>  $patient->discharge_date ? Carbon::parse($patient->discharge_date)->format('Y-m-d'): null,
        ];


        return view('livewire.patient.patient-edit-form',[
            'patient'           =>  $patient,
            'religions'         =>  $religions,
            'occupations'       =>  $occupations,
            'educations'        =>  $educations,
            'monthlyIncomes'    =>  $monthlyIncomes,
            'bloodGroups'       =>  $bloodGroups,
            'districts'         =>  $districts
        ]);
    }
    public function switchTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function submitPersonalInfo()
    {
        $validated = $this->validate([
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
        ], [
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
        ]);

        DB::beginTransaction();
        try {
            $patientInfo = Patient::find($this->id);
            $patientInfo->update([
                'name'                  => $validated['form']['name'],
                'age'                   => $validated['form']['age']??NULL,
                'gender'                => $validated['form']['gender'],
                'religion'              => $validated['form']['religion'],
                'occupation'            => $validated['form']['occupation'],
                'education_status'      => $validated['form']['education_status'],
                'monthly_income'        => $validated['form']['monthly_income'],
                'district_id'           => $validated['form']['district_id'],
                'address'               => $validated['form']['address'] ?? null,
                'pt_contact_number'     => $validated['form']['contact_number'],
                'blood_group'           => $validated['form']['blood_group'] ?? null,
                'updated_ip'            => request()->ip(),
                'updated_by'            => auth()->id(),
            ]);
            DB::commit();
            session()->flash('success', 'Personal information saved successfully!');
            return redirect()->route('patient.edit', ['id' => $this->id, 'tab' => 'hospital']);

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong while saving the patient data.');
            return back()->withInput();
        }
    }

    public function submitHospital()
    {

        $validated = $this->validate([
            'form.hospital_reg_no'          => 'required|string|max:300',
            'form.diagnosis'                => 'nullable|integer',
            'form.ward_no'                  => 'nullable',
            'form.bed_no'                   => 'nullable',
            'form.admission_date'           => 'nullable|date_format:Y-m-d',
            'form.discharge_date'           => 'nullable|date_format:Y-m-d',
        ], [
            'form.hospital_reg_no.required'            => 'Patient Hospital Reg. No is required.',
        ]);
        DB::beginTransaction();
        try {
            $patientInfo = Patient::find($this->id);
            $patientInfo->update([
                'hospital_reg_no'    => $validated['form']['hospital_reg_no']??NULL,
                'diagnosis'          => $validated['form']['diagnosis']??NULL,
                'ward_no'            => $validated['form']['ward_no']??NULL,
                'bed_no'             => $validated['form']['bed_no']??NULL,
                'admission_date'     => date('Y-m-d',strtotime($validated['form']['admission_date']))??NULL,
                'discharge_date'     => date('Y-m-d',strtotime($validated['form']['discharge_date']))??NULL,
                'updated_ip'         => request()->ip(),
                'updated_by'         => auth()->id(),
            ]);
            DB::commit();
            session()->flash('success', 'Personal information saved successfully!');
            return redirect()->route('patient.edit', ['id' => $this->id, 'tab' => 'patient_diseases']);

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong while saving the patient data.');
            return back()->withInput();
        }
    }

    public function addRow()
    {
        $this->rows[] = ['clinical_features' => '', 'investigation' => '', 'followup_description' => ''];
    }

    public function saveFollowUpRecords()
    {
        if (!empty($this->deletedRowIds)) {
            PatientFollowHistory::whereIn('id', $this->deletedRowIds)->delete();
            $this->deletedRowIds = []; // Clear after deletion
        }
        if(!empty($this->rows)) {
            foreach ($this->rows as $row) {
                if (!empty($row['id'])) {
                    // Update existing record
                    $history = PatientFollowHistory::find($row['id']);
                    if ($history) {
                        $history->update([
                            'clinical_features'     => $row['clinical_features'],
                            'investigation'         => $row['investigation'],
                            'followup_description'  => $row['followup_description'],
                            'updated_by'            => auth()->id(), // if applicable
                        ]);
                    }
                } else {
                   // dd('test');
                    // Create new record
                    PatientFollowHistory::create([
                        'patient_id'            => $this->id,
                        'clinical_features'      => $row['clinical_features'],
                        'investigation'          => $row['investigation'],
                        'followup_description'   => $row['followup_description'],
                        'created_by'             => auth()->id(),
                    ]);
                }
            }

            session()->flash('success', 'Follow-up records saved successfully!');
            return redirect()->route('patient.edit', ['id' => $this->id, 'tab' => 'follow_up']);
        }
    }
    public $deletedRowIds = [];
    public function removeFollowUpdRow($index)
    {
        if (isset($this->rows[$index]['id']) && !empty($this->rows[$index]['id'])) {
            $this->deletedRowIds[] = $this->rows[$index]['id']; // Track for deletion
        }

        unset($this->rows[$index]);
        $this->rows = array_values($this->rows); // Reindex
    }
}
