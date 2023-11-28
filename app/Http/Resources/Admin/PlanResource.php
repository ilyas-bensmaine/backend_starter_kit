<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'tag_color' => $this->tag_color,
            'price' => $this->price,
            'periodicity_type' => $this->periodicity_type,
            'features' => FeatureResource::collection($this->whenLoaded('features'))
        ];
    }
}
