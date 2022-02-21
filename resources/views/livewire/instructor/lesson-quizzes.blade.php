<div>
    <article class="my-4 card" x-data="{open: false}">
        <div class="bg-gray-100 card-body">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Test de la lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->quiz)
                    <form wire:submit.prevent="update">

                        <input wire:model="quiz.name"  class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Ingrese el titulo del cuestionario">

                        @error('quiz.name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <input wire:model="quiz.description"  class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Ingrese instrucciones breves del cuestionario">

                        @error('quiz.description')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div x-show="open">
                           @livewire('instructor.lesson-question', ['quiz' => $quiz], key($quiz->id))
                        </div>

                        <div class="flex justify-end my-2">
                            <button wire:click="destroy" class="ml-2 text-sm btn btn-danger" type="button">Eliminar</button>
                            <button class="ml-2 text-sm btn btn-primary" type="submit">Actualizar</button>
                        </div>

                    </form>

                    @else
                    <div>
                        <input wire:model="name"  class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Ingrese el titulo del cuestionario">

                            @error('name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror

                        <input wire:model="description"  class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Ingrese instrucciones breves del cuestionario">

                            @error('description')
                                <span class="text-sm text-red-500">{{$message}}</span>
                            @enderror

                        <div class="flex justify-end">
                            <button wire:click="store" class="my-2 ml-2 text-sm btn btn-primary">Agregar</button>
                        </div>
                    </div>

                @endif
            </div>

        </div>

    </article>
    @if ($lesson->quiz)
    <x-quiz-details :quiz="$quiz" />
    @else
        <div class="px-4 py-2 text-sm font-medium text-center">
            No tiene un test disponible
        </div>
    @endif
</div>

