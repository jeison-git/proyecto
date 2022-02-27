<div class="container py-8">
    <!-- Aca se encuentra la tabla de cursos realizados por el instructor -->
    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:keydown="Limpiar_page" wire:model="search" class="form-input flex-1 rounded focus:outline-none border-2 border-gray-400" placeholder="Ingrese el titulo de la publicación ...">
            <a class="btn btn-primary ml-2" href="{{route('editor.publications.create')}}">Crear nuevo registro</a>
        </div>

        @if ($publications->count())

            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                    Nombre
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

                        @foreach ($publications as $publication)

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">

                                    @isset($publication->image)
                                        <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($publication->image->url)}}" alt="">
                                    @else
                                     <img class="h-10 w-10 rounded-full object-cover object-center" src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
                                    @endisset

                                    </div>
                                    <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$publication->title}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{$publication->category_publication->name}}
                                    </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">{{-- Estado del curso si es aprobado o no --}}

                                @switch($publication->status)
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
                                <a href="{{route('editor.publications.edit', $publication)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>

                        @endforeach
                <!-- More items... links de navegación -->
                    </tbody>
                </table>
                <div class="px-6 py-4 whitespace-nowrap">
                {{$publications->links()}}
            </div>

            @else
            <div class="px-6 py-4">
                No hay coincidencia
            </div>

        @endif

    </x-table-responsive>

</div>
