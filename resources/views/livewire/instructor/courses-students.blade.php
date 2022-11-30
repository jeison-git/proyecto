<div>

    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL TALLER / CURSO / ETC.</h1>

    <x-table-responsive>

        <div class="px-6 py-4">
            <input wire:model="search" class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Ingrese el nombre de un estudiante ...">
        </div>

        @if ($students->count())

            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                    Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-black uppercase tracking-wider">
                    Email
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                    <tbody class="bg-white divide-y divide-gray-300">

                    @foreach ($students as $student)

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">

                                     <img class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt="">

                                    </div>
                                    <div class="ml-4">

                                    <div class="text-sm font-medium text-gray-900">
                                        {{$student->name}}
                                    </div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 ml-4">{{$student->email}}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="" class="btn btn-primary">Ver</a>
                            </td>
                        </tr>

                    @endforeach

                <!-- More items... -->
                    </tbody>
                </table>
                <div class="px-6 py-4 whitespace-nowrap">
                {{$students->links()}}
            </div>

            @else
            <div class="px-6 py-4">
                No hay coincidencia
            </div>

        @endif

    </x-table-responsive>

</div>
