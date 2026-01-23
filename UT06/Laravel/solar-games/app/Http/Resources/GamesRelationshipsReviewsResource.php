<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GamesRelationshipsReviewsResource extends JsonResource
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
                'self' => route('games.relationships.reviews', ['game' => $this->id]),
                'related' => route('games.reviews', ['game' => $this->id]),
            ],
            'data' => $this->reviews->map(fn($review) => [
                'type' => 'reviews',
                'id' => (string) $review->id,
            ]),
        ];
    }
}
