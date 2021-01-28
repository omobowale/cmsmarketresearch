<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable =  ['page_name', 'page_url', 'page_banner_text', 'page_button_text', 'page_button_link', 'page_meta_description', 'page_meta_title'];
}
