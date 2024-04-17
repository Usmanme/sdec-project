<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    const PATH = 'app-assets/images/category/';
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable =
    [
        'name',
        'slug',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeActive( $query )
    {
        return $query->where('status','active');
    }

    public function subCategories()
    {
        return $this->hasManyThrough(
            SubCategory::class, // Target model
            SubCategoryCourse::class, // Intermediate model
            'course_id', // Foreign key on intermediate model
            'id', // Local key on this model
            'id', // Local key on target model
            'sub_category_id' // Foreign key on intermediate model
        )->select('sub_categories.id', 'sub_categories.name');
    }
}
