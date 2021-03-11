<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteName extends Model
{
    use HasFactory;

    public function getCurrentWebName(){
        $webname = $this->where('current', 'yes')->first();
        if($webname != null){
            return $webname->name;
        }
        else{
            $webname = $this->first();
            if($webname != null){
                $webname->current = "yes";
                $webname->save();
                return $webname->name;
            }

            return null;
        }

    }

}
