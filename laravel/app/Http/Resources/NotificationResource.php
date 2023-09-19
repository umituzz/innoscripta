<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class NotificationResource
 * @parent App\Http\Resources
 */
class NotificationResource extends JsonResource
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
            'message' => $this->data['message'] ?? NULL,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at->format('y-m-D H:i')
        ];
    }
}
