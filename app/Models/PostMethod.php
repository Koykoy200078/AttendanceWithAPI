<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMethod extends Model
{
    use HasFactory;
    protected $table = 'post_methods';
    protected $fillable = [
        'message',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
