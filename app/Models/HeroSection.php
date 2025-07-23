<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HeroStats;

class HeroSection extends Model
{
    use HasFactory;

      protected $fillable = [
        'badge_text',
        'heading',
        'highlight_text',        
        'description',        
        'button_1_text',      
        'button_1_link',      
        'button_2_text',      
        'button_2_link',      
        'main_image',      
        'customer_text',      
    ];


}
