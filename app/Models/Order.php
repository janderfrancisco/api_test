<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'client_id',
        'disc_id',
        'quantity' 
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function disc()
    {
        return $this->belongsTo(Disc::class);
    }
}
