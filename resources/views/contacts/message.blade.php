<x-guest-layout>
    <div>
        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">
                        <a href="{{ URL::previous() }}" class="mr-2"><img
                                src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" /></a>Responder mensaje
                    </h1>
                </div>
            </div>
        </header>


        <div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px-8">

            <div class="p-6 bg-white rounded-lg shadow-xl">

                {{-- Mensaje --}}
                <div class="mb-4">
                    <div>
                        <x-jet-label value="Mensaje" />

                        <form action="{{ route('admin.contacts.answered', $contact) }}" method="POST"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <fieldset class="mb-2">
                                <textarea name="body"
                                    class="block w-full h-32 px-3 py-2 text-sm text-gray-700 border rounded border-red-300er"
                                    placeholder="Redacta una respuesta adecuada deacuerdo a los requerimientos del usuario. Gracias."></textarea>
                                @error('body')
                                    <p><strong>{{ $message }}</strong></p>
                                @enderror
                                <br>
                            </fieldset>

                            <div class="flex items-center justify-end mt-4">

                                <button type="submit" class="px-3 py-2 text-sm text-gray-800 bg-blue-400 rounded">Enviar
                                    mensaje</button>
                            </div>

                        </form>

                    </div>
                    <x-jet-input-error for="body" />
                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
