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
}
