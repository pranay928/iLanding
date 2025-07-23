<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

     protected $fillable = [
        'meta',
        'title',
        'description',
        'profile_name',
        'profile_position',
        'profile_image',
        'contact_label',
        'contact_number',
        'main_image',
        'small_image',
        'experience_years',
        'experience_text',    
    ];
    
}

