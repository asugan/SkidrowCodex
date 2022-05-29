<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['post_name', 'post_body', 'category_id', 'category_name', 'image1', 'image2', 'image3', 't_link','keywords', 'developer', 'release_year', 'game_version' , 'size' ,'steam_link','dlcs'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'post_name'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}