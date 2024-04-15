<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        return $this->belongsTo(SubCategoryCourse::class);
    }
}
