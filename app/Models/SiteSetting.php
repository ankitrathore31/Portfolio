<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'site_url',
        'email',
        'phone',
        'address',
        'profession',
        'degree',
        'keywords',
        'description',
        'instagram',
        'linkedin',
        'facebook',
        'cv_file',
        'profile_image',
    ];
}

