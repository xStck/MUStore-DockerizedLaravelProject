@extends('layouts.app')
@section('title')
    {{ __('Koszyk') }}
@endsection
@section('category')
    {{ __('Koszyk') }}
@endsection

@section('content')
    @auth
        @if (session()->get('success'))
            <div class="w-100 container d-flex align-items-center justify-content-center">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if ($products->isEmpty())
            <h3>{{ __('Koszyk jest pusty. Dodaj przedmioty by móc dokonać zamówienia. ') }}</h3>
        @else
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col col-xl-7  col-lg-7 col-md-12 col-sm-12 col-xs-12 col-12">
                    <form role="form" action="{{ route('store') }}" id="order-form" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h2>{{ __('Dane do wysyłki') }}</h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td><strong>{{ __('Imię*:') }}</strong></td>
                                    <td><input name="name" size="30" id="name" required type="text" /> </td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Nazwisko*:') }}</strong></td>
                                    <td><input name="surname" size="30" id="surname" required type="text" /> </td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Wiek*:') }}</strong></td>
                                    <td><input name="age" id="age" required type="number" min="18" max="120" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Adres e-mail*:') }}</strong></td>
                                    <td><input name="email" size="30" id="email" type="email" required /></td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Numer telefonu*:') }}</strong></td>
                                    <td><input name="phoneNumber" size="30" id="phoneNumber" type="text" required /></td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Ulica*:') }}</strong></td>
                                    <td><input name="street" size="30" id="street" type="text" required /></td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Numer budynku/mieszkania*:') }}</strong></td>
                                    <td><input name="buildingFlatNumber" size="6" id="buildingFlatNumber" type="text"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Kraj*:') }}</strong></td>
                                    <td><select id="country" name="country" size="2" required>
                                            <option value="Polska" selected>{{ __('Polska') }}</option>
                                            <option value="Niemcy">{{ __('Niemcy') }}</option>
                                            <option value="Wielka Brytania">{{ __('Wielka Brytania') }}</option>
                                            <option value="Stany Zjednoczone">{{ __('Stany Zjednoczone') }}</option>
                                            <option value="Czechy">{{ __('Czechy') }}</option>
                                            <option value="Francja">{{ __('Francja') }}</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Województwo*:') }}</strong></td>
                                    <td><input name="voivodeship" size="30" id="voivodeship" type="text" required /></td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Kod pocztowy*:') }}</strong></td>
                                    <td><input name="postcode" size="6" id="postcode" type="text" required /></td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('Miasto*:') }}</strong></td>
                                    <td><input name="city" size="30" id="city" type="text" required /></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;"><strong>{{ __('Sposób dostawy*:') }}</strong></td>
                                    <td>
                                        <div id="deliveryMethod">
                                            <input type="radio" name="deliveryMethod" value="DHL" checked>
                                            {{ __('DHL') }}<br>
                                            <input type="radio" name="deliveryMethod" value="Paczkomat InPost">
                                            {{ __('Paczkomat') }}<br>
                                            <input type="radio" name="deliveryMethod" value="Poczta Polska">
                                            {{ __('Poczta Polska') }}<br>
                                            <input type="radio" name="deliveryMethod" value="Odbior w punkcie">
                                            {{ __('Odbiór w punkcie') }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;"><strong>{{ __('Metoda płatności*:') }}</strong>
                                    <td>
                                        <div id="paymentMethod">
                                            <input type="radio" name="paymentMethod" value="Przelew bankowy" checked>
                                            {{ __('Przelew bankowy') }}<br>
                                            <input type="radio" name="paymentMethod" value="Blik"> {{ __('Blik') }}<br>
                                            <input type="radio" name="paymentMethod" value="Za pobraniem">
                                            {{ __('Za pobraniem') }}<br>
                                            <input type="radio" name="paymentMethod" value="Karta MasterCard\/Visa">
                                            {{ __('Karta MasterCard/Visa') }}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <br>
                        <div id="check"><button type="submit" class="btn btn-dark">{{ __('Złóż zamówienie') }}</button>
                        </div>
                    </form><br>
                </div>
                <div class="col col-xl-5  col-lg-5 col-md-12 col-sm-12 col-xs-12 col-12">
                    <?php $price = 0; ?>
                    @for ($i = 0; $i < sizeof($products); $i++)
                        <?php
                        $price += $products[$i]->price;
                        ?>
                        <div class="card w-100">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $products[$i]->name }} </h5>
                                <p class="card-text">{{ __('Cena ') }}{{ $products[$i]->price }} zł</p>
                                @if ($userId[$i] == Auth::user()->id)
                                    <a href="{{ route('deleteFromCart', ['productId' => $products[$i]->id, 'userId' => Auth::id(), 'idInCart' => $idsInCart[$i]]) }}"
                                        class="btn btn-dark">{{ __('Usuń z koszyka') }}</a>
                                @endif
                            </div>
                        </div>
                        <br>
                    @endfor
                    <strong>{{ __('Całkowita wartość zamówienia:') }}</strong> {{ $price }} zł<br>
                </div>
            </div>
        @endif
    @endauth
    @guest
        <h3>{{ __('Zaloguj się by móc przejrzeć koszyk.') }}</h3>
    @endguest
    <script>
        $("#carous").hide();
    </script>
@endsection
