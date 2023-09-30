<?php

namespace App\Models\Attendance;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionA extends Model
{
    use HasFactory;
    protected $table = 'section_a_s';
    protected $fillable = ['school_id', 'name'];
    protected $hidden = ['school_id', 'created_at', 'updated_at'];

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'school_id', 'school_id');
    }
}
