<x-editor-layout :publication="$publication">

    {{-- Contenido dinamico el main esta en layout editor --}}

    <h1 class="text-2xl font-bold">INFORMACIÓN DE LA PUBLICACIÓN</h1>
        <hr class="mt-2 mb-6">

        {!! Form::model($publication, ['route' => ['editor.publications.update',$publication], 'method' => 'put', 'files' => true]) !!}

        @include('editor.publications.partials.form') {{-- el formulario esta en el form.blade.php--}}

            <div class="flex justify-end">
                {!! Form::submit('Actualizar registro', ['class' => 'btn btn-primary cursor-pointer']) !!}
            </div>

        {!! Form::close() !!}

    <x-slot name="js">

        {{--ckeditor para la descripcion--}}
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>

    </x-slot>

</x-editor-layout>
