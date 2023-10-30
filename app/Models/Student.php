<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'student_id',
        'student_lname', 
        'student_fname', 
        'student_mname',
        'student_mi',
        'student_ext',
        'student_gender',
        'student_dob',
        'student_pob',
        'student_civilstatus',
        'student_nationality',
        'student_religion',
        'student_email',
        'student_contactnumber',
        'student_height',
        'student_weight',
        'student_bloodtype',
        'student_ethnicity',
        'student_address',
        'student_province',
        'student_municipality',
        'student_barangay',
        'student_zipcode',
        'father_lname',
        'father_fname',
        'father_mname',
        'father_ext',
        'father_dob',
        'father_occupation',
        'father_monthlyincome',
        'father_yearlycomp',
        'father_contactno',
        'father_educational',
        'mother_lname',
        'mother_fname',
        'mother_mname',
        'mother_ext',
        'mother_dob',
        'mother_occupation',
        'mother_monthlyincome',
        'mother_yearlycomp',
        'mother_contactno',
        'mother_educational',
    ];
}
