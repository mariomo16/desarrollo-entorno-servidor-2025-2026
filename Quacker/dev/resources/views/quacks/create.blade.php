<x-layouts.app title="Crear quack" :route="route('quacks.create')">

    @section('main')
        <form method="POST" action="{{ route('quacks.store') }}" class="resource-form">
            @csrf
            <label>
                <span class="text-muted">Quack, quack, ¿qué pasa?</span>
                @error('content')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </label>
            <textarea name="content" maxlength="280" required>{{ old('content') }}</textarea>
            <div class="form-actions">
                <a href="{{ route('quacks.index') }}">Cancelar</a>
                <button type="submit">Crear quack</button>
            </div>
        </form>
    @endsection

</x-layouts.app>
