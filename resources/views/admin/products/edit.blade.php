@extends('layouts.app')

@section('title', 'Editar Producto')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Editar el producto seleccionado</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/admin/products/' . $product->id) }}" method="post" class="form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Nombre del Producto</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $product->name) }}"
                                >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Precio del Producto</label>
                                <input type="number" step='0.01' class="form-control"
                                       name="price" value="{{ old('price', $product->price) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Descripción corta</label>
                                <input type="text" class="form-control" name="description"
                                       value="{{ old('description', $product->description) }}"
                                >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group bmd-label-floating">
                                <label class="control-label">Categoría del producto</label>
                                <select name="category_id" class="form-control">
                                    <option value="0">General</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if($category->id == old('category_id', $product->category_id)) selected @endif
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <textarea name="long_description" cols="130" rows="5"
                                  placeholder="Descripción completa del producto"
                                  class="form-control col-12"
                        >{{ old('long_description', $product->long_description) }}</textarea>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary" type="submit">Guardar Producto</button>
                        <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection