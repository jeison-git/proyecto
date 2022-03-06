@props(['publication'])



<div class="flex flex-col items-center justify-center h-full">{{-- tarjeta que muestra informacion del producto --}}

    <article
        class="p-2 flex-1 transition-all duration-500 transform shadow-xl w- rounded-xl hover:shadow-2xl hover:scale-105 flex flex-col object-center bg-contain w-64 h-64 rounded-t-md"
        style="object-fit: fill; background-image: url('{{ asset('img/publication/portada1.png') }}')">

        <div class="flex flex-col flex-1">

            <h1 class="text-base text-center bg-gray-100 text-black uppercase">
                {{ Str::limit($publication->title, '60') }}
            </h1>
            <p class="mb-2 text-sm text-center text-white uppercase mt-2">{{ $publication->category_publication->name}}</p>
            <p class="mt-auto mb-2 text-sm text-center text-white uppercase">{{ $publication->gender }}</p>
            <p class="text-lg text-center text-white">{{ Str::limit($publication->author, '20') }}</p>
            <p class="mb-2 text-sm text-center text-white">{{ $publication->date->year }}</p>

            <div class="flex">

                <p class="ml-auto text-sm text-gray-100">
                    <i class="fas fa-users"></i>
                    ({{ $publication->users_count }})
                </p>

            </div>

            @can('enrolled', $publication)
                <a class="mt-4 btn btn-primary btn-block" href="{{ route('publications.show', $publication) }}"> Recurso Consultado</a>

            @else
                <form action="{{ route('publications.enrolled', $publication) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-block" type="submit"> Consultar </button>
                </form>
            @endcan

        </div>
    </article>


</div>
