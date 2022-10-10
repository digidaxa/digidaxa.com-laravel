<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Products extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['name', 'image_url', 'file'];
    protected $guarded = ['id'];
    protected $with = ['category', 'publisher'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
