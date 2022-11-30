<x-app-layout>
    {{-- portaday Busqueda --}}
    <section class="bg-cover object-center" style="background-image: url({{ asset('img/cursos/imagencursos1.jpg') }})">
        <div class="container flex items-center justify-between pt-4">

            <a href="{{ url()->previous() }}" class="mr-2">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
            </a>

        </div>
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-xl md:text-3xl text-center text-black font-bold bg-white bg-opacity-75">Aquí Aprenderas de Forma
                    Flexible y a tu Ritmo</h1>
                <p class="mb-4 md:text-lg font-semibold text-center text-black bg-white bg-opacity-50">FUNDACATTCC te ofrece un método de enseñanza en línea para educarte, mantenerte actualizado y consciente de la biodiversidad de Venezuela y mucho más.</p>
                <!-- component search bar -->
                <!-- barra de busqueda que se encuentra en el componente livewire -->
                @livewire('search')
            </div>
        </div>
    </section>

    @livewire('courses-index')

</x-app-layout>
