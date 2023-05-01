<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'albumId' => $this->albumId,
            'photographerId ' => $this->photographerId,
            'title' => $this->title,
            'description' => $this->description,
            'featured' => $this->featured,
            'album_date' => $this->album_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
