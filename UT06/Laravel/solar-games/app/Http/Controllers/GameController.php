<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
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
}
