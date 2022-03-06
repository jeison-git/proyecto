<x-app-layout>
    {{-- imagen de presentacion y detalles del curso --}}
    <section class="bg-gray-300 py-12 shadow-lg mb-12">

        <div class="container flex items-center justify-between mb-4">

            <a href="{{ url()->previous() }}" class="mr-2">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
            </a>

        </div>

        <div class="container grid grid-cols-1 items-center justify-center md:grid-cols-2 gap-4">
            <figure>

                @if ($publication->image)
                    <img class="object-contain w-full h-80 rounded-t-md shadow-sm"
                        src="{{ Storage::url($publication->image->url) }}" alt="{{ $publication->author }}" />
                @else
                    <img class="object-contain w-64 h-64 rounded-full"
                        src="https://img.icons8.com/fluency/64/000000/nothing-found.png" alt="nothing-found">
                @endif
            </figure>

            <div class="text-black">
                <h1 class="text-4xl">{{ $publication->title }}</h1>
                <h2 class="text-xl mb-3">{{ $publication->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Autor: {{ $publication->author }}</p>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Genero: {{ $publication->gender }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Categoria:
                    {{ $publication->category_publication->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Lectores: {{ $publication->users_count }}</p>
            </div>
        </div>
    </section>
    {{-- - seccion del plan de estudio --}}
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-3xl mb-2">Resumen</h1>
                    <div class="text-gray-900 text-base">
                        {!! $publication->description !!}
                    </div>
                </div>
            </section>

            {{-- <div>
                @livewire('publication.download', ['publication' => $publication], key('download' . $publication->id))
            </div> --}}

        </div>

        <div class="order-1 lg:order-2">

            <section class="card mb-4">
                <div class="card-body">
                    {{-- targeta para leer libro --}}
                    <div class="flex items-center">
                        <div>
                            <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                                src="{{ $publication->editor->profile_photo_url }}"
                                alt="{{ $publication->editor->name }}">
                            <a class="text-gray-400 text-sm font-bold" href="">Te recomienda leer </a>
                        </div>
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-600 text-lg"> {{ $publication->title }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($publication->author, '') }}</a>
                        </div>
                    </div>

                    @can('enrolled', $publication){{-- ojo revisar luego --}}
                        <a class="btn btn-danger btn-block mt-4 cursor-default">
                            @if ($publication->resource)
                                <div>
                                    DESCARGA PARA LEER

                                    @livewire('publication.download', ['publication' => $publication], key('download' .
                                    $publication->id))

                                </div>
                            @else
                                NO HAY RECURSO PARA DESCARGAR
                            @endif

                        </a>
                    @else
                        <p class="text-sm font-semibold text-gray-500 mt-3 mb-2">Comienza a Disfrutar la lectura</p>
                        <form action="{{ route('publications.enrolled', $publication) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-block" type="submit"> Revisar </button>
                        </form>
                    @endcan

                </div>
            </section>

            {{-- seccion  que refleja otros libros similares al que esta visualizando --}}
            <aside class="hidden lg:block">
                <h1>
                    <a class="font-bold uppercase text-gray-900 mb-4">Otros recursos de ínteres</a>
                </h1>
                @foreach ($similares as $similar)
                    <article class="flex mt-4 mb-6">
                        {{-- <img class="h-32 w-40 object-cover rounded shadow-lg"
                            src="{{ Storage::url($similar->image->url) }}" alt=""> --}}
                        @if ($similar->image)
                            <img class="object-fill w-40 h-32 rounded-t-md shadow-lg"
                                src="{{ Storage::url($similar->image->url) }}" alt="{{ $similar->author }}" />
                        @else
                            <img class="object-contain w-40 h-32 rounded-t-md shadow-lg"
                                src="https://img.icons8.com/fluency/64/000000/nothing-found.png" alt="nothing-found">
                        @endif
                        <div class="ml-3">

                            <h1>
                                <a class="font-bold text-gray-900 mb-3"
                                    href="{{ route('publications.show', $similar) }}">{{ Str::limit($similar->title, 40) }}</a>
                            </h1>

                            <p class="text-gray-700 text-sm ml-2">Autor: {{ $similar->author }}</p>

                            <p class="text-gray-700 text-sm ml-2">Genero: {{ $similar->gender }}</p>

                            <p class="text-gray-700 text-sm ml-2">Categoria: {{ $similar->category_publication->name}}</p>

                        </div>
                    </article>
                @endforeach
            </aside>

        </div>

    </div>

</x-app-layout>
