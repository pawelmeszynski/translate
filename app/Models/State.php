<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'country_id',
        'code',
        'name',
        'type_id',
    ];

    public function countries()
    {
        return $this->hasOne(Country::class, 'country_id', 'ext_id');
    }

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function translated()
    {
        return $this->belongsTo(TranslatedStates::class, 'id', 'state_id');
    }
}
