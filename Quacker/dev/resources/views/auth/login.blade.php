<x-layouts.app title="Iniciar sesión">

    @section('main')
        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            <label>
                <span class="text-muted">Correo electrónico</span>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="email" name="email" required>
            </label>
            <label>
                <span class="text-muted">Contraseña</span>
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="password" name="password" required>
            </label>
            <button type="submit">Iniciar sesión</button>
            <p class="auth-redirect">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
        </form>
    @endsection

</x-layouts.app>
