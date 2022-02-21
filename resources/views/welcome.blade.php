<x-app-layout>
    {{-- portada --}}
    <section class="container mt-16">
                
                <div class="mid-w p-4 bg-white rounded-lg shadow-xl dark:bg-gray-800 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                
                    <h1 class="cursor-default w-auto h-auto text-center font-extrabold md:text-5xl bg-clip-text text-gray-700 hover:text-transparent bg-gradient-to-r from-indigo-700 via-indigo-500 to-indigo-600">
                        ¡Bienvenido a Cybernetic UNESR!
                    </h1>
                    <p class="font-semibold text-center text-gray-600 dark:text-gray-300">cursos complementarios y mucho más</p>
        
                </div> 

    </section>   
        
        {{-- Seccion de ultimos cursos agregados --}}
    <section class="my-16">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

             @foreach ($courses as $course)             
             <x-course-card :course="$course" />                
            @endforeach  

        </div>
    </section>
</x-app-layout>
