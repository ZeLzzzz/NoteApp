<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devision extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_name',
        'company_id',
        'status',
        'create_user',
        'update_user',
    ];
}
