<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //relacja wiele do wielu dla User i Product (z wykorzystaniem pośredniczącej encji 'user_products' która odpowiada koszykowi)
    public function user()
    {
        return $this->belongsToMany(User::class, 'users_products')->withPivot('id', 'product_id', 'user_id');
    }

    use HasFactory;

    protected $table = 'products'; //zdefiniowanie nazwy przy pomocy której będziemy komunikować się z encją 'products' w bazie danych

    //nazwy kolumn (atrybutów) w encji 'products'
    protected $fillable = [
        'category', //kategoria produktu
        'name', //nazwa produktu
        'price', //cena produktu
        'imgUrl', //ścieżka do obrazka produktu 
        'description' //opis produktu
    ];
}
