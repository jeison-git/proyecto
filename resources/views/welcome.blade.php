<x-app-layout>
    {{-- portaday Busqueda --}}
    <section class="bg-cover" style="background-image: url({{asset('img/home/home.jpg')}})">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-black font-fold text-3xl">Benvenidos a su plataforma educativa</h1>
                        <p class="text-black text-lg mb-4">aca podran complementar sus actividaes andragojicas cuando quiera</p>
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
        {{-- Tabla de contenidos y breve descripcion editar estilo de bordes please--}}
    <section class="mt-24">
        <h1 class=" text-center text-black text-3xl mb-6">CONTENIDO</h1>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                    <article class="bg-white shadow-lg rounded overflow-hidden">
                        <figure>
                           <img class="h-36 w-full object-cover" src="{{asset('img/home/Contenido01.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2 px-2 py-2">
                            <h1 class=" text-center text-xl text-black mb-2 leading-6">Educacion en todo momento</h1>                            
                        </header>                        
                            <p class="text-justify text-gray-600 text-sm mx-4 mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>                        
                    
                    <article class="bg-white shadow-lg rounded overflow-hidden">
                        <figure>
                           <img class="h-36 w-full object-cover" src="{{asset('img/home/Contenido002.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2 px-2 py-2">
                            <h1 class=" text-center text-xl text-black mb-2 leading-6">Inscribe tu asignatura</h1>                            
                        </header>                        
                            <p class="text-justify text-gray-600 text-sm mx-4 mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>

                    <article class="bg-white shadow-lg rounded overflow-hidden">
                        <figure>
                           <img class="h-36 w-full object-cover" src="{{asset('img/home/Contenido03.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2 px-2 py-2">
                            <h1 class=" text-center text-xl text-black mb-2 leading-6">Mejora Tus Habilidades</h1>                            
                        </header>                        
                            <p class="text-justify text-gray-600 text-sm mx-4 mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>

                    <article class="bg-white shadow-lg rounded overflow-hidden">
                        <figure>
                           <img class="h-36 w-full object-cover" src="{{asset('img/home/Contenido04.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2 px-2 py-2">
                            <h1 class=" text-center text-xl text-black mb-2 leading-6">Participa activamente</h1>                            
                        </header>                        
                            <p class="text-justify text-gray-600 text-sm mx-4 mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>
            </div>

    </section> 
        {{-- tabla de  catalogos de cursos--}}  
    <section class="mt-24 bg-gray-400  shadow-lg py-12">
           <h1 class=" text-center text-black text-3xl mb-2">¿Por donde comenzar?</h1>
             <p class="text-center text-black">Despues de verificar tu inscriocion solo debes seguir el curso aqui estan los recientes</p>
            
             <div class="flex justify-center mt-4">
              <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catalogo de cursos
              </a>
           </div>
    </section>
        {{-- Seccion de ultimos cursos agregados --}}
    <section class="my-24">
        <h1 class="text-center text-3xl text-black mb-2"> Actividaes Recientes</h1>
        <p class="text-center text-gray-600 text-sm mb-6">Refuerza tus Habilidaes de concentracion para que termines tus cursos</p>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

             @foreach ($courses as $course)             
             <x-course-card :course="$course" />                
            @endforeach          
        </div>
    </section>
</x-app-layout>
