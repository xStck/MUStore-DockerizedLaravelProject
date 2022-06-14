@extends('layouts.app')
@section('title')
    {{ __('Zmiana adresu e-mail') }}
@endsection
@section('category')
    {{ __('Zmiana adresu e-mail') }}
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
                            <form method="POST" action="{{ route('updateUserEmail', ['user' => $user]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nowy e-mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
        <h3>{{ __('Zaloguj się by móc zmienić adres e-mial.') }}</h3>
    @endguest
    <script>
        $("#carous").hide();
    </script>

@endsection
