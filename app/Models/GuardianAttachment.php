<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuardianAttachment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'guardian_attachments';
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable = ['file_name', 'guardian_id'];

    public function gardians()
    {
        return $this->belongsTo(Guardian::class);
    }
}
