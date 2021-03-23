<x-app-layout>
{{-- portaday Busqueda --}}
<section class="bg-cover" style="background-image: url({{asset('img/cursos/EntradaIndex01.jpg')}})">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
        <div class="w-full md:w-3/4 lg:w-1/2">
            <h1 class="text-black font-fold text-3xl">Que las escuzas no te alcancen Aqui podras seguir tu lession</h1>
                <p class="text-black text-lg mb-4">la mejor manera de que estes actualizado y7 aportes contenido a esta pagina como colaborador</p>
                <!-- component search bar -->                   
             <!-- barra de busqueda que se encuentra en el componente livewire -->                 
             @livewire('search')           
        </div>
    </div>
</section>

@livewire('courses-index')

</x-app-layout>
