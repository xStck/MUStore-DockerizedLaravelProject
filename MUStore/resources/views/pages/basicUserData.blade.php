@extends('layouts.app')
@section('title')
    {{ __('Edycja podstawowych danych') }}
@endsection
@section('category')
    {{ __('Edycja podstawowych danych') }}
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('updateBasicUserData', ['user' => $user]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nowe imię') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nowe nazwisko') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ $user->surname }}" required autocomplete="surname">

                                    @error('surname')
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
        <script>
            $("#carous").hide();
        </script>
    </div>

@endsection
