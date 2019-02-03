@extends('layouts.app')

@section('title', 'Crear Producto')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true"
         style="background-image: url('{{ asset('img/profile_city.jpg') }}')"
    ></div>

    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Añadir productos a stock</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('/admin/products/addStock/' . $product->id) }}" method="post" class="form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group bmd-label-floating text-center">
                                <label class="control-label">Cantidad</label>
                                <input type="number" min="1" max="100" class="form-control" name="quantity">
                            </div>
                        </div>
                        <div class="col-sm-4">

                        </div>
                    </div>
                    <br><br>


                    <div class="row justify-content-center">
                        <button class="btn btn-primary" type="submit">añadir</button>
                        <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
