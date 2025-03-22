<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLogo extends Model
{
    use HasFactory;

    protected $table = 'company_logos'; // Table name

    protected $fillable = [
        'name',  // Company name
        'logo',  // Logo image path
    ];
}
