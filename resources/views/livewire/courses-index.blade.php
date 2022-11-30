<div>
    {{--Bar de navegacion de categorias y niveles --}}
    <div class="container flex py-4 mt-2 mb-16 bg-green-400 shadow-lg">
        <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 gap-x-2 gap-y-2">

            <button class="block h-12 px-4 w-full overflow-hidden text-white bg-purple-500 rounded-lg shadow focus:outline-none hover:bg-purple-700" wire:click="resetFilters">
                <i class="fa fa-ellipsis-v text-xs mr-2"></i>
                Todo nuestro contenido
            </button>

                <!-- Dropdown Categorias -->
            <div class="relative" x-data="{open: false}">

                <button class="block h-12 px-4 w-full overflow-hidden text-white bg-purple-500 rounded-lg shadow focus:outline-none hover:bg-purple-700" x-on:click="open = true">
                    <i class="fa fa-code text-sm mr-2"></i>
                    Ciencia / Asignaturas
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="relative py-2 mt-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                    @foreach ($categories as $category)

                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded  hover:bg-purple-700 hover:text-white" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">{{$category->name}}</a>

                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>

                 <!-- Dropdown Niveles-->
            <div class="relative" x-data="{open: false}">

                    <button class="block h-12 px-4 overflow-hidden w-full text-white bg-purple-500 rounded-lg shadow focus:outline-none hover:bg-purple-700" x-on:click="open = true">
                        <i class="fas fa-award text-sm mr-2"></i>
                        Niveles
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="relative py-2 mt-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                        @foreach ($levels as $level)

                        <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-700 hover:text-white" wire:click="$set('level_id', {{$level->id}})" x-on:click="open = false">{{$level->name}}</a>

                        @endforeach
                    </div>
                    <!-- // Dropdown Body -->
            </div>

        </div>
    </div>
    {{-- Seccion de los cursos disponibles --}}
    <div class="container my-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($courses as $course)
            <x-course-card :course="$course" />
       @endforeach

   </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
            {{$courses->links()}}
        </div>

</div>
