<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //relacja jeden do wielu dla Order i UserProduct(koszyk)
    public function userProduct()
    {
        return $this->belongsToMany(UserProduct::class);
    }

    use HasFactory;

    protected $table = 'orders'; //zdefiniowanie nazwy przy pomocy której będziemy komunikować się z encją 'orders' w bazie danych

    //nazwy kolumn (atrybutów) w encji 'orders'
    protected $fillable = [
        'order_id', //numer zamówienia
        'product_id', //id produktu
        'user_id', //id użytkownika składającego zamówienie
        'name', //imię użytkownika
        'surname', //nazwisko użytkownika
        'age', //wiek użytkownika
        'email', //e-mail użytkownika
        'phoneNumber', //numer telefonu użytkownika
        'street', //ulica podana przez użytkownika
        'buildingFlatNumber', //numer budynku/numer mieszkania podane przez użytkownika
        'country', //kraj podany przez użytkownika (wybierany z listy)
        'voivodeship', //województwo podane przez użytkownika
        'postcode', //kod pocztowy podany przez użytkownika
        'city', //miasto podane przez użytkownika
        'deliveryMethod', //metoda dostawy (wybierana za pomocą radio buttonów) wybrana przez użytkownika
        'paymentMethod' //metoda płatności (wybierana za pomocą radio buttonów) wybrana przez użytkownika
    ];
}
