<div>

    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">
                    <a href="{{ URL::previous() }}" class="mr-2"><img
                            src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" /></a>Mensaje
                </h1>

                @can('Ver dashboard')
                    <x-jet-danger-button wire:click="$emit('deleteContact')">
                        Eliminar
                    </x-jet-danger-button>
                @endcan

            </div>
        </div>
    </header>

    <div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px-8">

        <h1 class="mb-8 font-semibold text-center md:text-2xl">Por favor lea detenidamente esta información, para que
            luego pueda responder adecuadamente los requerimientos del usuario</h1>



        {{-- @livewire('admin.status-contact', ['contact' => $contact], key('status-contact-' . $contact->id)) --}}




        <div class="p-6 bg-white rounded-lg shadow-xl">

            {{-- Asunto --}}
            <div class="mb-4">
                <x-jet-label value="Asunto" />
                <x-jet-input type="text" class="w-full bg-gray-100" disabled wire:model="contact.issue" />
                <x-jet-input-error for="contact.issue" />
            </div>

            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full bg-gray-100" disabled wire:model="contact.name" />
                <x-jet-input-error for="contact.name" />
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Correo --}}
                <div class="mb-4">
                    <x-jet-label value="Correo del cliente" />
                    <x-jet-input type="text" disabled wire:model="contact.email" class="w-full bg-gray-100" />
                    <x-jet-input-error for="contact.email" />
                </div>

                {{-- telefono --}}
                <div class="mb-4">
                    <x-jet-label value="Número de celular" />
                    <x-jet-input type="text" disabled wire:model="contact.phone" class="w-full bg-gray-100" />
                    <x-jet-input-error for="contact.phone" />
                </div>
            </div>
            {{-- Mensaje --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Mensaje" />
                    <textarea class="w-full form-control" rows="4" disabled wire:model="contact.comment">
                    </textarea>
                </div>
                <x-jet-input-error for="contact.comment" />
            </div>

            {{-- <div class="flex items-center justify-end mt-4">

                <x-jet-action-message class="mr-3" on="saved">
                    Gracias por responder esta solicitud
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Guardar respuesta
                </x-jet-button>
            </div> --}}
        </div>


    </div>


    @push('script')
        <script>
            Livewire.on('deleteContact', () => {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.answer-contact', 'delete');

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })
        </script>
    @endpush

</div>
