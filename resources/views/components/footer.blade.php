<div class="max-w-2xl mx-auto">
    <footer
        class="p-4 bg-white rounded-lg shadow cursor-default md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">

        <ul class="flex flex-wrap justify-center mt-3 sm:mt-0">
            <li>
                <a href="{{route('abautme')}}" class="mr-2 text-xs text-gray-500 hover:underline md:mr-6 dark:text-gray-400">¿Quienes Somos?</a>
            </li>
            {{-- <li>
                <a href="#" class="mr-4 text-sm text-gray-500 hover:underline md:mr-6 dark:text-gray-400">Privacy
                    Policy</a>
            </li> --}}
            {{-- <li>
                <a href="#" class="mr-4 text-sm text-gray-500 hover:underline md:mr-6 dark:text-gray-400">Licensing</a>
            </li> --}}
            <li>
                <a href="{{Route('contacts.index')}}" class="text-xs text-gray-500 hover:underline dark:text-gray-400">Soporte al Usuario</a>
            </li>
        </ul>
        <span class="items-center justify-center text-xs text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a
                {{-- href="https://flowbite.com" --}} class="hover:underline">FUNDACATTCC</a>. Todos los derechos reservados.
        </span>
    </footer>
</div>
