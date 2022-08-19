<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TranslatedCountries extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'translated_name',
        'language',
        'country_id',
        'created_at',
        'updated_at',
    ];

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
