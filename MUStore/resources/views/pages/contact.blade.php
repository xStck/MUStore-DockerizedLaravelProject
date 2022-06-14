@extends('layouts.app')
@section('title')
    {{ __('Kontakt') }}
@endsection
@section('category')
    {{ __('Kontakt') }}
@endsection

@section('content')
    <div class="row d-flex p-0 m-0">
        <div class="col-xl-6 col-lg-7 col-12">
            <h3>
                <b>{{ __('Imię i nazwisko:') }}</b> Dawid Nalepa<br>
                <b>{{ __('Adres:') }}</b> ul. Muzyczna 7, 20-618 Lublin<br>
                <b>{{ __('Numer telefonu:') }}</b> +48 123456789
                <br><b>{{ __('E-mail:') }}</b> dawid.nalepa@pollub.edu.pl
            </h3>
        </div>
        <div class="col-lg-6 col-8 ">
            <div id="mapid"></div>
            <script>
                $("#carous").hide();
                var mymap = L.map('mapid').setView([51.237880, 22.554310], 13);
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoieHN0Y2siLCJhIjoiY2twNG83cmlhMDhuNzJwcXQ2MmN3OXZtcSJ9.toKygWO4mMEdLOBiOwfKfg'
                }).addTo(mymap);
                var marker = L.marker([51.237880, 22.554310]).addTo(mymap);
                marker.bindPopup("<b>Jesteśmy tutaj :)</b><br>   Zapraszamy!").openPopup();
            </script>
        </div>
    </div>

@endsection
