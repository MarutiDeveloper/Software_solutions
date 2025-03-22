<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'subject', 'message'];
}
