<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payments";
    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'id_order');
    }

    public function pembeli()
    {
        return $this->hasOne(User::class, 'id', 'id_pembeli');
    }
}
