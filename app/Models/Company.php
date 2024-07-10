<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'company_name',
        'npwp_number',
        'expired_date',
        'status',
        'create_user',
        'update_user',
    ];

    public function createUser()
    {
        return $this->belongsTo(User::class, 'create_user');
    }
}
