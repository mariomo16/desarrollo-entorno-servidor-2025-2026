<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones a los campos de inicio de sesion
        $attributes = request()->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ],
            [
                'email.required' => 'El correo electrónico es obligatorio',
                'email.email' => 'Introduce un correo electrónico válido',
                'password' => 'La contraseña es obligatoria'
            ]
        );

        // Comprueba si no existen los datos introducidos
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'No se ha encontrado ninguna cuenta con los datos introducidos'
            ]);
        }

        // Previene token hijacking
        request()->session()->regenerate();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
