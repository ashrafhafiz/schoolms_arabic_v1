<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Guardian extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    protected $table = 'guardians';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'email', 'password',
        'f_name', 'f_nid', 'f_pid', 'f_phone', 'f_job', 'f_nationalityId', 'f_bloodtypeId', 'f_religionId', 'f_address',
        'm_name', 'm_nid', 'm_pid', 'm_phone', 'm_job', 'm_nationalityId', 'm_bloodtypeId', 'm_religionId', 'm_address',
    ];
    public $translatable = [
        'f_name', 'f_job', 'f_address',
        'm_name', 'm_job', 'm_address',
    ];
    protected $hidden = [
        'password',
    ];
}
