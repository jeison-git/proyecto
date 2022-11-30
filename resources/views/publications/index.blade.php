<x-app-layout>
    {{-- portaday Busqueda --}}
    <section class="object-center bg-contain" style="background-image: url({{ asset('img/publication/library2.jpg') }})">
        <div class="container flex items-center justify-between pt-4">

            <a href="{{ url()->previous() }}" class="mr-2">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
            </a>

        </div>
        <div class="px-4 mx-auto md:max-w-7xl sm:px-6 lg:px-8 md:py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-xl md:text-3xl text-black font-bold bg-white bg-opacity-75">Este Repositorio Con Objetivo
                    Institucional</h1>
                <p class="mb-4 md:text-lg font-semibold text-center text-black bg-white bg-opacity-50">permite integrar,
                    publicar y consultar los contenidos académicos de caracter cientificos, que desen generar y compartir nuestros usuarios, participantes, colaboradores
                    y docentes.</p>
                <!-- component search bar -->
                <!-- barra de busqueda que se encuentra en el componente livewire -->
                @livewire('publication.search')
            </div>
        </div>
    </section>
    @livewire('publication.publications-index')
</x-app-layout>
