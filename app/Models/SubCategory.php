<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'sub_categories';
    protected $fillable =
    [
        'name',
        'slug',
        'description',
        'status',
        'category_id'
    ];
    public function scopeActive( $query )
    {
        return $query->where('status','active');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
