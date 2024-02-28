<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_team_tb extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'team_name',
        'department_id',
    ];

    protected $table = 'create_team_tbs'; 

  
    public function department()
    {
        return $this->belongsTo(create_department_tb::class, 'department_id', 'department_id');
    }
}
