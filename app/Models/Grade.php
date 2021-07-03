<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    protected $table = 'grades';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'level_id');
    public $translatable = ['name'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
