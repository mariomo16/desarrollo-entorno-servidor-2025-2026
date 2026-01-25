<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GamesRelationshipsGenreResource extends JsonResource // RelationshipOneResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'links' => [
                'self' => route('games.relationships.genre', ['game' => $this->id]),
                'related' => route('games.genre', ['game' => $this->id]),
            ],
            'data' => 'genres',
            'id' => (string) $this->genre->id,
        ];
    }

    // protected function getResourceName(): string
    // {
    //     return 'game';
    // }

    // protected function getRelationshipName(): string
    // {
    //     return 'genre';
    // }
}
