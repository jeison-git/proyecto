<x-app-layout>
    {{-- imagen de presentacion y detalles de la publicación --}}
    <section class="bg-gray-400 py-12 shadow-lg mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>

                @if ($publication->image)
                    <img class="h-60 w-full object-cover" src="{{Storage::url($publication->image->url)}}" alt="">
                @else
                    <img lass="h-60 w-full object-cover" src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
                @endif

            </figure>
            <div class="text-black">
                <h1 class="text-4xl">{{$publication->title}}</h1>
                <h2 class="text-xl mb-3">{{$publication->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Autor: {{$publication->author}}</p>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Genero: {{$publication->gender}}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Categoria: {{$publication->category_publication->name}}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Idioma: {{$publication->language->name}}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Año: {{$publication->date->year}}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Lectores: {{$publication->users_count}}</p>
            </div>
        </div>
    </section>

    {{--- seccion del punto de partida, metas y requerimientos del curso --}}
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="relative px-4 py-3 leading-normal border border-red-300 text-red-800 bg-red-200 rounded-lg" role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-2">
                    <svg x-on:click="open=false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </span>
                    <p class="ml-6 text-center">{{session('info')}}</p>
                </div>
            </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">

            {{--seccion de descripcion del curso--}}
            <section class=" card mt-8 mb-16">
                <div class="card-body">
                    <h1 class="font-bold text-3xl">Resumen</h1>
                    <div class="text-gray-900 text-base">
                        {!!$publication->description!!}
                    </div>
                </div>
            </section>

        </div>
        <div class="order-1 lg:order-2">
             {{-- targeta para aprobar la publicacion--}}
            <section class="card mb-4">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$publication->editor->profile_photo_url}}" alt="{{$publication->editor->name}}">
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-600 text-lg">Prof. {{$publication->editor->name}}</h1>
                            <a  class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($publication->editor->name, '')}}</a>
                        </div>
                    </div>

                     <form action="{{route('admin.publications.approved', $publication)}}" class="mt-4" method="POST">
                         @csrf
                        <button type="submit" class="btn btn-primary w-full">Aprobar curso</button>
                     </form>
                     <a href="{{route('admin.publications.observation', $publication)}}"class="btn btn-danger w-full block text-center mt-4">Descartar publicación</a>
                </div>
            </section>

        </div>

    </div>
</x-app-layout>
