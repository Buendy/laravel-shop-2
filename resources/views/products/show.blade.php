@extends('layouts.app')

@section('title', $product->name)

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city-profile.jpg') }}');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="name">
                                <h3 class="title">{{ $product->name }}</h3>
                                <h6>{{ $product->category_name }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{ $product->long_description }}</p>
                </div>
                <div class="text-center">
                    @auth
                    <button class="btn btn-primary btn-round" data-toggle="modal"
                        data-target="#modalAddToCart"
                    >
                        <i class="fa fa-cart-plus"></i> Comprar
                    </button>
                    @endauth
                    @guest
                        <a href="{{ url('/login?redirect_to=' . url()->current()) }}" class="btn btn-primary btn-round">
                            <i class="fa fa-cart-plus"></i> Comprar
                        </a>

                    @endguest
                </div>
                <div class="text-center gallery">
                    <div class="row">
                        <div class="col-md-3 ml-auto">
                            @foreach($imagesLeft as $image)
                            <img src="{{ $image->url }}" class="rounded">
                            @endforeach
                        </div>
                        <div class="col-md-3 mr-auto">
                            @foreach($imagesRight as $image)
                            <img src="{{ $image->url }}" class="rounded">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('partials.add_to_cart')
@include('partials.footer')
@endsection
