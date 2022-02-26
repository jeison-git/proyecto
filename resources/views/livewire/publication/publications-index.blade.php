<div>
    {{-- Bar de navegacion de categorias y niveles --}}
    <div class="container flex py-4 mb-16 bg-gray-400 shadow-lg">

        <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-4 gap-x-2 gap-y-2">

            <button
                class="block h-12  overflow-hidden text-white bg-blue-500 rounded-lg shadow focus:outline-none hover:bg-blue-700"
                wire:click="resetFilters">
                <i class="mr-2 text-xs fas fa-archway"></i>
                Todas los géneros
            </button>

            <!-- Dropdown Categorias -->
            <div class="relative" x-data="{open: false}">

                <button
                    class="block h-12 px-4 w-full overflow-hidden text-white bg-blue-500 rounded-lg shadow focus:outline-none hover:bg-blue-700"
                    x-on:click="open = true">
                    <i class="mr-2 text-sm fas fa-tags"></i>
                    Categoria
                    <i class="ml-2 text-sm fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="relative py-2 mt-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">
                    @foreach ($categories as $category)
                        <a class="block px-4 py-2 text-gray-900 transition-colors duration-200 rounded cursor-pointer text-normal hover:bg-blue-700 hover:text-white"
                            wire:click="$set('category_publication_id', {{ $category->id }})"
                            x-on:click="open = false">{{ $category->name }}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>

            <!-- Dropdown idioma-->

            <div class="relative" x-data="{open: false}">

                <button
                    class="block h-12 px-4 overflow-hidden w-full text-white bg-blue-500 rounded-lg shadow focus:outline-none hover:bg-blue-700"
                    x-on:click="open = true">
                    <i class="mr-2 text-sm fas fa-tags"></i>
                    Idioma
                    <i class="ml-2 text-sm fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="relative py-2 mt-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">
                    @foreach ($languages as $language)
                        <a class="block px-4 py-2 text-gray-900 transition-colors duration-200 rounded cursor-pointer text-normal hover:bg-blue-700 hover:text-white"
                            wire:click="$set('language_id', {{ $language->id }})"
                            x-on:click="open = false">{{ $language->name }}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>

            <!-- Dropdown Año o fecha-->

            <div class="relative" x-data="{open: false}">

                <button
                    class="block h-12 px-4 overflow-hidden text-white bg-blue-500 rounded-lg shadow focus:outline-none hover:bg-blue-700"
                    x-on:click="open = true">
                    <i class="mr-2 text-sm fas fa-tags"></i>
                    Año de Publicación
                    <i class="ml-2 text-sm fas fa-angle-down"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="relative py-2 mt-2 bg-white border rounded shadow-xl overflow-y-scroll h-32"
                    x-show="open" x-on:click.away="open = false">
                    @foreach ($dates as $date)
                        <a class="block px-4 py-2 text-gray-900 transition-colors duration-200 rounded cursor-pointer text-normal hover:bg-blue-700 hover:text-white"
                            wire:click="$set('date_id', {{ $date->id }})"
                            x-on:click="open = false">{{ $date->year }}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>

        </div>


    </div>
    {{-- Seccion de los libros disponibles --}}
    <div
        class="container grid px-4 mx-auto my-24 max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($publications as $publication)
            <x-publication-card :publication="$publication" />
        @endforeach

    </div>

    <div class="px-4 mx-auto mt-4 mb-8 max-w-7xl sm:px-6 lg:px-8">
        {{ $publications->links() }}
    </div>

</div>
