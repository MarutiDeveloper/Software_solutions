<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies'; // Table name

    protected $fillable = [
        'name',
        'tagline',
        'description',
        'business_type',
        'established_year',
        'employees_count',
        'registration_number',
        'tax_id',
        'logo',
    ];
}
