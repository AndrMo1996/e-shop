@extends('layouts.master')

@section('content')
    <div class="login">
        <div class="container">
            <div class="login__inner">
                <div class="login-form">
                    <h3>Авторизація</h3>
                    <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <input class="form-input" id="email" type="email" name="email" placeholder="Enter email" required autocomplete="email" autofocus>
                        <input class="form-input" id="password" type="password" name="password" placeholder="Enter password" required autocomplete="current-password">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </form>
                    <div class="register-link">
                    <span>
                        Якщо ви вперше на сайті, заповніть форму авторизації
                    </span>
                        <a href="{{ route('register') }}">Зареєструватись</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
