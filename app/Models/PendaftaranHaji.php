<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranHaji extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_haji';

    protected $guarded = [
        'id'
    ];
}
