<form class="pt-2 relative mx-auto text-black font-bold" autocomplete="off">
    <input wire:model="search" class="w-full border-2 border-gray-400 bg-white h-10 px-5 pr-16 rounded-lg text-sm font-bold focus:outline-none" type="search" name="search" placeholder="Search">
            <!-- boton search: -->
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2 focus:outline-none">
            Buscar
        </button>
            {{-- desarrollo de la opcion buscar --}}
        @if ($search)          
            <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded overflow-hidden"> 
                @forelse ($this->results as $result)         
                    <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-700">
                         <a href="{{route('courses.show', $result)}}">{{$result->title}}</a>
                    </li>
                    @empty
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-700">
                            No hay coincidencia
                        </li>
                @endforelse 
            </ul>  
        @endif    
</form>