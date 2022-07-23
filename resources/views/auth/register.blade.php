@extends('layouts.master')

@section('content')
    <div class="register">
        <div class="container">
            <div class="register__inner">
                <div class="login-form">
                    <h3>Реєстрація</h3>
                    <form class="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input class="form-input" id="email" type="text" name="name" placeholder="Enter login" required>
                        <input class="form-input" id="email" type="email" name="email" placeholder="Enter email" required autocomplete="email">
                        <input class="form-input" id="password" type="password" name="password" placeholder="Enter password" required autocomplete="new-password">
                        <input class="form-input" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </form>
                    <div class="login-link">
                        <span>
                            Вже маєте акаунт?
                        </span>
                            <a href="{{ route('login') }}">Увійти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
