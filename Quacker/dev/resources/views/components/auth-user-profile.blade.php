{{-- https://laravel.com/docs/12.x/blade#anonymous-components --}}
<div class="auth-widget">
    <p>Bienvenido <b>{{ auth()->user()->display_name }}</b> <span
            class="auth-widget-username">{{ '@' }}{{ auth()->user()->username }}</span></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="auth-widget-logout-btn">Cerrar sesión</button>
    </form>
</div>
