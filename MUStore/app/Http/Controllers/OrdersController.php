<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

//Kontroler odpowiadający za złożone zamówienia (po wysłaniu formularza w koszyku)
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        Dodanie zamówienia użytkownika do bazy danych (do encji 'orders')
        -po poprawnym wypełnieniu formularza w koszyku i naciśnięciu przycisku 'Złóż zamówienie'
        */
        //walidacja danych przesłanych przez formularz (metodą POST)
        $this->validate($request, [
            'name' => 'required|alpha|string|max:30', //walidacja imienia
            'surname' => 'required|alpha|string|max:30',    //walidacja nazwiska
            'age' => 'required|numeric|integer|between:18,120', //walidacja wieku
            'email' => 'required|email|max:255',    //walidacja adresu e-mail
            'phoneNumber' => 'required|string|max:15',  //walidacja numeru telefonu
            'street' => 'required|string|max:255',  //walidacja ulicy
            'buildingFlatNumber' => 'required|string|max:10',   //walidacja numeru budynku/numeru mieszkania
            'country' => 'required', //walidacja kraju (wybieranego z listy)
            'voivodeship' => 'required|string|alpha|max:255', //walidacja województwa
            'postcode' => 'required|string|max:10', //walidacja kodu pocztowego
            'city' => 'required|string|alpha|max:255', //walidacja miasta
            'deliveryMethod' => 'required', //walidacja metody dostawy (wybieranej za pomocą radio button-ów)
            'paymentMethod' => 'required' //walidacja metody płatności (wybieranej za pomocą radio button=ów)
        ]);

        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc złożyć zamówienie');
        }

        $user = User::find(auth()->user()->id); //Znalezienie aktualnie zalogowanego użytkownika w bazie danych

        $prodInCartId = array(); //utworzenie pomocniczej tablicy, która będzie przechowywać id produktów które znajdują się w koszyku (w bazie danych encja: 'users_products')

        //Dodanie do tablicy 'prodInCartId' id produktów dodanych do koszyka przez aktualnie zalogowanego użytkownika
        foreach ($user->product as $product) {
            array_push($prodInCartId, $product->pivot->product_id);
        }

        //Utworzenie pomocniczej zmiennej, która służy do numerowania zamówień
        if (Order::max('order_id') == null) {
            $order_num = 1;
        } else {
            $order_num = Order::max('order_id') + 1;
        }

        $success = false; //pomocnicza zmienna, która posłuży do weryfikacji, czy WSZYSTKIE przedmioty z koszyka zostały poprawnie dodane do bazy danych (do encji: 'orders')

        //Dodanie do bazy danych złożonego zamówienia 
        //Poszczególne zamówienia będą identyfikowane za pomocą order_id, ponieważ jeżeli użytkownik kupi kilka rzeczy, to jeden wiersz w bazie danych
        //będzie odpowiadać jednemu przedmiotowi, który wchodzi w skład całego zamówienia
        foreach ($prodInCartId as $prodId) {
            $order = new Order();
            $order->order_id = $order_num;
            $order->product_id = $prodId;
            $order->user_id = $user->id;
            $order->name = $request->name;
            $order->surname = $request->surname;
            $order->age = $request->age;
            $order->email = $request->email;
            $order->phoneNumber = $request->phoneNumber;
            $order->street = $request->street;
            $order->buildingFlatNumber = $request->buildingFlatNumber;
            $order->country = $request->country;
            $order->voivodeship = $request->voivodeship;
            $order->postcode = $request->postcode;
            $order->city = $request->city;
            $order->deliveryMethod = $request->deliveryMethod;
            $order->paymentMethod = $request->paymentMethod;
            if ($order->save())
                $success = true;
            else {
                //jeśli nie udało się dodać jakiegoś przedmiotu z koszyka do bazy danych, to przerywamy dodawanie kolejnych przedmiotów do encji 'orders'
                $success = false;
                break;
            }
        }

        if ($success == true) {
            //Gdy zamówienie zostało złożone (wszyskie produkty z koszyka zostały dodane do bazy danych; encja: 'orders'), usuń dodane do koszyka obiekty z tabeli 'users_products' (encja ta odpowiada koszykowi)
            $user->product()->wherePivot('user_id', $user->id)->detach();
            return redirect(' ')->with('success', 'Zamówienie zostało złożone'); //powrót do strony głównej z odpowiednim komunikatem
        } else {
            //Jeśli nie udało się złożyć zamówienia (dodać wszyskich produktów z koszyka do encji 'orders' w bazie danych), usuń w encji 'orders' wszystkie dotychczas dodane wiersze o podanym numerze zamówienia
            Order::where('order_id', $order_num)->delete();
            return redirect(' ')->with('success', 'Nie udało się złożyć zamówienia.'); //powrót do strony głównej z odpowiednim komunikatem
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
