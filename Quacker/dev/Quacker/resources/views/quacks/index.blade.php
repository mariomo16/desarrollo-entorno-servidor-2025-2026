<x-layouts.app title="Quacks" :route="route('quacks.create')">

    @section('main')
        @foreach ($quacks as $quack)
            <article class="index">

                <div class="divGeneral">
                    <div class="divImagen">
                        {{ Str::of($quack->user->display_name)->substr(0, 1) }}
                    </div>
                    <div class="divTexto">
                        <p><b>{{ $quack->user->display_name }}</b>
                            <span class="text-muted">
                                {{ '@' . $quack->user->username }} ·
                                {{ $quack->created_at->diffForHumans(null, true, true, 1) }}
                            </span>
                        </p>

                        <p>{{ $quack->content }}</p>

                        <div class="actions">
                            <div class="quack-actions">
                                <form method="POST" action="{{-- route('comment', $quack) --}}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="comment-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                        </svg>
                                        0
                                    </button>
                                </form>
                                <livewire:requack_button :quack-id="$quack->id" />



                                <form method="POST" action="{{ route('quav', $quack) }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="quav-btn">
                                        @if ($quack->quavs->isNotEmpty())
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="{{ $quack->quavs->isNotEmpty() ? '#F91880' : 'currentColor' }}"
                                                class="size-6">
                                                <path
                                                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                            </svg>
                                        @endif

                                        {{ $quack->quavs_count }}
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

                    </div>
                </div>
            </article>
        @endforeach
    @endsection

</x-layouts.app>
