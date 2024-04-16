<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'courses';
    public $fillable =
    [
        'title','description','program_code','venue','fee','start_date','end_date','status','image'
    ];
    public function scopeActive( $query )
    {
        return $query->where('status','active');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subCategoryCourse()
    {
        return $this->hasMany(SubCategoryCourse::class);
    }

    public function singleCourseCategory() :HasOne
    {
        return $this->hasOne(SubCategoryCourse::class);
    }

    public function category()
    {
        return $this->hasOneThrough(
            Category::class, // Target model
            SubCategoryCourse::class, // Intermediate model
            'course_id', // Foreign key on intermediate model
            'id', // Local key on this model
            'id', // Local key on target model
            'category_id' // Foreign key on intermediate model
        )->select('categories.id', 'categories.name');
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
