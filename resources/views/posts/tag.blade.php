<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Tag: {{$tag->name}}</h1>
    
        @foreach ($posts as $post) {{-- Denotar que el bloque esta contenido en un foreach iterando cada post del objeto posts e imprimiendolo en un article cada uno --}}
            <x-card-post :post="$post" />
        @endforeach
    
        {{-- Debo decir que LARAVEL ES INCREIBLE, aca solo cambie la busqueda del componente anonimo card-post.blade de $Category a $Tag y luego igual, que retorne lo almacenado en name --}}

        {{-- Esto a continuacion es paginacion para vista tag --}}
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    
    </div>
    </x-app-layout>