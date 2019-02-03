@extends('layouts.app')

@section('title', 'Listado de Categorías')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Listado de Categoríass</h2>
                <div class="team">
                    <div class="row">
                        <a href="{{ url('admin/categories/create') }}"
                           class="btn btn-primary btn-round">Nueva Categoría</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripción</th>
                                <th class="col-md-1 text-center">Imagen</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="col-4">{{ $category->description }}</td>
                                    <td class="col-md-1">
                                        <img src="{{ $category->featured_image_url }}" height="50">
                                    </td>
                                    <td class="text-right">
                                        <a href="#" rel="tooltip" title="Ver Categoría"
                                           class="btn btn-info btn-simple btn-sm"
                                        >
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}"
                                           rel="tooltip" class="btn btn-success btn-simple btn-sm"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/admin/categories/' . $category->id) }}"
                                              method="post" class="d-inline-block"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" rel="tooltip" title="Eliminar"
                                                    class="btn btn-danger btn-simple btn-sm"
                                            >
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection