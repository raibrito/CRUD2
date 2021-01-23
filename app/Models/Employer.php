<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'employers';
    public $timestamps = true;

    protected $casts = [
       
    ];

    protected $fillable = [
        'name', 
        'sector', 
        'occupation', 
        'department',
    ];
}

