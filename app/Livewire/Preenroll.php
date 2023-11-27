<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Carbon;



class Preenroll extends Component
{

    public $currentStep = 1;
    public $student_id, $lname, $fname, $mname, $mi, $ext, $gender, $dob, $pob, $civil_status, $nationality, $religion, $email, $contact_number, $height, $weight, $bloodtype, $ethnicity, $address, $province, $municipality, $barangay, $zipcode;

    public $father_lname, $father_fname, $father_mname, $father_ext, $father_dob, $father_occupation, $father_monthlyincome, $father_yearlycomp, $father_contactno, $father_educational, $father_address, $mother_lname, $mother_fname, $mother_mname, $mother_ext, $mother_dob, $mother_occupation, $mother_monthlyincome, $mother_yearlycomp, $mother_contactno, $mother_educational, $mother_address;

    public $emergency_contact, $emergency_address, $emergency_mobile;
    
    public $successMessage = '';
    public $status = 'pre-enrolled';
    

    public function render()
    {
        return view('livewire.preenroll');
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'lname' => 'required',
            'fname' => 'required',
            'ext' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'civil_status' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'bloodtype' => 'required',
            'ethnicity' => 'required',
            'address' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'zipcode' => 'required',
        ]);
        $this->currentStep = 2;
        $this->student_id = "VNHS-" . Carbon::now()->year . random_int(1000000, 9999999);
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'father_lname' => 'required',
            'father_fname' => 'required',
            'father_mname' => 'required',
            'father_ext' => 'required',
            'father_dob' => 'required',
            'father_occupation' => 'required',
            'father_monthlyincome' => 'required',
            'father_yearlycomp' => 'required',
            'father_contactno' => 'required',
            'father_educational' => 'required',
            'father_address' => 'required',
            'mother_lname' => 'required',
            'mother_fname' => 'required',
            'mother_mname' => 'required',
            'mother_ext' => 'required',
            'mother_dob' => 'required',
            'mother_occupation' => 'required',
            'mother_monthlyincome' => 'required',
            'mother_yearlycomp' => 'required',
            'mother_contactno' => 'required',
            'mother_educational' => 'required',
            'mother_address' => 'required',
        ]);
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'emergency_contact' => 'required',
            'emergency_address' => 'required',
            'emergency_mobile' => 'required',
        ]);
        $this->currentStep = 4;
    }

    public function submitForm()
    {
        

        Student::create([
            'student_id' => $this->student_id,
            'lname' => $this->lname,
            'fname' => $this->fname,
            'mname' => $this->mname,
            'mi' => $this->mi,
            'ext' => $this->ext,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'pob' => $this->pob,
            'civil_status' => $this->civil_status,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'height' => $this->height,
            'weight' => $this->weight,
            'bloodtype' => $this->bloodtype,
            'ethnicity' => $this->ethnicity,
            'address' => $this->address,
            'province' => $this->province,
            'municipality' => $this->municipality,
            'barangay' => $this->barangay,
            'zipcode' => $this->zipcode,

            'father_lname' => $this->father_lname,
            'father_fname' => $this->father_fname,
            'father_mname' => $this->father_mname,
            'father_ext' => $this->father_ext,
            'father_dob' => $this->father_dob,
            'father_occupation' => $this->father_occupation,
            'father_monthlyincome' => $this->father_monthlyincome,
            'father_yearlycomp' => $this->father_yearlycomp,
            'father_contactno' => $this->father_contactno,
            'father_educational' => $this->father_educational,
            'father_address' => $this->father_address,
            'mother_lname' => $this->mother_lname,
            'mother_fname' => $this->mother_fname,
            'mother_mname' => $this->mother_mname,
            'mother_ext' => $this->mother_ext,
            'mother_dob' => $this->mother_dob,
            'mother_occupation' => $this->mother_occupation,
            'mother_monthlyincome' => $this->mother_monthlyincome,
            'mother_yearlycomp' => $this->mother_yearlycomp,
            'mother_contactno' => $this->mother_contactno,
            'mother_educational' => $this->mother_educational,
            'mother_address' => $this->mother_address,

            'emergency_contact' => $this->emergency_contact,
            'emergency_address' => $this->emergency_address,
            'emergency_mobile' => $this->emergency_mobile,

            'status' => $this->status
        ]);
        $this->successMessage = 'PRE Enrolled Successfully.';
        $this->clearForm();
        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

    public function clearForm()
    {
        $this->student_id ='';
        $this->lname = '';
        $this->fname = '';
        $this->mname = '';
        $this->mi = '';
        $this->ext = '';
        $this->gender = '';
        $this->dob = '';
        $this->civil_status = '';
        $this->nationality = '';
        $this->religion = '';
        $this->email = '';
        $this->contact_number = '';
        $this->height = '';
        $this->weight = '';
        $this->bloodtype = '';
        $this->ethnicity = '';
        $this->address = '';
        $this->province = '';
        $this->municipality = '';
        $this->barangay = '';
        $this->zipcode = '';
        $this->father_lname = '';
        $this->father_fname = '';
        $this->father_mname = '';
        $this->father_ext = '';
        $this->father_dob = '';
        $this->father_occupation = '';
        $this->father_monthlyincome = '';
        $this->father_yearlycomp = '';
        $this->father_contactno = '';
        $this->father_educational = '';
        $this->father_address = '';
        $this->mother_lname = '';
        $this->mother_fname = '';
        $this->mother_mname = '';
        $this->mother_ext = '';
        $this->mother_dob = '';
        $this->mother_occupation = '';
        $this->mother_monthlyincome = '';
        $this->mother_yearlycomp = '';
        $this->mother_contactno = '';
        $this->mother_educational = '';
        $this->mother_address = '';
        $this->emergency_contact = '';
        $this->emergency_address = '';
        $this->emergency_mobile = '';
    }
}
