<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyinfo extends Model
{
    use HasFactory;

    protected $table = 'companyinfo';

    // Define fillable fields
    protected $fillable = [
        'company_name',
        'company_address',
        'company_phone_number',
        'company_email',
        'company_website',
    ];
}
