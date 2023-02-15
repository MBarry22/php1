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
}
