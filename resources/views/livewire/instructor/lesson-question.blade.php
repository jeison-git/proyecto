<div>
    {{-- Se mostrara la informacion de la lección --}}
    @foreach ($quiz->questions as $item)
        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body">

                @if ($question->id == $item->id)
                    <form wire:submit.prevent="update">

                        <div class="flex items-center">
                            <label class="w-32">Pregunta: </label>
                            <input wire:model="question.name" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        
                        @error('question.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center">
                            <label class="w-32">1|Respuesta: </label>
                            <input wire:model="question.answer_1" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        
                        @error('question.answer_1')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center">
                            <label class="w-32">2|Respuesta: </label>
                            <input wire:model="question.answer_2" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        
                        @error('question.answer_2')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center">
                            <label class="w-32">3|Respuesta: </label>
                            <input wire:model="question.answer_3" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        
                        @error('question.answer_3')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center">
                            <label class="w-32">4|Respuesta: </label>
                            <input wire:model="question.answer_4" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        
                        @error('question.answer_4')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Respuesta correcta: </label>

                            <select wire:model="question.correct_answer" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                                <option  value="answer_1">1. Respuesta</option>
                                <option  value="answer_2">2. Respuesta</option>
                                <option  value="answer_3">3. Respuesta</option>
                                <option  value="answer_4">4. Respuesta</option>
                            </select>

                        </div>

                        @error('question.correct_answer')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn btn-danger cursor-pointer" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-primary ml-2 cursor-pointer">Actualizar</button>
                        </div>

                    </form>
                @else                  
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i>Pregunta: {{$item->name}}</h1>
                    </header>

                    <div x-show="open">

                        <hr class="my-2">

                            <p class="text-sm">Pregunta: {{$item->name}}</p>
                            <p class="text-sm">Respuestas <a class="text-blue-600">{{$item->answer_1}}</a>...</p>
                       
                        <div class="my-2">
                            <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>                         
                        
                    </div>
                @endif

            </div>
        </article>        
    @endforeach
        {{--card para agregar y actualizar lecciones y secciones--}}
    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer mb-4 ml-2">
            <i class="fas fa-plus-square text-2xl text-red-500 mr-2"></i>
             Agregar pregunta
        </a>

        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold rounded mb-4"> Agregar nueva pregunta </h1>

                <div class="mb-4">

                    <div class="flex items-center">
                        <label class="w-32">Pregunta: </label>
                        <input wire:model="name" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center">
                        <label class="w-32">1|Respuesta: </label>
                        <input wire:model="answer_1" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    @error('answer_1')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center">
                        <label class="w-32">2|Respuesta: </label>
                        <input wire:model="answer_2" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    @error('answer_2')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center">
                        <label class="w-32">3|Respuesta: </label>
                        <input wire:model="answer_3" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    @error('answer_3')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center">
                        <label class="w-32">4|Respuesta: </label>
                        <input wire:model="answer_4" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    
                    @error('answer_4')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Respuesta correcta: </label>

                        <select wire:model="correct_answer" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                            <option>Respuestas</option>
                            <option value="answer_1">1. Respuesta</option>
                            <option value="answer_2">2. Respuesta</option>
                            <option value="answer_3">3. Respuesta</option>
                            <option value="answer_4">4. Respuesta</option>
                        </select>

                    </div> 
                
                </div>

                <div class="flex justify-end">
                    <button class= "btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>

            </div>

        </article>
    </div>

</div>