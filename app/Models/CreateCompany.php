<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateCompany extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = '_create_companies';

    // Define fillable fields
    protected $fillable = [
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'company_website',
    ];
}
