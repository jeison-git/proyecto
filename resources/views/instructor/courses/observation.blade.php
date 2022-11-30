<x-instructor-layout :course="$course">

    <h1 class="text-2xl font-bold">OBSERVACIONES DEL TALLER / CURSO / ETC.</h1>
        <hr class="mt-2 mb-6">

        <div class="text-gray-800 font-semibold">
            {!!$course->observation->body!!}
        </div>

</x-instructor-layout>
