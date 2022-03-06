<x-guest-layout>
    {{-- imagen de presentacion y detalles de la publicación --}}
    <section class="py-12 mb-12 bg-gray-300 shadow-lg">
        <div class="container flex items-center justify-between mb-4">

            <a href="{{ url()->previous() }}" class="flex items-center mr-2 text-base uppercase">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" /> Regresar
            </a>

        </div>
        <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure>

                @if ($publication->image)
                    <img class="object-contain w-full h-96" src="{{ Storage::url($publication->image->url) }}" alt="">
                @else
                    <img lass="h-60 w-full object-fill"
                        src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
                @endif

            </figure>
            <div class="text-black">
                <h1 class="text-4xl">{{ $publication->title }}</h1>
                <h2 class="mb-3 text-xl">{{ $publication->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Autor: {{ $publication->author }}</p>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Genero: {{ $publication->gender }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Categoria:
                    {{ $publication->category_publication->name }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Idioma: {{ $publication->language->name }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Año: {{ $publication->date->year }}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Lectores: {{ $publication->users_count }}</p>
            </div>
        </div>
    </section>

    {{-- - seccion del punto de partida, metas y requerimientos del curso --}}
    <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="relative px-4 py-3 leading-normal text-red-800 bg-red-200 border border-red-300 rounded-lg"
                    role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-2">
                        <svg x-on:click="open=false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                            <path
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    <p class="ml-6 text-center">{{ session('info') }}</p>
                </div>
            </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">

            @if ($publication->resource)
                <div class="flex items-center">
                   <p class="mr-2 "> DESCARGA PARA REVISAR EL RECURSO COMPARTIDO.</p>
                    @livewire('publication.download', ['publication' => $publication], key('download' .
                    $publication->id))

                </div>
            @else
                NO HAY RECURSO PARA DESCARGAR
            @endif

            {{-- seccion de descripcion del curso --}}
            <section class="mt-8 mb-16 card">
                <div class="card-body">
                    <h1 class="text-3xl font-bold">Resumen</h1>
                    <div class="text-base text-gray-900">
                        {!! $publication->description !!}
                    </div>
                </div>
            </section>

        </div>
        <div class="order-1 lg:order-2">
            {{-- targeta para aprobar la publicacion --}}
            <section class="mb-4 card">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="object-cover w-12 h-12 rounded-full shadow-lg"
                            src="{{ $publication->editor->profile_photo_url }}"
                            alt="{{ $publication->editor->name }}">
                        <div class="ml-4">
                            <h1 class="text-lg text-gray-600 font-fold">Prof. {{ $publication->editor->name }}</h1>
                            <a class="text-sm font-bold text-blue-400"
                                href="">{{ '@' . Str::slug($publication->editor->name, '') }}</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.publications.approved', $publication) }}" class="mt-4"
                        method="POST">
                        @csrf
                        <button type="submit" class="w-full btn btn-primary">Aprobar curso</button>
                    </form>
                    <a href="{{ route('admin.publications.check', $publication) }}"
                        class="block w-full mt-4 text-center btn btn-danger">Descartar publicación</a>
                </div>
            </section>

        </div>

    </div>
</x-guest-layout>
