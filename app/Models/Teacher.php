<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    protected $table = 'teachers';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('email', 'password', 'name', 'specialization_id', 'gender_id', 'join_date', 'address');
    public $translatable = ['name'];

    protected $hidden = [
        'password',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teachers_sections');
    }
}
