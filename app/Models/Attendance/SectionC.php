<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionC extends Model
{
    use HasFactory;

    protected $table = 'section_c_s';
    protected $fillable = ['school_id', 'name'];
}
