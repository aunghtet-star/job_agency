<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobpost extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'description',
        'location',
        'company',
        'visibility',
    ];

     /**
     * Get the author of the job post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the category for the blog post.
     */
    public function category()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
}
