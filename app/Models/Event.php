<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'events';
    public $guarded = ['id'];

    CONST PATH = 'Events';
    protected $casts =
    [
        'start_date_time' => 'datetime:Y-m-d | H:i A',
        'end_date_time'   => 'datetime:Y-m-d | H:i A',
        'registration_deadline' => 'datetime:Y-m-d',
    ];

    CONST TYPE =
    [
        'Conference',
        'Workshop',
        'Webinar'
    ];

    CONST STATUS =
    [
        'Active',
        'Cancelled',
        'Postponed'
    ];

    public function scopeActive( $query )
    {
        return $query->whereStatus('active');
    }
    public function user () :BelongsTo
    {
        return $this->belongsTo( User::class );
    }
}
