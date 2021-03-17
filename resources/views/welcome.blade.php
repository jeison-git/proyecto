<x-app-layout>

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
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                        </button>                        
                      </div>            
                </div>
            </div>
    </section>

    <section class="mt-24">
        <h1 class=" text-center text-black text-3xl mb-6">CONTENIDO</h1>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                    <article>
                        <figure>
                           <img class="border-2 border-gray-400 h-36 w-full object-cover" src="{{asset('img/home/Contenido01.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-black text-xl">Educacion en todo momento</h1>                            
                        </header>                        
                            <p class="text-justify text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>                        
                    
                    <article>
                        <figure>
                           <img class="border-2 border-gray-400 h-36 w-full object-cover" src="{{asset('img/home/Contenido002.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-black text-xl">Inscribe tu asignatura</h1>                            
                        </header>                        
                            <p class="text-justify text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>

                    <article>
                        <figure>
                           <img class="border-2 border-gray-400 h-36 w-full object-cover" src="{{asset('img/home/Contenido03.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-black-700 text-xl">Mejora Tus Habilidades</h1>                            
                        </header>                        
                            <p class="text-justify text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>

                    <article>
                        <figure>
                           <img class="border-2 border-gray-400 h-36 w-full object-cover" src="{{asset('img/home/Contenido04.jpg')}}" alt=""> 
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-black-700 text-xl">Participa activamente</h1>                            
                        </header>                        
                            <p class="text-justify text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellendus dolorem, similique cor</p>
                    </article>
            </div>

    </section> 
    
    <section class="mt-24 bg-gray-400 py-12">
           <h1 class=" text-center text-black text-3xl mb-2">¿Por donde comenzar?</h1>
             <p class="text-center text-black">Despues de verificar tu inscriocion solo debes seguir el curso aqui estan los recientes</p>
            
             <div class="flex justify-center mt-4">
              <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catalogo de cursos
              </a>
           </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-black mb-2"> Actividaes Recientes</h1>
        <p class="text-center text-gray-600 text-sm mb-6">Refuerza tus Habilidaes de concentracion para que termines tus cursos</p>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

             @foreach ($courses as $course)             
                <article class="bg-white shadow-lg rounded overflow-hidden">
                    <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                
                    <div class="px-4 py-4">
                        <h1 class="text-xl text-black mb-2 leading-6">{{Str::limit($course->title,'40')}}</h1>
                        <p class="text-gray-600 text-sm mb-2">Prof: {{$course->teacher->name}}</p>
                        
                     <div class="flex">  

                        <ul class="flex text-sm">
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$course->rating >=1 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$course->rating >=2 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$course->rating >=3 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$course->rating >=4 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$course->rating >=5 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                        </ul>

                        <p class="text-sm text-gray-600 ml-auto">
                            <i class="fas fa-users"></i>
                            ({{$course->students_count}})
                        </p>

                    </div>
                      <a href="{{route('course.show', $course)}}" class=" block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Más información
                      </a> 
                    </div>

                </article>                
            @endforeach          
        </div>
    </section>
</x-app-layout>
