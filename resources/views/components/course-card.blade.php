@props(['course'])

<article class="flex flex-col items-center justify-center h-full">
    <div
        class="p-2 transition-all duration-500 transform bg-white shadow-xl w-64 rounded-xl hover:shadow-2xl hover:scale-105">

        @if ($course->image->count())
            <img style="object-fit: fill;" class="{{-- object-fill --}}object-center w-64 h-64 rounded-t-md"
                src="{{ Storage::url($course->image->url) }}" alt="" />{{-- primera imagen del producto --}}
        @else
            <img class="object-contain w-64 h-64 rounded-full"
                src="https://img.icons8.com/fluency/64/000000/nothing-found.png" alt="nothing-found">
        @endif

        {{-- <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt=""> --}}

        <div class="mt-4 flex-1 flex flex-col">
            <h1 class="text-base text-center text-gray-700 uppercase">{{ Str::limit($course->title, '20') }}</h1>
            <p class="text-gray-600 text-sm mb-2 mt-auto">Prof: {{ $course->teacher->name }}</p>

            <div class="flex">

                <ul class="flex text-sm">
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow' : 'gray' }}-300"></i>
                    </li>
                </ul>

                <p class="text-sm text-gray-600 ml-auto">
                    <i class="fas fa-users"></i>
                    ({{ $course->students_count }})
                </p>

            </div>

            @if ($course->price->value == 0)
                <p class="my-2 text-green-500 font-semibold">{{ $course->price->name }}</p>
            @else
                <p class="my-2 text-gray-600">US$ {{ $course->price->value }}</p>
            @endif

            @can('enrolled', $course)
                <a class="btn {{-- btn-danger --}} bg-green-500 hover:bg-green-700 hover:text-white btn-block mt-4" href="{{ route('courses.status', $course) }}"> Continuar con el
                    tema</a>
            @else
                <a href="{{ route('courses.show', $course) }}" class="btn {{-- btn-primary --}} bg-purple-500 hover:bg-purple-700 hover:text-white btn-block">
                    Más información
                </a>
            @endcan

        </div>


    </div>

</article>
