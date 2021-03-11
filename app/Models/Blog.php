<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function blogcategory(){
        return $this->belongsTo(BlogCategory::class, "blog_category_id");
    }

    public function blogtags(){
        return $this->belongsToMany(BlogTag::class, "tag__blogs");
    }

    public function tagsToString(){
        $tags = $this->blogtags;
        $tagsString = "";
        foreach($tags as $index => $tag){
            if($index == count($tags) - 1){
                $tagsString .= $tag->blog_tag;    
            }
            else{
                $tagsString .= $tag->blog_tag . ",";
            }
        }

        return $tagsString;
    }

    public function blogcomments(){
        return $this->hasMany(BlogComment::class);
    }

}
