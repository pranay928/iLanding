<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table ="contact_infos";
    protected $fillable = [
        'section_description',
        'intro_text',
        'address_line_1',
        'address_line_2',
        'phone_1',
        'phone_2',
        'email_1',
        'email_2',
        'form_text',
    ];
}
