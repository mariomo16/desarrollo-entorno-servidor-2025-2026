<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function show(Genre $genre)
    {
        return $genre;
    }

    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return $genre;
    }

    public function update(Genre $genre)
    {
        $genre->update(request()->all());
        return $genre;
    }

    public function delete(Genre $genre)
    {
        $genre->delete();
        return response()->json([
            'mensaje' => 'ELiminado con éxito'
        ]);
    }
}
