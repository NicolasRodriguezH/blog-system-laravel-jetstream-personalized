<x-app-layout>
<div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
    <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{$category->name}}</h1>

    @foreach ($posts as $post)
        <article class="my-8 bg-white shadow-lg rounded-xl overflow-hidden">
            <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">

            <div class="px-6 py-4">
                <h1 class="font-bold text-xl mb-2">
                    <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
                </h1>

                <div class="text-gray-600 text-base">
                    {{$post->extract}}
                </div>
            </div>

            {{-- Construyendo traida de las etiquetas que pertenecen a cada post de cada categoria --}}
            <div class="px-6 pt-4 pb-2">
                @foreach ($post->tags as $tag)
                    
                @endforeach
            </div>
        </article>
    @endforeach
</div>
</x-app-layout>