<form class="relative pt-2 mx-auto font-bold text-black" autocomplete="off">
    <input wire:model="search" class="w-full h-10 px-5 pr-16 text-sm font-bold bg-white border-2 border-gray-400 rounded-lg focus:outline-none" type="search" name="search" placeholder="¿Buscas una publicación en especifico?">
            <!-- boton search: -->
        <button type="submit" class="absolute top-0 right-0 px-4 py-2 mt-2 font-bold text-white bg-purple-500 rounded hover:bg-purple-700 focus:outline-none">
            Buscar
        </button>
            {{-- desarrollo de la opcion buscar --}}
        @if ($search)
            <ul class="absolute left-0 z-50 w-full mt-1 overflow-hidden bg-white rounded">
                @forelse ($this->results as $result)
                    <li class="px-5 text-sm leading-10 cursor-pointer hover:bg-purple-700">
                         <a href="{{-- {{route('publications.show', $result)}} --}}">{{$result->title}}</a>
                    </li>
                    @empty
                        <li class="px-5 text-sm leading-10 cursor-pointer hover:bg-purple-700">
                            No hay coincidencia
                        </li>
                @endforelse
            </ul>
        @endif
</form>
