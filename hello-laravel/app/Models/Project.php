<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    // Load the Category for this Project
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'url',
        'published_date',
        'image',
        'thumb',
        'category_id'
    ];
}
