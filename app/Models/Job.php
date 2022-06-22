<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [

        'job_name',
        'emp_id',
        'image',
        'emirates',
        'company_name',
        'from_date',
        'till_date',
        'email_to',
        'location',
        'job_type',
    ];
}
