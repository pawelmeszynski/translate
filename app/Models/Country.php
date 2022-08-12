<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'code',
        'ext_id',
        'code_3',
        'code_num',
        'call_prefix',
        'name',
        'params',
        'objectId'
    ];

    protected $attributes = array(
        'code_3' => '',
        'code_num' => '',
        'call_prefix' => '',
        'params' => '{}',
    );

    protected $casts = [
        'params' => 'array'
    ];

    public function states(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(State::class,
            'ext_id',
            'country_id');
    }

    public function translated(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TranslatedCountries::class);
    }
}
