@extends('layouts.app')

@section('title', 'Listado de Imágenes')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Imágenes del producto: {{ $product->name }}</h2>

                <div class="row justify-content-center">
                    <form action="{{ url('admin/products/' . $product->id . '/images') }}"
                        method="post" enctype="multipart/form-data"
                    >
                        @csrf
                        <input type="file" name="photo" required>
                        <button type="submit" class="btn btn-primary btn-round">Añadir Imagen</button>
                        <a href="{{ url('admin/products') }}"
                           class="btn btn-default btn-round">
                            Volver al listado de productos
                        </a>
                    </form>

                </div>

                <div class="row">
                    @foreach($images as $image)
                        <div class="col-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ $image->url }}" alt="Card image cap">
                                <form action="{{ url('/admin/products/' . $product->id . '/images/' . $image->id) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-round">Eliminar Imagen</button>
                                </form>
                            </div>
                            <div class="col-4 justify-content-center">
                                @if ($image->featured)
                                    <button type="button" class="btn btn-danger btn-fab btn-round">
                                        <i class="material-icons">favorite</i>
                                    </button>
                                @else
                                    <form action="{{ url('admin/products/' . $product->id . '/images/' . $image->id) }}"
                                        method="post"
                                    >
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-fab btn-round">
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>

    </div>
    @include('partials.footer')
@endsection