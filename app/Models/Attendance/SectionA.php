<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionA extends Model
{
    use HasFactory;
    protected $table = 'section_a_s';
    protected $fillable = ['school_id', 'name', 'date'];
}
