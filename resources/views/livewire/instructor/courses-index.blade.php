<div class="container py-8">    
    <!-- Aca se encuentra la tabla de cursos realizados por el instructor -->    
    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:keydown="Limpiar_page" wire:model="search" class="form-input flex-1 rounded focus:outline-none border-2 border-gray-400" placeholder="Ingrese el titulo de un curso ...">
            <a class="btn btn-primary ml-2" href="{{route('instructor.courses.create')}}">Crear nuevo curso</a>
        </div>

        @if ($courses->count())

            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                    Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                    Matriculados
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                    Calificación
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                    Estado
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                
                        @foreach ($courses as $course)                    
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                   
                                    @isset($course->image)
                                        <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                                    @else
                                     <img class="h-10 w-10 rounded-full object-cover object-center" src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
                                    @endisset

                                    </div>
                                    <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$course->title}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{$course->category->name}}
                                    </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 ml-10 fas fa-users">{{$course->students->count()}}</div>
                                <div class="text-sm text-gray-500">Alumnos matriculados</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                        {{$course->rating}}
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=1 ? 'yellow' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=2 ? 'yellow' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=3 ? 'yellow' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=4 ? 'yellow' : 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >=5 ? 'yellow' : 'gray'}}-400"></i>
                                        </li>
                                    </ul>
                                </div>

                                <div class="text-sm text-gray-500">Valoración del curso</div>

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revisión
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                    @break
                                    @default
                                        
                                @endswitch
                                
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('instructor.courses.edit', $course)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>

                        @endforeach
                <!-- More items... -->
                    </tbody>
                </table>            
                <div class="px-6 py-4 whitespace-nowrap">
                {{$courses->links()}}
            </div>

            @else
            <div class="px-6 py-4">
                No hay coincidencia
            </div>

        @endif 

    </x-table-responsive>

</div>
