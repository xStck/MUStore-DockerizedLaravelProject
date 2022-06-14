@extends('layouts.app')
@section('title')
    {{ __('Edycja danych') }}
@endsection
@section('category')
    {{ __('Edycja danych użytkownika') }}
@endsection

@section('content')
    @auth
        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    @if ($user->id == Auth::user()->id)
                        <a class="btn btn-dark"
                            href="{{ route('editBasicUserData', ['user' => Auth()->user()]) }}">{{ __('Edycja podstawowych danych osobowych') }}</a>
                        <a class="btn btn-dark"
                            href="{{ route('editUserPassword', ['user' => Auth()->user()]) }}">{{ __('Zmień hasło') }}</a>
                        <a class="btn btn-dark"
                            href="{{ route('editUserEmail', ['user' => Auth()->user()]) }}">{{ __('Zmień e-mail') }}l</a>
                    @endif
                </div>
            </div>
        </div>
    @endauth
    @guest
        <h3>{{ __('Zaloguj się by móc edytowac dane.') }}</h3>
    @endguest
    <script>
        $("#carous").hide();
    </script>

@endsection
