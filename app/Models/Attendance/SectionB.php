<?php

namespace App\Models\Attendance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionB extends Model
{
    use HasFactory;
    protected $table = 'section_b_s';
    protected $fillable = ['school_id', 'name', 'date'];
}
