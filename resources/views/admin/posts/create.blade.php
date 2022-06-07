@extends('adminlte::page')

@section('title', 'Pagina Laravel')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del nuevo post']) !!}

                    @error('name')
                        <small class="text-danger">{{$message}}</small>>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del post', 'readonly']) !!}

                    @error('slug')
                        <small class="text-danger">{{$message}}</small>>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Categoría') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                    @error('category_id')
                        <small class="text-danger">{{$message}}</small>>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas</p>

                    @foreach ($tags as $tag)

                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{$tag->name}}
                        </label>

                    @endforeach

                    @error('tags')
                        <br>
                        <small class="text-danger">{{$message}}</small>>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>

                    <label>
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>

                    <label>
                        {!! Form::radio('status', 2) !!}
                        Publicado
                    </label>

                    
                    @error('status')
                        <br>
                        <small class="text-danger">{{$message}}</small>>
                    @enderror

                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            <img src="https://cdn.pixabay.com/photo/2020/10/19/18/44/windows-5668674_960_720.jpg" alt="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
                            {!! Form::file('file', ['class' => 'form-control-file']) !!}
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, officia natus! Recusandae natus porro ipsa cum reiciendis eos sunt ex inventore! Fuga a sint dolore odio iste nemo eos officiis.</p>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Extracto:') !!}
                    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                    @error('extract')
                        <small class="text-danger">{{$message}}</small>>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo del post:') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                    @error('body')
                        <small class="text-danger">{{$message}}</small>>
                    @enderror
                </div>

                {!! Form::submit('Crear post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position:absolute;
            object-fit: cover;
            width: 100%;
            height: 100%
        }
    </style>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        /* Aca debe llevar siempre la almohadilla # ya que sin eso no sirve el CkEditor5 para los textarea enriquecidos*/
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
@endsection