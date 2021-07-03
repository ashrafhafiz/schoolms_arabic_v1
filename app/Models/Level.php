<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Level extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    protected $table = 'levels';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'notes');
    public $translatable = ['name'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function sections()
    {
        return $this->hasManyThrough(Section::class, Grade::class);
    }
}
