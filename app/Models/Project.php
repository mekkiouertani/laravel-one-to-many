<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'slug', 'body', 'image', 'category_id',];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function category()
    {
        return $this->belongsTo(Category::Class);
    }

    public static function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        while (Project::where("slug", $slug)->first()) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
