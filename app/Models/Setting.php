<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'website_name', 'website_url', 'image', 'favicon', 'page_title', 'meta_keyword',
        'meta_description', 'address', 'phone', 'phone2', 'email', 'email2', 'facebook',
        'twitter', 'instagram', 'youtube',
    ];
}
