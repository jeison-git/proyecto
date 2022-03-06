<section> {{-- falta solucionar muchos errores en esta seccion--}}
       <h1 class="font-bold text-3xl text-gray-800 mb-4">Valoraciones</h1>

        @can('enrolled',$course)

       <article class="mb-4">
           @can('valued', $course)

        <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Ingrese una reseña sobre el curso ..."></textarea>
        <div class="flex items-center">
            <button class="btn btn-primary mr-2" wire:click="store">Agregar</button>
            <ul class="flex">
                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                    <i class="fas fa-star text-{{$rating >=1 ? 'yellow' : 'gray'}}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                    <i class="fas fa-star text-{{$rating >=2 ? 'yellow' : 'gray'}}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                    <i class="fas fa-star text-{{$rating >=3 ? 'yellow' : 'gray'}}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                    <i class="fas fa-star text-{{$rating >=4 ? 'yellow' : 'gray'}}-300"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                    <i class="fas fa-star text-{{$rating >=5 ? 'yellow' : 'gray'}}-300"></i>
                </li>
            </ul>
        </div>

        @else
        <!-- Alert Info -->
            <div class="bg-blue-200 px-6 md:py-4 md:my-4 rounded-md md:text-lg flex items-center mx-auto">
            <svg viewBox="0 0 24 24"
                class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3"
                >
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z"
                >
            </path>
            </svg>
            <span class="text-blue-800"> Usted ya ha valorado este curso. </span>
            </div>
            <!-- End Alert Info -->

        @endcan

        </article>

        @endcan

   {{-- error de property no se arreglarlo todavia--}}
        <div class="card ">
            <div class="card-body">
                <p class="text-gray-900 text-xl mb-4">{{$course->reviews->count()}} valoraciones</p>

                @foreach ($course->reviews as $review)

                    <article class="grid md:grid-cols-1 flex-1 justify-start items-center mb-4 text-gray-800">
                            <figure class="mr-4 mb-2">
                                <img class="h-12 w-12 object-fill rounded-full shadow-lg" src="{{$review->user->profile_photo_url ?? null}}" alt="">
                            </figure>
                        <div class=" card flex-1">
                            <div class="card-body bg-gray-200">
                                <p><b>{{$review->user->name ?? null}}</b><i class="fas fa-star text-yellow-300"></i> {{$review->rating}}</p>
                                {{$review->comment}}
                            </div>
                        </div>
                    </article>

                @endforeach

            </div>
        </div>
</section>
