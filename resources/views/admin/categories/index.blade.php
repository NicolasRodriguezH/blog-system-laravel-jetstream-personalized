@extends('adminlte::page')

@section('title', 'Pagina Laravel')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{$category->id}}</th>
                            <th>{{$category->name}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop