<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    protected $table = 'specializations';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('name');
    public $translatable = ['name'];
}
