<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\Translatable\HasTranslations;

class BloodType extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use HasTranslations;

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('name');
    // public $translatable = ['name'];
}
