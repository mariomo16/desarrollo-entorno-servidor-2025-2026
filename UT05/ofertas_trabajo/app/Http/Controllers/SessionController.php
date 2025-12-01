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
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'El campo email es obligatorio',
                'email.email' => 'El campo email debe ser un correo electrónico válido',
                'password.required' => 'La contraseña es obligatoria',
            ]
        );

        if (!Auth::attempt($validado)) {
            throw validationException::withMessages([
                'error_validacion' => 'Lo siento, me he equivocado y no volverá a ocurrir',
            ]);
        }
        $request->session()->regenerate(); // Regenerar el token de las sesión
        return redirect('/ofertas');
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
    public function destroy()
    {
        Auth::logout();
        return redirect('/ofertas');
    }
}
