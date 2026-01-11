<x-layouts.app title="Crear quashtag" :route="route('quashtags.create')">

    @section('main')
        <form method="POST" action="{{ route('quashtags.store') }}" class="resource-form">
            @csrf
            <label>
                <span class="text-muted">Quashtag</span>
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="text" name="name" value="{{ old('name') }}" placeholder="QuackerEsMejorQueX" required>
            </label>
            <div class="form-actions">
                <a href="{{ route('quashtags.index') }}">Cancelar</a>
                <button type="submit">Crear quashtag</button>
            </div>
        </form>
    @endsection

</x-layouts.app>
