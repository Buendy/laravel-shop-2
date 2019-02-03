@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Productos Disponibles</h2>
                <div class="team">
                    <div class="row">
                        <a href="{{ url('admin/products/create') }}"
                            class="btn btn-primary btn-round">Nuevo Producto</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripción</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-right">Precio</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td class="col-4">{{ $product->description }}</td>
                                    <td>{{ $product->category_name}}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td class="text-right">{{ $product->price }}&euro;</td>
                                    <td class="text-right">
                                        <a href="{{ url('/products/' . $product->id) }}" rel="tooltip" title="Ver Producto"
                                            class="btn btn-info btn-simple btn-sm" target="_blank"
                                        >
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/' . $product->id . '/edit') }}"
                                           rel="tooltip" class="btn btn-success btn-simple btn-sm"
                                           title="Editar producto"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/' . $product->id . '/images') }}"
                                           rel="tooltip" title="Imágenes del Producto"
                                           class="btn btn-warning btn-simple btn-sm"
                                        >
                                            <i class="fa fa-image"></i>
                                        </a>

                                        <a href="{{ url('/admin/products/' . $product->id . '/addStock') }}"
                                           rel="tooltip" title="Añadir a stock"
                                           class="btn btn-warning btn-simple btn-sm"
                                        >
                                            <i class="fa fa-plus"></i>
                                        </a>

                                        <form action="{{ url('/admin/products/' . $product->id) }}"
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
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
