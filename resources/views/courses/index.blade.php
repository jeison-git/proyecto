<x-app-layout>
{{-- portaday Busqueda --}}
<section class="bg-cover" style="background-image: url({{asset('img/cursos/EntradaIndex01.jpg')}})">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
        <div class="w-full md:w-3/4 lg:w-1/2">
            <h1 class="text-black font-fold text-3xl">Que las escuzas no te alcancen Aqui podras seguir tu lession</h1>
                <p class="text-black text-lg mb-4">la mejor manera de que estes actualizado y7 aportes contenido a esta pagina como colaborador</p>
                <!-- component search bar -->                   
              <div class="pt-2 relative mx-auto text-gray-600">
                <input class="w-full border-2 border-gray-400 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                type="search" name="search" placeholder="Search">
                <!-- boton search: -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2 focus:outline-none">
                Buscar
                </button>                        
              </div>            
        </div>
    </div>
</section>

@livewire('course-index')

</x-app-layout>
