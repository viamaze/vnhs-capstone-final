<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Carbon;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\Level;
use App\Models\User;

class StudentRegistration extends Component
{

    public $currentStep = 1, $successMessage = '', $student_status = 'New Student', $enrollment_status = 'Pre-Enrolled';

    public $student_id, $student_lrn, $level_id, $lastname, $firstname, $middlename, $mi, $suffix, $gender, $date_of_birth, $place_of_birth, $civil_status, $nationality, $religion, $email, $contact_number, $height, $weight, $bloodtype, $ethnicity, $address, $province_id, $municipality_id, $barangay_id, $zipcode;

    public $father_last_name, $father_first_name, $father_middle_name, $father_dob, $father_occupation, $father_monthlyincome, $father_yearlycomp, $father_contactno, $father_educational, $father_address, $mother_last_name, $mother_first_name, $mother_middle_name, $mother_dob, $mother_occupation, $mother_monthlyincome, $mother_yearlycomp, $mother_contactno, $mother_educational, $mother_address;

    public $emergency_contact_person, $emergency_address, $emergency_mobile;
    
    public $levels, $provinces, $municipalities, $barangays;

    public $password = 'vnhs', $student_role = 'STUDENT', $active_student=0;
    
    public function mount()
    {
        $this->provinces = Province::all();
        $this->municipalities = Municipality::all();
        $this->barangays = Barangay::all();
        $this->levels = Level::all();
    }
    
    public function render()
    {
        return view('livewire.student-registration');
    }   

    protected $rules = [
        'firstname' => 'required|min:6',
        'email' => 'required|email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'level_id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'civil_status' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'municipality_id' => 'required',
            'barangay_id' => 'required',
            'zipcode' => 'required',
        ]);
        $this->currentStep = 2;
        $this->student_id = "VNHS" . Carbon::now()->year . random_int(10000000, 99999999);
        $this->student_lrn = "LRN" . Carbon::now()->year . random_int(10000000, 99999999);
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'father_last_name' => 'required',
            'father_first_name' => 'required',
            'father_middle_name' => 'required',
            'father_dob' => 'required',
            'father_occupation' => 'required',
            'father_monthlyincome' => 'required',
            'father_yearlycomp' => 'required',
            'father_contactno' => 'required',
            'father_educational' => 'required',
            'father_address' => 'required',
            'mother_last_name' => 'required',
            'mother_first_name' => 'required',
            'mother_middle_name' => 'required',
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
            'emergency_contact_person' => 'required',
            'emergency_address' => 'required',
            'emergency_mobile' => 'required',
        ]);
        $this->currentStep = 4;
    }

    public function submitForm()
    {

        Student::create([
            'student_id' => $this->student_id,
            'lrn' => $this->student_lrn,
            'level_id' => $this->level_id,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'mi' => $this->mi,
            'suffix' => $this->suffix,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'place_of_birth' => $this->place_of_birth,
            'civil_status' => $this->civil_status,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'contact_number' => $this->contact_number,
            'height' => $this->height,
            'weight' => $this->weight,
            'bloodtype' => $this->bloodtype,
            'ethnicity' => $this->ethnicity,
            'address' => $this->address,
            'province_id' => $this->province_id,
            'municipality_id' => $this->municipality_id,
            'barangay_id' => $this->barangay_id,
            'zipcode' => $this->zipcode,

            'father_last_name' => $this->father_last_name,
            'father_first_name' => $this->father_first_name,
            'father_middle_name' => $this->father_middle_name,
            'father_dob' => $this->father_dob,
            'father_occupation' => $this->father_occupation,
            'father_monthlyincome' => $this->father_monthlyincome,
            'father_yearlycomp' => $this->father_yearlycomp,
            'father_contactno' => $this->father_contactno,
            'father_educational' => $this->father_educational,
            'father_address' => $this->father_address,
            'mother_last_name' => $this->mother_last_name,
            'mother_first_name' => $this->mother_first_name,
            'mother_middle_name' => $this->mother_middle_name,
            'mother_dob' => $this->mother_dob,
            'mother_occupation' => $this->mother_occupation,
            'mother_monthlyincome' => $this->mother_monthlyincome,
            'mother_yearlycomp' => $this->mother_yearlycomp,
            'mother_contactno' => $this->mother_contactno,
            'mother_educational' => $this->mother_educational,
            'mother_address' => $this->mother_address,

            'emergency_contact_person' => $this->emergency_contact_person,
            'emergency_address' => $this->emergency_address,
            'emergency_mobile' => $this->emergency_mobile,

            'student_status' => $this->student_status,
            'active_student' => $this->active_student,
            'enrollment_status' => $this->enrollment_status
        ]);

        $this->successMessage = 'Student Registration Successfull';
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
        $this->student_lrn = '';
        $this->level_id = '';
        $this->lastname = '';
        $this->firstname = '';
        $this->middlename = '';
        $this->mi = '';
        $this->suffix = '';
        $this->gender = '';
        $this->date_of_birth = '';
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
        $this->province_id = '';
        $this->municipality_id = '';
        $this->barangay_id = '';
        $this->zipcode = '';
        $this->father_last_name = '';
        $this->father_first_name = '';
        $this->father_middle_name = '';
        $this->father_dob = '';
        $this->father_occupation = '';
        $this->father_monthlyincome = '';
        $this->father_yearlycomp = '';
        $this->father_contactno = '';
        $this->father_educational = '';
        $this->father_address = '';
        $this->mother_last_name = '';
        $this->mother_first_name = '';
        $this->mother_middle_name = '';
        $this->mother_dob = '';
        $this->mother_occupation = '';
        $this->mother_monthlyincome = '';
        $this->mother_yearlycomp = '';
        $this->mother_contactno = '';
        $this->mother_educational = '';
        $this->mother_address = '';
        $this->emergency_contact_person = '';
        $this->emergency_address = '';
        $this->emergency_mobile = '';
    }


}
