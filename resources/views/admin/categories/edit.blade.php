@extends('adminlte::page')

@section('title', 'Pagina Laravel')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{(session('info'))}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}

                <div class="form-group"> {{-- A continuacion se usa laravel collective para crar el formulario --}}
                    {!! Form::label("name", "Nombre") !!}
                    {!! Form::text("name", null, ["class" => "form-control", 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                {{-- Aca se crea el campo para el Slug y se conecta luego con el plugin JQuery y se pone en modo solo lectura --}}
                <div class="form-group">
                    {!! Form::label("slug", "Slug") !!}
                    {!! Form::text("slug", null, ["class" => "form-control disabled", 'placeholder' => 'Slug de la categoria', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  {{--  --}}

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    
@endsection