<div class="my-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>

            <h1 class="text-3xl  font-bold mt-4">
                {{$current->name}}
            </h1>
            
            <div class="flex justify-between mt-4">          
                    {{--Marcar unidad como culminada y descargas de archivos--}}
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i> 
                    @endif

                    <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
                </div>

                @if ($current->resource)                           
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg"></i> 
                        <p class="text-sm ml-2">Descargar recurso</p>
                    </div>
                @endif

            </div>  

            <div class="card mt-2">
                <div class="card-body flex text-gray-800 font-bold">

                    @if ($this->previous)
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Tema anterior</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="cursor-pointer ml-auto">Siguiente tema</a>
                    @endif

                </div>
            </div>

            {{-- Aqui deben ir los componentes del test--}}
            <div>
                <article class="card mt-4" x-data="{open: false}">
                    <div class="card-body">
                        @if ($current->description)
                        <header>
                            <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i>Resumen</h1>
                        </header>                        
                        @endif   
                        <div x-show="open">    
                            {{--seccion de descripcion de la leccion--}}
                            
                                <section class="mb-8">
                                    <div class="text-gray-800 text-base text-justify">
                                        {!!$current->description->name ?? null!!}
                                    </div>
                                </section>
                            
                        </div> 

                    </div>
                </article>

                <article class="card mt-4" x-data="{open: false}">
                    <div class="card-body">

                        <header>
                            <h1 x-on:click="open = !open"class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i>Test: {!!$current->quiz->name ?? null!!}</h1>
                        </header>

                        <div x-show="open">    
                            {{--seccion de descripcion de la leccion--}}
                            
                                <form>
                                    @foreach ($current->quiz->questions as $question)
                                        <strong>
                                            Preguntas {{ $loop->iteration }}: 
                                        </strong>
                                        {{ $question->name }}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}1" value="answer_1">
                                            <label class="form-check-label" for="quiz{{ $question->id }}1">
                                            {{ $question->answer_1 }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}2" value="answer_2">
                                            <label class="form-check-label" for="quiz{{ $question->id }}2">
                                            {{ $question->answer_2 }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}3" value="answer_3">
                                            <label class="form-check-label" for="quiz{{ $question->id }}3">
                                            {{ $question->answer_3 }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}4" value="answer_4">
                                            <label class="form-check-label" for="quiz{{ $question->id }}4">
                                            {{ $question->answer_4 }}
                                            </label>
                                        </div>
                                        @if(!$loop->last)
                                            <hr>
                                        @endif
                                    @endforeach
                                    <button class="btn btn-success btn-sm btn-block mt-3" wire:click="result">Termina el test</button>
                                </form>
                            
                        </div> 
                       
                    </div>
                </article>
                  
            </div>       
            {{-- Fin de los componentes del test--}}
        </div>

        <div class="card">
            <div class=" card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>

                <div class="flex items-center">

                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>

                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>

                </div>
                
                <p class="text-gray-600 text-sm mt-2">{{$this->advance . ' ' . '%' . ' '}}Completado</p>

                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                      <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-700"></div>
                    </div>
                  </div>
                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-900 mb-4">
                            <a class="font-bold text-base inline-block mb-2">{{$section->name}}</a>    
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex mb-1">
                                        <div>
                                            @if ($lesson->completed)

                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                 @endif
                                                
                                            @else

                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>    
                                                @endif
                                            
                                            @endif    
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>
                                    </li>                                    
                                @endforeach    
                            </ul> 
                        </li>                        
                    @endforeach
                </ul>

            </div>

        </div>

    </div>

    {{--modal-test- esta en component           
    <x-modal-test :quiz="$quiz" />
    Fin seccion de modales?--}}
    
    

</div>
