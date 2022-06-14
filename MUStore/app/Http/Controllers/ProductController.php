<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    //Wyświetlenie gitar (pobranych z bazy danych)
    public function getGuitars()
    {
        $guitars = Product::where('category', 'guitar')->get(); //pobranie z bazy danych informacji o gitarach
        //wyświetlenie view home z odpowiednimi argumentami, które zostaną wykorzystane do odpowiedniego wyświetlenia strony
        return view('home', ['products' => $guitars, 'title' => 'Gitary akustyczne', 'route' => 'guitars']);
    }

    //Wyswietlenie płyt winylowych (pobranych z bazy danych)
    public function getVinyls()
    {
        $vinyls = Product::where('category', 'vinyl')->get(); //pobranie z bazy danych informacji o płytach winylowych 
        //wyświetlenie view home z odpowiednimi argumentami, które zostaną wykorzystane do odpowiedniego wyświetlenia strony
        return view('home', ['products' => $vinyls, 'title' => 'Płyty winylowe', 'route' => 'vinyls']);
    }

    //Wyświetlenie polecanych produktów (pobranych z bazy danych)
    public function getRecommendations()
    {
        $recommendations = Product::where('category', 'recommended')->get(); //pobranie z bazy danych informacji o polecanych produktach
        //wyświetlenie view home z odpowiednimi argumentami, które zostaną wykorzystane do odpowiedniego wyświetlenia strony
        return view('home', ['products' => $recommendations, 'title' => 'Polecane', 'route' => ' ']);
    }

    //Wyświetlenie gitar basowych (pobranych z bazy danych)
    public function getBasses()
    {
        $basses = Product::where('category', 'bass')->get(); //pobranie z bazy danych informacji o gitarach basowych
        //wyświetlenie view home z odpowiednimi argumentami, które zostaną wykorzystane do odpowiedniego wyświetlenia strony
        return view('home', ['products' => $basses, 'title' => 'Gitary basowe', 'route' => 'basses']);
    }

    //Wyświetlenie keyboard-ów (pobranych z bazy danych)
    public function getKeyboards()
    {
        $keyboards = Product::where('category', 'keyboard')->get(); //pobranie z bazy danych informacji o keyboardach
        //wyświetlenie view home z odpowiednimi argumentami, które zostaną wykorzystane do odpowiedniego wyświetlenia strony
        return view('home', ['products' => $keyboards, 'title' => 'Klawisze midi', 'route' => 'keyboards']);
    }

    //Wyświetlenie oprogramowań (pobranych z bazy danych)
    public function getSoftwares()
    {
        $sofwares = Product::where('category', 'software')->get(); //pobranie z bazy danych informacji o oprogramowaniach
        //wyświetlenie view home z odpowiednimi argumentami, które zostaną wykorzystane to odpowiedniego wyświetlenia strony
        return view('home', ['products' => $sofwares, 'title' => 'Oprogramowania', 'route' => 'softwares']);
    }

    //Dodawanie produktów do koszyka/bazy danych (do encji: users_products)
    public function addToCart($url, Product $prod, User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony przekazanej jako argument $url z odpowiednim komunikatem
        if (Auth::user() == null)
            return redirect($url)->with('success', 'Zaloguj się by móc dodać ten przedmiot do koszyka');
        //jeśli użytkownik dodaje produkt do nieswojego koszyka to wróć do strony przekazanej jako argument $url z odpowiednim komunikatem
        if (Auth::user()->id != $user->id)
            return redirect($url)->with('success', 'Nie możesz dodać tego produktu do koszyka');
        $prod->user()->attach($user->id); //dodanie produktu do koszyka (do encji: users_products)
        //przejście do strony przekazanej jako argument $url z odpowiednim komunikatem
        return redirect($url)->with('success', 'Produkt został pomyślnie dodany do koszyka');
    }

    //Usuwanie produktów z koszyka/bazy danych (w endji: users_products)
    public function deleteFromCart($productId, $userId, $idInCart)
    {
        $product = Product::find($productId); //znalezienie w bazie danych produktu o odpowiednim ID

        //Jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null)
            return redirect(' ')->with('success', 'Zaloguj się by móc usunąć produkt z koszyka.');
        //Sprawdzenie czy użytkownik usuwa produkt ze swojego koszyka, jeśli nie to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user()->id != $userId)
            return redirect(' ')->with('success', 'Nie możesz usunąć produktu z tego koszyka');

        $product->user()->where('product_id', $productId)->wherePivot('id', $idInCart)->detach(); //usunięcie produktu z encji 'users_products' (encja odpowiada koszykowi)
        return back()->with('success', 'Produkt został pomyślnie usunięty z koszyka'); //przejście do wcześniejszej strony (koszyka) z odpowiednim komunikatem
    }
}
