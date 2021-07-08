<x-app-layout>
    {{-- imagen de presentacion y detalles del curso --}}
    <section class="bg-gray-400 py-12 shadow-lg mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>
            <div class="text-black">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Matriculados: {{$course->students_count}}</p>
                <p class="mb-2"><i class="fas fa-star"></i>Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>
    {{--- seccion del plan de estudio --}}
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-3xl mb-2">Plan de estudios</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-800 text-base"><i class="fas fa-check text-gray-700 mr-2"></i>{{$goal->name}}</li>                            
                        @endforeach
                    </ul>
                </div>
            </section>
            {{--seccin de temas--}}
            <section>
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow-lg" 
                    @if ($loop->first)

                        x-data="{ open: true }"                        
                        @else

                        x-data="{ open: false }"
                        
                    @endif>

                        <header class="bg-gray-400 shadow-lg rounded px-4 py-2 cursor-pointer" x-on:click="open= !open">
                            <h1 class="font-bold text-lg text-black">{{$section->name}}</h1>
                        </header>
                        {{-- seccin de lecciones y barras  grises--}}
                        <div class="card py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-800 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i>{{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>

                        </article>
                    
                @endforeach
            </section>
            {{--seccion de requisitos--}}
            <section class="my-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-900 text-base">{{$requirement->name}}</li>                        
                    @endforeach
                </ul>
            </section>
            {{--seccion de descripcion del curso--}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Descripción</h1>
                <div class="text-gray-900 text-base">
                    {!!$course->description!!}
                </div>
            </section>

           @livewire('courses-reviews', ['course' => $course]) {{--//se deben solucionar los errores que produce esta seccion de reseñas--}}

        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    {{-- targeta para matricularse al curso--}}
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                         <div class="ml-4">
                            <h1 class="font-fold text-gray-600 text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a  class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>

                     @can('enrolled', $course)   

                        <a class="btn btn-danger btn-block mt-4" href="{{(route('courses.status', $course))}}"> Continuar con el curso</a>
                     
                     @else

                        @if ($course->price->value == 0)
                        <p class="text-2xl font-semibold text-gray-500 mt-3 mb-2">{{$course->price->name}}</p>
                            <form action="{{route('courses.enrolled', $course)}}" method="POST">
                                @csrf                                               
                                <button class="btn btn-danger btn-block" type="submit">Matricularse</button>
                            </form>
                        @else                        
                            <p class="text-2xl font-semibold text-gray-500 mt-3 mb-2">US$ {{$course->price->value}}</p>
                            <a href="{{route('payment.checkout', $course)}}" class="btn btn-danger btn-block">Comprar este curso</a>
                        @endif

                     @endcan 

                </div>
            </section>
            {{--seccion  que refleja otros cursos similares al que esta visualizando--}}
            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover rounded shadow-lg" src="{{Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">

                            <h1>
                               <a class="font-bold text-gray-900 mb-3" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a>   
                            </h1>

                            <div class="flex items-center">
                                <img  class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                            </div>

                            <p class="text-sm"><i class="fas fa-star text-yellow-400 mr-2"></i>{{$similar->rating}}</p>

                        </div>
                    </article>                    
                @endforeach
            </aside>

        </div>

    </div>

</x-app-layout>