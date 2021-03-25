<x-instructor-layout>

    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    {{-- Contenido dinamico el main esta en layout instructor --}}
     
    <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
        <hr class="mt-2 mb-6"> 

        {!! Form::model($course, ['route' => ['instructor.courses.update',$course], 'method' => 'put', 'files' => true]) !!}
        
        @include('instructor.courses.partials.form') {{-- el formulario esta en el form.blade.php--}}
        
            <div class="flex justify-end">
                {!! Form::submit('Actualizar formulario', ['class' => 'btn btn-primary cursor-pointer']) !!}
            </div>
        
        {!! Form::close() !!} 
    
    <x-slot name="js">

        {{--ckeditor para la descripcion--}}
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    
    </x-slot>
    
</x-instructor-layout>