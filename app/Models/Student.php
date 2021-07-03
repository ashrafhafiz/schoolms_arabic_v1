<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    protected $table = 'students';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'academic_year',
        'gender_id',
        'nationality_id',
        'blood_type_id',
        'level_id',
        'grade_id',
        'section_id',
        'guardian_id',
    ];

    public $translatable = ['name'];

    protected $hidden = [
        'password',
    ];
}
