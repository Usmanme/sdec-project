<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategoryCourse extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'sub_category_courses';
    public $fillable =
    [
        'course_id','category_id','sub_category_id'
    ];

    public function subCategory() :BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function category () :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
