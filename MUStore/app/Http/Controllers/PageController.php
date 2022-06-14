<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class PageController extends Controller
{
    //wyświetlenie strony z danymi kontaktowymi sklepu
    public function showContact()
    {
        return view('pages.contact'); //przejście do view z informacjami kontaktowymi
    }

    //wyświetlenie koszyka aktualnie zalogowanego użytkownika
    public function showCart(User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null)
            return redirect(' ')->with('success', 'Zaloguj się by móc przejrzeć koszyk');

        //Jeśli aktualnie zalogowany użytkownik przechodzi do swojego koszyka, to zostanie on poprawnie wyświetlony
        if (Auth::user()->id == $user->id) {
            $prodInPivotId = array(); //tablica zawierająca ID produktów które zostały dodane do koszyka
            $pivotId = array(); //tablica zawierająca ID wierszy w encji 'users_products' (encja ta odpowiada koszykowi)
            $userInPivotId = array(); //tablica zawierająca ID użytkownika który dodał produkty do koszyka
            foreach ($user->product as $product) { //dodanie do tablic odpowiednich ID
                array_push($prodInPivotId, $product->pivot->product_id);
                array_push($pivotId, $product->pivot->id);
                array_push($userInPivotId, $product->pivot->user_id);
            }
            //utworzenie tablicy, która będzie posiadać produkty, które zostały dodane do koszyka (produkty w tablicy będą mogły się powtarzać)
            $prodArray = collect([]);
            $products = Product::whereIn('id', $prodInPivotId)->get();
            foreach ($prodInPivotId as $prodId) {
                $prodArray = $prodArray->merge($products->where('id', $prodId));
            }
            //wyświetlenie view koszyka z jednoczesnym przekazaniem wcześniej utworzonych tablic 
            return view('pages.cart', ['products' => $prodArray, 'idsInCart' => $pivotId, 'userId' => $userInPivotId]);
        } else //jeśli aktualnie zalogowany użytkownik nie przechodzi do swojego koszyka to zostanie on przekierowany na stronę główną z odpowiednim komunikatem
            return redirect(' ')->with('success', 'Nie możesz wejść do tego koszyka');
    }
}
