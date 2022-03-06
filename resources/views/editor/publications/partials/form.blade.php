<div class="mb-4">{{-- Este es el formulario que solicita los datos del libro --}}
    {!! Form::label('title', 'Titulo de la publicación: ') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug de la publicación: ') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-input block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo de la publicación: ') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('author', 'Autor de la publicación: ') !!}
    {!! Form::text('author', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('author') ? ' border-red-600' : '')]) !!}

    @error('author')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror

</div>

<div class="grid md:grid-cols-4 gap-4">
    <div>
        {!! Form::label('gender', 'Genero de la publicación') !!}
        {!! Form::text('gender', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('gender') ? ' border-red-600' : '')]) !!}
    </div>

    <div>
        {!! Form::label('category_publication_id', 'Categoría') !!}
        {!! Form::select('category_publication_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('language_id', 'Idioma') !!}
        {!! Form::select('language_id', $languages, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('date_id', 'Año de publicación ') !!}
        {!! Form::select('date_id', $dates, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
</div>

<div class="my-4">
    {!! Form::label('description', 'Descripción de la publicación: ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}
    @error('description')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Portada del Archivo</h1>

<div class="grid md:grid-cols-2 gap-4">
    <figure>
        @isset($publication->image)
            <img id="picture" class="w-full h-64 object-contain object-center"
                src="{{ Storage::url($publication->image->url) }}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-fill object-center"
                src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
        @endisset
    </figure>
    <div>
        <p class="mb-2 text-justify">Carga la portada de tu libro o investigación aquí. Para ser aceptada, debe cumplir
            nuestros estándares de calidad para las imágenes de los libros. Directrices importantes: captures o imagen
            formato .jpg, .jpeg, .gif o .png; y sin texto en la imagen.</p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'enctype' => 'multipart/form-data']) !!}
        @error('file')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Añadir recurso PDF de la publicación</h1>

<div class="grid md:grid-cols-2 gap-4 mb-4">

    <div>
        <p class="mb-2 text-justify">Carga el recurso pdf de tu publicación aquí. Para ser aceptada, debe cumplir
            nuestros estándares de calidad Directrices importantes: formato pdf.</p>
        {!! Form::file('pdf', ['class' => 'form-input w-full' . ($errors->has('pdf') ? ' border-red-600' : ''), 'id' => 'pdf', 'enctype' => 'multipar/form-data']) !!}
        @error('pdf')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
    </div>

</div>
