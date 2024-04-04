<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    use HasFactory;
    public $table = 'countries';

    public function cities () :BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
