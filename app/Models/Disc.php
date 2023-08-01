<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disc extends Model
{
    use HasFactory;

    protected $table = "discs";

    protected $fillable = [
        'style',
        'year_of_release',
        'artist',
        'name',
    ];

}
