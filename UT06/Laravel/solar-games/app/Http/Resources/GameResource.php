<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'game',
            'id' => (string) $this->id,
            'attributes' => [
                'title' => $this->title,
                'synopsis' => $this->synopsis,
                'developer' => $this->developer,
                'publisher' => $this->publisher,
                'releaseYear' => (string) $this->release_year,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
            'links' => [
                'self' => route('games.show', ['game' => $this->id]),
            ],
            'relationships' => [
                'genre' => [
                    'links' => [
                        'self' => route('genres.show', ['genre' => $this->genre->id]),
                    ],
                    'data' => [
                        [
                            'type' => 'genre',
                            'id' => (string) $this->genre->id,
                        ],
                    ],
                ],
            ],
            'included' => [

            ],
        ];
    }
}
