<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    //model encji ('users_products') pośredniczącej między relacją wiele do wielu dla User i Product 
    //dodatkowo encja ta jest połączona relacją wiele do jednego z encją 'orders' 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    use HasFactory;
}
