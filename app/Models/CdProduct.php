<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'firstname',
        'band',
        'price',
        'playlength'
    ];
}
