<?php

namespace App\Http\Resources\Backend\Admin;

use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminLoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'language'=> $this->language,
            'permissions' => PermissionResource::collection($this->getAllPermissions()),
        ];
    }
}
