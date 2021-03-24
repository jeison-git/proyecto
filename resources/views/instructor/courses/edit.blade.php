<x-app-layout>

    <div class="container py-8 grid grid-cols-5">

        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>

            <ul class="text-sm text-gray-900">
                <li class="leading-7 mb-1 border-l-4 border-blue-500 pl-2">
                    <a href="">Información del curso</a>
                </li>

                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Lecciones del curso</a>
                </li>

                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Metas del curso</a>
                </li>

                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Estudiantes</a>
                </li>
            </ul>

        </aside>

        <div class="col-span-4 card">
            <div class="card-body text-gray-700">
                <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
                <hr class="mt-2 mb-6">

                {!! Form::model($course, ['route' => ['instructor.courses.update',$course], 'method' => 'put', 'files' => true]) !!}

                    @include('instructor.courses.partials.form') {{-- el formulario esta en el form.blade.php--}}

                    <div class="flex justify-end">
                        {!! Form::submit('Actualizar formulario', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}    

            </div>

        </div>
        

    </div>
    
    <x-slot name="js">  

        {{--ckeditor para la descripcion--}}
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
   
    </x-slot>
    
</x-app-layout>