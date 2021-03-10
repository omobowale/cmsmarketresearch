<?php

namespace App\Helper;

class Helper
{
    public static function getSlug($slug_string){
        $string = str_replace(' ', '-', $slug_string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $slug_string); // Removes special chars
    }
}



