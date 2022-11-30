<div class="mb-4">
    {!! Form::label('title', 'Titulo del taller / curso / diplomado: ') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '') ]) !!}

@error('title')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror

</div>

<div class="mb-4 hidden">
    {!! Form::label('slug', 'Slug del curso: ') !!}
    {!! Form::text('slug', null, ['readonly'=> 'readonly', 'class' => 'form-input block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}

@error('slug')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror

</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo  del taller / curso / diplomado: ') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

@error('subtitle')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror

</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del taller / curso / diplomado: ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}

@error('description')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror
</div>

<div class="grid md:grid-cols-3 gap-4 flex-1 justify-between">
    <div>
        {!! Form::label('category_id', 'Asignatura') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('level_id', 'Nivel') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('price_id', 'Dirigido a') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del taller / curso / diplomado</h1>

<div class="grid md:grid-cols-2 gap-4 flex-1 justify-between mb-4">
    <figure>
        @isset($course->image)
             <img id="picture" class="w-full h-64 object-fill object-center" src="{{Storage::url($course->image->url)}}" alt="">
         @else
             <img id="picture" class="w-full h-64 object-fill object-center" src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
         @endisset
    </figure>
    <div>
        <p class="mb-2 text-justify text-base">* Al anadir una imagen la misma pude tener los siguientes &nbsp;&nbsp;&nbsp;formatos: jpeg, png, jpg,
            gif, svg. <br>
            * El tamaño de dato de la imagen no puede sobrepasar &nbsp;&nbsp;&nbsp;2048 megabytes (2MB). <br></p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
</div>
