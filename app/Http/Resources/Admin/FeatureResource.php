<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'arabic_name' => $this->arabic_name,
            'description' => $this->description,
            'arabic_description' => $this->arabic_description,
            'consumable' => $this->consumable,
            'balance' => $this->balance,
            'periodicity_type' => $this->periodicity_type,
            'charges' => $this->pivot->charges
        ];
    }
}
