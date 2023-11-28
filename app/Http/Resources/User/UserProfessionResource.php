<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfessionResource extends JsonResource
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
            'name'=> $this->name,
            'arabic_name'=> $this->arabic_name,
            'description' => $this->description,
            'arabic_description' => $this->arabic_description,
            'icon' => $this->icon
        ];
    }
}
