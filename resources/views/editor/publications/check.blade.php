<x-editor-layout :publication="$publication">

    <h1 class="text-2xl font-bold">OBSERVACIONES DE LA PUBLICACIÓN

    </h1>
    <hr class="mt-2 mb-6">

    <div class="font-semibold text-gray-800">
        {!! $publication->check->body !!}
    </div>

</x-editor-layout>
