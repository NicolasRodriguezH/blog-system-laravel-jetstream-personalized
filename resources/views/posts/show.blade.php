<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {!!$post->extract!!}
        </div>

        {{-- Contenido base o (zona post) Lo hacemos responsivo con la declaracion lg para pantallas medianas/grandes y el anterior para pantallas mas pequeñas, (como se debe hacer). --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Contenido principal --}}
            <div class="lg:col-span-2">

                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/10/19/18/44/windows-5668674_960_720.jpg" alt="">
                    @endif
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>

            </div>

            {{-- Contenido relacionado - Se usa el aside y un SPAN para el nombre al aldo de la img--}}
            <aside class="">
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Relacionados con {{$post->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $similar)}}">
                                
                                @if ($similar->image)
                                    <img class="w-36 h20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-36 h20 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/10/19/18/44/windows-5668674_960_720.jpg" alt="">
                                @endif

                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>

</x-app-layout>