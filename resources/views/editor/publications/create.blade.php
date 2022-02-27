<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVO REGISTRO</h1>

                <hr class="mt-2 mb-6">
                {!! Form::open(['route' => 'editor.publications.store', 'files' => true , 'autocomplete' => 'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                     @include('editor.publications.partials.form')

                     <div class="flex justify-end">
                        {!! Form::submit('Crear nueva publicación', ['class' => 'btn btn-primary cursor-pointer']) !!}
                     </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <x-slot name="js"> {{--ckeditor para la descripcion--}}
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/editor/publications/form.js')}}"></script>
    </x-slot>
</x-app-layout>
