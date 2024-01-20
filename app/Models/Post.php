<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title', 'slug', 'body', 'image', 'category_id'];  //campi aggiuntivi: user_id e slug

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class)->withTimestamps(); //se voglio aggiungere un altro campo nella tabella pivot ->withPivot('vote')
    }

    public static function getSlug($title)

    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        while (Post::where("slug", $slug)->first()){
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }

        return $slug;
    }
}
