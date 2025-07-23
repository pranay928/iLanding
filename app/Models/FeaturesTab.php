<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesTab extends Model
{
    use HasFactory;

    
    protected $fillable =[
        'tab_title',
        'heading',
        'description',
        'feature_list_first',
        'feature_list_second',
        'feature_list_third',
        'feature_list_fourth',  
        'image',       
    ];
}
