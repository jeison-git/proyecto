<div class="my-8">
    <div class="container grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!! $current->iframe !!}
            </div>

            <h1 class="mt-4 text-3xl font-bold">
                {{ $current->name }}
            </h1>

            <div class="flex justify-between mt-4">
                {{-- Marcar unidad como culminada y descargas de archivos --}}
                <div class="flex items-center cursor-pointer" wire:click="completed">

                    @if ($current->completed)
                        <i class="text-2xl text-blue-600 fas fa-toggle-on"></i>
                    @else
                        <i class="text-2xl text-gray-600 fas fa-toggle-off"></i>
                    @endif

                    <p class="ml-2 text-sm">Marcar esta unidad como culminada</p>
                </div>

                @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="text-lg fas fa-download"></i>
                        <p class="ml-2 text-sm">Descargar recurso</p>
                    </div>
                @endif

            </div>

            <div class="mt-2 card">
                <div class="flex font-bold text-gray-800 card-body">

                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Siguiente
                            tema</a>
                    @endif

                </div>
            </div>

            {{-- Aqui deben ir los componentes del test --}}
            <div>
                <article class="mt-4 card" x-data="{open: false}">
                    <div class="card-body">
                        @if ($current->description)
                            <header>
                                <h1 x-on:click="open = !open" class="cursor-pointer"><i
                                        class="mr-1 text-blue-500 far fa-play-circle"></i>Resumen</h1>
                            </header>
                        @endif
                        <div x-show="open">
                            {{-- seccion de descripcion de la leccion --}}

                            <section class="mb-8">
                                <div class="text-base text-justify text-gray-800">
                                    {!! $current->description->name ?? null !!}
                                </div>
                            </section>

                        </div>

                    </div>
                </article>
                {{-- seccion de descripcion de la leccion --}}

                {{-- <article class="mt-4 card" x-data="{open: false}">
                    <div class="card-body">

                        <header>
                            <h1 x-on:click="open = !open"class="cursor-pointer"><i class="mr-1 text-blue-500 far fa-play-circle"></i>Test: {!!$current->quiz->name ?? null!!}</h1>
                        </header>

                        <div x-show="open">


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
                                        @if (!$loop->last)
                                            <hr>
                                        @endif
                                    @endforeach
                                    <button class="mt-3 btn btn-success btn-sm btn-block" wire:click="result">Termina el test</button>
                                </form>

                        </div>

                    </div>
                </article> --}}

            </div>
            {{-- Fin de los componentes del test --}}
        </div>

        <div class="card">
            <div class=" card-body">
                <h1 class="mb-4 text-2xl leading-8 text-center">{{ $course->title }}</h1>

                <div class="flex items-center">

                    <figure>
                        <img class="object-cover w-12 h-12 mr-4 rounded-full"
                            src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>

                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-sm text-blue-500" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>

                </div>

                <p class="mt-2 text-sm text-gray-600">{{ $this->advance . ' ' . '%' . ' ' }}Completado</p>

                <div class="relative pt-1">
                    <div class="flex h-2 mb-4 overflow-hidden text-xs bg-gray-200 rounded">
                        <div style="width:{{ $this->advance . '%' }}"
                            class="flex flex-col justify-center text-center text-white transition-all duration-700 bg-blue-500 shadow-none whitespace-nowrap">
                        </div>
                    </div>
                </div>
                <ul>
                    @foreach ($course->sections as $section)
                        <li class="mb-4 text-gray-900">
                            <a class="inline-block mb-2 text-base font-bold">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex mb-1">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 mt-1 mr-2 border-2 border-yellow-300 rounded-full"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 mt-1 mr-2 bg-yellow-300 rounded-full"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 mt-1 mr-2 border-2 border-gray-500 rounded-full"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 mt-1 mr-2 bg-gray-500 rounded-full"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer"
                                            wire:click="changeLesson({{ $lesson }})">{{ $lesson->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>

    </div>

    {{-- modal-test- esta en component
    <x-modal-test :quiz="$quiz" />
    Fin seccion de modales? --}}



</div>
