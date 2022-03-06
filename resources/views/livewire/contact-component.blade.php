<div>
    {{-- Componente Formulario de contacto --}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            CENTRO DE AYUDA CONTÁCTANOS
        </x-slot>

        <x-slot name="description">

            <div class="">
                <p class="text-sm text-justify text-gray-700 "> Si tienes alguna duda o pregunta, estamos aquí para
                    ayudarte en todo lo que necesites saber acerca de
                    CyberUNESR. Sin importar el día:
                    <br>
                    Podemos y queremos asesorarte en tu proceso de aprendizaje o ayudarte con alguna molestia ocacionada en esta plataforma.
                    <br>
                    Si estás dentro del horario, te recomendamos dejar tus datos de contactos reales para comunicarnos con tigo,
                    te contestaremos de inmediato.
                </p>

                {{-- <div class="flex items-center mt-4 mb-2 text-sm text-gray-600"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/phone.png" /> Llama sin cargos a éste teléfono:
                    +1.855.520.6288</div>

                <div class="flex items-center mb-2 text-sm text-gray-600"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/whatsapp.png" /> Por Whatsapp (llamada o mensaje):
                    +1.305.984.2003</div>

                <div class="flex items-center mb-2 text-sm text-gray-600"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/like-message.png" /> Email:
                    contacts@meganegociosvip.com
                </div>

                <div class="flex items-center mb-2 text-sm text-gray-600"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/address.png" /> Dirección física: Meganegocios Vip |
                    Edf:
                    Onivas | Boulevard Sabana Grande, Caracas.</div> --}}

            </div>

        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Asunto
                </x-jet-label>

                <x-jet-input wire:model="createForm.issue" type="text" class="w-full mt-1"
                    placeholder="Tu asunto es de muchísima importancia para nosotros" />

                <x-jet-input-error for="createForm.issue" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1"
                    placeholder="¿Cual es tu nombre?" />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Correo
                </x-jet-label>

                <x-jet-input wire:model="createForm.email" type="text" class="w-full mt-1"
                    placeholder="Introduce tu correo" />

                <x-jet-input-error for="createForm.email" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Teléfono
                </x-jet-label>

                <x-jet-input wire:model="createForm.phone" type="text" class="w-full mt-1"
                    placeholder="Introduce tu número de celular para comunicarnos con tigo" />
                <x-jet-input-error for="createForm.phone" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Mensaje
                </x-jet-label>

                <textarea wire:model="createForm.comment"
                    class="block w-full h-32 px-3 py-2 text-sm text-gray-700 border rounded border-red-300er"
                    placeholder="¿Cual es tu mensaje?"></textarea>

                <x-jet-input-error for="createForm.comment" />
            </div>

        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                ¡Gracias tu mensaje ha sido recibido!
            </x-jet-action-message>

            <x-jet-button>
                Enviar
            </x-jet-button>

        </x-slot>

    </x-jet-form-section>

</div>
