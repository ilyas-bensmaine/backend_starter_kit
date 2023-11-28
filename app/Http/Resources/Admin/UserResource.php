<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\TaggableDataResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'profession' => new TaggableDataResource($this->whenLoaded('user_profession')),
            'status' => new TaggableDataResource($this->whenLoaded('user_status')),
            'wilaya' => new TaggableDataResource($this->whenLoaded('wilaya')),
            'subscription' => new SubscriptionResource($this->whenLoaded('subscription')),
            'posts_count' => $this->whenCounted('posts'),
            'post_responses_count' => $this->whenCounted('post_responses'),
        ];
    }
}
