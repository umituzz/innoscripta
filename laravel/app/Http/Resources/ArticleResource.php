<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArticleResource
 * @parent App\Http\Resources
 */
class ArticleResource extends JsonResource
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
            'source_id' => $this->source_id,
            'source_name' => $this->source_name,
            'api' => $this->api,
            'author' => $this->author,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'url' => $this->url,
            'image' => $this->image,
            'published_at' => $this->published_at,
        ];
    }
}
