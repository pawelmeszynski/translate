<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use PHPUnit\Framework\Constraint\Count;

class TranslatedResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'translated_name' => $this->translated->translated_name,
            'language' => $this->translated->language
        ];
    }
}
