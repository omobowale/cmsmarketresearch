<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;


    public function getCurrentLogo(){
        $logo = $this->where('current', 'yes')->first();
        if($logo != null){
            return $logo->image_path;
        }
        else{
            $logo = $this->first();
            if($logo != null){
                $logo->current = "yes";
                $logo->save();
                return $logo->image_path;
            }

            return null;
        }

    }
}
