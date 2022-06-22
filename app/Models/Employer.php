<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'mobile',
        'password',
        'emirates',
    ];
}
