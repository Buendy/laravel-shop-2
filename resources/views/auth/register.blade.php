@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
    <div class="page-header header-filter" style="background-image: url({{ asset('img/bg7.jpg') }}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form" method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title">Registro</h4>
                                </div>
                                <p class="description text-center">Rellena tus datos</p>
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">face</i>
                                                </span>
                                        </div>
                                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               placeholder="Nombre"
                                               name="name" value="{{ old('name', $name) }}" required autofocus
                                        >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">fingerprint</i>
                                                </span>
                                        </div>
                                        <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                               placeholder="Nombre de Usuario"
                                               name="username" value="{{ old('username') }}" required
                                        >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">mail</i>
                                                </span>
                                        </div>
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               placeholder="Correo Electrónico..."
                                               name="email" value="{{ old('email', $email) }}" required autofocus
                                        >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">phone</i>
                                                </span>
                                        </div>
                                        <input type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                               placeholder="Teléfono del Usuario"
                                               name="phone" value="{{ old('phone') }}" required
                                        >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">home</i>
                                                </span>
                                        </div>
                                        <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               placeholder="Dirección del Usuario"
                                               name="address" value="{{ old('address') }}" required
                                        >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                        </div>
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               placeholder="Contraseña..."
                                               name="password" required
                                        >
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="material-icons">lock_outline</i>
                                                </span>
                                        </div>
                                        <input type="password" class="form-control"
                                               placeholder="Repite la contraseña..."
                                               name="password_confirmation" required
                                        >
                                    </div>

                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Registrar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
