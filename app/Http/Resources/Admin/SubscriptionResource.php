<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'started_at' => date_format($this->started_at, 'Y-m-d'),
            'expired_at' => date_format($this->expired_at, 'Y-m-d'),
            'period' => $this->started_at->diffInDays($this->expired_at),
            'days_consumed' => $this->started_at->diffInDays(now()),
            'plan' => new PlanResource($this->whenLoaded('plan')),
        ];
    }
}
