<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TranslatedStates extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'translated_name',
        'language',
        'state_id'
    ];

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
