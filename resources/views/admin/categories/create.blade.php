@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Registrar nueva categoría</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('/admin/categories') }}" method="post" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Nombre de la categoría</label>
                                <input type="text" class="form-control" name="name"
                                       value="{{ old('name') }}"
                                >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bmd-label-floating">
                                <label class="custom-control-label">Imagen de la categoría</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <textarea name="description" cols="130" rows="5"
                                  placeholder="Descripción de la categoría"
                                  class="form-control col-12"
                        >{{ old('description') }}</textarea>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary" type="submit">Registrar Categoría</button>
                        <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection