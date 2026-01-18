<x-layouts.app title="Quacks" :route="route('quacks.create')">

    @section('main')
        @foreach ($quacks as $quack)
            <article class="index">
                <p><b>{{ $quack->user->display_name }}</b> <span
                        class="text-muted">{{ '@' }}{{ $quack->user->username }}
                        ·
                        {{ $quack->created_at->diffForHumans(null, true, true, 1) }}</span></p>
                <p>{{ $quack->content }}</p>
                <div class="actions">
                    <div class="quack-actions">
                        <form method="POST" action="{{-- route('comment', $quack) --}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="comment-btn"><x-icon.comment /></button>
                        </form>

                        <form method="POST" action="{{ route('requack', $quack) }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="requack-btn">
                                <x-icon.share :state="$quack->isRequackedBy(Auth::user())" />
                            </button>
                        </form>

                        <form method="POST" action="{{ route('quav', $quack) }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="quav-btn">
                                <x-icon.like :state="$quack->isQuavedBy(Auth::user())" />
                            </button>
                        </form>
                    </div>
                    <div class="resource-actions">
                        <a href="{{ route('quacks.show', $quack) }}">Mostrar más</a>
                        @can('manage', $quack)
                            <a href="{{ route('quacks.edit', $quack) }}">Editar</a>
                            <form method="POST" action="{{ route('quacks.destroy', $quack) }}">
                                @csrf
                                @method('DELETE')
                                <button>Eliminar</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </article>
        @endforeach
    @endsection

</x-layouts.app>
