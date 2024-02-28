<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_department_tb extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
    ];

    protected $table = 'create_department_tbs'; 

}
