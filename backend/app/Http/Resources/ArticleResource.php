<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'source' => new SourceResource($this->source),
            'author' => new AuthorResource($this->author),
            'category' => new CategoryResource($this->category),
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'image' => $this->image,
            'published_at' => Carbon::parse($this->published_at)->format('Y-m-d H:i'),
        ];
    }
}
