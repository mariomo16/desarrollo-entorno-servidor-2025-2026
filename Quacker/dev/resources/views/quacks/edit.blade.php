<x-layouts.app :title="'Quack ' . $quack->id" :route="route('quacks.create')">

    @section('main')
        <form method="POST" action="{{ route('quacks.update', $quack) }}" class="resource-form">
            @csrf
            @method('PATCH')
            <label>
                <span class="text-muted">Quack, quack, ¿qué pasa?</span>
                @error('content')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </label>
            <textarea name="content" maxlength="280" required>{{ $quack->content }}</textarea>
            <div class="form-actions">
                <a href="{{ route('quacks.index') }}">Cancelar</a>
                <button type="submit">Guardar</button>
            </div>
        </form>
    @endsection

</x-layouts.app>
