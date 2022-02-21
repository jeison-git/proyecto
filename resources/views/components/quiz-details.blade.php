@props(['quiz'])

<div>
    <section class="my-4 card" x-data="{open: false}">
        <div class="bg-gray-100 card-body">

            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Detalles y resultados del Test</h1>
                <hr>
            </header>

            <article x-show="open">
                @if ($quiz->questions->count())
                    <div class="card-body">
                        <x-table-responsive>

                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-8 py-2 text-sm font-bold tracking-wider text-center text-black uppercase">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-8 py-2 text-sm font-bold tracking-wider text-center text-black uppercase">
                                            Puntaje
                                        </th>
                                        <th scope="col" class="px-8 py-2 text-sm font-bold tracking-wider text-center text-black uppercase">
                                            Correctas
                                        </th>
                                        <th scope="col" class="px-8 py-2 text-sm font-bold tracking-wider text-center text-black uppercase">
                                            Incorrectas
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-300">

                                    @foreach($quiz->results as $result)
                                        <tr>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $result->user->name }}</div>
                                            </td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-gray-800">{{ $result->point }}</div>
                                            </td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ $result->correct_answer }}</div>
                                            </td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">{{ $result->wrong_answer }}</div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </x-table-responsive>
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">Detalles del test</h5>
                                <ul class="mt-3 list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Cantidad de preguntas
                                        <span class="badge badge-info badge-pill">{{ $quiz->questions->count() }}</span>
                                    </li>
                                    @if($quiz->myResult)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Número de participantes
                                            <span class="badge badge-info badge-pill">{{ $quiz->details['join_count'] }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Puntuación
                                            <span class="text-white badge badge-warning badge-pill">{{ $quiz->details['average'] }}</span>
                                        </li>
                                    @endif
                              </ul>
                        </div>
                        <div>
                            @if(count($quiz->topTenUser) > 0)
                                <div class="mt-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Top 10</h5>
                                        <ul class="list-group">
                                            @foreach ($quiz->topTenUser as $result)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <strong>{{ $loop->iteration }}.</strong>
                                                    <img src="{{ $result->user->profile_photo_url }}" class="flex w-10 h-10 rounded-full">
                                                    <span @if(auth()->user()->id == $result->user_id) class="text-success" @endif >{{ $result->user->name }} </span>
                                                    <span class="badge badge-success badge-pill">{{ $result->point }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                    <div class="px-4 py-2 text-sm font-medium text-center">
                        No tienes preguntas u resultados disponible
                    </div>
                @endif
            </article >

        </div>
    </section>
</div>
