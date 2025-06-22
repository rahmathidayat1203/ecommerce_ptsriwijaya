<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'id_produk');
    }

    public function pembeli()
    {
        return $this->hasOne(User::class, 'id', 'id_pembeli');
    }
}
