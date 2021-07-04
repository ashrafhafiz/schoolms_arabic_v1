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

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function blood_type()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
