<x-layouts.app :title="'🦆' . $quashtag->name" :route="route('quashtags.create')">

    @section('main')
        <form method="POST" action="{{ route('quashtags.update', $quashtag) }}" class="resource-form">
            @csrf
            @method('PATCH')
            <label>
                <span class="text-muted">Quashtag</span>
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="text" name="name" value="{{ $quashtag->name }}" placeholder="QuackerEsMejorQueX" required>
            </label>
            <div class="form-actions">
                <a href="{{ route('quashtags.index') }}">Cancelar</a>
                <button type="submit">Guardar</button>
            </div>
        </form>
    @endsection

</x-layouts.app>
