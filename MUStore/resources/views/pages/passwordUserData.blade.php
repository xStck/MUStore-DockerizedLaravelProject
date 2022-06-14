@extends('layouts.app')
@section('title')
    {{ __('Zmiana hasła') }}
@endsection
@section('category')
    {{ __('Zmiana hasła') }}
@endsection

@section('content')
    @if (session()->get('success'))
        <div class="w-100 container d-flex align-items-center justify-content-center">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('updateUserPassword', ['user' => $user]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nowe hasło') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" autofocus>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Potwierdź nowe hasło') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                @if ($user->id == Auth::user()->id)
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-dark">
                                                {{ __('Potwierdź') }}
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <h3>{{ __('Zaloguj się by móc zmienić hasło.') }}</h3>
    @endguest
    <script>
        $("#carous").hide();
    </script>
@endsection
