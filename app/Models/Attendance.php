<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $fillable = [
        'school_id',
        'is_present',
        'date',
    ];
    protected $hidden = ['id', 'school_id', 'created_at', 'updated_at'];

    public function getIsPresentAttribute()
    {
        return $this->attributes['is_present'] == 1;
    }
}
