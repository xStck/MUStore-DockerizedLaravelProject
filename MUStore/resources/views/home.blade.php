@extends('layouts.app')
@section('title')
    {{ __('MUstore') }}
@endsection
@section('category')
    {{ __($title) }}
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
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 row-col-2 row-col-md-3 row-col-xl-4 justify-content-center">
            @foreach ($products as $product)
                <div class="col mb-5 col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100"><a class="obraz" data-bs-toggle="modal" data-bs-target="#prodModal"
                            onclick="modalShow('{{ $product->description }}','{{ $product->price }}','{{ $product->name }}','{{ url($product->imgUrl) }}');"><img
                                style="cursor: pointer;" class="card-img-top" src="{{ url($product->imgUrl) }}"
                                alt="produkt"></a>
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ __($product->name) }}</h5>{{ __($product->price) }}
                                {{ __('zł') }}
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            @auth
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('addToCart', ['url' => $route, 'prod' => $product, 'user' => Auth()->user()]) }}">{{ __('Dodaj
                                        do koszyka') }}</a>
                                </div>
                            @endauth
                            @guest
                                <div class="text-center">
                                    <div class="card rounded-pill">
                                        <div class="card-body rounded-pill bg-primary text-white">
                                            {{ __('Zaloguj się by dodać produkt do koszyka.') }}
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <script>
        function modalShow(opis, cena, nazwa, obraz) {
            document.getElementById("modHead").innerHTML = "<h3>{{ __('Informacje o produkcie') }}</h3>";

            document.getElementById('modInf').innerHTML = "<b>{{ __('Nazwa:') }} </b>" + {{ __('nazwa') }} +
                "<br><b>{{ __('Cena:') }} </b>" + {{ __('cena') }} +
                ' zł <div class="row"><div class="col-xl-1 col-lg-12"><b>Opis: </b></div><div class="col-xl-11 col-lg-12"><p style="text-align: justify;">' +
                opis + '</p></div></div>';
            document.getElementById('modImg').innerHTML = '<img src="' + obraz + '" class="img-fluid" alt="' +
                {{ __('nazwa') }} +
                '"></img>';
        }
    </script>
@endsection
