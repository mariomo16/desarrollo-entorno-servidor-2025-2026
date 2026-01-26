<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Http\Resources\GamesRelationshipsGenreResource;
use App\Http\Resources\GamesRelationshipsReviewsResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return GameResource::collection(Game::all());
    }

    public function show(Game $game)
    {
        if ($this->include('genre')) {
            
        }
        return new GameResource($game);
    }

    public function store(Request $request)
    {
        $game = Game::create($request->all());
        return $game;
    }

    public function update(Game $game)
    {
        $game->update(request()->all());
        return $game;
    }

    public function delete(Game $game)
    {
        $game->delete();
        return response()->json([
            'mensaje' => 'ELiminado con éxito'
        ]);
    }

    public function gamesRelationshipsGenre(game $game)
    {
        return new GamesRelationshipsGenreResource($game);
    }

    public function gamesRelationshipsReviews(game $game)
    {
        return new GamesRelationshipsReviewsResource($game);
    }
}
